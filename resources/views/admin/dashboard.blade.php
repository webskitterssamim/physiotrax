@extends('admin/app')

@section('title', 'Dashboard')

@section('content')
	
		<div id="main_content">
			
			<!-- main content -->
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="box_stat box_ico">
						<span class="stat_ico stat_ico_1"><i class="li_vallet"></i></span>
						<h4>15</h4>
						<small>Providers</small>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="box_stat box_ico">
						<span class="stat_ico stat_ico_2"><i class="li_user"></i></span>
						<h4>20</h4>
						<small>Patients</small>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="box_stat box_ico">
						<span class="stat_ico stat_ico_3"><i class="li_banknote"></i></span>
						<h4>1056</h4>
						<small>Visitor</small>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="box_stat box_ico">
						<span class="stat_ico stat_ico_4"><i class="li_truck"></i></span>
						<h4>3.46</h4>
						<small>Page/Session</small>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="box_stat box_ico">
						<span class="stat_ico stat_ico_3"><i class="li_banknote"></i></span>
						<h4>123 seconds</h4>
						<small>Avg. Session Duration</small>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="box_stat box_ico">
						<span class="stat_ico stat_ico_3"><i class="li_banknote"></i></span>
						<h4>70.31 %</h4>
						<small>Bounce Rate</small>
					</div>
				</div>
			</div>
			
			
		</div>
	

	
@endsection
