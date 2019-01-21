@extends('layouts.app')

@section('content')

 <ul class="pager">
    <li class="previous"><a href="{{$previous}}">< Previous</a></li>
    <li class="next"><a href="{{$next}}">Next ></a></li>
  </ul>
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header col-md-12">
                  <span class="col-md-4 candidate-detail-head">Client Details</span>
                  <!--<div class="col-md-2">
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
                  </div>-->
  
                  <!-- Start added by basheer -->
                  <!--<div class="col-md-2">
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
                  </div>-->
                  <!-- End -->

                  <!--<div class="col-md-2">
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
                  </div>-->
                
              </div>
                
                <div class="card-body1">
                  <!-- employemnt data start -->
                  
                    <div class="span4 csection2">
                      <table class="table">
                      <tbody>
                        
                        <tr><td><strong>School/District</strong></td><td>{{$client['name']}}</td></tr>

                        <tr><td colspan=2 style="padding:0px !important;"><div style="border:1px solid #c3c3c3;"></div></td></tr>
                        
                        <tr><td><strong>Start Date</strong></td><td>{{$client['start_date']}}</td></tr>                                      
                        <tr><td><strong>Portal</strong></td><td>{{$client['portal']}}</td></tr>
                                               
                        <tr><td><strong>Profile</strong></td><td>{{$client['profile']}}</td></tr>
                                               
                        <tr><td><strong>Subject</strong></td><td>{{$client['subject']}}</td></tr>
                                              
                        <tr><td><strong>Weblink</strong></td><td><a target="_blank" href="{{$client['weblink']}}">{{$client['weblink']}}</a></td></tr>                                      

                        <tr><td colspan=2 style="padding:0px !important;"><div style="border:1px solid #c3c3c3;"></div></td></tr>                                                          
                       
                        <tr><td><strong>City</strong></td><td>{{$client['city']}}</td></tr>                     
                       
                        <tr><td><strong>State</strong></td><td>{{$client['state']}}</td></tr>                                               
                        <tr><td><strong>Zipcode</strong></td><td>{{$client['zipcode']}}</td></tr>
                                                
                        <tr><td><strong>Requirement</strong></td><td>{{$client['requirement']}}</td></tr>
                                                
                      </tbody>
                      </table>
                    </div>
                    
                    <!-- employemnt data end -->

                    <!-- comment section start -->
                    <div class="span4 csection2">
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

                      <form id="salescomment-submit" method="POST" action="{{ route('emp.client.comment',$client['id']) }}">
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
                    <!--<form id="sales-submit" method="POST" action="#">
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

