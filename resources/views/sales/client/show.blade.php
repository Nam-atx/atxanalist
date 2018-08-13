@extends('sales.layouts.app')

@section('content')

 
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Client detail
                      {{-- @if($client['dnd']==0)
                       <form class="dnd-form" action="{{route('emp.dnd')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <button type="submit" name="submit" >DND</button>
                       </form>
                       @else
                       <form action="{{route('emp.nondnd')}}"  method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="emp_id" value="{{$employement['id']}}">
                        <button type="submit" name="submit" >NON DND</button>
                       </form>
                       @endif
                       --}}
                </div>
                
                <div class="card-body1">
                  <!-- employemnt data start -->
                    <div class="span4 csection">
                      <table class="table">
                      <tbody>
                        <tr><td><strong>Name</strong></td><td>{{$client['name']}}</td></tr>
                        <tr><td><strong>Contact</strong></td><td>{{$client['contact']}}</td></tr>
                        <tr><td><strong>Phone</strong></td><td>{{$client['phone']}}</td></tr>
                        <tr><td><strong>Fax</strong></td><td>{{$client['fax']}}</td></tr>
                        <tr><td><strong>Email</strong></td><td>{{$client['email']}}</td></tr>
                        <tr><td><strong>City</strong></td><td>{{$client['city']}}</td></tr>
                        <tr><td><strong>State</strong></td><td>{{$client['state']}}</td></tr>
                        <tr><td><strong>Zipcode</strong></td><td>{{$client['zipcode']}}</td></tr>
                        <tr><td><strong>Requirement</strong></td><td>{{$client['requirement']}}</td></tr>
                      </tbody>
                      </table>
                    </div>
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

                      <input type="hidden" name="gettemplate" id="gettemplate" value="{{route('template.get')}}" />

                      <form id="comment-submit" method="POST" action="{{ route('client.comment',$client['id']) }}">
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

                        <div class="form-group mb-0  button-center">
                            <div class="commit-send">
                                <button id="comment-submit" type="submit" class="btn btn-primary">{{ __('Send') }}</button>
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
                      <form class="form-inline form-send" action="{{route('candidate.mail')}}" method="POST">
                         
                         {{ csrf_field() }}

                         <input type="hidden" name="to" value="{{$client['email']}}">
                         <input type="hidden" name="from" value="{{ Auth::user()->email }}">
                         <input type="hidden" name="emp_id" value="{{$client['id']}}">
                         <input type="hidden" id="user-id" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" readonly required>
                        </div>
                        
                        <div class="form-group">
                          <label for="name">Company Name</label>
                          <input type="text" name="company" id="company" value="{{old('company')}}"  required>
                        </div>

                        <div class="form-group">
                          <label>Title of Job Opening</label>
                          <input type="text" name="title" value="{{$client['position']}}"  required>
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

  });
</script>

@endsection

