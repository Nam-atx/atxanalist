@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">Employer detail
                      @if($employement['dnd']==0)
                       <form action="{{route('emp.dnd')}}"  method="POST">
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
                  <div class="row">
                    <div class="col-md-6">

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
                    <div class="col-md-6">
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
                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <textarea id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" required autofocus>{{ old('comment') }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-10">
                                <button id="comment-submit" type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                            </div></div>
                        <div>
                        </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

