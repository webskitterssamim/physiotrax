<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Physiotrax</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes"/>
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{ asset('js/custom-script.js') }}"></script>
<meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
<script>var BASE_URL = '{{ \Config::get('constants.FRONTEND_URL') }}';</script>
</head>

<body>
<div class="backBanner"><img src="images/back-banner.jpg" alt="back-banner"></div>
<div class="page glbCls">
  <header class="header glbCls">
    <div class="mainWrap glbCls clearfix">
      <div class="logo leftCls"><a href="index.html"><img src="{{ asset('images/logo.png') }}" width="331" height="91" alt="logo"></a></div>
      <div class="heaerRight rightCls">
        <div class="headerBlock glbCls alignRight"><a class="orangeBtn patientLogin" href="#">Patient Login</a> <a class="orangeBtn providerLogin" href="#">Provider Login</a> </div>
        <div class="headerBlock glbCls last">
          <nav class="navigation">
            <ul class="clearfix  nav-collapse">
              <li class="active"><a href="index.html">Home</a></li>
              <li><a href="#">Foundation</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Price</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Providers</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="main glbCls">
  @yield('content')
  </div>
      <footer class="footer glbCls">
    <div class="footerTop glbCls">
      <div class="mainWrap glbCls clearfix">
        <div class="fbox">
          <h4 class="glbCls ftitle">Quick Links</h4>
          <ul>
            <li><a href="#">Provider Login</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Articles</a></li>
          </ul>
        </div>
        <div class="fbox">
          <h4 class="glbCls ftitle">Follow Us</h4>
          <div class="socialBox glbCls">
            <ul>
              <li><a href="#"><i class="faPinterest"></i>Pinterest</a></li>
              <li><a href="#"><i class="faFacebook"></i>Facebook</a></li>
              <li><a href="#"><i class="faTwitter"></i>Twitter</a></li>
            </ul>
          </div>
        </div>
        <div class="fbox">
          <h4 class="glbCls ftitle">Contact us</h4>
          <div class="subscribeForm glbCls">
            <form action="#">
              <p>
                <input type="text" value="" name="" placeholder="Name" class="inputBox" />
              </p>
              <p>
                <input type="text" value="" name="" placeholder="Email" class="inputBox" />
              </p>
              <p>
                <textarea placeholder="Message" class="textBox"></textarea>
              </p>
              <p>
                <input type="submit" value="Submit" name="Submit" class="submitBtn" />
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="copyrightSec glbCls alignCenter">
      <div class="mainWrap glbCls clearfix"> ©2015 <a href="#">Physiotrax.com</a> All Rights Reserved </div>
    </div>
  </footer>
</div>
<div id="providerLoginPanel" class="popUpPanel"> <span class="popOverlay"></span>
  <div class="loginPanel smallRadius"> <span class="closeIcon"></span>
    <div class="titleBox glbCls login_head">
      <h1 class="blockTitle glbCls"><span>Provider <em>Login</em></span></h1>
    </div>
        <div class='loginErrmsg'></div>
    <div class="loginFiled clearfix">
      <div class="loginFiledLt leftCls">
        <div class="form-group">
          <input type="text" placeholder="Email" value="" data-required-message="Please enter a valid Username" data-minlength="2" data-required="true" class="providerLoginInput form-control input-lg parsley-validated" name="login_provider_email" id="login_provider_email">
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" value="" data-required-message="Please enter a valid Password" data-minlength-message="Password should have at least 6 characters." data-minlength="6" data-required="true" class="providerLoginInput form-control input-lg parsley-validated" name="login_provider_password" id="login_provider_password">
        </div>
        <p><a href="#">Forgot password?</a><!--<a href="#" class="form_toggle">Register</a></p>-->
        <div class="login_submit">
          <button class="btn btn-primary btn-block btn-lg otherBtn" onclick="checkProviderLogin()">Log In</button>
        </div>
      </div>
      <div class="loginFiledRt rightCls"><i class="lock"><img width="107" height="129" alt="lock" src="images/lock-icon.png"></i></div>
    </div>
  </div>
</div>
<div id="patientLoginPanel" class="popUpPanel"> <span class="popOverlay"></span>
  <div class="loginPanel smallRadius"> <span class="closeIcon"></span>
    <div class="titleBox glbCls login_head">
      <h1 class="blockTitle glbCls"><span>Patient <em>Login</em></span></h1>
    </div>
    <div class="loginFiled clearfix">
      <div class="loginFiledLt leftCls">
        <div class="form-group">
          <input type="text" placeholder="Email" value="" data-required-message="Please enter a valid Username" data-minlength="2" data-required="true" class="form-control input-lg parsley-validated" name="login_username" id="login_username">
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" value="" data-required-message="Please enter a valid Password" data-minlength-message="Password should have at least 6 characters." data-minlength="6" data-required="true" class="form-control input-lg parsley-validated" name="login_password" id="login_password">
        </div>
        <p><a href="#">Forgot password?</a><a href="#" class="form_toggle">Register</a></p>
        <div class="login_submit">
          <button class="btn btn-primary btn-block btn-lg otherBtn" onClick="javascript:window.location.href='patient-dashboard.html'">Log In</button>
        </div>
      </div>
      <div class="loginFiledRt rightCls"><i class="lock"><img width="107" height="129" alt="lock" src="images/lock-icon.png"></i></div>
    </div>
  </div>
</div>
</body>
</html>
