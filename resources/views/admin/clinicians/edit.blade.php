@extends('admin/app')

@section('title', 'New Provider Setup')

@section('content')

<div id="main_content"> 
        
        <!-- main content -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Clinician Edit</h4>
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
                {!!Form::open(array('route' => array('adm_clinician_edit',$clinician->id),'enctype'=>'multipart/form-data')) !!}
                  <div class="row">
                    <div class="col-sm-4">
                      
					  <div class="form_sep">
                        <label>Provider</label>
                        {!! Form::select('provider', $providers,$clinician->provider_id,array('class'=>'form-control')) !!}
                      </div>
					  					
					  <div class="form_sep">
                        <label class="req">First Name</label>                       
						{!! Form::text('first_name', $clinician->first_name,array('class'=>'form-control')) !!}
                      </div>
                      <div class="form_sep">
                        <label class="req">Last Name</label>                    
						{!! Form::text('last_name',$clinician->last_name,array('class'=>'form-control')) !!}
                      </div>
					  
					 <div class="form_sep">
                        <label class="req">Email</label>
                        {!! Form::email('email', $clinician->email,array('class'=>'form-control','autocomplete'=>'off')) !!}
                      </div>
					  <div class="form_sep">
                        <label class="req">Password </label>
						  <span>(Leave it blank if do not want to change password)</span>	
						{!! Form::password('password',array('class'=>'form-control')) !!}					
                      </div>
					  
                      <div class="form_sep">
                        <label>Profile Image</label>
						  @if($clinician->image != '')
							<img src="{{asset('/uploads/clinicians_image/' . $clinician->image)}}" width="200" />
						  @endif
                        {!! Form::file('image', '',array('class'=>'form-control')) !!}
                      </div>
                      
                    </div>
                    <div class="col-sm-4">
					  <div class="form_sep">
                        <label>Phone</label>
                        {!! Form::text('phone',  $clinician->phone,array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label>Address</label>
                        {!! Form::text('address',  $clinician->address,array('class'=>'form-control')) !!}
                      </div>					  
					  <div class="form_sep">
                        <label class="req">State</label>
                        {!! Form::select('state', $states, $clinician->state_id,array('class'=>'form-control')) !!}
                      </div>
                      <div class="form_sep">
                        <label class="req">City</label>
                        {!! Form::text('city',  $clinician->city,array('class'=>'form-control')) !!}
                      </div>                      
                      <div class="form_sep">
                        <label class="req">Zip</label>
                        {!! Form::text('zip', $clinician->zip,array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label>Status</label>
                        {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'),$clinician->status,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 btmButton">                    	
						{!! Form::submit( 'submit',array('class'=>'btn btn-default')) !!}                       
                        <a class="btn btn-default" href="{{URL::route('adm_clinicians')}}">Back</a>
                    </div>
                    </div>
                {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection