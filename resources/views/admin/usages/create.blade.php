@extends('admin/app')

@section('title', 'New Excercise Setup')
@section('content')
<div id="main_content"> 
        
        <!-- main content -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">New Excercise Setup</h4>
              </div>
			  
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

              <div class="panel-body providerEdit">                
				{!!Form::open(array('route' => 'adm_excercise_create','enctype'=>'multipart/form-data')) !!}
                  <div class="row">
                    <div class="col-sm-4">		
					  <div class="form_sep">
                        <label class="req">Name</label>                       
						{!! Form::text('name', '',array('class'=>'form-control')) !!}
                      </div>
                     
					 <div class="form_sep">
                        <label class="req">Creator</label>
                        {!! Form::text('creator', '',array('class'=>'form-control','autocomplete'=>'off')) !!}
                      </div>
						<div class="form_sep">
                        <label>Sets</label>
                        {!! Form::text('sets', '',array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label>Reps</label>
                        {!! Form::text('reps', '',array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label>Weight</label>
                        {!! Form::text('weight', '',array('class'=>'form-control')) !!}
                      </div>
					 <div class="form_sep">
                        <label>Status</label>
                        {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'),'',array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="col-sm-4">
					 
					  <div class="form_sep">
                        <label>Frequency</label>
                        {!! Form::text('frequency', '',array('class'=>'form-control')) !!}
                      </div>					  
					  <div class="form_sep">
                        <label >Hold Time</label>
                        {!! Form::text('hold_time', '',array('class'=>'form-control')) !!}
                      </div>
                      <div class="form_sep">
                        <label >Rest Time</label>
                        {!! Form::text('rest_time', '',array('class'=>'form-control')) !!}
                      </div>                      
                      <div class="form_sep">
                        <label>Surface</label>
                        {!! Form::text('surface', '',array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label >Youtube Video Link</label>
                        {!! Form::text('youtube_url', '',array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label >Description</label>
                        {!! Form::textarea('description', '',array('class'=>'form-control')) !!}
                      </div> 
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 btmButton">                    	
						{!! Form::submit( 'submit',array('class'=>'btn btn-default')) !!}                       
                        <a class="btn btn-default" href="{{URL::route('adm_clinics')}}">Back</a>
                    </div>
                    </div>
                {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection