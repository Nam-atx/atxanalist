<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ config('app.name', 'Laravel') }}</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('public/css/backend/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/backend/matrix-media.css')}}" />
<link href="{{asset('public/fonts/backend/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('public/css/backend/jquery.gritter.css')}}" />

<link rel="stylesheet" href="{{asset('public/css/backend/style.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<meta name="csrf-token" content="{{ csrf_token() }}">


<script src="{{asset('public/js/backend/excanvas.min.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.min.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('public/js/backend/bootstrap.min.js')}}"></script> 
<script src="{{asset('public/js/backend/bootstrap-datepicker.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.flot.min.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.flot.resize.min.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.peity.min.js')}}"></script> 
<script src="{{asset('public/js/backend/fullcalendar.min.js')}}"></script> 
<script src="{{asset('public/js/backend/matrix.js')}}"></script> 
<script src="{{asset('public/js/backend/matrix.dashboard.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.gritter.min.js')}}"></script> 
<script src="{{asset('public/js/backend/matrix.interface.js')}}"></script> 
<script src="{{asset('public/js/backend/matrix.chat.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.validate.js')}}"></script> 
<script src="{{asset('public/js/backend/matrix.form_validation.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.wizard.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.uniform.js')}}"></script> 
<script src="{{asset('public/js/backend/select2.min.js')}}"></script> 
<script src="{{asset('public/js/backend/matrix.popover.js')}}"></script> 
<script src="{{asset('public/js/backend/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('public/js/backend/matrix.tables.js')}}"></script>
</head>
<body>

@include('admin.layout.header')
@include('admin.layout.sidebar')
@yield('content')
@include('admin.layout.footer')
 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
