@extends('admin/app')

@section('title', 'Users list')

@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
	<div class="page-title">Create New Admin</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
	<li><i class="fa fa-home"></i>&nbsp;<a href="dashboard">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
	<li class="active">Create Provider</li>
    </ol>
    <div class="clearfix"></div>
</div>
    
<div class="page-content">
    <div class="row">
	<div class="col-lg-12">
	    <div class="portlet box portlet-grey">
		<div class="portlet-header">
		    <div class="caption">Create New Admin</div>
		</div>
		<div class="portlet-body">
		    @if (count($errors) > 0)
		
		    <div class="note note-danger">
			    <h3>Errors!</h3>
				@foreach ($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
		    </div>
		    @endif
		     {!! Form::open(array('class' => 'form-horizontal form-separated', 'route' => array('adminuser_create'))) !!}
		      
		    
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			
			<div class="form-body">
			    <div class="form-group">
				<label class="col-md-3 control-label">Name <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
				     
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Email <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="text" class="form-control" name="email" id="email" autocomplete="off" value="{{ old('email') }}">
				</div>
			    </div>
			     <div class="form-group">
				<label class="col-md-3 control-label">Phone </label>
				<div class="col-md-9">
				    <input type="text" class="form-control" name="phone" id="phone" autocomplete="off" value="{{ old('phone') }}">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Password <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="password" class="form-control" autocomplete="off" name="password" id="password" value="">
				</div>
			    </div>
			    <div class="form-actions">
				<div class="col-md-offset-3 col-md-9">
				{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
				<a href="{{URL::route('adminuser_list')}}" class="btn btn-default">Cancel</a>
				</div
			    </div>
			</div>
			{!! Form::close() !!}
	    </div>
	</div>
    </div>

</div>
    </div
    </div>

@endsection