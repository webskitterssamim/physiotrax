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
						    
					@if (count($errors) > 0)		    
					<div class="alert alert-danger">
						<h3>Errors!</h3>
						@foreach ($errors->all() as $error)
							<p>{{ $error }}</p>
						@endforeach
					</div>
					@endif
					
					<div class="panel-body">
					  <div class="sepH_c">
						<p class="heading_a">Site Setting Edit</p>

						  {!! Form::open(array('class' => 'form-horizontal form-separated', 'route' => array('sitesettings_update'))) !!}
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />							
							<input type="hidden" name="id" value="{{{ $result->id }}}" />
							<div class="form-body">
								<div class="form-group">
								<label class="col-md-3 control-label">Setting Name<span class="require">*</span></label>
								<div class="col-md-9">
									<div class="bgStyle">{!! $result->sitesettings_lebel !!}</div>
								</div>
								</div>
								<div class="form-group">
								<label class="col-md-3 control-label">Setting Value<span class="require">*</span></label>
								<div class="col-md-9">
									{!! Form::text('sitesettings_value', $result->sitesettings_value, array('required', 'class'=>'form-control')) !!}
								</div>
								</div>
								
								<div class="form-actions">
								<div class="col-md-offset-3 col-md-9">
								{!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
								<a href="{{URL::route('sitesettings')}}" class="btn btn-default">Back</a>
								</div>
								</div>
							</div>
						{!! Form::close() !!}
					  </div>
					</div>
				</div>
			</div>
        </div>			
			
		</div>
	

	
@endsection
