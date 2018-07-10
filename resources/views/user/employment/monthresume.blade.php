@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employer List</div>
                <div class="card-body1">
                  
                  <form class="form-inline" action="{{route('user.employment.monthresume')}}"><div class="form-group"><input class="form-control" type="text" name="position" placeholder="Position" value="{{ app('request')->input('position') }}"></div>
                    <div class="form-group"><input type="text" class="form-control" name="city" placeholder="City"  value="{{ app('request')->input('city') }}"> </div> <div class="form-group"> <input class="form-control" type="text" name="state" placeholder="State"  value="{{ app('request')->input('state') }}"></div> <div class="form-group"> <button class="btn btn-primary" type="submit">Filter</button></div>
                  </form>
                  <form action="{{route('user.employment.monthresume')}}" class="form-inline reset"><button class="btn btn-primary" type="submit">Reset</button>
                  </form>
                
                    <table class="table">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Position</th>
                          <th scope="col">Address</th>
                          <th scope="col">DND</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(!$employments->isEmpty())
                        @foreach( $employments as $employment)
                        <tr>
                            <td>{{$employment->title}}</td>
                            <td>{{$employment->first_name}}</td>
                            <td>{{$employment->last_name}}</td>
                            <td>{{$employment->email}}</td>
                            <td>{{$employment->position}}</td>
                            <td>{{$employment->street1}}<br> {{$employment->street2?','.$employment->street2.'<br>':''}}
                            {{$employment->city?','.$employment->city:''}} {{$employment->state?','.$employment->state:''}}
                            {{$employment->country?','.$employment->country:''}}
                            {{$employment->zipcode?'-'.$employment->zipcode:''}}
                            </td>
                            <td>{{ $employment->dnd == 1 ? "DND" : "NO DND" }}</td>
                            <td><a href="{{route('emp.show',$employment->id)}}"><i class="far fa-eye"></i></a></td>
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
{{--    <h2>Total number of records: {{$numbers}}</h2> --}}
</div>

@endsection
