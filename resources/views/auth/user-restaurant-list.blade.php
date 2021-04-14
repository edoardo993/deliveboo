<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="">
        @foreach ($userRestaurants as $useRestaurant)
            <img src="{{$useRestaurant->pic_url}}" width= "150">
            <div>{{$useRestaurant->opening_hours}}</div>
            <div>{{$useRestaurant->description}}</div>
        @endforeach
    </div>

    <a href="restaurants/create">Create new restaurant</a>

</body>
</html>
