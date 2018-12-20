@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Logs</div>
                <div class="card-body1">
                  @if (session('message'))
                      <div class="alert alert-success">
                          {{ session('message') }}
                      </div>
                  @endif 
                  <form class="form-inline" action="{{route('user.employment.loginhistory')}}">
                    <div class="form-group">
                      <input class="form-control" type="text" name="name" placeholder="Name" value="{{ app('request')->input('name') }}">
                    </div>

                    <div class="form-group">
                      <input class="form-control" type="text" name="type" placeholder="Type" value="{{ app('request')->input('type') }}">
                    </div> 

                    <div class="form-group">
                      <input type="text" class="form-control" name="ip" placeholder="Ip Address"  value="{{ app('request')->input('ip') }}"> 
                    </div> 
                    

                    <div class="form-group">
                      <input class="form-control" type="date" name="from_date" placeholder="From Date" value="{{ app('request')->input('from_date') }}">
                    </div> 
                    <div class="form-group">
                      <input class="form-control" type="date" name="to_date" placeholder="To Date" value="{{ app('request')->input('to_date') }}">
                    </div> 

                    <div class="form-group">
                      <select class="form-control" name="limit" placeholder="Limit">
                        <option value=""> select limit</option>
                        <option value="10" {{ (app('request')->input('limit')==10)?'selected':'' }}>10</option>
                        <option value="20" {{ (app('request')->input('limit')==20)?'selected':'' }}>20</option>
                        <option value="50" {{ (app('request')->input('limit')==50)?'selected':'' }}>50</option>
                        <option value="100" {{ (app('request')->input('limit')==100)?'selected':'' }}>100</option>
                        
                      </select>
                    </div> 

                     <div class="form-group"> <button class="btn btn-primary" type="submit">Filter</button></div>
                  </form>
                  <form action="{{route('user.employment.loginhistory')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
                  </form>
                
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Type</th>
                          <th scope="col">Comment</th>
                          <th scope="col">Ip Address</th>
                          <th scope="col">Log Date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @if(!$logs->isEmpty())
                        @foreach( $logs as $log)
                        
                          <tr>
                            <td>{{ $log->name }}</td>
                            <td>{{ $log->type }}</td>
                            <td>{{ $log->comment }}</td>
                            <td>{{$log->ip_address}}</td>
                            <td>{{$log->created_at}}</td>

                        </tr>
                      
                        @endforeach

                        @else
                          <tr>
                            <td colspan="8">No record found</td>
                          </tr>
                        @endif

                    </tbody>
                    </table>
                    {{$logs->links()}}

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
