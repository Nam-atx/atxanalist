@extends('admin.layout.admin')

@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.client.list')}}" title="Go to Home" class="tip-bottom"><i class="icon-user"></i> Client</a> </div>
    
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
            <h5>Add Client</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('admin.client.save')}}" name="user_add_validate" id="user_add_validate">
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Client Name</label>
                <div class="controls {{ $errors->has('name') ? ' is-invalid' : '' }}">
                  <input type="text" name="name" id="name-required" value="{{ old('name') }}">

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              
               
             <div class="control-group">
              <label class="control-label">Contact Person</label>
                <div class="controls {{ $errors->has('contact') ? ' is-invalid' : '' }}">
                  <input type="text" name="contact" id="contact-required" value="{{ old('contact') }}" >
                  @if ($errors->has('contact'))
                      <span class="help-block">
                          <strong>{{ $errors->first('contact') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Designation</label>
                <div class="controls {{ $errors->has('designation') ? ' is-invalid' : '' }}">
                  <input type="text" name="designation" id="designation-required" value="{{ old('designation') }}" >
                  @if ($errors->has('designation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('designation') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Phone</label>
                <div class="controls {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                  <input type="text" name="phone" id="phone-required" value="{{ old('phone') }}" >
                  @if ($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              

              <div class="control-group">
              <label class="control-label">Email</label>
                <div class="controls {{ $errors->has('email') ? ' is-invalid' : '' }}">
                  <input type="text" name="email" id="email-required" value="{{ old('email') }}" >
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>




              <div class="control-group">
              <label class="control-label">Contact Person One</label>
                <div class="controls {{ $errors->has('contact_1') ? ' is-invalid' : '' }}">
                  <input type="text" name="contact_1" id="contact-1-required" value="{{ old('contact_1') }}" >
                  @if ($errors->has('contact_1'))
                      <span class="help-block">
                          <strong>{{ $errors->first('contact_1') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Designation One</label>
                <div class="controls {{ $errors->has('designation_1') ? ' is-invalid' : '' }}">
                  <input type="text" name="designation_1" id="designation-1-required" value="{{ old('designation_1') }}" >
                  @if ($errors->has('designation_1'))
                      <span class="help-block">
                          <strong>{{ $errors->first('designation_1') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Phone One</label>
                <div class="controls {{ $errors->has('phone_1') ? ' is-invalid' : '' }}">
                  <input type="text" name="phone_1" id="phone-1-required" value="{{ old('phone_1') }}" >
                  @if ($errors->has('phone_1'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone_1') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              

              <div class="control-group">
              <label class="control-label">Email One</label>
                <div class="controls {{ $errors->has('email_1') ? ' is-invalid' : '' }}">
                  <input type="text" name="email_1" id="email-1-required" value="{{ old('email_1') }}" >
                  @if ($errors->has('email_1'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email_1') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">Contact Person Two</label>
                <div class="controls {{ $errors->has('contact_2') ? ' is-invalid' : '' }}">
                  <input type="text" name="contact_2" id="contact-2-required" value="{{ old('contact_2') }}" >
                  @if ($errors->has('contact_2'))
                      <span class="help-block">
                          <strong>{{ $errors->first('contact_2') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Designation Two</label>
                <div class="controls {{ $errors->has('designation_2') ? ' is-invalid' : '' }}">
                  <input type="text" name="designation_2" id="designation-2-required" value="{{ old('designation_2') }}" >
                  @if ($errors->has('designation_2'))
                      <span class="help-block">
                          <strong>{{ $errors->first('designation_2') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Phone Two</label>
                <div class="controls {{ $errors->has('phone_2') ? ' is-invalid' : '' }}">
                  <input type="text" name="phone_2" id="phone-2-required" value="{{ old('phone_2') }}" >
                  @if ($errors->has('phone_2'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone_2') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              

              <div class="control-group">
              <label class="control-label">Email Two</label>
                <div class="controls {{ $errors->has('email_2') ? ' is-invalid' : '' }}">
                  <input type="text" name="email_2" id="email-2-required" value="{{ old('email_2') }}" >
                  @if ($errors->has('email_2'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email_2') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


            <div class="control-group">
              <label class="control-label">Fax</label>
                <div class="controls {{ $errors->has('fax') ? ' is-invalid' : '' }}">
                  <input type="text" name="fax" id="fax-required" value="{{ old('fax') }}" >
                  @if ($errors->has('fax'))
                      <span class="help-block">
                          <strong>{{ $errors->first('fax') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">City</label>
                <div class="controls {{ $errors->has('city') ? ' is-invalid' : '' }}">
                  <input type="text" name="city" id="city-required" value="{{ old('city') }}" >
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
                  <input type="text" name="state" id="state-required" value="{{ old('state') }}" >
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
                  <input type="text" name="zipcode" id="zipcode-required" value="{{ old('zipcode') }}">
                  @if ($errors->has('zipcode'))
                      <span class="help-block">
                          <strong>{{ $errors->first('zipcode') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Requirement</label>
                <div class="controls {{ $errors->has('requirement') ? ' is-invalid' : '' }}">
                  <input type="text" name="requirement" id="requirement-required" value="{{ old('requirement') }}" >
                  @if ($errors->has('requirement'))
                      <span class="help-block">
                          <strong>{{ $errors->first('requirement') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="control-group">
              <label class="control-label">status</label>
                <div class="controls">
                  <input type="text" name="status" id="status-required" value="{{ old('status') }}" >
                </div>
              </div>



              <div class="control-group">
              <label class="control-label">Opening Date</label>
                <div class="controls {{ $errors->has('opening_date') ? ' is-invalid' : '' }}">
                  <input type="text"  data-date-format="yyyy-mm-dd" name="opening_date" id="opening-date-required" value="{{ old('opening_date') }}" class="odatepicker">
                  @if ($errors->has('opening_date'))
                      <span class="help-block">
                          <strong>{{ $errors->first('opening_date') }}</strong>
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
<script>$('.odatepicker').datepicker({'format':'yyyy-mm-dd'});</script>
@endsection