@extends('admin.layout.admin')

@section('content')


<!--main-container-part-->
<div id="content">

<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.client.index')}}" title="Import" class="tip-bottom"><i class="icon-upload"></i> Import / <i class="icon icon-download"></i> <span>Export</span></a></div>

  </div>
<!--End-breadcrumbs-->
@include('flash::message') 
<br />
<div style="padding: 10px;"> 
	<a href="{{ route('admin.client.export','xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
	<a href="{{ route('admin.client.export','xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
	<a href="{{ route('admin.client.export','csv') }}"><button class="btn btn-success">Download CSV</button></a>
<br />
<form style="border: 0px solid #a1a1a1;margin-top: 15px;" action="{{route('admin.client.import')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="import_file" />
		<button class="btn btn-primary">Import File</button>
	</form>


</div>
</div>
@endsection