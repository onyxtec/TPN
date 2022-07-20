<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Welcome to our website, {{$peer->fullName}}</h2>
    <p>
        Click <a href="http://127.0.0.1:8000/peer/verify/{{$peer->verifyPeer->token}}">Here</a>  to verify your email
    </p>
</body>
</html>