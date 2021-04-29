<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>
    <link rel="icon" href="{{asset('img/sushi.svg')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
</head>
<body>
    <div class="form-container">
        @include('partials.form-plate', ['edit' => true], ['plate' => $plate])
    </div>
</body>
</html>
