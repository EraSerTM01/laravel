<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Active</title>
</head>
<body>
    <h1>User {{ $name }} is {{ $result }}!</h1>
    
    @foreach($numbers as $number)
    
    {{ $number }}

@endforeach
</body>
</html>