@extends('admin/app')

@section('title', 'New Provider Setup')

@section('content')

<div id="main_content"> 
        
        <!-- main content -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">New Clinic Setup</h4>
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
				{!!Form::open(array('route' => 'adm_clinic_create','enctype'=>'multipart/form-data')) !!}
                  <div class="row">
                    <div class="col-sm-4">
                      
					 			
					  <div class="form_sep">
                        <label class="req">Name</label>                       
						{!! Form::text('name', '',array('class'=>'form-control')) !!}
                      </div>
                     
					 <div class="form_sep">
                        <label class="req">Email</label>
                        {!! Form::email('email', '',array('class'=>'form-control','autocomplete'=>'off')) !!}
                      </div>
						<div class="form_sep">
                        <label>Phone</label>
                        {!! Form::text('phone', '',array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label>Contact Phone</label>
                        {!! Form::text('contact_phone', '',array('class'=>'form-control')) !!}
                      </div>
					 <div class="form_sep">
                        <label>Status</label>
                        {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'),'',array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="col-sm-4">
					 
					  <div class="form_sep">
                        <label>Address</label>
                        {!! Form::text('address', '',array('class'=>'form-control')) !!}
                      </div>					  
					  <div class="form_sep">
                        <label class="req">State</label>
                        {!! Form::select('state', $states,'',array('class'=>'form-control')) !!}
                      </div>
                      <div class="form_sep">
                        <label class="req">City</label>
                        {!! Form::text('city', '',array('class'=>'form-control')) !!}
                      </div>                      
                      <div class="form_sep">
                        <label class="req">Zip</label>
                        {!! Form::text('zip', '',array('class'=>'form-control')) !!}
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