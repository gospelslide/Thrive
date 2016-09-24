@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Current Account</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register_current') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">Account Number</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_id') ? ' has-error' : '' }}">
                            <label for="bank_id" class="col-md-4 control-label">Bank Id</label>

                            <div class="col-md-6">
                                <input id="bank_id" type="text" class="form-control" name="bank_id" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                            <label for="balance" class="col-md-4 control-label">Balance</label>

                            <div class="col-md-6">
                                <input id="balance" type="number" class="form-control" name="balance" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('od') ? ' has-error' : '' }}">
                            <label for="od" class="col-md-4 control-label">Overdraft Limit</label>

                            <div class="col-md-6">
                                <input id="od" type="number" class="form-control" name="od" required>
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
                            <label for="spend" class="col-md-4 control-label">Maximum Expenditure</label>

                            <div class="col-md-6">
                                <input id="spend" type="number" class="form-control" name="spend" required>
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
