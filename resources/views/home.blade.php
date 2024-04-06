<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale">
        <title></title>

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style type="text/css">
    .div_deg
    {
        padding: 30px;
    }
    </style>
</head>
<body>
    <center>
        <br><br>
    <a class="btn btn-success" href="{{url('show_product')}}">Show Product</a>
    <br><br>

    <h1>Add Product</h1>
   
    @if($errors)

    @foreach($errors->all() as $errors)
    <li style="color:red">
        {{$errors}}
</li>
    @endforeach
    
    @endif

    <form action="{{url('/add_product')}}" method="Post" enctype="multipart/form-data">
        <div class="div_deg">
            <label>Product Title</label>
            <input type="text" name="title">

            @csrf
</div>

<div class="div_deg">
            <label>Product Description</label>
            <textarea name="description"></textarea>
</div>

<div class="div_deg">
            <label>Product Image</label>
            <input type="file" name="image">
</div>

<div>
            
            <input class="btn btn-primary" type="submit" value="Add Product">
</div>



</form>

</center>
</body>
</html>