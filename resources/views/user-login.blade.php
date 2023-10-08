<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/loginUser" method="post">
        @csrf
        <label for="email">Username</label>
        <input type="text" name="email" id="">
        @error('email')
            {{$message}}
        @enderror

        <label for="password">Password</label>
            <input type="password" name="password" id="">
        @error('password')
            {{$message}}
        @enderror
        <div>

        </div>
        <div>

        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
