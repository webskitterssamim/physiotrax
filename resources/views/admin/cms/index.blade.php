@extends('admin/app')

@section('title', 'Cms list')

@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
	<div class="page-title">CMS</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
	<li><i class="fa fa-home"></i>&nbsp;<a href="/admin/cms">CMS</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
	<li class="active">List</li>
    </ol>
    <div class="clearfix"></div>
</div>
    
<div class="page-content">
    <div class="row">
	<div class="col-lg-12">
	    @if(Session::has('succ_msg'))
	    <div class="note note-success">
		   <h3>Success!</h3>
		    <p>{{ Session::get('succ_msg') }}</p>
	    </div>	    
	    @endif
	    <div class="portlet portlet-white">
		<div class="portlet-header pam mbn">
		    <div class="caption">CMS Listing</div>
		    <!--<div class="actions">
		    <a href="{{ action('admin\CmsController@create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>&nbsp;
			New CMS</a>&nbsp;
			<div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-warning btn-sm dropdown-toggle"><i class="fa fa-wrench"></i>&nbsp;
			    Tools</a>
			    <ul class="dropdown-menu pull-right">
				<li><a href="#">Export to Excel</a></li>
				<li><a href="#">Export to CSV</a></li>
				<li><a href="#">Export to XML</a></li>
				<li class="divider"></li>
				<li><a href="#">Print Invoices</a></li>
			    </ul>
			</div>
		    </div>-->
		</div>
		<div class="portlet-body pan">
		    <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
			<thead>
			<tr>
			    <th width="20%">Page title</th>
			    <th width="50%">Page Content</th>
			    <th width="20%">Actions</th>
			</tr>
			</thead>
			<tbody>
			@if($result->count() > 0)
			    @foreach($result AS $r)
				<tr>
				   
				    <td>{{$r->page_title}}</td>
				    <td>{!! substr($r->page_content,0,150) !!}...</td>
				    <td>
					<a href="{{ action('admin\CmsController@edit', $r->id) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i>&nbsp;
					    Edit
					</a>
					<!--<a href="{{ action('admin\CmsController@destroy', $r->id) }}" class="btn btn-default btn-xs" onclick="return confirm('Are you sure want to delete this record?');"><i class="fa fa-trash"></i>&nbsp;
					    Delete
					</a>-->
				    </td>
				</tr>
			    @endforeach
			@endif			
			
			</tbody>
		    </table>
		    <div class="pagination-panel">
		    <?php echo $result->render(); ?>
		    </div>
		</div>
	    </div>
	</div>
    </div>

</div>

@endsection
