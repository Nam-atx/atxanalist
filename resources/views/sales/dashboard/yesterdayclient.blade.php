@extends('sales.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Client List</div>
                <div class="card-body1">
                  
                  <form class="form-inline" action="{{route('sales.dashboard.recentclient')}}"><div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name" value="{{ app('request')->input('name') }}"></div>
                    <div class="form-group"><input type="text" class="form-control" name="city" placeholder="City"  value="{{ app('request')->input('city') }}"> </div> <div class="form-group"> <input class="form-control" type="text" name="state" placeholder="State"  value="{{ app('request')->input('state') }}"></div> 

                    <div class="form-group"> 
                      <input type="text" class="form-control" name="radius" placeholder="Radius" value="{{ app('request')->input('radius') }}">
                     
                    </div>
                    
                    <div class="form-group"> <button class="btn btn-primary" type="submit">Filter</button></div>
                  </form>
                  <form action="{{route('sales.dashboard.recentclient')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
                  </form>
                
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Contact</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Email</th>
                          <th scope="col">Address</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach( $clients as $client)
                        <tr>
                            <td>{{$client->name}}</td>
                            <td>{{$client->contact}}</td>
                            <td>{{$client->phone}}</td>
                            <td>{{$client->email}}</td>
                            <td>
                            {{$client->city?$client->city:''}} {{$client->state?','.$client->state:''}}                            {{$client->zipcode?'-'.$client->zipcode:''}}
                            </td>
                            <td><a href="{{route('sales.client.show',$client->id)}}"><i class="far fa-eye"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{$clients->links()}}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
