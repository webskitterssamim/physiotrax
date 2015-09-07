@extends('admin/app')

@section('title', 'Update User')

@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
	<div class="page-title">Update Users</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
	<li><i class="fa fa-home"></i>&nbsp;<a href="dashboard">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
	<li class="active">Update users</li>
    </ol>
    <div class="clearfix"></div>
</div>
    
<div class="page-content">
    <div class="row">
	<div class="col-lg-12">
	    <div class="portlet box portlet-grey">
		<div class="portlet-header">
		    <div class="caption">Update User</div>
		</div>
		<div class="portlet-body">
		    @if (count($errors) > 0)
		
		    <div class="note note-danger">
			    <h3>Errors!</h3>
				@foreach ($errors as $error)
					<p>{{ $error }}</p>
				@endforeach
		    </div>
		    @endif
		    <form class="form-horizontal form-separated" role="form" method="post" action="{{ action('admin\UserController@update') }}">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<input type="hidden" name="uid" value="{{{ $result[0]->id }}}" />
			<div class="form-body">
			    <div class="form-group">
				<label class="col-md-3 control-label">Name <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="text" class="form-control" name="name" id="name" value="{{$result[0]->name}}">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Email <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="text" class="form-control" name="email" id="email" value="{{$result[0]->email}}">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Password <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="password" class="form-control" name="password" id="password" value="{{$result[0]->password}}">
				</div>
			    </div>
			    <div class="form-actions">
				<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-primary" type="submit">Submit</button>
				<button class="btn btn-default" type="button">Cancel</button>
				</div>
			    </div>
			</div>
		    </form>
		</div>
	    </div>
	</div>
    </div>

</div>

@endsection
