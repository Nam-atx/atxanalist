@extends('admin.layout.admin')

@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.emp.list')}}" title="Go to Home" class="tip-bottom"><i class="icon-user"></i> Employment</a> </div>
    
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
            <h5>Edit User</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('admin.emp.save')}}" name="user_add_validate" id="user_add_validate">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PUT">
              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="radio" name="title" id="required" value=""> Mrs. <input type="radio" name="name" id="required" value="" > Mr.
                  @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              
               
             <div class="control-group">
              <label class="control-label">First Name</label>
                <div class="controls">
                  <input type="text" name="first_name" id="required" value="" >
                  @if ($errors->has('first_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">Last Name</label>
                <div class="controls">
                  <input type="text" name="last_name" id="required" value="" >
                  @if ($errors->has('last_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Email</label>
                <div class="controls">
                  <input type="text" name="email" id="required" value="" >
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">Phone</label>
                <div class="controls">
                  <input type="text" name="phone" id="required" value="" >
                  @if ($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Cell Phone</label>
                <div class="controls">
                  <input type="text" name="cell_number" id="required" value="" >
                  @if ($errors->has('cell_number'))
                      <span class="help-block">
                          <strong>{{ $errors->first('cell_number') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">Best Time To Call</label>
                <div class="controls">
                  <input type="text" name="best_time_to_call" id="required" value="" >
                  @if ($errors->has('best_time_to_call'))
                      <span class="help-block">
                          <strong>{{ $errors->first('best_time_to_call') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Street1</label>
                <div class="controls">
                  <input type="text" name="street1" id="required" value="" >
                  @if ($errors->has('street1'))
                      <span class="help-block">
                          <strong>{{ $errors->first('street1') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">Street2</label>
                <div class="controls">
                  <input type="text" name="street2" id="required" value="" >
                  @if ($errors->has('street2'))
                      <span class="help-block">
                          <strong>{{ $errors->first('street2') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">City</label>
                <div class="controls">
                  <input type="text" name="city" id="required" value="" >
                  @if ($errors->has('city'))
                      <span class="help-block">
                          <strong>{{ $errors->first('city') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">State</label>
                <div class="controls">
                  <input type="text" name="state" id="required" value="" >
                  @if ($errors->has('state'))
                      <span class="help-block">
                          <strong>{{ $errors->first('state') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Zipcode</label>
                <div class="controls">
                  <input type="text" name="zipcode" id="required" value="" >
                  @if ($errors->has('zipcode'))
                      <span class="help-block">
                          <strong>{{ $errors->first('zipcode') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Country</label>
                <div class="controls">
                  <input type="text" name="country" id="required" value="" >
                  @if ($errors->has('country'))
                      <span class="help-block">
                          <strong>{{ $errors->first('country') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Position</label>
                <div class="controls">
                  <input type="text" name="position" id="required" value="" >
                  @if ($errors->has('position'))
                      <span class="help-block">
                          <strong>{{ $errors->first('position') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Days Available</label>
                <div class="controls">
                  <input type="text" name="days_available" id="required" value="" >
                  @if ($errors->has('days_available'))
                      <span class="help-block">
                          <strong>{{ $errors->first('days_available') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">License</label>
                <div class="controls">
                  <input type="text" name="license" id="required" value="" >
                  @if ($errors->has('license'))
                      <span class="help-block">
                          <strong>{{ $errors->first('license') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Need Call</label>
                <div class="controls">
                  <input type="text" name="need_call" id="required" value="" >
                  @if ($errors->has('need_call'))
                      <span class="help-block">
                          <strong>{{ $errors->first('need_call') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Resume</label>
                <div class="controls">
                  <input type="text" name="resume" id="required" value="" >
                  @if ($errors->has('resume'))
                      <span class="help-block">
                          <strong>{{ $errors->first('resume') }}</strong>
                      </span>
                  @endif
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

@endsection