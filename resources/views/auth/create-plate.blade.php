<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
</head>
<body>
    <div class="form-container">
        <h1>{{$thisRestaurant}}</h1>
        @include('partials.form-plate', ['edit' => false])
    </div>
</body>
</html>