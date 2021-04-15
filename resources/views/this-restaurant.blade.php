<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{$restaurant->business_name}}<br>

    <a href="{{ route('plates.create')}}">Inserisci un nuovo piatto</a>
</body>
</html>
