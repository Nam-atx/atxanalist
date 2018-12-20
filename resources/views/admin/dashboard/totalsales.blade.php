@extends('admin.layout.admin')

@section('content')


<!--main-container-part-->
<div id="content">

<div class="container-fluid">
   <div class="row-fluid">
     <div class="span12">
       <div class="widget-box">
         <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
          <h5>Sales Contact List</h5>
          </div>
          @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif  
          <div class="widget-content nopadding">
            <div class="widget-content nopadding">
            <form class="form-inline" action="{{route('admin.dashboard.totalsales')}}">
              <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Name" value="{{ app('request')->input('name') }}">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" name="city" placeholder="City"  value="{{ app('request')->input('city') }}"> 
                </div> 
                <div class="form-group"> 
                  <input class="form-control" type="text" name="state" placeholder="State"  value="{{ app('request')->input('state') }}">
                </div> 

                <div class="form-group"> 
                    <input type="text" class="form-control" name="radius" placeholder="Radius" value="{{ app('request')->input('radius') }}">
                 
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
              <form action="{{route('home')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
              </form>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th scope="col">Client Name</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Fax</th>
                  <th scope="col">City</th>
                  <th scope="col">State</th>
                  <th scope="col">Requirement</th>
                  <th scope="col">Opening Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach( $clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->contact}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->fax}}</td>
                    <td>{{$client->city}}</td>
                    <td>{{$client->state}}</td>
                    <td>{{$client->requirement}}</td>
                    <td>{{$client->opening_date}}</td>
                    <td><a href="{{route('admin.client.edit',$client->id)}}">Edit</a></td>
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
    
  </div>

</div>

@endsection
