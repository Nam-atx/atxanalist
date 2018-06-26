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
            <h5>Add Employment</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('admin.emp.save')}}" name="user_add_validate" id="user_add_validate">
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls {{ $errors->has('title') ? ' is-invalid' : '' }}">
                  <input type="radio" name="title" id="required" value="Ms." {{ (old('title')=='Ms.')?'checked':'' }}> Ms. <input type="radio" name="title" id="required" value="Mrs." {{ (old('title')=='Mrs.')?'checked':'' }}> Mrs.
                  <br>
                  <input type="radio" name="title" id="required" value="Mr." {{ (old('title')=='Mr.')?'checked':'' }}> Mr. <input type="radio" name="title" id="required" value="Dr." {{ (old('title')=='Dr.')?'checked':'' }}> Dr.

                  @if ($errors->has('title'))
                      <span class="help-block">
                          <strong>{{ $errors->first('title') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              
               
             <div class="control-group">
              <label class="control-label">First Name</label>
                <div class="controls {{ $errors->has('first_name') ? ' is-invalid' : '' }}">
                  <input type="text" name="first_name" id="required" value="{{ old('first_name') }}" >
                  @if ($errors->has('first_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">Last Name</label>
                <div class="controls {{ $errors->has('last_name') ? ' is-invalid' : '' }}">
                  <input type="text" name="last_name" id="required" value="{{ old('last_name') }}" >
                  @if ($errors->has('last_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Email</label>
                <div class="controls {{ $errors->has('email') ? ' is-invalid' : '' }}">
                  <input type="text" name="email" id="required" value="{{ old('email') }}" >
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">Phone</label>
                <div class="controls {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                  <input type="text" name="phone" id="required" value="{{ old('phone') }}" >
                  @if ($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Cell Phone</label>
                <div class="controls {{ $errors->has('cell_number') ? ' is-invalid' : '' }}">
                  <input type="text" name="cell_number" id="required" value="{{ old('cell_number') }}" >
                  @if ($errors->has('cell_number'))
                      <span class="help-block">
                          <strong>{{ $errors->first('cell_number') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">Best Time To Call</label>
                <div class="controls {{ $errors->has('best_time_to_call') ? ' is-invalid' : '' }}">
                  <input type="text" name="best_time_to_call" id="required" value="{{ old('best_time_to_call') }}">
                  @if ($errors->has('best_time_to_call'))
                      <span class="help-block">
                          <strong>{{ $errors->first('best_time_to_call') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Street1</label>
                <div class="controls {{ $errors->has('street1') ? ' is-invalid' : '' }}">
                  <input type="text" name="street1" id="required" value="{{ old('street1') }}" >
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
                  <input type="text" name="street2" id="required" value="{{ old('street2') }}" >
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">City</label>
                <div class="controls {{ $errors->has('city') ? ' is-invalid' : '' }}">
                  <input type="text" name="city" id="required" value="{{ old('city') }}" >
                  @if ($errors->has('city'))
                      <span class="help-block">
                          <strong>{{ $errors->first('city') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">State</label>
                <div class="controls {{ $errors->has('state') ? ' is-invalid' : '' }}">
                  <input type="text" name="state" id="required" value="{{ old('state') }}" >
                  @if ($errors->has('state'))
                      <span class="help-block">
                          <strong>{{ $errors->first('state') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Zipcode</label>
                <div class="controls {{ $errors->has('zipcode') ? ' is-invalid' : '' }}">
                  <input type="text" name="zipcode" id="required" value="{{ old('zipcode') }}" >
                  @if ($errors->has('zipcode'))
                      <span class="help-block">
                          <strong>{{ $errors->first('zipcode') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Country</label>
                <div class="controls {{ $errors->has('country') ? ' is-invalid' : '' }}">
                  <input type="text" name="country" id="required" value="{{ old('country') }}" >
                  @if ($errors->has('country'))
                      <span class="help-block">
                          <strong>{{ $errors->first('country') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Position</label>
                <div class="controls {{ $errors->has('position') ? ' is-invalid' : '' }}">
                  <input type="text" name="position" id="required" value="{{ old('position') }}" >
                  @if ($errors->has('position'))
                      <span class="help-block">
                          <strong>{{ $errors->first('position') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Days Available</label>
                <div class="controls {{ $errors->has('days_available') ? ' is-invalid' : '' }}">
                  <input type="checkbox"  name="days_available[]" id="required" value="Monday" {{ (is_array(old('days_available')) && in_array('Monday',(old('days_available'))))?'checked':'' }}> Monday
                  <input type="checkbox" name="days_available[]" id="required" value="Tuesday"  {{ (is_array(old('days_available')) && in_array('Tuesday',(old('days_available'))))?'checked':'' }}> Tuesday
                  <br>
                  <input type="checkbox" name="days_available[]" id="required" value="Wednesday"  {{ (is_array(old('days_available')) && in_array('Wednesday',(old('days_available'))))?'checked':'' }}> Wednesday
                  <input type="checkbox" name="days_available[]" id="required" value="Thursday"  {{ (is_array(old('days_available')) && in_array('Thursday',(old('days_available'))))?'checked':'' }}> Thursday
                  <br>
                  <input type="checkbox" name="days_available[]" id="required" value="Friday"  {{ (is_array(old('days_available')) && in_array('Friday',(old('days_available'))))?'checked':'' }}> Friday
                  <input type="checkbox" name="days_available[]" id="required" value="Any"  {{ (is_array(old('days_available')) && in_array('Any',(old('days_available'))))?'checked':'' }}> Any

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
                  <textarea name="license" id="required" >{{ old('license') }}</textarea>
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Need Call</label>
                <div class="controls {{ $errors->has('need_call') ? ' is-invalid' : '' }}">
                  <input type="radio" name="need_call" id="required" value="Yes, soonest possible" {{ (old('need_call')=='Yes, soonest possible')?'checked':'' }}>Yes, soonest possible
                  <br/>
                  <input type="radio" name="need_call" id="required" value="Yes, but NOT immediately" {{ (old('need_call')=='Yes, but NOT immediately')?'checked':'' }}>Yes, but NOT immediately
                  <br/>
                  <input type="radio" name="need_call" id="required" value="No" {{ (old('need_call')=='No')?'checked':'' }}>No
                  <br/>
                  <input type="radio" name="need_call" id="required" value="other" {{ (old('need_call')=='other')?'checked':'' }}>Other
                  
                  <!--<input type="text" name="need_call_other" id="required" value="" placeholder="Other">-->
                  @if ($errors->has('need_call'))
                      <span class="help-block">
                          <strong>{{ $errors->first('need_call') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Resume</label>
                <div class="controls {{ $errors->has('resume') ? ' is-invalid' : '' }}">
                  <input type="text" name="resume" id="required" value="{{ old('resume') }}" >
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