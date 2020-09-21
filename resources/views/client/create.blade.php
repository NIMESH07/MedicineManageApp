<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <a href="{{url('client')}}">View Client</a>
    <form action="{{url('client')}}" method="post">
        @csrf
        <input type="text" name="name"><br>
        <input type="text" name="mobile_no"><br>
        <input type="submit">
    </form>
</body>
</html>
