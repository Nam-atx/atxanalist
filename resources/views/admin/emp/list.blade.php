@extends('admin.layout.admin')

@section('content')



<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.emp.list')}}" title="Go to Home" class="tip-bottom"><i class="icon-user"></i> Employment List</a> <a href="{{route('admin.emp.add')}}" class="current"><i class="icon-user"></i> Add Employee</a></div>
    
  </div>
<!--End-breadcrumbs-->

<div class="container-fluid"><hr>
   <div class="row-fluid">
     <div class="span12">
       <div class="widget-box">
         <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
          <h5>Employment List</h5> 
          </div>
          @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif  
          <div class="widget-content nopadding">
            <div class="widget-content nopadding">
        	<form class="form-inline" action="{{route('admin.emp.list')}}">

            <div class="form-group">
              <input class="form-control" type="text" name="name" placeholder="Name" value="{{ app('request')->input('name') }}">
            </div>

            <div class="form-group">
              <input class="form-control" type="text" name="email" placeholder="Email" value="{{ app('request')->input('email') }}">
            </div>

            <div class="form-group">
              <input class="form-control" type="text" name="phone" placeholder="Phone" value="{{ app('request')->input('phone') }}">
            </div>

            <div class="form-group">
              <input class="form-control" type="text" name="position" placeholder="Position" value="{{ app('request')->input('position') }}">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="city" placeholder="City"  value="{{ app('request')->input('city') }}"> 
            </div> 
            <div class="form-group"> 
              <input class="form-control" type="text" name="state" placeholder="State"  value="{{ app('request')->input('state') }}">
            </div> 
            <div class="form-group"> 
              <button class="btn btn-primary" type="submit">Filter</button>
            </div>
            </form>
              <form action="{{route('admin.emp.list')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
              </form>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th scope="col">Application Date</th>
                  <th scope="col">Source</th>
                  <!-- <th scope="col">Title</th> -->
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Position</th>
                  <th scope="col">Address</th>
                  <th scope="col">Longitude</th>
                  <th scope="col">Latitude</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

              	@foreach( $employments as $employment)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($employment->application_date)->format('d-M-Y') }}</td>
                    <td>{{$employment->source}}</td>
                    <!-- <td>{{$employment->title}}</td> -->
                    <td>{{$employment->title}} {{$employment->first_name}}</td>
                    <td>{{$employment->last_name}}</td>
                    <td>{{$employment->email}}</td>
                    <td>{{$employment->position}}</td>
                    <td>{{$employment->street1}} {{$employment->street1?'<br>,':''}} {{$employment->street2?$employment->street2.'<br>':''}} {{$employment->street2?',':''}}
                             {{$employment->city?$employment->city:''}} {{$employment->city?',':''}} {{$employment->state?$employment->state:''}} {{$employment->state?',':''}}
                            {{$employment->country?$employment->country:''}} {{$employment->country?',':''}}
                            {{$employment->zipcode?'-'.$employment->zipcode:''}}
                            </td>
                    <td>{{$employment->longitude}}</td>
                    <td>{{$employment->latitude}}</td>
                    <td><a href="{{route('admin.emp.edit',$employment->id)}}">Edit</a></td>
                </tr>
                @endforeach
                
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