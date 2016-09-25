@extends('layouts.dashboardlayout')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> View Your Account</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Credit Account</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Savings Account</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Current Accounts</a>
                        </li>
                      </ul>
<div id="myTabContent" class="tab-content">
<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
<div class="">
<table style="width: 100%;" aria-describedby="datatable-responsive_info" role="grid" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%">
<thead>
<tr role="row">
<th aria-sort="ascending" aria-label="First name: activate to sort column descending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting_asc">ID</th>
<th aria-label="Last name: activate to sort column ascending" style="width: 71px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Bank</th>
<th aria-label="Position: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Net Balance</th>
<th aria-label="Office: activate to sort column ascending" style="width: 67px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Credit Limit</th>
<th aria-label="Age: activate to sort column ascending" style="width: 29px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Location</th>
</thead>
@foreach($credit_accounts as $credit_account)
<tbody>
<div class="col-sm-12">
<tr class="odd" role="row">
<td tabindex="0" class="sorting_1">{{ $credit_account->id }}</td>
<td>{{ $credit_account->name }}</td>
<td>{{ $credit_account->current_balance}} {{ $credit_account->currency_code }}</td>
<td>{{ $credit_account->max_spend }} {{ $credit_account->currency_code }}</td>
<td>{{ $credit_account->country_code }}</td>
</tr>
</tbody>
@endforeach
</table>
</div>
</div>
<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
<div class="">
<table style="width: 100%;" aria-describedby="datatable-responsive_info" role="grid" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%">
<thead>
<tr role="row">
<th aria-sort="ascending" aria-label="First name: activate to sort column descending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting_asc">Account ID</th>
<th aria-label="Last name: activate to sort column ascending" style="width: 71px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Bank</th>
<th aria-label="Position: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Current Balance</th>
<th aria-label="Office: activate to sort column ascending" style="width: 67px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Rate of interest</th>
<th aria-label="Age: activate to sort column ascending" style="width: 29px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Location</th>

<th aria-label="Age: activate to sort column ascending" style="width: 29px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Surplus</th>
</tr>
</thead>
@foreach($savings_accounts as $savings_account)
<tbody>
<div class="col-sm-12">
<tr class="odd" role="row">
<td tabindex="0" class="sorting_1">{{ $savings_account->id }}</td>
<td>{{ $savings_account->name }}</td>
<td>{{ $savings_account->balance }} {{ $savings_account->currency_code }}</td>
<td>{{ $savings_account->rate_of_interest }}</td>
<td>{{ $savings_account->country_code }}</td>
<td>{{ $savings_account->net_balance }} {{ $savings_account->currency_code }}</td>
</tr>
</tbody>
@endforeach
</table>
</div>
</div>
<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
<div class="">
<table style="width: 100%;" aria-describedby="datatable-responsive_info" role="grid" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%">
<thead>
<tr role="row">
<th aria-sort="ascending" aria-label="First name: activate to sort column descending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting_asc">ID</th>
<th aria-label="Last name: activate to sort column ascending" style="width: 71px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Bank</th>
<th aria-label="Position: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Current Balance</th>
<th aria-label="Office: activate to sort column ascending" style="width: 67px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Overdraft Limit</th>
<th aria-label="Age: activate to sort column ascending" style="width: 29px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Location</th>

<th aria-label="Age: activate to sort column ascending" style="width: 29px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Surplus</th>
</tr>
</thead>
@foreach($current_accounts as $current_account)
<tbody>
<div class="col-sm-12">
<tr class="odd" role="row">
<td tabindex="0" class="sorting_1">{{$current_account->id}}</td>
<td>{{$current_account->name}}</td>
<td>{{$current_account->current_balance}} {{$current_account->currency_code}}</td>
<td>{{$current_account->od_limit}} {{$current_account->currency_code}}</td>
<td>{{$current_account->country_code}}</td>
<td>{{$current_account->net_balance-$current_account->max_spend}} {{$current_account->currency_code}}</td>
</tr>
</tbody>
@endforeach
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>







@endsection