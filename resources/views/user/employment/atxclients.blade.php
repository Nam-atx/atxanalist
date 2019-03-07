@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Clients List</div>
                <div class="card-body1">
                  
                  <form class="form-inline" action="{{route('emp.atxclients')}}">

                  <div class="form-group2">
                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{ app('request')->input('name') }}">
                  </div>                  
                    
                  <div class="form-group2">
                    <input type="text" class="form-control" name="city" placeholder="City"  value="{{ app('request')->input('city') }}" >
                  </div>
                  <div class="form-group2"> 
                    <input class="form-control" type="text" name="state" placeholder="State"  value="{{ app('request')->input('state') }}" >
                  </div> 
                  
                  <div class="form-group2"> 
                      <input type="text" class="form-control" name="radius" placeholder="Radius" value="{{ app('request')->input('radius') }}">
                  </div>

                  <div class="form-group2">
                      <select class="form-control" name="limit" placeholder="Limit">
                        <option value=""> select limit</option>
                        <option value="10" {{ (app('request')->input('limit')==10)?'selected':'' }}>10</option>
                        <option value="20" {{ (app('request')->input('limit')==20)?'selected':'' }}>20</option>
                        <option value="50" {{ (app('request')->input('limit')==50)?'selected':'' }}>50</option>
                        <option value="100" {{ (app('request')->input('limit')==100)?'selected':'' }}>100</option>
                        
                      </select>
                  </div> 

                  <div class="form-group2"> 
                      <button class="btn btn-primary" type="submit">Filter</button>
                  </div>

                  </form>
                  <form action="{{route('emp.atxclients')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
                  </form>
                
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">School/District</th>                          
                          <th scope="col">City</th>
                          <th scope="col">State</th>
                          <th scope="col">Zip Code</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{$client->name}}</td>                            
                            <td>{{ucwords(strtolower($client->city))}}</td>
                            <td>{{strtoupper($client->state)}}</td>
                            <td>{{$client->zipcode}}</td>
                            <td><a href="{{route('emp.showclient',$client->id)}}"><i class="far fa-eye"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{$clients->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection



