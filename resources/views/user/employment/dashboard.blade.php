@extends('user.layout.dashboard')

@section('content')


<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<section>
  <nav>
  <ul>
  <li class=""><a href="{{route('user.employment.recentresume')}}"><span>Recent Contacts</span></a> </li>
  <li class=""><a href="{{route('user.employment.yesterdayresume')}}"> <span>Yesterday</span></a> </li>

  <li class=""><a href="{{route('user.employment.twodaybackresume')}}"><span>2 Days Back</span></a> </li>

  <li class=""><a href="{{route('user.employment.weekresume')}}"><span>This Week</span></a> </li>

  <li class=""><a href="{{route('user.employment.monthresume')}}"><span>This Month</span></a> </li>

  <li class=""><a href="{{route('user.employment.yearresume')}}"><span>This Year</span></a> </li>
    </ul>
  </nav>
  
 

 <article>
  <nav style="background: none;">
  <ul>
  <a href="#"><span>Latest Resume Upload ( {{$latest_count}} )</span></a>
  
  <li class=""><a href="#"><span>Miles Filter</span></a> </li>

  <li class=""><a href="#"><span>Emailing Candidates from Portal</span></a> </li>

  <li class=""><a href="#"><span>Who logged in when with IP</span></a> </li>

  <li class=""><a href="#"><span>Submitting to sales</span></a> </li>
    </ul>
  </nav>

</section>

</div>



@endsection