@extends('admin.layout.admin')

@section('content')


<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!-- main content start -->

<div class="row dashboard-content">
	<a href="{{route('admin.dashboard.totaldnd')}}">
	<div class="dashbord-box">
		<div class="heading">Total DND</div>
		<div class="count">{{$total_dnd}}</div>
	</div>
	</a>
	<a href="{{route('admin.dashboard.totalrecruiter')}}">
	<div class="dashbord-box">
		<div class="heading">Total Recruiting Contacts</div>
		<div class="count">{{$total_recruiting_contacts}}</div>
	</div>
	</a>
	<a href="{{route('admin.dashboard.totalsales')}}">
	<div class="dashbord-box">
		<div class="heading">Total Sales Contacts</div>
		<div class="count">{{$total_sales_contacts}}</div>
	</div>
	</a>
	<a href="#">
	<div class="dashbord-box">
		<div class="heading">Total Emails</div>
		<div class="count">{{$total_emails}}</div>
	</div>
	</a>
	<a href="{{route('admin.dashboard.totalemployees')}}">
	<div class="dashbord-box">
		<div class="heading">Current Employees</div>
		<div class="count">{{$current_employees}}</div>
	</div>
	</a>
</div>
<!-- main content end -->

</div>


<!--end-main-container-part-->



@endsection