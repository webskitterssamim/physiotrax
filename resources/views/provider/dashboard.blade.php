@extends('provider')

@section('title', 'Dashboard')

@section('content')
	
		    <section class="mainBlock glbCls howItPan">
      <div class="mainWrap glbCls clearfix">
      <div class="titleBox glbCls noneBg">
        <h4 class="blockTitle glbCls"><span>Provider <em>Dashboard</em></span></h4>
      </div>
      <div class="dashboardPanel glbCls">
        <div class="dashPanTop glbCls clearfix">
          <div class="transparentBox glbCls smallRadius logTable"> <span class="bgRec smallRadius"></span>
            <div class="dashPanBlock">
              <div class="dashPanTopIn glbCls">
                <div class="profileBox smallRadius alignCenter">
                  <div class="profileImg fullRadius glbCls"><img src="{{ asset('images/provider.png') }}" alt="profile-img"></div>
                  <div class="profileName glbCls">{{ $provider->business_name }}<div class="dashCount alignRight">
                    <ul>
                      <li><i class="countIcon3 spriteImg"></i><span class="msgCount fullRadius">5</span></li>
                    </ul>
                  </div></div>
                  <p><a href="{{ URL::route('provider_viewporfile') }}" class="otherBtn">View Profile</a></p>
                  
                </div>
                <div class="msgBox alignCenter">
                  <div class="boxLogo glbCls"> <a href="#">
		  @if($provider->logo !='' )
			<img src="{{ asset('uploads/providers_logo/'.$provider->logo) }}" height="146" width="209" alt="logo">  
		  @else
			<img src="{{ asset('images/client-logo.png') }}" alt="logo">  
		  @endif
		  </a> </div>
				
                </div>
                <div class="addNewBox"><a class="otherBtn" href="javascript:;">Add New patient</a><a class="otherBtn" href="javascript:;">Create Custom Template</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="dashPanMid glbCls clearfix">
          <div class="transparentBox glbCls smallRadius logTable"> <span class="bgRec smallRadius"></span>
            <div class="searchList glbCls">
              <h4 class="leftCls">Patients</h4>
              <div class="searchBoxRt rightCls">
                <label>Search</label>
                <div class="searchBoxRtInp">
                  <input type="text" class="intBox" value="" name="" />
                </div>
              </div>
              <div class="searchListTr glbCls clearfix">
                <div class="tr1"></div>
                <div class="tr2">Name</div>
                <div class="tr3">Condition</div>
                <div class="tr4">Patient Compliance</div>
              </div>
              <div class="searchListTd glbCls clearfix">
                <div class="tdBox1"> <a href="javascript:;"><img src="images/search-list1.jpg" alt="search-list"></a>
                  <div class="dashCount glbCls alignRight">
                    <ul>
                      <li><i class="countIcon3 spriteImg"></i><span class="msgCount fullRadius">1</span></li>
                    </ul>
                  </div>
                </div>
                <div class="tdBox2">
                  <div class="tableTitle">Name</div>
                  <p>Smith, James </p>
                  <span class="socText">SOC Date: July 28, 2016</span> </div>
                <div class="tdBox3">
                  <div class="tableTitle">Condition</div>
                  <p>Knee injury</p>
                  <br>
                  <p>Clinic Visits: 5</p>
                  <p>HEP Visits: 3</p>
                </div>
                <div class="tdBox4">
                  <div class="tableTitle">Patient Compliance</div>
                  <div class="chartDiv"><img src="images/small-chart.png" alt="small"></div>
                </div>
              </div>
              <div class="searchListTd glbCls clearfix">
                <div class="tdBox1"> <a href="javascript:;"><img src="images/search-list1.jpg" alt="search-list"></a>
                  <div class="dashCount glbCls alignRight">
                    <ul>
                      <li><i class="countIcon3 spriteImg"></i><span class="msgCount fullRadius">5</span></li>
                    </ul>
                  </div>
                </div>
                <div class="tdBox2">
                  <div class="tableTitle">Name</div>
                  <p>Smith, James </p>
                  <span class="socText">SOC Date: July 28, 2016</span> </div>
                <div class="tdBox3">
                  <div class="tableTitle">Condition</div>
                  <p>Knee injury</p>
                  <br>
                  <p>Clinic Visits: 5</p>
                  <p>HEP Visits: 3</p>
                </div>
                <div class="tdBox4">
                  <div class="tableTitle">Patient Compliance</div>
                  <div class="chartDiv"><img src="images/small-chart.png" alt="small"></div>
                </div>
              </div>
              <div class="searchListTd glbCls clearfix">
                <div class="tdBox1"> <a href="javascript:;"><img src="images/search-list1.jpg" alt="search-list"></a>
                  <div class="dashCount glbCls alignRight">
                    <ul>
                      <li><i class="countIcon3 spriteImg"></i><span class="msgCount fullRadius">8</span></li>
                    </ul>
                  </div>
                </div>
                <div class="tdBox2">
                  <p>Smith, James </p>
                  <span class="socText">SOC Date: July 28, 2016</span> </div>
                <div class="tdBox3">
                  <p>Knee injury</p>
                  <br>
                  <p>Clinic Visits: 5</p>
                  <p>HEP Visits: 3</p>
                </div>
                <div class="tdBox4">
                  <div class="chartDiv"><img src="images/small-chart.png" alt="small"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
@endsection
