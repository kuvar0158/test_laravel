<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="
	https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="
	https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
	<title></title>
</head>
<body>
<h2>Welcome to home pages</h2>
<?php 
$username = Session::get('name');
 echo 'Welcome'.' '.$username;
?>
<div class="container">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>@foreach($getuserdetail as $val)
            <tr>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->contact}}</td>
                <td>{{$val->password}}</td>
                <td><a href="{{url('edit-user'.$val->id)}}">Edit</a></td>
            </tr>
            @endforeach
    </table>
    <a href="{{url('logout-user')}}">Logout</a>
   </div>
</body>
</html>