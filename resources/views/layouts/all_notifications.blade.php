@extends('layouts.dashboardlayout')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Unread notifications</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


<div id="myTabContent" class="tab-content">
<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
<div class="">
<table style="width: 100%;" aria-describedby="datatable-responsive_info" role="grid" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%">
<thead>
<tr role="row">
<th aria-sort="ascending" aria-label="First name: activate to sort column descending" style="width: 73px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting_asc">ID</th>
<th aria-label="Last name: activate to sort column ascending" style="width: 71px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Message</th>
<th aria-label="Office: activate to sort column ascending" style="width: 67px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Action</th>
</thead>
<?php $i=0 ?>
@foreach($display as $notification)
<tbody>
<div class="col-sm-12">
<tr class="odd" role="row">
<td tabindex="0" class="sorting_1">{{ $i++ }}</td>
<td>{{ $notification }}</td>
<td><form method="GET" action="/mark_as_read"><input type="hidden" value="{{$i}}" name="id"><input type="submit" class="btn btn-primary" value="Read"></input></form></td>
</tr>
</tbody>
@endforeach
</table>
</div>
</div>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>







@endsection