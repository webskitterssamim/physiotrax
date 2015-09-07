@extends('admin/app')

@section('title', 'Users list')

@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
	<div class="page-title">Create Provider</div>
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
		    <div class="caption">Create Provider</div>
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
		    <form class="form-horizontal form-separated" role="form" method="post" action="{{ action('admin\ProviderController@create') }}">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<input type="hidden" id="back_url" value="providers" />
			<div class="form-body">
			    <div class="form-group">
				<label class="col-md-3 control-label">Name of Company <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="text" class="form-control" required name="company_name" id="company_name">
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">FEIN Number <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="text" class="form-control"  name="fein_number" id="fein_number" required>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Bank Information Account And Routing <span class="require">*</span></label>
				<div class="col-md-9">
				    <textarea name="bank_info" id="bank_info" class="form-control" required></textarea>
				</div>
			    </div>
			    
			    <div class="form-group">
				<label class="col-md-3 control-label">Insurance Carrier <span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="text" class="form-control" name="insurance_carrier" id="insurance_carrier" required>
				</div>
			    </div>
			    
			    <div class="form-group">
				<label class="col-md-3 control-label">Policy Number<span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="text" class="form-control" name="policy_number" id="policy_number" required>
				</div>
			    </div>
				
			    <div class="form-group">
				<label class="col-md-3 control-label">Provider Insurance<span class="require">*</span></label>
				<div class="col-md-9">
				    <select name="provider_insurance" id="provider_insurance" class="form-control" required>
					<option vale="Yes">Yes</option>
					<option vale="No">No</option>
				    </select>
				</div>
			    </div>
				
			    <div class="form-group">
				<label class="col-md-3 control-label">Email<span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="email" class="form-control" name="email" id="email" required>
				</div>
			    </div>
				
			    <div class="form-group">
				<label class="col-md-3 control-label">Password<span class="require">*</span></label>
				<div class="col-md-9">
				    <input type="password" class="form-control" name="password" id="password" required>
				</div>
			    </div>
				
			    <div class="form-group">
				<label class="col-md-3 control-label">Status<span class="require">*</span></label>
				<div class="col-md-9">
				    <select name="status" id="status" class="form-control" required>
					<option vale="Active">Active</option>
					<option vale="Inactive">Inactive</option>
				    </select>
				</div>
			    </div>
			    
			    <div class="form-actions">
				<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-primary" type="submit">Submit</button>
				<button class="btn btn-default" type="button" id="back">Back</button>
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