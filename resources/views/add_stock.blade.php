@extends('layouts.dashboardlayout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Add Stock information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register_credit') }}">
                        {{ csrf_field() }}
<!-- drop down -->
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">Select stock code</label>

                            <div class="col-md-6">
                        <select class="select2_single form-control" tabindex="-1">
                            <option></option>
                            @foreach($stocks as $stock)
                            <option value="{{$stock->symbol}}/">{{$stock->symbol}}</option>
                            @endforeach
                        </select>
                            </div>
                        </div>
<!-- drop down -->

                        <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                            <label for="customer_id" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="customer_id" type="number" class="form-control" name="customer_id" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_id') ? ' has-error' : '' }}">
                            <label for="bank_id" class="col-md-4 control-label">Buying Price</label>

                            <div class="col-md-6">
                                <input id="bank_id" type="number" class="form-control" name="bank_id" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Add Stock
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