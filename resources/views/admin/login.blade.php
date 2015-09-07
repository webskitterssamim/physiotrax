@extends('admin/applogin')

@section('title', 'Login')

@section('content')
	
	
	
 <div class="adminLogo alignCenter"><a href="#"><img src="{{ asset('admin_assets/images/logo.png') }}" width="331" height="91" alt="logo"></a></div>
  <div class="login_panel log_section smallRadius">  	
    <div class="titleBox glbCls login_head">
      <h1 class="blockTitle glbCls"><span>Admin <em>Login</em></span></h1>
    </div>
    <div class="loginFiled clearfix">
		@if(Session::has('errorMessage'))            
		<div class="alert alert-danger">
			<ul>
			<li>{{ Session::get('errorMessage') }}</li>
			</ul>
		</div>
		@endif
		
      <div class="loginFiledLt leftCls">        
		{!! Form::open(array('url' => 'admin', 'class' => 'form','id' => 'login_form','autocomplete'=> 'off')) !!}
          <div class="form-group"> 
            
            <input type="text" id="login_username"   name="admin_email" class="form-control input-lg" data-required="true" data-minlength="2" data-required-message="Please enter a valid Username" value="{{$admin_email}}" placeholder="Email" >
          </div>
          <div class="form-group"> 
            
            <input type="password" id="login_password" autocomplete="off"  name="admin_password" class="form-control input-lg" data-required="true" data-minlength="6" data-minlength-message="Password should have at least 6 characters." data-required-message="Please enter a valid Password" value="{{$admin_password}}" placeholder="Password">
           
          </div>
          
			 <div class="checkbox-list"><label><input type="checkbox" name="remember_login" @if($admin_email) checked='checked' @endif id="remember_login" value="1">&nbsp;
                     Remember me</label></div>
		  
          <div class="login_submit">
            <button type="submit" class="btn btn-primary btn-block btn-lg otherBtn" >Log In</button>
          </div>
          <!--<div class="text-center"> <small>Not registered? <a class="form_toggle" href="#reg_form"> Sign up here</a></small> </div>-->
         {!! Form::close() !!}
      </div>
      <div class="loginFiledRt rightCls"><i class="lock"><img src="{{ asset('admin_assets/images/lock-icon.png') }}" width="107" height="129" alt="lock"></i></div>
    </div>
  </div>


	
	
        

@endsection
