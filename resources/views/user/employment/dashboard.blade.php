@extends('layouts.app')

@section('content')

<div class="row">
<div class="span6">
  <div class="follow-up">

    <ul>
      <li><a href="{{route('emp.todayfollowup')}}"><span>Today FollowUps</span></a> </li>
      <li><a href="{{route('emp.futurefollowup')}}"> <span>Future FollowUps</span></a> </li>
    </ul>


    <label>Followed Up</label>
    <ul>
      <li><a href="{{route('user.employment.recentresume')}}"><span>Today</span></a> </li>
      <li><a href="{{route('user.employment.yesterdayresume')}}"> <span>Yesterday</span></a> </li>

      <!--<li><a href="{{route('user.employment.twodaybackresume')}}"><span>2 Days Back</span></a> </li>-->

      <li><a href="{{route('user.employment.weekresume')}}"><span>This Week</span></a> </li>

      <li><a href="{{route('user.employment.monthresume')}}"><span>This Month</span></a> </li>

      <li><a href="{{route('user.employment.yearresume')}}"><span>This Year</span></a> </li>
    </ul>
  </div>
  
 </div>

 <div class="span6">
  <div class="home-right">
  <ul>
      <li><a href="{{route('user.employment.latestresume')}}"><span>Latest Resume Upload ( {{$latest_count}} )</span></a></li>

      <li><a href="#"><span>Emailing Candidates from Portal</span></a> </li>

      <li><a href="{{ route('user.employment.loginhistory') }}"><span>Log Information</span></a> </li>

      <li><a href="#"><span>Submitting to sales</span></a> </li>
    </ul>
  </div>
</div>
</row>

@endsection