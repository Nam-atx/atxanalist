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
  <li class=""><a href="{{route('user.employment.recentresume')}}" target="_blank"><span>Recent Contacts</span></a> </li>
  <li class=""><a href="{{route('user.employment.yesterdayresume')}}" target="_blank"> <span>Yesterday</span></a> </li>

  <li class=""><a href="{{route('user.employment.twodaybackresume')}}" target="_blank"><span>2 Days Back</span></a> </li>

  <li class=""><a href="{{route('user.employment.weekresume')}}" target="_blank"><span>This Week</span></a> </li>

  <li class=""><a href="{{route('user.employment.monthresume')}}"target="_blank"><span>This Month</span></a> </li>

  <li class=""><a href="{{route('user.employment.yearresume')}}" target="_blank"><span>This Year</span></a> </li>
    </ul>
  </nav>
  
 

 <article>
  <nav style="background: none;">
  <ul>
  <a href="#" target="_blank"><span>Latest Resume Upload ( {{$latest_count}} )</span></a>
  
  <li class=""><a href="#" target="_blank"><span>Miles Filter</span></a> </li>

  <li class=""><a href="#" target="_blank"><span>Emailing Candidates from Portal</span></a> </li>

  <li class=""><a href="#"target="_blank"><span>Who logged in when with IP</span></a> </li>

  <li class=""><a href="#" target="_blank"><span>Submitting to sales</span></a> </li>
    </ul>
  </nav>

</section>

</div>



@endsection