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
                <label class="control-label">Phone</label>
                <div class="controls">
                  <input type="text" name="phone" id="phone"  value="{{old('phone')}}" required>
                  @if ($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif

                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Admin</label>
                <div class="controls">
                 <select name="is_admin" class="is-admin form-control">
                  <option value="1">Admin</option>
                  <option value="2">Recrutor</option>
                  <option value="3">Sale</option>
                  <option value="4">Relation Manager</option>
                  <option value="5">Editor</option>
                </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                 <select name="status" class="sttaus form-control">
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                  
                </select>
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