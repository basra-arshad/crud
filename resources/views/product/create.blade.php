<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1> create a file </h1>



<form  method="POST" action="{{route('product.store')}}"  id="save_data">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name"  placeholder="Name" required>

     <label for="name">qty:</label>
    <input type="text" name="qty" placeholder="Qty" required>


     <label for="name">price:</label>
    <input type="text" name="price" placeholder="Price" required>

     <label for="name">description:</label>
    <input type="text" name="description" placeholder="Description">


    <button type="submit" on>Add</button>
</form>


<script type="text/javascript">
	

	$("#save_data").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');
    
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {

        	
          alert(data); // show response from the php script.
        }
    });
    
});


</script>

</body>
</html>