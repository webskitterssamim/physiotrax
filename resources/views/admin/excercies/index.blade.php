@extends('admin/app')

@section('title', 'Excercises List')

@section('content')
	
		<div id="main_content">
			
			<!-- main content -->
			<div class="row">
				<div class="col-sm-12">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">Clinics List</h4>
					</div>
					
					@if(Session::has('succ_msg'))
						<div class="alert alert-success">
						   <h3>Success!</h3>
							<p>{{ Session::get('succ_msg') }}</p>
						</div>	    
					@endif
					
					<div class="panel-body">
					  <div class="sepH_c">
						<p class="heading_a">Excercise Search</p>
						
						<div class="row">
							 {!!Form::open(array('route' => 'adm_excercises')) !!}
								<div class="col-sm-4">
								<label> &nbsp; </label>
								<div class="form-group">
								<input type="search" name="search" value="{{$search}}" class="form-control" id="password_meter">
								</div>
								</div>
								<div class="col-sm-3 topLabelPadd">							
									<input type="submit" value="Search" class="btn btn-default btn-sm" />
								</div>
							 {!! Form::close()!!}
						</div>   
						
						<table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
							<thead>
							<tr>
								<th>Name</th>
								<th>Creator</th>														
								<th>Youtube Link</th>								
								<th>Status</th>
								<th width="25%">Actions</th>
							</tr>
							</thead>
							<tbody>
							@if($result->count() > 0)
								@foreach($result AS $r)
								<tr>
									<td>{{$r->name}}</td>									
									<td>{{$r->creator}}</td>									
									<td>{{$r->youtube_url}}</td>									
									<td><span>{{$r->status}}</span></td>
									<td>
									<a href="{{ URL::route('adm_excercise_view',$r->id) }}" title="View Details" ><i class="fa fa-newspaper-o"></i>&nbsp;
										View
									</a>
										|
									<a href="{{ URL::route('adm_excercise_edit',$r->id) }}" title="Edit" ><i class="fa fa-edit"></i>&nbsp;
										Edit
									</a>
										|
									<a href="{{ URL::route('adm_excercise_delete',$r->id) }}" title="Delete" onclick="return confirm('Are sure! Do you want to delete with its all relevent data?');" ><i class="fa fa-remove"></i>&nbsp;
										Delete
									</a>
									</td>
								</tr>
								@endforeach
							@else
								<tr><td colspan="7" align="center">.:: Record Not Found ::.</td></tr>
							@endif			
							
							</tbody>
						</table>
						  <div class="pagination-panel">
						  {!! $result->render(); !!}
						  </div>
					  </div>
					</div>
				</div>
			</div>
        </div>			
			
		</div>
	

	
@endsection
