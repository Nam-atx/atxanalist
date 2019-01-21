@extends('sales.layouts.app')

@section('content')

 <ul class="pager">
    <li class="previous"><a href="{{$previous}}?schstatus={{app('request')->input('schstatus')}}">< Previous</a></li>
    <li class="next"><a href="{{$next}}?schstatus={{app('request')->input('schstatus')}}">Next ></a></li>
  </ul>
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header col-md-12">
                  <span class="col-md-4 candidate-detail-head">Client details</span>
                  <div class="col-md-2">
                      @if($client['atxclient']==0)
                       <form id="atxclient" class="atxclient-form" action="{{route('sales.client.atxclient')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="client_id" value="{{$client['id']}}">
                        <button type="submit" name="submit" id="atxclient-submit" >Client</button>
                       </form>
                       @else

                       <form id="nonatxclient" class="atxclient-form" action="{{route('sales.client.nonatxclient')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="client_id" value="{{$client['id']}}">
                        <span>{{ \Carbon\Carbon::parse($client['atxclient_date'])->format('F d, Y') }}</span>
                        <button type="submit" name="submit" style="color: white;background: green;border-radius: 20px;" id="nonatxclient-submit">Remove Client</button>
                       </form>

                       @endif
                  </div>
  
                  <!-- Start added by basheer -->
                  <div class="col-md-2">
                      @if($client['atxlead']==0)
                       <form id="atxlead" class="atxclient-form" action="{{route('sales.client.atxlead')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="client_id" value="{{$client['id']}}">
                        <button type="submit" name="submit" id="atxlead-submit" >Lead</button>
                       </form>
                       @else

                       <form id="nonatxlead" class="atxclient-form" action="{{route('sales.client.nonatxlead')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="client_id" value="{{$client['id']}}">
                        <span>{{ \Carbon\Carbon::parse($client['atxlead_date'])->format('F d, Y') }}</span>
                        <button type="submit" name="submit" style="color: white;background: green;border-radius: 20px;" id="nonaatxlead-submit">Remove Lead</button>
                       </form>

                       @endif
                  </div>
                  <!-- End -->

                  <div class="col-md-2">
                    @if(empty($client['update_required']))
                      <input name="update_required" type="checkbox" id="update-required" data-action="{{route('sales.client.updaterequired',$client['id'])}}"> Update Required
                    @endif
                  </div>
                  <div class="col-md-2">
                      @if($client['dnd']==0)
                       
                       <form id="dnd-form" class="dnd-form" action="{{route('sales.client.dnd')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="client_id" value="{{$client['id']}}">
                        <button type="submit" name="submit" id="dnd-submit" >DND</button>
                       </form>
                       @else
                       <form id="nondnd-form" class="dnd-form" action="{{route('sales.client.nondnd')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="client_id" value="{{$client['id']}}">
                        <span>{{ \Carbon\Carbon::parse($client['dnd_date'])->format('F d, Y') }}</span>
                        <button type="submit" name="submit" style="color: white;background: red;border-radius: 20px;" id="nondnd-submit">Remove DND</button>
                       </form>

                       @endif
                  </div>
                
              </div>
                
                <div class="card-body1">
                  <!-- employemnt data start -->
                  <form id="client_update" action="{{route('sales.client.clientupdate',$client['id'])}}" name="client_update" method="POST">
                    {{ csrf_field() }}
                    <div class="span4 csection">
                      <table class="table">
                      <tbody>
                        @if($client['name'])
                        <tr><td><strong>School/District</strong></td><td>{{$client['name']}}</td></tr>
                        @else
                        <tr><td><strong>School/District</strong></td><td><input type="text" name="name" class="form-control"></td></tr>
                        @endif

                        @if($client['contact'])
                        <tr><td><strong>Contact 1</strong></td><td>{{$client['contact']}}</td></tr>
                        @else
                        <tr><td><strong>Contact 1</strong></td><td><input type="text" name="contact" class="form-control"></td></tr>
                        @endif

                        @if($client['designation'])
                        <tr><td><strong>Designation</strong></td><td>{{$client['designation']}}</td></tr>
                        @else
                        <tr><td><strong>Designation</strong></td><td><input type="text" name="designation" class="form-control"></td></tr>
                        @endif

                        @if($client['phone'])
                        <tr><td><strong>Phone</strong></td><td>{{$client['phone']}}</td></tr>
                        @else
                        <tr><td><strong>Phone</strong></td><td><input type="text" name="phone" class="form-control"></td></tr>
                        @endif

                        @if($client['email'])
                        <tr><td><strong>Email</strong></td><td>{{$client['email']}}</td></tr>
                        @else
                        <tr><td><strong>Email</strong></td><td><input type="email" name="email" class="form-control"></td></tr>
                        @endif

                        <tr><td colspan=2 style="padding:0px !important;"><div style="border:1px solid #c3c3c3;"></div></td></tr>
                        @if($client['contact_1'])
                        <tr><td><strong>Contact 2</strong></td><td>{{$client['contact_1']}}</td></tr>
                        @else
                        <tr><td><strong>Contact 2</strong></td><td><input type="text" name="contact_1" class="form-control"></td></tr>
                        @endif
                        @if($client['designation_1'])
                        <tr><td><strong>Designation</strong></td><td>{{$client['designation_1']}}</td></tr>
                        @else
                        <tr><td><strong>Designation</strong></td><td><input type="text" name="designation_1" class="form-control"></td></tr>
                        @endif

                        @if($client['phone_1'])
                        <tr><td><strong>Phone</strong></td><td>{{$client['phone_1']}}</td></tr>
                        @else
                        <tr><td><strong>Phone</strong></td><td><input type="text" name="phone_1" class="form-control"></td></tr>
                        @endif

                        @if($client['email_1'])
                        <tr><td><strong>Email</strong></td><td>{{$client['email_1']}}</td></tr>
                        @else
                        <tr><td><strong>Email</strong></td><td><input type="text" name="email_1" class="form-control"></td></tr>
                        @endif

                        <tr><td colspan=2 style="padding:0px !important;"><div style="border:1px solid #c3c3c3;"></div></td></tr>
                        
                        @if($client['contact_2'])
                        <tr><td><strong>Contact 3</strong></td><td>{{$client['contact_2']}}</td></tr>
                        @else
                        <tr><td><strong>Contact 3</strong></td><td><input type="text" name="contact_2" class="form-control"></td></tr>
                        @endif

                        @if($client['designation_2'])
                        <tr><td><strong>Designation</strong></td><td>{{$client['designation_2']}}</td></tr>
                        @else
                        <tr><td><strong>Designation</strong></td><td><input type="text" name="designation_2" class="form-control"></td></tr>
                        @endif

                        @if($client['phone_2'])
                        <tr><td><strong>Phone</strong></td><td>{{$client['phone_2']}}</td></tr>
                        @else
                        <tr><td><strong>Phone</strong></td><td><input type="text" name="phone_2" class="form-control"></td></tr>
                        @endif

                        @if($client['email_2'])
                        <tr><td><strong>Email</strong></td><td>{{$client['email_2']}}</td></tr>
                        @else
                        <tr><td><strong>Email</strong></td><td><input type="text" name="email_2" class="form-control"></td></tr>
                        @endif

                        <tr><td colspan=2 style="padding:0px !important;"><div style="border:1px solid #c3c3c3;"></div></td></tr>

                        @if($client['start_date'])
                        <tr><td><strong>Start Date</strong></td><td>{{$client['start_date']}}</td></tr>
                        @else
                        <tr><td><strong>Start Date</strong></td><td><input type="date" name="start_date" class="form-control" ></td></tr>
                        @endif


                        @if($client['portal'])
                        <tr><td><strong>Portal</strong></td><td>{{$client['portal']}}</td></tr>
                        @else
                        <tr><td><strong>Portal</strong></td><td>
                          <select id="portal" name="portal" class="form-control">
                            <option value="">-- select --</option>
                            <option value="School Spring">School Spring</option>
                            <option value="K12 Job Spot">K12 Job Spot</option>
                            <option value="US Reap">US Reap</option>
                            <option value="TASA">TASA</option>
                            <option value="ED Join">ED Join</option>
                            <option value="Teachers-Teachers">Teachers-Teachers</option>
                            <option value="NJ Hire">NJ Hire</option>
                            <option value="NJ School Job">NJ School Job</option>
                            <option value="Indeed">Indeed</option>
                            <option value="Top School">Top School</option>
                            <option value="IL Jobs Banks">IL Jobs Banks</option>
                          </select>
                        </td></tr>
                        @endif


                        @if($client['profile'])
                        <tr><td><strong>Profile</strong></td><td>{{$client['profile']}}</td></tr>
                        @else
                        <tr><td><strong>Profile</strong></td><td>
                          <select id="profile" name="profile" class="form-control">
                            <option value="">-- select --</option>
                            <option value="SLP">SLP</option>
                            <option value="SLP-A">SLP-A</option>
                            <option value="SLP">SLP</option>
                            <option value="Psych">Psych</option>
                            <option value="SET">SET</option>
                            <option value="SET-A">SET-A</option>
                            <option value="RSP">RSP</option>
                            <option value="Para-Pro">Para-Pro</option>
                            <option value="SN">SN</option>
                            <option value="PT">PT</option>
                            <option value="PTA">PTA</option>
                            <option value="OT">OT</option>
                            <option value="COTA">COTA</option>
                            <option value="SW">SW</option>
                          </select>
                        </td></tr>
                        @endif


                        @if($client['subject'])
                        <tr><td><strong>Subject</strong></td><td>{{$client['subject']}}</td></tr>
                        @else
                        <tr><td><strong>Subject</strong></td><td><input type="text" name="subject" class="form-control"></td></tr>
                        @endif

                        @if($client['weblink'])
                        <tr><td><strong>Weblink</strong></td><td><a target="_blank" href="{{$client['weblink']}}">{{$client['weblink']}}</a></td></tr>
                        @else
                        <tr><td><strong>Weblink</strong></td><td><input type="text" name="weblink" class="form-control"></td></tr>
                        @endif                        

                        <tr><td colspan=2 style="padding:0px !important;"><div style="border:1px solid #c3c3c3;"></div></td></tr>

                        @if($client['fax'])
                        <tr><td><strong>Fax</strong></td><td>{{$client['fax']}}</td></tr>
                        @else 
                        <tr><td><strong>Fax</strong></td><td><input type="text" name="fax" class="form-control"></td></tr>
                        @endif

                        @if($client['city'])
                        <tr><td><strong>City</strong></td><td>{{$client['city']}}</td></tr>
                        @else
                        <tr><td><strong>City</strong></td><td><input type="text" name="city" class="form-control"></td></tr>
                        @endif

                        @if($client['state'])
                        <tr><td><strong>State</strong></td><td>{{$client['state']}}</td></tr>
                        @else
                        <tr><td><strong>State</strong></td><td><input type="text" name="state" class="form-control"></td></tr>
                        @endif

                        @if($client['zipcode'])
                        <tr><td><strong>Zipcode</strong></td><td>{{$client['zipcode']}}</td></tr>
                        @else
                        <tr><td><strong>Zipcode</strong></td><td><input type="text" name="zipcode" class="form-control"></td></tr>
                        @endif

                        @if($client['requirement'])
                        <tr><td><strong>Requirement</strong></td><td>{{$client['requirement']}}</td></tr>
                        @else
                        <tr><td><strong>Requirement</strong></td><td><textarea name="requirement" class="form-control"></textarea></td></tr>
                        @endif

                        <tr><td><input type="submit" value="Update" id="client-update-submit"  class="btn btn-primary"></td><td></td></tr>
                      </tbody>
                      </table>
                    </div>
                    </form>
                    <!-- employemnt data end -->

                    <!-- comment section start -->
                    <div class="span4 csection">
                      <div class="comment-section">
                       <div class="comment-show">
                        @if($clientcomments)
                        <ul class="comment-list">
                          @foreach( $clientcomments as $clientcomment)
                          <li>{{$clientcomment->comment}} {{$clientcomment->name?'By '.$clientcomment->name:''}} {{$clientcomment->created_at?'@ '.$clientcomment->created_at:''}}</li>
                          @endforeach
                        </ul>
                        @endif
                      </div>

                      <input type="hidden" name="gettemplate" id="gettemplate" value="{{route('salestemplate.get')}}" />

                      <form id="salescomment-submit" method="POST" action="{{ route('client.comment',$client['id']) }}">
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
                          <div class="col-md-12">
                            <input type="radio" name="status" id="status" class="status" value="1"> Yes 
                            <input id="status"  class="status" type="radio" name="status" value="0"> No
                          </div>
                        </div>

                        @if(empty($client['followup_date']))
                            <div class="col-md-12" id="followup">
                              <div class="form-group">
                                    <label class="control-label">Future Followup Date</label>
                                    <div class="controls input-append date form_datetime" data-date="" data-date-format="dd-mm-yyyy - HH:ii p" data-link-field="dtp_input1">
                                        <input size="16" type="text" value="" readonly>
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                  <input name="followup_date" type="hidden" id="dtp_input1" value="" /><br/>
                               </div> 
                            </div>
                            @endif

                        <div class="form-group mb-0  button-center">
                            <div class="commit-send">
                                <input name="type" value="mail" id="mail-submit" type="submit" class="btn btn-primary">
                                <input name="type"  value="voice"  id="voice-submit" type="submit" class="btn btn-primary">
                            </div>
                            
                        </div>
                            
                      </form>
                    <form id="sales-submit" method="POST" action="#">
                      <input type="hidden" name="sales_send_email" id="sales_send_email" value="{{route('sendsales.email')}}" />
                      <div id="sales-mail">
                        <input type="hidden" id="emp_id" name="emp_id" value="{{$client['id']}}">
                          <div class="form-group">
                            <select name="seles_email" class="form-control" id="seles_email">
                            <option value="">Select Sales Person</option>
                              @foreach($sales as $sale)
                                <option value="{{$sale->email}}">{{$sale->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group button-center">
                              <button type="submit" name="submit" id="sales_person" class="btn btn-primary">Send mail to Sales Person</button>
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

                      @if (session('error'))
                          <div class="alert alert-danger">
                              {{ session('error') }}
                          </div>
                      @endif
                      <form class="form-inline form-send" enctype="multipart/form-data" action="{{route('salestoclient.mail')}}" method="POST">
                         
                         {{ csrf_field() }}

                         <!--<input type="hidden" name="to" value="{{$client['email']}}">-->
                         <input type="hidden" name="reply_to" value="{{ Auth::user()->email }}">
                         <input type="hidden" name="client_id" value="{{$client['id']}}">
                         <input type="hidden" id="user-id" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" readonly required>
                        </div>
                        
                        <div class="form-group">
                          <label for="name">Company Name</label>
                          <input type="text" name="company" id="company" value="ATX Learning"  required readonly>
                        </div>

                        <div class="form-group">
                          <label>Client Name</label>
                          <input type="text" name="name" value="{{$client['name']}}"  required>
                        </div>
                            

                        <div class="form-group">
                          <label for="title">Client Email:</label>
                          <select name="to" class="form-control template" id="toemail" required>
                          <option value="">Select Email</option>
                          
                             <option value="{{$client['email']}}">{{$client['email']}}</option>
                             <option value="{{$client['email_1']}}">{{$client['email_1']}}</option>
                             <option value="{{$client['email_2']}}">{{$client['email_2']}}</option>
                          
                          </select>
                        </div>    

                        <div class="form-group">
                          <label>Template Name</label>
                          <input id="template-name" type="text" name="template_name" value="{{ isset($latestTemplate['template_name']) ? $latestTemplate['template_name'] : old('template_name') }}" {{old('template_save') ? required : ''}} required >
                          @if($errors->has('template_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('template_name') }}</strong>
                            </span>
                          @endif
                        </div>


                        <div class="form-group">
                          <label for="title">Select Template:</label>
                          <select name="template" class="form-control template" id="template">
                          <option value="">Select Template</option>
                           @foreach($templates as $key => $value)
                             <option value="{{ $value->template_name }}" {{($latestTemplate['template_name']==$value->template_name)?'selected':''}} {{(old('template')==$value->template_name)?'selected':''}}>{{ $value->template_name }}</option>
                           @endforeach
                          </select>
                        </div>

                         <div class="form-group">
                          <label>Subject</label>
                          <input type="text" name="mail_subject" value="{{old('mail_subject')}}"  required>
                          @if ($errors->has('mail_subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mail_subject') }}</strong>
                            </span>
                          @endif
                        </div>   

                        <div class="form-group">
                          <label>Message</label>
                          <textarea rows="4" cols="50" name="message" id="message" class="summernote" required >{{ isset($latestTemplate['message']) ? $latestTemplate['message'] : old('message') }}</textarea>
                          <div class="help-block alert-danger"></div>
                        </div>

                        <div class="form-group">
                          <input type="checkbox" id="template-save" class="template-save" name="template_save" {{old('template_save')?'checked':''}}/> Save as New Template 
                        </div>
                        
                        <div class="form-group">
                          <button type="submit" id="salestoclientemail" class="btn btn-primary" name="submit">Send Email</button>
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

    // $(".status").click(function(){
    //   $(this).attr('checked');
    // });


    


    $('#atxclient-submit').click(function(e){
      e.preventDefault();
      
      $.ajax({
            type: "POST",
            url: $("#atxclient").attr('action'),
            data:$("#atxclient").serialize(),
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
            success: function(data){
              location.reload();
            }
          });

    });

    $('#nonatxclient-submit').click(function(e){
      e.preventDefault();
      $.ajax({
            type: "POST",
            url: $("#nonatxclient").attr('action'),
            data:$("#nonatxclient").serialize(),
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

    $('#template-save').click(function(){
      if($('#template-save').is(':checked')){
        $('#template-name').attr('required',true);
      } else{
        $('#template-name').attr('required',false);
      }
    });

    $('#salestoclientemail').click(function(){
        if($('.summernote').summernote('isEmpty')) {
            $('.help-block').html('Message field should not be empty.');                
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

