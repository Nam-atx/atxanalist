@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employer List</div>
                <div class="card-body1">
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Position</th>
                          <th scope="col">Address</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach( $employments as $employment)
                        <tr>
                            <td>{{$employment['title']}}</td>
                            <td>{{$employment['first_name']}}</td>
                            <td>{{$employment['last_name']}}</td>
                            <td>{{$employment['email']}}</td>
                            <td>{{$employment['position']}}</td>
                            <td>{{$employment['street1']}} {{$employment['street1']?','.$employment['street1']:''}}<br>
                            {{$employment['city']?','.$employment['city']:''}} {{$employment['state']?','.$employment['state']:''}}
                            {{$employment['country']?','.$employment['country']:''}}
                            {{$employment['zipcode']?'-'.$employment['zipcode']:''}}
                            </td>
                            <td><a href="{{route('emp.show',$employment['id'])}}"><i class="far fa-eye"></i></a></td>
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
@endsection
