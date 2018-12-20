@extends('rm.layout.app')

@section('content')

 <ul class="pager">
    <li class="previous"><a href="{{$previous}}?position={{app('request')->input('position')}}&city={{app('request')->input('city')}}&state={{app('request')->input('state')}}&radius={{app('request')->input('radius')}}&email={{app('request')->input('email')}}&from_date={{app('request')->input('from_date')}}&to_date={{app('request')->input('to_date')}}">< Previous</a></li>
    <li class="next"><a href="{{$next}}?position={{app('request')->input('position')}}&city={{app('request')->input('city')}}&state={{app('request')->input('state')}}&radius={{app('request')->input('radius')}}&email={{app('request')->input('email')}}&from_date={{app('request')->input('from_date')}}&to_date={{app('request')->input('to_date')}}">Next ></a></li>
  </ul>
    <div class="row justify-content-center">
            <div class="card ">
                <div class="card-header col-md-12">

                  <span class="col-md-4 candidate-detail-head">Candidate Detail</span>
                  <div class="col-md-3">
                      @if($employement['atxemployee']==0)
                       <form id="atxemployee" class="atxemployee-form" action="{{route('rm.atxemployee')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <button type="submit" name="submit" id="atxemployee-submit" >Employee</button>
                       </form>
                       @else

                       <form id="nonatxemployee" class="atxemployee-form" action="{{route('rm.nonatxemployee')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <span>{{ \Carbon\Carbon::parse($employement['atxemployee_date'])->format('F d, Y') }}</span>
                        <button type="submit" name="submit" style="color: white;background: green;border-radius: 20px;" id="nonatxemployee-submit">Remove Employee</button>
                       </form>

                       @endif
                  </div>
                  <div class="col-md-2">
                    @if(empty($employement['update_required']))
                      <input name="update_required" type="checkbox" id="update-required" data-action="{{route('rm.updaterequired',$employement['id'])}}"> Update Required
                    @endif
                  </div>
                  <div class="col-md-3">
                      @if($employement['dnd']==0)
                       <form id="dnd-form" class="dnd-form" action="{{route('rm.emp.dnd')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <button type="submit" name="submit" id="dnd-submit" >DND</button>
                       </form>
                       @else

                       <form id="nondnd-form" class="dnd-form" action="{{route('rm.emp.nondnd')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <span>{{ \Carbon\Carbon::parse($employement['dnd_date'])->format('F d, Y') }}</span>
                        <button type="submit" name="submit" style="color: white;background: red;border-radius: 20px;" id="nondnd-submit">Remove DND</button>
                       </form>

                       @endif
                  </div>
                </div>
                
                <div class="card-body1">
                  <!-- employemnt data start -->
                    <form id="employment_update" action="{{route('rm.employeeupdate',$employement['id'])}}" name="employment_update">
                      <div class="span4 csection">
                        <table class="table">
                        <tbody>
                          @if($employement['title'])
                          <tr><td><strong>Title</strong></td><td>{{$employement['title']}}</td></tr>
                          @else
                          <tr><td><strong>Title</strong></td><td>
                            <input type="radio" name="title" id="required" value="Ms."> Ms. 
                            <input type="radio" name="title" id="required" value="Mrs."> Mrs.
                            <br>
                            <input type="radio" name="title" id="required" value="Mr."> Mr. 
                            <input type="radio" name="title" id="required" value="Dr."> Dr.
                          </td></tr>
                          @endif

                          @if($employement['first_name'])
                          <tr><td><strong>First Name</strong></td><td>{{$employement['first_name']}}</td></tr>
                          @else
                          <tr><td><strong>First Name</strong></td><td><input type="text" name="first_name"></td></tr>
                          @endif

                          @if($employement['last_name'])
                          <tr><td><strong>Last Name</strong></td><td>{{$employement['last_name']}}</td></tr>
                          @else
                          <tr><td><strong>Last Name</strong></td><td><input type="text" name="last_name"></td></tr>
                          @endif

                          @if($employement['email'] && !preg_match('/@atxlearning.com/i', $employement['email']))
                          <tr><td><strong>Email</strong></td><td>{{$employement['email']}}</td></tr>
                          @elseif(preg_match('/@atxlearning.com/i', $employement['email']))
                          <tr><td><strong>Email</strong></td><td><input type="text" name="email"></td></tr>
                          @else
                          <tr><td><strong>Email</strong></td><td><input type="text" name="email"></td></tr>
                          @endif

                          @if($employement['phone'])
                          <tr><td><strong>Phone</strong></td><td>{{$employement['phone']}}</td></tr>
                          @else
                          <tr><td><strong>Phone</strong></td><td><input type="text" name="phone"></td></tr>
                          @endif

                          @if($employement['cell_number'])
                          <tr><td><strong>Cell Number</strong></td><td>{{$employement['cell_number']}}</td></tr>
                          @else
                          <tr><td><strong>Cell Number</strong></td><td><input type="text" name="cell_number"></td></tr>
                          @endif

                          @if($employement['best_time_to_call'])
                          <tr><td><strong>Best Time To Call</strong></td><td>{{$employement['best_time_to_call']}}</td></tr>
                          @else
                          <tr><td><strong>Best Time To Call</strong></td><td><input type="text" name="best_time_to_call"></td></tr>
                          @endif   

                          @if($employement['street1'])                       
                            <tr><td><strong>Street1</strong></td><td>{{$employement['street1']}}</td></tr>
                          @else
                            <tr><td><strong>Street1</strong></td><td><input type="text" name="street1"></td></tr>
                          @endif

                          @if($employement['street2']) 
                            <tr><td><strong>Street2</strong></td><td>{{$employement['street2']}}</td></tr>
                          @else
                            <tr><td><strong>Street2</strong></td><td><input type="text" name="street2"></td></tr>
                          @endif

                          @if($employement['city']) 
                            <tr><td><strong>City</strong></td><td>{{$employement['city']}}</td></tr>
                          @else
                            <tr><td><strong>Street2</strong></td><td><input type="text" name="city"></td></tr>
                          @endif

                          @if($employement['state']) 
                          <tr><td><strong>State</strong></td><td>{{$employement['state']}}</td></tr>
                          @else
                            <tr><td><strong>State</strong></td><td><input type="text" name="state"></td></tr>
                          @endif

                          @if($employement['zipcode']) 
                          <tr><td><strong>Zipcode</strong></td><td>{{$employement['zipcode']}}</td></tr>
                          @else
                            <tr><td><strong>Zipcode</strong></td><td><input type="text" name="zipcode"></td></tr>
                          @endif

                          @if($employement['country'])
                            <tr><td><strong>Country</strong></td><td>{{$employement['country']}}</td></tr>
                          @else
                            <tr><td><strong>Country</strong></td><td><input type="text" name="country"></td></tr>
                          @endif


                          @if($employement['position'])
                          <tr><td><strong>Profile</strong></td><td>{{$employement['position']}}</td></tr>
                          @else
                          <tr><td><strong>Profile</strong></td><td><input type="text" name="position"></td></tr>
                          @endif

                          @if($employement['days_available'])
                            <tr><td><strong>Days Available</strong></td><td>{{$employement['days_available']}}</td></tr>
                          @else
                            <tr><td><strong>Days Available</strong></td><td>
                              <input type="checkbox"  name="days_available[]" id="required" value="Monday"> Monday
                              <input type="checkbox" name="days_available[]" id="required" value="Tuesday"> Tuesday
                              <br>
                              <input type="checkbox" name="days_available[]" id="required" value="Wednesday"> Wednesday
                              <input type="checkbox" name="days_available[]" id="required" value="Thursday"> Thursday
                              <br>
                              <input type="checkbox" name="days_available[]" id="required" value="Friday"> Friday
                              <input type="checkbox" name="days_available[]" id="required" value="Any"> Any
                            </td></tr>
                          @endif

                          @if($employement['liecense'])
                            <tr><td><strong>License</strong></td><td>{{$employement['liecense']}}</td></tr>
                          @else
                            <tr><td><strong>License</strong></td><td><input type="text" name="liecense"></td></tr>
                          @endif

                          @if($employement['need_call'])
                            <tr><td><strong>Need Call</strong></td><td>{{$employement['need_call']}}</td></tr>
                          @else
                            <tr><td><strong>Need Call</strong></td><td>
                              <input type="radio" name="need_call" id="required" value="Yes, soonest possible">Yes, soonest possible
                              <br/>
                              <input type="radio" name="need_call" id="required" value="Yes, but NOT immediately">Yes, but NOT immediately
                              <br/>
                              <input type="radio" name="need_call" id="required" value="No">No
                              <br/>
                              <input type="radio" name="need_call" id="required" value="other">Other</td></tr>
                            @endif

                            <tr><td><input type="submit" value="Update" id="employment-update-submit"  class="btn btn-primary"></td><td></td></tr>
                        </tbody>
                        </table>
                      </div>
                    </form>
                    <!-- employemnt data end -->

                    <!-- comment section start -->
                    <div class="span4 csection">
                      <div class="comment-section">
                       <div class="comment-show">
                        @if($empcomments)
                        <ul class="comment-list">
                          @foreach( $empcomments as $empcomment)
                          <li>{{$empcomment->comment}} {{$empcomment->name?'By '.$empcomment->name:''}} {{$empcomment->created_at?'@ '.$empcomment->created_at:''}}</li>
                          @endforeach
                        </ul>
                        @endif
                      </div>

                      <input type="hidden" name="gettemplate" id="gettemplate" value="{{route('rm.template.get')}}" />

                      <form id="comment-submit" method="POST" action="{{ route('rm.emp.comment',$employement['id']) }}">
                        @csrf
                        <div class="form-group">
                            
                            <div class="col-md-12">
                                <textarea id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" required autofocus>{{ old('comment') }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group button-center">
                            <div class="commit-send col-md-2">
                                <button id="comment-submit" type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                            @if(empty($employement['future_followup_date']))
                            <div class="col-md-10" id="followup">
                              <div class="form-group">
                                    <label class="control-label">Future Followup Date</label>
                                    <div class="controls input-append date form_datetime" data-date="" data-date-format="dd-mm-yyyy - HH:ii p" data-link-field="dtp_input1">
                                        <input size="16" type="text" value="" readonly>
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                  <input name="future_followup_date" type="hidden" id="dtp_input1" value="" /><br/>
                               </div> 
                            </div>
                            @endif
                        </div>
                        
                      </form>
                    <form id="sales-submit" method="POST" action="#">
                      <input type="hidden" name="sales_send_email" id="sales_send_email" value="{{route('rm.sendsales.email')}}" />
                      <div id="sales-mail">
                        <input type="hidden" id="emp_id" name="emp_id" value="{{$employement['id']}}">
                          <div class="form-group">
                            <select name="seles_email" class="form-control" id="seles_email">
                            <option value="">Select Sales Person</option>
                              @foreach($sales as $sale)
                                <option value="{{$sale->email}}">{{$sale->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group button-center">
                              <button type="submit" name="submit" id="sales_person" class="btn btn-primary">Send Email</button>
                          </div>
                      </div>
                    </form>
                    </div>
                  </div>
                    <!-- comment section end -->
                    <!-- email section start -->
                    <div class="span4 csection send-mail">
                      @if (session('message'))
                          <div class="alert alert-success">
                              {{ session('message') }}
                          </div>
                      @endif
                      <form class="form-inline form-send" action="{{route('rm.candidate.mail')}}" method="POST">
                         
                         {{ csrf_field() }}

                         <input type="hidden" name="to" value="{{$employement['email']}}">
                         <input type="hidden" name="from" value="{{ Auth::user()->email }}">
                         <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                         <input type="hidden" id="user-id" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" readonly required>
                        </div>
                        
                        <div class="form-group">
                          <label for="name">Company Name</label>
                          <input type="text" name="company" id="company" value="ATX Learning" readonly  required>
                        </div>

                        <div class="form-group">
                          <label>Title of Job Opening</label>
                          <input type="text" name="title" value="{{$employement['position']}}"  required>
                        </div>


                        <div class="form-group">
                          <label>Template Name</label>
                          <input id="template-name" type="text" name="template_name" value="{{old('template_name')}}" {{old('template_save')?'required':''}}>
                          @if ($errors->has('template_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('template_name') }}</strong>
                            </span>
                          @endif
                        </div>


                        <div class="form-group">
                          <label for="title">Select Template:</label>
                          <select name="template" class="form-control template" id="template">
                          <option value="">Select Template</option>
                           @foreach ($templates as $key => $value)
                             <option value="{{ $value->template_name }}" {{(old('template')==$value->template_name)?'selected':''}}>{{ $value->template_name }}</option>
                           @endforeach
                          </select>
                        </div>


                        <div class="form-group">
                          <label>Message</label>
                          <textarea rows="4" cols="50" class="summernote" name="message" id="message"  required>{{old('message')}}</textarea>
                        </div>

                        <div class="form-group">
                          <input type="checkbox" id="template-save" class="template-save" name="template_save" {{old('template_save')?'checked':''}}/> Save as New Template 
                        </div>
                        
                        <div class="form-group">
                          <button type="submit" id="candidateemail" class="btn btn-primary" name="submit">Send Email</button>
                        </div>
                      </form>
                    </div>
                  <!-- email section end -->
                </div>
            </div>
        
    </div>

<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
 
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
 
<script>
        $(document).ready(function() {
            $('.summernote').summernote({
              toolbar: [['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],['color', ['color']],['para', ['ul']],]
              });
        });
</script>
<script>
  $(document).ready(function(){
    
    $('#template-save').click(function(){
      if($('#template-save').is(':checked')){
        $('#template-name').attr('required',true);
      } else{
        $('#template-name').attr('required',false);
      }
    });
    
    $( "#template" ).change(function() {
        $.ajax({
          type: "POST",
          url: $('#gettemplate').val(),
          data:'user_id='+$('#user-id').val()+'&template_name='+$('#template').val(),
          headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
          success: function(data){
            $('.summernote').text(data.message);
            $('.note-editable').text(data.message);
          }
          });
      });

    $('#sales_person').click(function(e){
        e.preventDefault();
        
        if( !$('#seles_email').val() ) {  
            $('<div id="alertmessage"><div class="alert alert-danger">Please Select Sales Person</div></div>').insertAfter("#seles_email");
        } else{
          $('#alertmessage').remove();
          $.ajax({
            type: "POST",
            url: $('#sales_send_email').val(),
            data:'emp_id='+$('#emp_id').val()+'&seles_email='+$('#seles_email').val(),
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
            success: function(data){
              if(data.success){
                $('<div class="alert alert-success">'+data.success+'</div>').insertAfter("#sales_person");
              }
              if(data.error){
                $('<div class="alert alert-danger">'+data.error+'</div>').insertAfter("#sales_person");
              }
            }
          });
        }

    });

    $('#employment-update-submit').click(function(e){
      e.preventDefault();
      $.ajax({
            type: "POST",
            url: $("#employment_update").attr('action'),
            data:$("#employment_update").serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
            success: function(data){
              location.reload();
            }
          });

    });

    $('#atxemployee-submit').click(function(e){
      e.preventDefault();
      $.ajax({
            type: "POST",
            url: $("#atxemployee").attr('action'),
            data:$("#atxemployee").serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
            success: function(data){
              location.reload();
            }
          });

    });

    $('#nonatxemployee-submit').click(function(e){
      e.preventDefault();
      $.ajax({
            type: "POST",
            url: $("#nonatxemployee").attr('action'),
            data:$("#nonatxemployee").serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
            success: function(data){
              location.reload();
            }
          });

    });


    $('#dnd-submit').click(function(e){
      e.preventDefault();
      $.ajax({
            type: "POST",
            url: $("#dnd-form").attr('action'),
            data:$("#dnd-form").serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
            success: function(data){
              location.reload();
            }
          });

    });

    $('#nondnd-submit').click(function(e){
      e.preventDefault();
      $.ajax({
            type: "POST",
            url: $("#nondnd-form").attr('action'),
            data:$("#nondnd-form").serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
            success: function(data){
              location.reload();
            }
          });

    });

    

    $('#update-required').click(function(e){
      e.preventDefault();
      
      $.ajax({
            type: "POST",
            url: $("#update-required").attr('data-action'),
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
            success: function(data){
                location.reload();
            }
      });

    });

  });
</script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
  $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
    });
</script>

@endsection

