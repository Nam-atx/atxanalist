<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{asset('public/css/backend/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('public/css/backend/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/css/backend/matrix-login.css')}}" />
        <link href="{{asset('public/fonts/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>
        <div id="loginbox">   
           @include('flash::message')        
            <form id="loginform" action="{{route('admin.login')}}" method="POST" class="form-vertical" action="">
                {{ csrf_field() }}
				 <div class="control-group normal_text"> <h3><img src="{{asset('public/images/backend/logo.png')}}" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input name="email" type="text" placeholder="Email Address" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                   <input type="submit" value="Login" class="btn btn-success">
                </div>
            </form>
           
        </div>
        
        <script src="{{asset('public/js/backend/jquery.min.js')}}"></script>  
        <script src="{{asset('public/js/backend/matrix.login.js')}}"></script> 
    </body>

</html>
