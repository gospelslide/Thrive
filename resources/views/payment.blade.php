@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Payment</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/update_payment') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('bank_id') ? ' has-error' : '' }}">
                            <label for="bank_name" class="col-md-4 control-label">Bank Name</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control" name="bank_name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sort_code') ? ' has-error' : '' }}">
                            <label for="account_id" class="col-md-4 control-label">Account Id</label>

                            <div class="col-md-6">
                                <input id="account_id" type="text" class="form-control" name="account_id" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Account Type</label>

                            <div class="col-md-6">
                                <input id="type" type="radio" name="type" value="current" checked required>Current<br />
                                <input id="type" type="radio" name="type" value="credit" required>Credit<br />
                                <input id="type" type="radio" name="type" value="saving" required>Savings
                    
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mer_name') ? ' has-error' : '' }}">
                            <label for="mer_name" class="col-md-4 control-label">Merchant Name</label>

                            <div class="col-md-6">
                                <input id="mer_name" type="text" class="form-control" name="mer_name" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mer_id') ? ' has-error' : '' }}">
                            <label for="mer_id" class="col-md-4 control-label">Merchant Account</label>

                            <div class="col-md-6">
                                <input id="mer_id" type="text" class="form-control" name="mer_id" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mode') ? ' has-error' : '' }}">
                            <label for="mode" class="col-md-4 control-label">Payment Mode</label>

                            <div class="col-md-6">
                                <input id="mode" type="radio" name="mode" value="card" checked required>Card<br />
                                <input id="mode" type="radio" name="mode" value="neft" required>NEFT<br />
                                <input id="mode" type="radio" name="mode" value="cash" required>Cheque
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('in') ? ' has-error' : '' }}">
                            <label for="in" class="col-md-4 control-label">Received</label>

                            <div class="col-md-6">
                                <input id="in" type="number" type="any" class="form-control" name="in">
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('out') ? ' has-error' : '' }}">
                            <label for="out" class="col-md-4 control-label">Sent</label>

                            <div class="col-md-6">
                                <input id="out" type="number" type="any" class="form-control" name="out">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Payment
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
