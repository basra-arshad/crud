<!DOCTYPE html>
<html>
<head><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/WTB5cw5SW6nJEeVRIK/J4wG8pImJ4tLYclU8g8" crossorigin="anonymous"></script>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>


</head>
<body>
<h1>Index blade</h1>
@if (session()->has('sucess'))
<div>{{session('sucess')}}</div>
@endif


<div id="show_data">

</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">QTY</th>
      <th scope="col">Price</th>

      <th scope="col">DESCRIPTION</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>


    </tr>
  </thead>
  <tbody id="data_get">


    
 
  </tbody>
</table>

<script type="text/javascript">
get_data();
    function get_data(){

           $.ajax({
        type: "POST",
        url: '{{ route('product.get_data') }}',
        data: {
         'id':'get'
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
        },
        success: function(data) {

            document.getElementById('data_get').innerHTML =data;
             // show response from the server
        },
        error: function(xhr, status, error) {
            console.error(error); // log any error for debugging
            alert('An error occurred. Please try again.');
        }
    });
    }
	function edit(id) {
    $.ajax({
        type: "POST",
        url: '{{ route('product.edit') }}',
        data: {
            id: id // Corrected syntax
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
        },
        success: function(data) {

            document.getElementById('show_data').innerHTML =data;
             // show response from the server
        },
        error: function(xhr, status, error) {
            console.error(error); // log any error for debugging
            alert('An error occurred. Please try again.');
        }
    });
}



    function update(id) {

         const form = document.getElementById('update_data');
            
            // Create a FormData object from the form element
            const formData = new FormData(form);
               const dataObj = {};
            formData.forEach((value, key) => {
                dataObj[key] = value;
            });
            const dataString = JSON.stringify(dataObj, null, 2);
    
    $.ajax({
        type: "POST",
        url: '{{ route('product.update') }}',
        data:{data:dataObj,id:id},
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
        },
        success: function(data)
        {
         var data_get = document.getElementById('data_get');
          data_get.innerHTML=data;
          


       
        }
    });
    
// });
}




	function delete_(id) {
    $.ajax({
        type: "POST",
        url: '{{ route('product.delete_') }}',
        data: {
            id: id // Corrected syntax
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for Laravel
        },
        success: function(data) {
              var data_get = document.getElementById('data_get');
          data_get.innerHTML=data;

         
        },
        error: function(xhr, status, error) {
            console.error(error); // log any error for debugging
            alert('An error occurred. Please try again.');
        }
    });
}


	
	
</script>
</body>
</html>