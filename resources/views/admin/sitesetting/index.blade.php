@extends('admin/app')

@section('title', 'Dashboard')

@section('content')
	
		<div id="main_content">
			
			<!-- main content -->
			<div class="row">
				<div class="col-sm-12">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">Site Settings</h4>
					</div>
						    
					@if(Session::has('succ_msg'))
						<div class="alert alert-success">
						   <h3>Success!</h3>
							<p>{{ Session::get('succ_msg') }}</p>
						</div>	    
					@endif
					
					<div class="panel-body">
					  <div class="sepH_c">
						<p class="heading_a">Site Settings List</p>

						<table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
							<thead>
							<tr>
								<th width="10%">Settings Name</th>
								<th width="10%">Settings Value</th>
								<th width="12%">Actions</th>
							</tr>
							</thead>
							<tbody>
							@if($result->count() > 0)
								@foreach($result AS $r)
								<tr>
									<td>{{$r->sitesettings_lebel}}</td>
									<td>{{$r->sitesettings_value}}</td>
									<td>
									<a href="{{ action('admin\SitesettingController@edit', $r->id) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i>&nbsp;
										Edit
									</a>
									</td>
								</tr>
								@endforeach
							@endif			
							
							</tbody>
						</table>
						  <div class="pagination-panel">
						  <?php echo $result->render(); ?>
						  </div>
					  </div>
					</div>
				</div>
			</div>
        </div>			
			
		</div>
	

	
@endsection
