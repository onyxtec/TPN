<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Welcome to our website, {{$client->fullName}}</h2>
    <p>
        Click <a href="{{URL::to('/client/verify/'.$client->verifyClient->token)}}">Here</a>  to verify your email
    </p>
</body>
</html>