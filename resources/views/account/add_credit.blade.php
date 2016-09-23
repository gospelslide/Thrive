@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Credit Card Account</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register_credit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">Account Number</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                            <label for="customer_id" class="col-md-4 control-label">Customer Id</label>

                            <div class="col-md-6">
                                <input id="customer_id" type="text" class="form-control" name="customer_id" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_id') ? ' has-error' : '' }}">
                            <label for="bank_id" class="col-md-4 control-label">Bank Id</label>

                            <div class="col-md-6">
                                <input id="bank_id" type="text" class="form-control" name="bank_id" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card') ? ' has-error' : '' }}">
                            <label for="card" class="col-md-4 control-label">Card Number</label>

                            <div class="col-md-6">
                                <input id="card" type="number" class="form-control" name="card" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Display Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('spend') ? ' has-error' : '' }}">
                            <label for="spend" class="col-md-4 control-label">Credit Limit</label>

                            <div class="col-md-6">
                                <input id="spend" type="number" class="form-control" name="spend" required>
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                            <label for="balance" class="col-md-4 control-label">Balance</label>

                            <div class="col-md-6">
                                <input id="balance" type="number" class="form-control" name="balance" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="type" required>
                            </div>
                        </div>                        

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Expiry Date</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
