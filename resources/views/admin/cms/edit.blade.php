@extends('admin/app')

@section('title', 'CMS Update')

@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
	<div class="page-title">CMS</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
	<li><i class="fa fa-home"></i>&nbsp;<a href="/admin/cms">CMS</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
	<li class="active">Edit</li>
    </ol>
    <div class="clearfix"></div>
</div>    
<div class="page-content">
    <div class="row">
	<div class="col-lg-12">
	    <div class="portlet box portlet-grey">
		<div class="portlet-header">
		    <div class="caption">Edit CMS</div>
		</div>
		<div class="portlet-body bckGrnd">
		    @if (count($errors) > 0)
		
		    <div class="note note-danger">
			    <h3>Errors!</h3>
				@foreach ($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
		    </div>
		    @endif
		    
		    {!! Form::open(array('class' => 'form-horizontal form-separated','enctype'=>'multipart/form-data', 'route' => array('cms_update'))) !!}
		    
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			{!! Form::hidden('back_url', 'cms', array('class'=>'form-control', 'id'=> 'back_url')) !!}
			{!! Form::hidden('id', $result->id) !!}
			<div class="form-body">
			
			
			    <div class="form-group">
				<label class="col-md-3 control-label">Page Name  <span class="require">*</span></label>
				<div class="col-md-9">
				    <div class="bgStyle"> {!! $result->page_title !!} </div>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Page Content <span class="require">*</span></label>
				<div class="col-md-9">
				    {!! Form::textarea('page_content', $result->page_content, array('required', 'id' => 'page_content', 'class'=>'form-control ckeditor', )) !!}
				</div>
			    </div>

			    
			    <div class="form-actions">
				<div class="col-md-offset-3 col-md-9">
				<!--<button class="btn btn-primary" type="submit">Submit</button>-->
				{!! Form::submit('Submit', array('class' => 'btn btn-danger')) !!}
				{!! Form::button('Back', array('class' => 'btn btn-default', 'id' => 'back')) !!}
				<!--<button class="btn btn-default" type="button" id="back">Back</button>-->
				</div>
			    </div>
			</div>
		    {!! Form::close() !!}
		</div>
	    </div>
	</div>
    </div>

</div>

@endsection