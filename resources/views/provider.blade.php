<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Physiotrax</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes"/>

<link href="{{ asset('css/provider-style.css')  }}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{ asset('js/custom-script.js')  }}"></script>
</head>

<body>
<div class="page glbCls">
  <header class="header glbCls">
    <div class="mainWrap glbCls clearfix">
      <div class="logo leftCls"><a href="index.html"><img src="{{ asset('images/logo.png') }}" width="331" height="91" alt="logo"></a></div>
      <div class="heaerRight rightCls">
        <div class="headerBlock glbCls alignRight">        
        <a class="orangeBtn" href="{{ \URL::route('provider_logout') }}">Provider Logout</a> </div>
        <div class="headerBlock glbCls last">
          <nav class="navigation">
            <ul class="clearfix nav-collapse">
              <li class="active"><a href="javascript:;">Home</a></li>
              <li><a href="javascript:;">Foundation</a></li>
              <li><a href="javascript:;">Blog</a></li>
              <li><a href="javascript:;">Price</a></li>
              <li><a href="javascript:;">Contact Us</a></li>
              <li><a href="javascript:;">Providers</a></li>
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
    <div class="copyrightSec glbCls alignCenter">
      <div class="mainWrap glbCls clearfix"> ©2015 <a href="#">Physiotrax.com</a> All Rights Reserved </div>
    </div>
  </footer>
</div>
</body>
</html>
