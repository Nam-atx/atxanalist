<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ config('app.name', 'Dashboard') }}</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('public/css/backend/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend/matrix-media.css')}}" />

<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

<div>
  <h1><a href="{{route('user.employment.dashboard')}}">Dashboard</a></h1>
</div>

<div id="user-nav">
  <ul >
   <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span>Logout</span></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
    </form>
    </li>
  </ul>
</div>

<div id="sidebar">
  <a href="{{route('user.employment.dashboard')}}" class="visible-phone">Dashboard</a>
  <ul>
  <h3>Follow Up</h3></a>
  <li class=""><a href="{{route('user.employment.recentresume')}}" target="_blank"><span>Recent Contacts</span></a> </li>
  <li class=""><a href="{{route('user.employment.yesterdayresume')}}" target="_blank"> <span>Yesterday</span></a> </li>

  <li class=""><a href="{{route('user.employment.twodaybackresume')}}" target="_blank"><span>2 Days Back</span></a> </li>

  <li class=""><a href="{{route('user.employment.weekresume')}}" target="_blank"><span>This Week</span></a> </li>

  <li class=""><a href="{{route('user.employment.monthresume')}}"target="_blank"><span>This Month</span></a> </li>

  <li class=""><a href="{{route('user.employment.yearresume')}}" target="_blank"><span>This Year</span></a> </li>


<!--     <li class=""><a href=#><i class="icon icon-cogs"></i> <span>Logs</span></a> </li>
 -->
  </ul>
</div>


</body>
</html>
