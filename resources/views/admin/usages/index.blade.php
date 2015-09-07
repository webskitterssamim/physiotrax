@extends('admin/app')

@section('title', 'Excercises List')

@section('content')
	
		<div id="main_content">
			
			<!-- main content -->
			<div class="row">
				<div class="col-sm-12">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">Site Usages</h4>
					</div>
					
					@if(Session::has('succ_msg'))
						<div class="alert alert-success">
						   <h3>Success!</h3>
							<p>{{ Session::get('succ_msg') }}</p>
						</div>	    
					@endif
					
					<div class="panel-body">
					  <div class="sepH_c">
						<p class="heading_a">Usage Search</p>
						
						<div class="row">
							 {!!Form::open(array('route' => 'adm_usages')) !!}
								<div class="col-sm-4">
								<label> &nbsp; </label>
								<div class="form-group">
								<input type="search" name="search" value="{{$search}}" class="form-control" id="password_meter">
								</div>
								</div>
								<div class="col-sm-3 topLabelPadd">							
									<input type="submit" value="Search" class="btn btn-default btn-sm" />
								</div>
							 {!! Form::close()!!}
						</div>   
						
						<div class="alert alert-danger">
							Coming Soon...
						</div>
						
					  </div>
					</div>
				</div>
			</div>
        </div>			
			
		</div>
	

	
@endsection
