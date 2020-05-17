<!DOCTYPE html>
<html>
<head>
	<title>show name of users</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">
	<script

  src="https://code.jquery.com/jquery-3.4.1.min.js"
  ></script>
</head>
<body>
<h2>Insert form data</h2>

    
<p>Name:
<input type="text" class="form-control" name="single_field_name" id="single_field_name">
</p>
<span id="err_name"></span>
<p>Type:
<input type="text" name="field_type" id="field_type">
</p>
<span id="err_type"></span>
<br>
<input type="submit" name="save" id="save" onclick="insertsinglefieldmaster()">

</body>
</html>
<script>
	function insertsinglefieldmaster(){

        var type = $('#field_type').val();
        var name = $('#single_field_name').val();      
        // alert(type);

        if(name ==''){
        $('#err_name').html('Name Field is Required').css({'font-weight':'700', 'color':'red'})
        }
        if(type ==''){
        $('#err_type').html('Type Field is Required').css({'font-weight':'700', 'color':'red'})
        }
        $.ajax({
            url: '{{url("show-data1")}}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'JSON',
            data: {type: type, name:name},
            success: function (res) {
             console.log(res);
                if (res.success == 1) {
                    
                    $('#field_type').val('');
                    $('#single_field_name').val('');

                    // swal("Successfully!", "Successfully Saved!!", "success");
                       alert(res.msg);
                         
                } else {
                       alert(res.msg);
                }
            },
        })

    // }else{
    //     return flag;
    // }
} 
</script>