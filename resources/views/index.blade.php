
@extends('front')

@section('title', 'Physiotrax')

@section('content')

    <div class="mainSlider">
      <div id="fullSlider" class="owl-carousel owl-theme">
        <div class="item"><img src="images/shutterstock_142419283.jpg" alt="img"> <span class="pattern"></span>
          <div class="captionDiv"> <span class="glbCls titleOne">Customer relationship <strong>management</strong> tool <br>
            for patient engagement and best outcomes </span> <!--<span class="glbCls titleTwo">for long-term <strong>Engagement</strong> and <strong>Best Outcomes</strong></span>-->
            <p><a class="orangeBtn" href="#">Take A Tour</a></p>
          </div>
        </div>
        <div class="item"><img src="images/shutterstock_243188407.jpg" alt="img"><span class="pattern"></span>
          <div class="captionDiv"> <span class="glbCls titleOne">Customer relationship <strong>management</strong> tool <br>
            for patient engagement and best outcomes </span> <!--<span class="glbCls titleTwo">for long-term <strong>Engagement</strong> and <strong>Best Outcomes</strong></span>-->
            <p><a class="orangeBtn" href="#">Take A Tour</a></p>
          </div>
        </div>
        <div class="item"><img src="images/shutterstock_192287702.jpg" alt="img"><span class="pattern"></span>
          <div class="captionDiv"> <span class="glbCls titleOne">Customer relationship <strong>management</strong> tool <br>
            for patient engagement and best outcomes </span> <!--<span class="glbCls titleTwo">for long-term <strong>Engagement</strong> and <strong>Best Outcomes</strong></span>-->
            <p><a class="orangeBtn" href="#">Take A Tour</a></p>
          </div>
        </div>
      </div>
    </div>
    <section class="mainBlock glbCls howItPan">
      <div class="mainWrap glbCls clearfix">
        <div class="titleBox glbCls">
          <h4 class="blockTitle glbCls"><span>How Does it <em>Work?</em></span></h4>
        </div>
        <div class="howItBox leftCls">
          <div class="iconDiv glbCls icon1 fullRadius"><span class="spriteImg"></span></div>
          <div class="description glbCls">
            <p>Provider invites Patient to access their own Personalized Home Exercise Dashboard</p>
          </div>
          <p><a class="otherBtn" href="#">Read More</a></p>
        </div>
        <div class="howItBox leftCls">
          <div class="iconDiv glbCls icon2 fullRadius"><span class="spriteImg"></span></div>
          <div class="description glbCls">
            <p>Patient views and performs perscribed exercise videos.</p>
          </div>
          <p><a class="otherBtn" href="#">Read More</a></p>
        </div>
        <div class="howItBox leftCls">
          <div class="iconDiv glbCls icon3 fullRadius"><span class="spriteImg"></span></div>
          <div class="description glbCls">
            <p>Patient responds with post exercise feedback ie. pain and functional levels</p>
          </div>
          <p><a class="otherBtn" href="#">Read More</a></p>
        </div>
        <div class="howItBox leftCls">
          <div class="iconDiv glbCls icon4 fullRadius"><span class="spriteImg"></span></div>
          <div class="description glbCls">
            <p>Provider monitors progress and adjusts Home Exercise Program to insure optimal development.</p>
          </div>
          <p><a class="otherBtn" href="#">Read More</a></p>
        </div>
      </div>
    </section>
    <section class="mainBlock glbCls videoPanel">
      <div class="mainWrap glbCls clearfix">
        <div class="titleBox glbCls noneBg">
          <h4 class="blockTitle glbCls"><span>Sample <em>Videos</em></span></h4>
        </div>
        <div class="videoBoxPan glbCls clearfix">
          <div class="videoBox">
            <iframe width="305" height="193" src="https://www.youtube.com/embed/w8Te-Tmxxms" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="videoBox">
            <iframe width="305" height="193" src="https://www.youtube.com/embed/26c9Bn-1zmM" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="videoBox">
            <iframe width="305" height="193" src="https://www.youtube.com/embed/i25up_tmrlk" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="videoBox">
            <iframe width="305" height="193" src="https://www.youtube.com/embed/w8Te-Tmxxms" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="videoBox">
            <iframe width="305" height="193" src="https://www.youtube.com/embed/26c9Bn-1zmM" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="videoBox">
            <iframe width="305" height="193" src="https://www.youtube.com/embed/i25up_tmrlk" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>
    <section class="mainBlock glbCls patientSec">
      <div class="mainWrap glbCls clearfix">
        <div class="titleBox glbCls">
          <h4 class="blockTitle glbCls"><span>Patient <em>Engagement</em></span></h4>
        </div>
        <div class="patientPan glbCls clearfix">
          <div class="patientBox">
            <div class="text textOne glbCls">Patient Metrics </div>
            <div class="text textTwo glbCls">Reports</div>
          </div>
          <div class="patientBox">
            <div class="text textOne glbCls">Email Marketing </div>
            <div class="text textTwo glbCls">Campaigns</div>
          </div>
          <div class="patientBox">
            <div class="text textOne glbCls">Re-engage Patients after </div>
            <div class="text textTwo glbCls">Service Completion</div>
          </div>
        </div>
      </div>
    </section>
    <section class="mainBlock glbCls aboutSec">
      <div class="mainWrap glbCls clearfix">
        <div class="titleBox glbCls">
          <h4 class="blockTitle glbCls"><span>About <em>Us</em></span></h4>
        </div>
        <div class="aboutPan glbCls clearfix">
          <div class="aboutImg fullRadius"><img src="images/about-img.jpg" alt="video"></div>
          <div class="aboutContent">
            <p>PhysioTrax helps the clinician keep patients engaged in their own improvement processes, and gives you the tools to monitor, track and communicate.  This improves patient outcomes and overall patient satisfaction while making your job easier</p>
            <p>Patient engagement continues even after therapy has ended, via our reporting engine and newsletter marketing tools to keep clients engaged with new, relevant health information. <a href="#">Learn more</a> about how PhysioTrax can help your clinic! </p>
          </div>
        </div>
      </div>
    </section>
@endsection