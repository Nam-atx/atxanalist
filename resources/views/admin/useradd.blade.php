@extends('admin.layout.admin')

@section('content')


<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.users')}}" title="Go to Home" class="tip-bottom"><i class="icon-user"></i> Users</a></div>

  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
            <h5>Add New User</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('admin.user.store')}}" name="user_add_validate" id="user_add_validate">
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">User Name</label>
                <div class="controls">
                  <input type="text" name="name" id="required" value="{{old('name')}}">
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">User Email</label>
                <div class="controls">
                  <input type="text" name="email" id="email" value="{{old('email')}}">
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif

                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="password">
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif

                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Confirm Password</label>
                <div class="controls">
                  <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Admin</label>
                <div class="controls">
                  <input type="radio" name="is_admin" id="is_admin" value="1"> Yes <input type="radio" name="is_admin" id="is_admin" value="0"> No 
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="radio" name="status" id="status" value="1"> Enable <input type="radio" name="status" id="status" value="0"> Disable 
                </div>
              </div>

              
              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>


</div>


<!--end-main-container-part-->


@endsection