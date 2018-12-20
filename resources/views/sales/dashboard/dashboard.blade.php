@extends('sales.layouts.app')

@section('content')

<div class="row">
<div class="span6">
  <div class="follow-up">
    <ul>
      <li><a href="{{route('sales.client.todayfollowup')}}"><span>Today FollowUps</span></a> </li>
      <li><a href="{{route('sales.client.futurefollowup')}}"> <span>Future FollowUps</span></a> </li>
    </ul>
    
    <label>Follow Up</label>
    <ul>
      <li><a href="{{route('sales.dashboard.recentclient')}}"><span>Recent Cleints</span></a> </li>
      <li><a href="{{route('sales.dashboard.yesterdayclient')}}"> <span>Yesterday</span></a> </li>

      <li><a href="{{route('sales.dashboard.twodaybackclient')}}"><span>2 Days Back</span></a> </li>

      <li><a href="{{route('sales.dashboard.weekclient')}}"><span>This Week</span></a> </li>

      <li><a href="{{route('sales.dashboard.monthclient')}}"><span>This Month</span></a> </li>

      <li><a href="{{route('sales.dashboard.yearclient')}}"><span>This Year</span></a> </li>
    </ul>
  </div>
  
 </div>

 <div class="span6">
  <div class="home-right">
  <ul>
      <li><a href="{{route('sales.dashboard.latestclient')}}"><span>Latest Schools Upload ( {{$latest_count}} )</span></a></li>

      <li><a href="#"><span>Emailing Schools from Portal</span></a> </li>

      <li><a href="#"><span>Who logged in when with IP</span></a> </li>

      <li><a href="#"><span>Submitting to School</span></a> </li>
    </ul>
  </div>
</div>
</row>

@endsection