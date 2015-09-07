@extends('admin/app')

@section('title', 'Provider Eidt')

@section('content')

<div id="main_content"> 
        
        <!-- main content -->
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Provider Edit</h4>
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
                {!!Form::open(array('route' => array('adm_provider_edit',$provider->id),'enctype'=>'multipart/form-data')) !!}
                  <div class="row">
                    <div class="col-sm-4">                      
					  					
					  <div class="form_sep">
                        <label>Business Name</label>                       
						{!! Form::text('business_name', $provider->business_name,array('class'=>'form-control')) !!}
                      </div>
                      <div class="form_sep">
                        <label class="req">Contact Name</label>                    
						{!! Form::text('contact_name', $provider->contact_name,array('class'=>'form-control')) !!}
                      </div>
					  <div class="form_sep">
                        <label>Phone</label>
                        {!! Form::text('phone', $provider->phone,array('class'=>'form-control')) !!}
                      </div>
					 <div class="form_sep">
                        <label >Email</label>
                        {!! Form::email('email', $provider->email,array('class'=>'form-control','readonly'=>'readonly')) !!}
                      </div>
					
					  <div class="form_sep">
                        <label >Password</label>
						<span>(Leave it blank if do not want to change password)</span>
						{!! Form::password('password',array('class'=>'form-control','autocomplete'=>'off')) !!}					
                      </div>
					  
                      <div class="form_sep">
                        <label>Logo</label>
						@if($provider->logo != '')
							<img width="220" src="{{asset('/uploads/providers_logo/' . $provider->logo)}}">
						@endif
                        {!! Form::file('logo', '',array('class'=>'form-control')) !!}
                      </div>
                      
					 
                    </div>
                    <div class="col-sm-4">
					 
					  <div class="form_sep">
                        <label>Address</label>
                        {!! Form::text('address', $provider->address,array('class'=>'form-control')) !!}
                      </div>					  
					  <div class="form_sep">
                        <label>State</label>
                        {!! Form::select('state', $states,$provider->state_id,array('class'=>'form-control')) !!}
                      </div>
                      <div class="form_sep">
                        <label class="req">City</label>
                        {!! Form::text('city', $provider->city,array('class'=>'form-control')) !!}
                      </div>                      
                      <div class="form_sep">
                        <label class="req">Zip</label>
                        {!! Form::text('zip', $provider->zip,array('class'=>'form-control')) !!}
                      </div>
                      <div class="form_sep">
                        <label>Comments </label>
                         {!! Form::textarea('comments', $provider->comments,array('class'=>'form-control')) !!}
                      </div>
						
					   <div class="form_sep">
                        <label>Status</label>
                        {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'),$provider->status,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 btmButton">                    	
						{!! Form::submit( 'submit',array('class'=>'btn btn-default')) !!}
                        <a class="btn btn-default" href="a_billing_details.html">Billing Details</a>
                        <a class="btn btn-default" href="a_payment_history.html">Payment History</a>
                        <a class="btn btn-default" href="a_clinician_list.html">Clinician List</a>
                    </div>
                    </div>
                {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection