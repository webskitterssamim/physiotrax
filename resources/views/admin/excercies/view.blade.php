@extends('admin/app')

@section('title', 'Excercise Details')

@section('content')
	
		<div id="main_content">
			
			<!-- main content -->
			<div class="row">
				<div class="col-sm-12">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">Excercise Details</h4>
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
							<div class="col-md-9">{{$excercise->name}}</div>
							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">Creator:</div>
							<div class="col-md-9">&nbsp;{{$excercise->creator}}</div>							
						</div>
						<div class="col-md-12">
							<div class="col-md-3">Sets:</div>
							<div class="col-md-9">&nbsp;{{$excercise->sets}}</div>							
						</div>

						<div class="col-md-12">
							<div class="col-md-3">Reps:</div>
							<div class="col-md-9">&nbsp;{{$excercise->reps}}</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">Weight:</div>
							<div class="col-md-9">&nbsp;{{$excercise->weight}}</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">Frequency:</div>
							<div class="col-md-9">&nbsp;{{$excercise->frequency}}</div>							
						</div>
							
						<div class="col-md-12">
							<div class="col-md-3">Hold Time:</div>
							<div class="col-md-9">&nbsp;{{$excercise->hold_time}}</div>							
						</div>
							
						<div class="col-md-12">
							<div class="col-md-3">Rest Time:</div>
							<div class="col-md-9">&nbsp;{{$excercise->rest_time}}</div>							
						</div>
						<div class="col-md-12">
							<div class="col-md-3">Surface:</div>
							<div class="col-md-9">&nbsp;{{$excercise->surface}}</div>							
						</div>
						<div class="col-md-12">
							<div class="col-md-3">Status:</div>
							<div class="col-md-9">&nbsp;{{$excercise->status}}</div>							
						</div>
						<div class="col-md-12">
							<div class="col-md-3">Description:</div>
							<div class="col-md-9">&nbsp;{{nl2br($excercise->description)}} &nbsp;</div>							
						</div>
						<div class="col-md-12">
							<div class="col-md-3">Youtube Url:</div>
							<div class="col-md-9">&nbsp;{{$excercise->youtube_url}}</div>							
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3">Youtube Video:</div>
							<div class="col-md-9">
								 <iframe width="420" height="315"
								src="{{$excercise->youtube_url}}">
								</iframe> 
							</div>							
						</div>
						
						
						<div class="col-md-12">
							<div class="col-md-3">	
							<a href="{{URL::route('adm_excercises')}}" class="btn btn-default">Back</a>
							</div>
						</div>	
									
					  </div>
					</div>
				</div>
			</div>
        </div>			
			
		</div>
	

	
@endsection
