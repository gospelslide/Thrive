@extends('layouts.dashboardlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Add Savings Account</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register_saving') }}">
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

                        <div class="form-group{{ $errors->has('roi') ? ' has-error' : '' }}">
                            <label for="roi" class="col-md-4 control-label">Interest Rate</label>

                            <div class="col-md-6">
                                <input id="roi" type="number" step="any" class="form-control" name="roi" required>
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
