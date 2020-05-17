<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title></title>
     
</head>
<body>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert">x</button>
                {{ session('status') }}
            </div>
        @endif
        @if (session('status2'))
           <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">x</button>
              {{ session('status2') }}
            </div>
        @endif
<h2>Register</h2>
    <form method="POST" action="{{url('/Insert-data')}}">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
            <p class="text-danger">{{ $errors->first('name') }}</p>
        </div>
 
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
            <p class="text-danger">{{ $errors->first('email') }}</p>
        </div>
         <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact')}}">
            <p class="text-danger">{{ $errors->first('contact') }}</p>
        </div>
 
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password')}}">
            <p class="text-danger">{{ $errors->first('password') }}</p>
        </div>
 
        <div class="form-group">
            <button  type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>

        <div class="col-md-6">
            <a href="{{url('login')}}">Login Here</a>
        </div>
    </div>
</body>
</html>