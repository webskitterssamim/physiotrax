@extends('provider')

@section('title', 'Provider Profile')

@section('content')
	
		    <section class="mainBlock glbCls howItPan">
      <div class="mainWrap glbCls clearfix">
      <div class="titleBox glbCls noneBg">
        <h4 class="blockTitle glbCls"><span>Provider <em>Profile</em></span></h4>
      </div>
		@if(Session::has('succMessage'))            
	<div class="providerSuccessMsg">
		{{ Session::get('succMessage') }}
	</div>
	@endif

      <div class="dashboardPanel glbCls">
        <div class="dashPanTop glbCls clearfix">
          <div class="transparentBox glbCls smallRadius logTable"> <span class="bgRec smallRadius"></span>
            <div class="dashPanBlock">
              <div class="dashPanTopIn glbCls">
                <div class="profileBox smallRadius alignCenter">
                  <div class="profileImg fullRadius glbCls"><img src="{{ asset('images/provider.png') }}" alt="profile-img"></div>
                  
                  <p><a href="{{ URL::route('provider_viewporfile',$provider->id) }}" class="otherBtn">Change Profile Picture</a></p>
                  
                </div>
                <div class="msgBox alignCenter">
                  <div class="boxLogo glbCls"> <a href="#">
		  @if($provider->logo !='' )
			<img src="{{ asset('uploads/providers_logo/'.$provider->logo) }}" height="146" width="209" alt="logo">  
		  @else
			<img src="{{ asset('images/client-logo.png') }}" alt="logo">  
		  @endif
		  </a>
		  
		  </div>
		<p><a href="javascript:void(0);" class="otherBtn ChangeLogoLink">Change Logo</a></p>		
                </div>
                <div class="addNewBox">
		 {!! Form::open(array('route'=>'update_provider_profile')) !!}
		 	<div class="setupPan">
		    <div class="profileField">
			  <label>Email</label>
			  {!! Form::email('email',$provider->email, array('readonly')) !!}
		   	</div>
		    <div class="profileField">
			  <label>Business name</label>
			  {!! Form::text('business_name',$provider->business_name) !!}
		   </div>
		    <div class="profileField">
			  <label>Contact name</label>
			  {!! Form::text('contact_name',$provider->contact_name) !!}
		   </div>
		    <div class="profileField">
			  <label>Phone No</label>
			  {!! Form::text('phone',$provider->phone) !!}
		   </div>
		     <div class="profileField">
			  <label>Address</label>
			  {!! Form::text('address',$provider->address) !!}
		   </div>
		    <div class="profileField">
			  <label>City</label>
			  {!! Form::text('city',$provider->city) !!}
		   </div>
		    <div class="profileField">
			  <label>State</label>
			  {!! Form::select('state_id',$states,$provider->state_id) !!}
		   </div>
		    <div class="profileField">
			  <label>Zip Code</label>
			  {!! Form::text('zip',$provider->zip) !!}
		   </div>
			 
		    <div class="profileField">
			  <label>Password </label>
			 
			  {!! Form::password('password') !!}
		   </div>
		    <div class="profileField">
			   <button type="submit"  class="spDoneBtn">Update</button>
		   </div>
		   </div>
		   {!! Form::close() !!}
		</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<div id="providerChangeLogoPanel" class="popUpPanel"> <span class="popOverlay"></span>
  <div class="loginPanel smallRadius"> <span class="closeIcon"></span>
    <div class="titleBox glbCls login_head">
      <h1 class="blockTitle glbCls"><span>Change <em>Logo</em></span></h1>
    </div>
        
    <div class="loginFiled clearfix">
      <div class="loginFiledLt leftCls">
      {!! Form::open(array('route'=>'change_provider_logo','enctype'=>'multipart/form-data')) !!}
        <div class="form-group">
          {!! Form::file('provider_logo',array('class'=>'providerLogo')) !!}
        </div>
        
        <div class="login_submit">
          <button class="btn btn-primary btn-block btn-lg otherBtn">Change</button>
        </div>
	{!! Form::close() !!}
      </div>
      <div class="loginFiledRt rightCls">
	<img src="{{ asset('images/Preview-icon.png') }}" id="previewLogo" height="147" width="200" />
      </div>
    </div>
  </div>
</div>



	
@endsection
