{{-- THIS FILE IS USED LOGIN VIEW --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name','LSAPP')}}</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
    <div class="wrapper">
        <form action="{{route('loginPost')}}" method="post">
            @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="name" id="" placeholder="Username" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="" placeholder="Password" required>
                <box-icon type='solid' name='lock-alt'></box-icon>
            </div>
            <div class="role">
                <h5>Select Role</h5>
                <label for="rolepluse">
                    <input type="checkbox" name="rolep" id="" value="Assioner">
                    <box-icon name='user-plus'></box-icon>
                    Admin
                </label>
                <label class = "roleminus" for="roleminus">
                    <input type="checkbox" name="rolem" id="" value ="Assignee">
                    <box-icon name='user'></box-icon>
                    User
                </label>
            </div>
            <div class="remember-forget">
                <label >
                    <input type="checkbox">Remember me
                </label>
                <a href="#">Forget Password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an Account? Contact Admin!</p>

            </div>
        </form>
    </div>
</body>
</html>

{{-- <a href="/register">Register</a> --}}