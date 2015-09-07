@extends('admin/app')

@section('title', 'Change Password')

@section('content')

<div id="main_content"> 
        
        <!-- main content -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Change Password</h4>
              </div>
				
				@if(Session::get('errorMessage'))
				  <div class="alert alert-danger">
						{{Session::get('errorMessage')}}
					</div>
				@endif
			  
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
				{!!Form::open(array('route' => 'adm_change_password','autocomplete'=>'off','enctype'=>'multipart/form-data')) !!}
                  <div class="row">
                    <div class="col-sm-4">
                      
					  					
					  <div class="form_sep">
                        <label class="req">Current Password</label>                       
						{!! Form::password('current_password', array('class'=>'form-control','autocomplete'=>'off')) !!}
                      </div>
                      <div class="form_sep">
                        <label class="req">Password</label>                    
						{!! Form::password('password',array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label class="req">Password Confirmationm</label>
                        {!! Form::password('password_confirmation', array('class'=>'form-control')) !!}
                      </div>
					 
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 btmButton">                    	
						{!! Form::submit( 'Change',array('class'=>'btn btn-default')) !!}
                        <a class="btn btn-default" href="{{URL::route('adm_dashboard')}}">Back</a>                       
                    </div>
                    </div>
                {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection