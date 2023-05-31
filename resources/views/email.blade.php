<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-mail Notification</title>
    <style>
        .danger{
            color: red;
        }
    </style>
</head>
<body>

    <h1 class="danger">{{$data['main']['subject']}}</h1>

    <h3>Hello {{$data['main']['name']}}!</h3>

    <p>
        {{$data['main']['message']}}
    </p> 
    
</body>
</html>