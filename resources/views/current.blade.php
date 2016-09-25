@extends('layouts.dashboardlayout')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">	
<h2>Currency Details</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable-responsive_wrapper">
<div class="row"><div class="col-sm-6">
<div id="datatable-responsive_length" class="dataTables_length">
<label>Show 
<select class="form-control input-sm" aria-controls="datatable-responsive" name="datatable-responsive_length"
>
<option value="10">10</option>
<option value="25">25</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
entries</label>
</div>
</div>
<div class="col-sm-6">
<div class="dataTables_filter" id="datatable-responsive_filter"><label>Search:<input aria-controls="datatable-responsive" placeholder="" class="form-control input-sm" type="search"></label></div></div></div>
<div class="row">
<table style="width: 100%;" aria-describedby="datatable-responsive_info" role="grid" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%">
<thead>
<tr role="row">
<th aria-label="Position: activate to sort column ascending" style="width: 152px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Currency Code</th>
<th aria-label="Office: activate to sort column ascending" style="width: 67px;" colspan="1" rowspan="1" aria-controls="datatable-responsive" tabindex="0" class="sorting">Value(with base as USD)</th>
</tr>
</thead>
<tbody>
<div class="col-sm-12">
	@foreach($fx_rates as $key=>$trans)
                            <tr>
                                <th>{!! $key !!}</th>
                                <th>{!! $trans !!}</th>
                                
                            </tr>
                            @endforeach</tbody>

</tbody>
</table>
</div>
</div>
<div class="row">
<div class="col-sm-5">
<div aria-live="polite" role="status" id="datatable-responsive_info" class="dataTables_info">Showing 11 to 20 of 57 entries</div>
</div>
<div class="col-sm-7">
<div id="datatable-responsive_paginate" class="dataTables_paginate paging_simple_numbers">
<ul class="pagination">
<li id="datatable-responsive_previous" class="paginate_button previous">
<a tabindex="0" data-dt-idx="0" aria-controls="datatable-responsive" href="#">Previous</a>
</li>
<li class="paginate_button ">
<a tabindex="0" data-dt-idx="1" aria-controls="datatable-responsive" href="#">1</a>
</li>
<li class="paginate_button active"><a tabindex="0" data-dt-idx="2" aria-controls="datatable-responsive" href="#">2</a></li>
<li class="paginate_button "><a tabindex="0" data-dt-idx="3" aria-controls="datatable-responsive" href="#">3</a></li>
<li class="paginate_button "><a tabindex="0" data-dt-idx="4" aria-controls="datatable-responsive" href="#">4</a></li>
<li class="paginate_button "><a tabindex="0" data-dt-idx="5" aria-controls="datatable-responsive" href="#">5</a></li>
<li class="paginate_button "><a tabindex="0" data-dt-idx="6" aria-controls="datatable-responsive" href="#">6</a></li>
<li id="datatable-responsive_next" class="paginate_button next"><a tabindex="0" data-dt-idx="7" aria-controls="datatable-responsive" href="#">Next</a>
</li>
</ul>
</div>
</div>
</div>
</div>
@endsection