@extends('sales.layouts.app')

@section('content')

 <ul class="pager">
    <li class="previous"><a href="{{$previous}}?position={{app('request')->input('position')}}&city={{app('request')->input('city')}}&state={{app('request')->input('state')}}&radius={{app('request')->input('radius')}}&email={{app('request')->input('email')}}&from_date={{app('request')->input('from_date')}}&to_date={{app('request')->input('to_date')}}">< Previous</a></li>
    <li class="next"><a href="{{$next}}?position={{app('request')->input('position')}}&city={{app('request')->input('city')}}&state={{app('request')->input('state')}}&radius={{app('request')->input('radius')}}&email={{app('request')->input('email')}}&from_date={{app('request')->input('from_date')}}&to_date={{app('request')->input('to_date')}}">Next ></a></li>
  </ul>
    <div class="row justify-content-center">
            <div class="card ">
                <div class="card-header col-md-12">

                  <span class="col-md-4 candidate-detail-head">Candidate Details</span>
                  <!--<div class="col-md-2">
                      @if($employement['atxemployee']==0)
                       <form id="atxemployee" class="atxemployee-form" action="{{route('emp.atxemployee')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <button type="submit" name="submit" id="atxemployee-submit" >Employee</button>
                       </form>
                       @else

                       <form id="nonatxemployee" class="atxemployee-form" action="{{route('emp.nonatxemployee')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <span>{{ \Carbon\Carbon::parse($employement['atxemployee_date'])->format('F d, Y') }}</span>
                        <button type="submit" name="submit" style="color: white;background: green;border-radius: 20px;" id="nonatxemployee-submit">Remove Employee</button>
                       </form>

                       @endif
                  </div>-->

    
                  <!--<div class="col-md-2">
                      @if($employement['atxavailable']==0)
                       <form id="atxavailable" class="atxemployee-form" action="{{route('emp.atxavailable')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <button type="submit" name="submit" id="atxavailable-submit" >Lead</button>
                       </form>
                       @else

                       <form id="nonatxavailable" class="atxemployee-form" action="{{route('emp.nonatxavailable')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <span>{{ \Carbon\Carbon::parse($employement['atxemployee_date'])->format('F d, Y') }}</span>
                        <button type="submit" name="submit" style="color: white;background: green;border-radius: 20px;" id="nonatxavailable-submit">Remove Lead</button>
                       </form>

                       @endif
                  </div>-->  


                  <!--<div class="col-md-2">
                    @if(empty($employement['update_required']))
                      <input name="update_required" type="checkbox" id="update-required" data-action="{{route('emp.updaterequired',$employement['id'])}}"> Update Required
                    @endif
                  </div>
                  <div class="col-md-2">
                      @if($employement['dnd']==0)
                       <form id="dnd-form" class="dnd-form" action="{{route('emp.dnd')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <button type="submit" name="submit" id="dnd-submit" >DND</button>
                       </form>
                       @else

                       <form id="nondnd-form" class="dnd-form" action="{{route('emp.nondnd')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <span>{{ \Carbon\Carbon::parse($employement['dnd_date'])->format('F d, Y') }}</span>
                        <button type="submit" name="submit" style="color: white;background: red;border-radius: 20px;" id="nondnd-submit">Remove DND</button>
                       </form>

                       @endif
                  </div>-->
                </div>
                
                <div class="card-body1">
                  <!-- employemnt data start -->
                    
                      <div class="span4 csection2">
                        <table class="table">
                        <tbody>                         
                          <tr><td><strong>Title</strong></td><td>{{$employement['title']}}</td></tr>

                          <tr><td><strong>First Name</strong></td><td>{{$employement['first_name']}}</td></tr>
                          
                          <tr><td><strong>Last Name</strong></td><td>{{$employement['last_name']}}</td></tr>
                                                 
                          <tr><td><strong>Email</strong></td><td>{{$employement['email']}}</td></tr>                        
                          <tr><td><strong>Phone</strong></td><td>{{$employement['phone']}}</td></tr>
                          
                          <tr><td><strong>Cell Number</strong></td><td>{{$employement['cell_number']}}</td></tr>
                                                  
                          <tr><td><strong>Best Time To Call</strong></td><td>{{$employement['best_time_to_call']}}</td></tr>                          
                                             
                          <tr><td><strong>Street1</strong></td><td>{{$employement['street1']}}</td></tr>                         
                          <tr><td><strong>Street2</strong></td><td>{{$employement['street2']}}</td></tr>
                        
                          <tr><td><strong>City</strong></td><td>{{$employement['city']}}</td></tr>
                                                   
                          <tr><td><strong>State</strong></td><td>{{$employement['state']}}</td></tr>
                                                   
                          <tr><td><strong>Zipcode</strong></td><td>{{$employement['zipcode']}}</td></tr>
                                                   
                          <tr><td><strong>Country</strong></td><td>{{$employement['country']}}</td></tr>
                                                   
                          <tr><td><strong>Profile</strong></td><td>{{$employement['position']}}</td></tr>
                                                   
                          <tr><td><strong>Days Available</strong></td><td>{{$employement['days_available']}}</td></tr>
                                                   
                          <tr><td><strong>License</strong></td><td>{{$employement['liecense']}}</td></tr>
                                                   
                          <tr><td><strong>Need Call</strong></td><td>{{$employement['need_call']}}</td></tr>
                                                     
                          <tr><td><strong>Source</strong></td><td>{{$employement['source']}}</td></tr>
                                                   
                        </tbody>
                        </table>
                      </div>
                    
                    <!-- employemnt data end -->

                    <!-- comment section start -->
                    <div class="span4 csection2">
                      <div class="comment-section">
                       <div class="comment-show">
                        @if($empcomments)
                        <ul class="comment-list">
                          @foreach($empcomments as $empcomment)
                          <li>{{$empcomment->comment}} {{$empcomment->name?'By '.$empcomment->name:''}} {{$empcomment->created_at?'@ '.$empcomment->created_at:''}}</li>
                          @endforeach
                        </ul>
                        @endif
                      </div>

                      <!--<input type="hidden" name="gettemplate" id="gettemplate" value="{{route('template.get')}}" />-->

                      <form id="comment-submit" method="POST" action="{{ route('client.emp.comment',$employement['id']) }}">
                        @csrf
                        <div class="form-group">
                            
                            <div class="col-md-12">
                                <textarea id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" placeholder="Comment Here.." required autofocus>{{ old('comment') }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group button-center">
                            <div class="commit-send col-md-1">
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
                    <!--<form id="sales-submit" method="POST" action="#">
                      <input type="hidden" name="sales_send_email" id="sales_send_email" value="{{route('sendsales.email')}}" />
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
                    </form>-->
                    </div>
                  </div>

                    <!-- comment section end -->
                    <!-- email section start -->
                    

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

    $('#candidateemail').click(function(){
        if($('.summernote').summernote('isEmpty')) {
            $('.help-block').html('Message field should not be empty.');                
        }
        else{
          $('.help-block').html('');
        }  
    });
    
    $( "#template" ).change(function() {
        $.ajax({
          type: "POST",
          url: $('#gettemplate').val(),
          data:'user_id='+$('#user-id').val()+'&template_name='+$('#template').val(),
          headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
          success: function(data){
            if(data.message){ 
                $('.summernote').text(data.message);
                $('.note-editable').text(data.message);
                $('#template-name').val(data.template_name);
            }
            else{
                $('.summernote').text('');
                $('.note-editable').text('');
                $('#template-name').val('');
            }
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

