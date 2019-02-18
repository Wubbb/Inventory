<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form action="/items/{{$item->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$item->title}}"><br>
    <textarea name="desc" id="desc" cols="30" rows="5">{{$item->desc}}</textarea><br>
    <input type="text" name="from" value="{{$item->from}}"><br>
    <input type="submit" name="submit" value="Submit">
    </form>
    
</body>
</html>