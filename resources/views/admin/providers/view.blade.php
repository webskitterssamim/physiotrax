@extends('admin/app')

@section('title', 'Dashboard')

@section('content')
	
		<div id="main_content">
			
			<!-- main content -->
			<div class="row">
				<div class="col-sm-12">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">Providers Details</h4>
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
							<div class="col-md-3">Logo:</div>
							
							<div class="col-md-9">
								&nbsp;
								@if($provider->logo!='')
									<img src="{{asset('uploads/providers_logo/' . $provider->logo)}}" alt="" />
								@endif
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">Business Name:</div>
							<div class="col-md-9">{{$provider->business_name}} &nbsp; </div>
							
						</div>
						
						
						<div class="col-md-12">
							<div class="col-md-3">Contact Name:</div>
							<div class="col-md-9">{{$provider->contact_name}} &nbsp;</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">Phone:</div>
							<div class="col-md-9">{{$provider->phone}} &nbsp;</div>							
						</div>

						<div class="col-md-12">
							<div class="col-md-3">Email:</div>
							<div class="col-md-9">{{$provider->email}} &nbsp;</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">Address:</div>
							<div class="col-md-9">{{$provider->address}} &nbsp;</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">State:</div>
							<div class="col-md-9">{{$provider->state->state_name}} &nbsp;</div>							
						</div>
							
						<div class="col-md-12">
							<div class="col-md-3">City:</div>
							<div class="col-md-9">{{$provider->city}} &nbsp;</div>							
						</div>
							
						<div class="col-md-12">
							<div class="col-md-3">Zip:</div>
							<div class="col-md-9">{{$provider->zip}} &nbsp;</div>							
						</div>
							
						<div class="col-md-12">
							<div class="col-md-3">Comments:</div>
							<div class="col-md-9">{{nl2br($provider->comments)}} &nbsp;</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">
							<a href="{{URL::route('adm_providers')}}" class="btn btn-default">Back</a>
							</div>
						</div>	
									
					  </div>
					</div>
				</div>
			</div>
        </div>			
			
		</div>
	

	
@endsection
