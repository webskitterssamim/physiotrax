@extends('front')

@section('title', 'Physiotrax')

@section('content')

    <div class="mainSlider">
      
    </div>
    <section class="mainBlock glbCls howItPan">
    </section>
    <section class="mainBlock glbCls videoPanel">
      <div class="mainWrap glbCls clearfix">
        <div class="titleBox glbCls noneBg">
          @if(Session::has('succ_msg'))
            <div class="titleBox glbCls">
             <h4 class="blockTitle glbCls">
             <span> <em>{{ Session::get('succ_msg') }}</em></span>
             </h4>
            </div>
          @endif
        </div>
        
      </div>
    </section>
    <section class="mainBlock glbCls patientSec">
     
    </section>
    <section class="mainBlock glbCls aboutSec">
      
    </section>
@endsection