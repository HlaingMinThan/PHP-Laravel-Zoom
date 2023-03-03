<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>Document</title>
</head>

<body>
    <h1>Hello {{$user->name}}</h1>
    <p>we've got new message for your subscribed blog</p>
    <p>{{$comment->body}}</p>
</body>

</html>