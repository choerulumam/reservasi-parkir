<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Reservasi Parkir</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Reservasi Login</title>
  <link rel='stylesheet prefetch' href='{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}'>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}"> 
</head>

<body>
  <form name="vform" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
  <div class="login-form">
     
     <h1>Login</h1>
     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} log-status">
       <input placeholder="E-mail" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="alert"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
       <i class="fa fa-user"></i>
     </div>

     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} log-status">
       <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>
       @if ($errors->has('password'))
          <span class="alert">{{ $errors->first('password') }}</span>
       @endif
       <i class="fa fa-lock"></i>
     </div>
      <a class="link" href="{{ route('password.request') }}">Lost your password?</a>
     <button type="submit" class="log-btn">Log in</button>
   </div>
 </form>
</body>
</html>
