<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form action="/items/{{$items->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$items->wahProp}}"><br>
    <textarea name="desc" id="desc" cols="30" rows="5">{{$items->type}}</textarea><br>
    <input type="text" name="from" value="{{$items->details}}"><br>
    <input type="submit" name="submit" value="Submit">
    </form>
    
</body>
</html> -->