@extends('admin/app')

@section('title', 'Dashboard')

@section('content')
	
		<div id="main_content">
			
			<!-- main content -->
			<div class="row">
				<div class="col-sm-12">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">Clinic Details</h4>
					</div>
					
					@if(Session::has('succ_msg'))
						<div class="alert alert-success">
						   <h3>Success!</h3>
							<p>{{ Session::get('succ_msg') }}</p>
						</div>	    
					@endif
					
					<div class="panel-body">
					  <div class="sepH_c">
						
						<div class="col-md-12">
							<div class="col-md-3">Name:</div>
							<div class="col-md-9">{{$clinic->name}}&nbsp;</div>
							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">Phone:</div>
							<div class="col-md-9">{{$clinic->phone}} &nbsp;</div>							
						</div>
						<div class="col-md-12">
							<div class="col-md-3">Contact Phone:</div>
							<div class="col-md-9">{{$clinic->contact_phone}} &nbsp;</div>							
						</div>

						<div class="col-md-12">
							<div class="col-md-3">Email:</div>
							<div class="col-md-9">{{$clinic->email}} &nbsp;</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">Address:</div>
							<div class="col-md-9">{{$clinic->address}} &nbsp;</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">State:</div>
							<div class="col-md-9">{{$clinic->state->state_name}} &nbsp;</div>							
						</div>
							
						<div class="col-md-12">
							<div class="col-md-3">City:</div>
							<div class="col-md-9">{{$clinic->city}} &nbsp;</div>							
						</div>
							
						<div class="col-md-12">
							<div class="col-md-3">Zip:</div>
							<div class="col-md-9">{{$clinic->zip}} &nbsp;</div>							
						</div>
							
						
						
						<div class="col-md-12">
							<div class="col-md-3">	
							<a href="{{URL::route('adm_clinics')}}" class="btn btn-default">Back</a>
							</div>
						</div>	
									
					  </div>
					</div>
				</div>
			</div>
        </div>			
			
		</div>
	

	
@endsection
