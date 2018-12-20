@extends('admin.layout.admin')

@section('content')


<!--main-container-part-->
<div id="content">

<div class="container-fluid">
   <div class="row-fluid">
     <div class="span12">
       <div class="widget-box">
         <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
          <h5>Recruting Contact List</h5>
          </div>
          @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif  
          <div class="widget-content nopadding">
            <div class="widget-content nopadding">
                  
                  <form class="form-inline" action="{{route('admin.dashboard.totalrecruiter')}}">
                     
                    <div class="form-group">
                      <input class="form-control" type="text" name="position" placeholder="Profile" value="{{ app('request')->input('position') }}">
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
                      <input class="form-control" type="text" name="email" placeholder="Email" value="{{ app('request')->input('email') }}">
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
                    
                    <div class="form-group"> 
                      <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                  </form>
                  <form action="{{route('user.employment.recentresume')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
                  </form>
                
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Application Date</th>
                          <th scope="col">Title</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Profile</th>
                          <th scope="col">City</th>
                          <th scope="col">State</th>
                          <th scope="col">Zip-Code</th>
                          <th scope="col">DND</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @if(!$employments->isEmpty())
                        @foreach( $employments as $employment)
                        <tr>
                            <td><a href="{{route('admin.emp.edit',$employment->id)}}">{{ \Carbon\Carbon::parse($employment->application_date)->format('F d, Y') }}</a></td>
                            <td>{{$employment->title}}</td>
                            <td>{{$employment->first_name}}</td>
                            <td>{{$employment->last_name}}</td>
                            <td>{{$employment->email}}</td>
                            <td>{{strtoupper($employment->position)}}</td>
                            <td>{{$employment->city}}</td>
                            <td>{{strtoupper($employment->state)}}</td>
                            <td>{{$employment->zipcode}}</td>
                            
                            <td>{{ $employment->dnd == 1 ? "DND" : "NO DND" }}</td>
                            
                        </tr>
                        @endforeach

                        @else
                          <tr>
                            <td colspan="8">No record found</td>
                          </tr>
                        @endif

                    </tbody>
                    </table>
                    {{$employments->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

</div>

@endsection
