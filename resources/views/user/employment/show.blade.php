@extends('layouts.app')

@section('content')

 
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Employer detail
                      @if($employement['dnd']==0)
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

                </div>
                
                <div class="card-body1">
                  
                    <div class="span4 csection">
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
                        <tr><td><strong>Position</strong></td><td>{{$employement['position']}}</td></tr>
                        <tr><td><strong>Days Available</strong></td><td>{{$employement['days_available']}}</td></tr>
                        <tr><td><strong>License</strong></td><td>{{$employement['liecense']}}</td></tr>
                        <tr><td><strong>Need Call</strong></td><td>{{$employement['need_call']}}</td></tr>
                      </tbody>
                      </table>
                    </div>
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
                      <form id="comment-submit" method="POST" action="{{ route('emp.comment',$employement['id']) }}">
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

                        <div class="form-group mb-0">
                            <div class="col-md-2 offset-md-10 commit-send">
                                <button id="comment-submit" type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                            </div></div>
                            
                      </form>

                    <div class="form-group">
                      <select class="form-control" id="userd">
                      <option value="">Select</option>
                      @foreach($userdata as $users)
                      <option value="{{$users->email}}">{{$users->name}}</option>
                      @endforeach

                      </select>
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-primary">Send details to Sales Person</button>
                    </div>
                    </div>
                    </div>
                    <div class="span4 csection">
                      <form class="form-inline form-send" action="{{route('send.mail')}}" method="POST">
                         {{ csrf_field() }}
                        Your name<br>
                        <input type="text" name="name" value="{{ Auth::user()->name }}"><br>
                        To<br>
                        <input type="text" name="to" value="{{$employement['email']}}" style="width:300px"><br>
                        From<br>
                        <input type="text" name="email" value="{{ Auth::user()->email }}" style="width:300px"><br>

                            <label for="title">Select Template:</label>
                            <select name="template" class="form-control" style="width:350px">
                                <option value="">Select Template</option>
                              {{-- 
                               @foreach ($templates as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                                --}}
                            </select>
                            <label for="title">Select Message:</label>
                            <select name="message" class="form-control" style="width:350px">
                            </select>
                      
              
                        Message templates<br>
                        <input type="text" name="messagetemplates" ><br>
                        Message<br>
                        <textarea rows="4" cols="50" name="message" ></textarea><br>
                        Title of Job Opening<br>
                        <input type="text" name="titleofjob" value="{{$employement['position']}}" style="width:300px"><br>
                        <br> 
                        <button type="submit" name="submit" >Send Email</button>
                       
                      </form>
                            

                    </div>
                  
                </div>
            </div>
        
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#userd").on('change',function(){
      var email=$(this).val();
      if(email!=''){
      $.ajax({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url:'/sendmailtouser',
        type:'post',
        data: {
              Title: $('#title').text(),
              FirstName: $('#fname').text(),
              LastName: $('#lname').text(),
              Email: $('#email').text(),
              SendTo:email,
              },        
         success: function(res){
           if(res==true){
             alert('Mail sent successfully.');
           }else{
             alert('Sorry Try again.');
           }
         }     
      });
      }



    });
});
</script>

<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="template"]').on('change', function() {
            var templateID = $(this).val();
            if(templateID) {
                $.ajax({
                    url: '/myform/ajax/'+templateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="message"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="message"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="message"]').empty();
            }
        });
    });
</script>