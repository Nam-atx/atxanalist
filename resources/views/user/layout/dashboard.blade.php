<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ config('app.name', 'Dashboard') }}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
    background-color: #808080;
    padding: 1px;
    font-size: 25px;
    color: white;
}



h4{
  text-align: right;
}

/* Create two columns/boxes that floats next to each other */
nav {
    float: left;
    width: 30%;
    height: 300px; /* only for demonstration, should be removed */
    background: #ccc;
    
}



/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}


a:link, a:visited {
    color: black;
    padding: 14px 25px;
    text-decoration: none;
    display: inline-block;
}
/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}

article {
    float: left;
    padding: 20px;
    width: 70%;
    background-color: #f1f1f1;
    height: 300px; /* only for demonstration, should be removed */
}
</style>
</head>
<body>


<header>
 <h2><a href="{{route('user.employment.dashboard')}}">Dashboard</a></h2>

   <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="float: right;margin-top: -92px;"><span>Logout</span></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
    </form>

</header>

@yield('content')


</body>
</html>