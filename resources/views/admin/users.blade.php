@extends('admin.layout.admin')

@section('content')


<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.users')}}" title="Go to Home" class="tip-bottom"><i class="icon-user"></i> Users</a> <a href="{{route('admin.user.create')}}" class="current"><i class="icon-user"></i> Add User</a></div>
    
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
            <h5>Users List</h5>
          </div>
          @include('flash::message')  
          <div class="widget-content nopadding">
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Admin/User</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              	@foreach ($users as $user)
			    <tr class="gradeX">
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->is_admin?'Admin':'User'}}</td>
                  <td class="center">
                  <a href="{{route('admin.user.edit',$user->id)}}">Edit</a>| @if($user->status==1) <a href="{{route('admin.user.disable',$user->id)}}">Disable</a> @else <a href="{{route('admin.user.enable',$user->id)}}">Enable</a> @endif
              </td>
                </tr>
				@endforeach
                
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>


</div>


<!--end-main-container-part-->


@endsection