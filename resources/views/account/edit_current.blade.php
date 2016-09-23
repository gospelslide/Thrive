@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Current Account</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/update_current') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">Account Number</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sweep') ? ' has-error' : '' }}">
                            <label for="sweep" class="col-md-4 control-label">Enable Autosweep</label>

                            <div class="col-md-6">
                                <input id="sweep" type="radio" name="sweep" value="1" required autofocus>Yes<br />
                                <input id="sweep" type="radio" name="sweep" value="0" required autofocus>No<br />
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('auto_date') ? ' has-error' : '' }}">
                            <label for="auto_date" class="col-md-4 control-label">Autosweep Date</label>

                            <div class="col-md-6">
                                <input id="auto_date" type="date" class="form-control" name="auto_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
