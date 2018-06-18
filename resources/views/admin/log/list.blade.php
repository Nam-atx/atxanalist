@extends('admin.layout.admin')

@section('content')



<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.emp.list')}}" title="Go to Home" class="tip-bottom"><i class="icon-user"></i> Logs List</a></div>
    
  </div>
<!--End-breadcrumbs-->

<div class="container-fluid" id="log"><hr>
   <div class="row-fluid">
     <div class="span12">
       <div class="widget-box">
         <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
          <h5>Logs List</h5>
          </div>
          @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif  
          <div class="widget-content nopadding">
            <div class="widget-content nopadding">
        	<form class="form-inline" action="{{route('admin.log.list')}}">
            <div class="form-group">
              <input class="form-control" type="text" name="name" placeholder="User Name" value="{{ app('request')->input('name') }}">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="type" placeholder="Type"  value="{{ app('request')->input('type') }}"> 
            </div> 
            <div class="form-group"> 
              <input class="form-control" type="text" name="message" placeholder="Keyword"  value="{{ app('request')->input('message') }}">
            </div>
            <!--<div class="form-group"> 
              <div class="controls">
                <input data-date-format="dd-mm-yyyy" class="form-control datepicker" id="datepicker" type="text" name="created_at" placeholder="Date"  value="{{ app('request')->input('created_at') }}">
              </div>
            </div> -->
            <div class="form-group"> 
              <button class="btn btn-primary" type="submit">Filter</button>
            </div>
            </form>
            <form action="{{route('admin.log.list')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
            </form>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th scope="col">User Name</th>
                  <th scope="col">Type</th>
                  <th scope="col">Message</th>
                  <th scope="col">Log Date</th>
                </tr>
              </thead>
              <tbody>

              	@foreach( $logs as $log)
                <tr>
                    <td>{{$log->name}}</td>
                    <td>{{$log->type}}</td>
                    <td>{{$log->comment}}</td>
                    <td>{{$log->created_at}}</td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            {{$logs->links()}}
          </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

</div>
<script>
  $(document).ready(function() {
      $( ".datepicker" ).datepicker();
  });
  </script>

@endsection