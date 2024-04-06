<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>

<center>
    <h1>All Product</h1>

    <table border="1px">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Update</th>

        </tr>

        @foreach($data as $data)

        <tr>
            <td>{{$data->title}}</td>
            <td>{{$data->description}}</td>
            <td><img height="200" width="200" src="product/{{$data->image}}"></td>
            <td><a onclick="return confirm('are you sure to delete this?');" class="btn btn-danger" href="{{url('delete_product',$data->id)}}">Delete</td>

            <td><a class="btn btn-primary" href="{{url('update_product',$data->id)}}">Update</td>

        </tr>

        @endforeach
    </table>

</center>

    

   
</body>
</html>