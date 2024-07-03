<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>EDite a product</h1>

   <?php

print_R($products->products);
return false;
   ?>
<form action="" method='POST'>
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name"  placeholder="Name" required value="{{$products->name}}">

     <label for="name">qty:</label>
    <input type="text" name="qty" placeholder="Qty" required value="{{$products->qty}}">


     <label for="name">price:</label>
    <input type="text" name="price" placeholder="Price" required value="{{$products->price}}">

     <label for="name">description:</label>
    <input type="text" name="description" placeholder="Description" value="{{$products->description}}">


    <button type="submit">Add</button>
</form>




</body>
</html>