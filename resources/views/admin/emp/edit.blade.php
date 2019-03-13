@extends('admin.layout.admin')

@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.emp.list')}}" title="Go to Home" class="tip-bottom"><i class="icon-user"></i> Employment</a> <a href="javascript:window.location.reload(true)" class="current"><i class="icon-user"></i> Edit Employee</a></div>
    
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
            <h5>Edit Employment</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="{{route('admin.emp.update',$employment->id)}}" name="user_add_validate" id="user_add_validate">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PUT">

              <div class="control-group">
              <label class="control-label">Source</label>
                <div class="controls {{ $errors->has('source') ? ' is-invalid' : '' }}">
                  <input type="text" name="source" id="source" value="{{$employment->source}}" >
                  @if ($errors->has('source'))
                      <span class="help-block">
                          <strong>{{ $errors->first('source') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              
              <div class="control-group">
              <label class="control-label">Application Date</label>
                <div class="controls {{ $errors->has('application_date') ? ' is-invalid' : '' }}">
                  <input type="text" name="application_date" id="application_date" value="{{ \Carbon\Carbon::parse($employment->application_date)->format('d-M-Y') }}" >
                  <a href="javascript:void(0)" id="calender">Back to calender</a>
                  @if ($errors->has('application_date'))
                      <span class="help-block">
                          <strong>{{ $errors->first('application_date') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls {{ $errors->has('title') ? ' is-invalid' : '' }}">
                  <input type="radio" name="title" id="required" value="Ms." {{$employment->title=='Ms.'?'checked':''}}> Ms. <input type="radio" name="title" id="required" value="Mrs." {{$employment->title=='Mrs.'?'checked':''}}> Mrs.
                  <br>
                  <input type="radio" name="title" id="required" value="Mr." {{$employment->title=='Mr.'?'checked':''}}> Mr. <input type="radio" name="title" id="required" value="Dr." {{$employment->title=='Dr.'?'checked':''}}> Dr.

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
                  <input type="text" name="first_name" id="required" value="{{$employment->first_name}}" >
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
                  <input type="text" name="last_name" id="required" value="{{$employment->last_name}}" >
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
                  <input type="text" name="email" id="required" value="{{$employment->email}}" >
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
                  <input type="text" name="phone" id="required" value="{{$employment->phone}}" >
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
                  <input type="text" name="cell_number" id="required" value="{{$employment->cell_number}}" >
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
                  <input type="text" name="best_time_to_call" id="required" value="{{$employment->best_time_to_call}}">
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
                  <input type="text" name="street1" id="required" value="{{$employment->street1}}" >
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
                  <input type="text" name="street2" id="required" value="{{$employment->street2}}" >
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">City</label>
                <div class="controls {{ $errors->has('city') ? ' is-invalid' : '' }}">
                  <input type="text" name="city" id="required" value="{{$employment->city}}" >
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
                  <input type="text" name="state" id="required" value="{{$employment->state}}" >
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
                  <input type="text" name="zipcode" id="required" value="{{$employment->zipcode}}" >
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
                  <input type="text" name="country" id="required" value="{{$employment->country}}" >
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
                  <input type="text" name="position" id="required" value="{{$employment->position}}" >
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
                  <input type="checkbox" {{in_array('Monday', $days)?'checked':''}} name="days_available[]" id="required" value="Monday" > Monday
                  <input type="checkbox" {{in_array('Tuesday', $days)?'checked':''}} name="days_available[]" id="required" value="Tuesday" > Tuesday
                  <br>
                  <input type="checkbox" name="days_available[]"  {{in_array('Wednesday', $days)?'checked':''}}  id="required" value="Wednesday" > Wednesday
                  <input type="checkbox" name="days_available[]" {{in_array('Thursday', $days)?'checked':''}} id="required" value="Thursday" > Thursday
                  <br>
                  <input type="checkbox" name="days_available[]"  {{in_array('Friday', $days)?'checked':''}} id="required" value="Friday" > Friday
                  <input type="checkbox" name="days_available[]" {{in_array('Any', $days)?'checked':''}} id="required" value="Any" > Any

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
                  <textarea name="license" id="required" >{{$employment->license}}</textarea>
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Need Call</label>
                <div class="controls {{ $errors->has('need_call') ? ' is-invalid' : '' }}">
                  <input type="radio" name="need_call" id="required" value="Yes, soonest possible" {{$employment->need_call=='Yes, soonest possible'?'checked':''}} >Yes, soonest possible
                  <br/>
                  <input type="radio" name="need_call" id="required" value="Yes, but NOT immediately" {{$employment->need_call=='Yes, but NOT immediately'?'checked':''}}>Yes, but NOT immediately
                  <br/>
                  <input type="radio" name="need_call" id="required" value="No" {{$employment->need_call=='No'?'checked':''}}>No
                  <br/>
                  <input type="radio" name="need_call" id="required" value="other" {{$employment->need_call=='other'?'checked':''}}>
                  
                  <input type="text" name="need_call_other" id="required" value="" placeholder="Other">
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
                  <input type="text" name="resume" id="required" value="{{$employment->resume}}" >
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
<script>
$("#application_date").dblclick(function(){
    $("#application_date").prop('type', 'text');
})
$("#calender").click(function(){
    $("#application_date").prop('type', 'date');
});

</script>
@endsection