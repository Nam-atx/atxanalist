@extends('admin.layout.admin')

@section('content')


<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

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
           
            <div class="form-group"> 
              <div class="controls">
                <input data-date-format="dd-mm-yyyy" class="form-control datepicker" id="datepicker" type="text" name="created_at" placeholder="Date"  value="{{ app('request')->input('created_at') }}">
              </div>
            </div> 


            <div class="form-group"> 
              <button class="btn btn-primary" type="submit">Filter</button>
            </div>
            </form>
            <form action="{{route('admin.log.list')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
            </form>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                 <!--  <th scope="col">User Name</th>
                  <th scope="col">Type</th>
                  <th scope="col">Message</th>
                  <th scope="col">Log Date</th> -->

            <th scope="col">@sortablelink('name')</th>
            <th scope="col">@sortablelink('type')</th>
            <th scope="col">Message</th>
            <th scope="col">@sortablelink('created_at')</th>
            <th scope="col">Last Login IP</th>
                </tr>
              </thead>
              <tbody>

              	@foreach( $logs as $log)
                <tr>
                    <td>{{$log->name}}</td>
                    <td>{{$log->type}}</td>
                    <td>{{$log->comment}}</td>
                    <td>{{$log->created_at}}</td>
                    <td>{{$log->ip_address}}</td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
            {{$logs->links()}}
            <!-- {!! $logs->appends(\Request::except('page'))->render() !!} -->
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