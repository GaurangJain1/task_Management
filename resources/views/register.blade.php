{{-- THIS FILE IS USED TO ADD USER --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name','LSAPP')}}</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    
    <div class="wrapper">
        @if(session()->has ("success")) 
            <div>
                {{session()->get("success")}}
            </div>
        @endif
        @if(session()->has ("error")) 
            <div>
                {{session()->get("error")}}
            </div>
        @endif
        
        <form action="{{route('registerPost')}}" method="post">
            @csrf
            <h1>Add User</h1>
            <div class="input-box">
                <input type="text" name="uname" id="" placeholder="Username" required>
                <box-icon name='user' ></box-icon>
            </div>
            
            <div class="input-box">
                <input type="password" name="pw" id="" placeholder="Password" required>
                {{-- <box-icon  name='lock-alt'></box-icon> --}}
                <box-icon name='lock-alt' ></box-icon>
            </div>
            <div class="input-box">
                <input type="email" name="em" id="" placeholder="Email" required > 
                <box-icon name='envelope'></box-icon>
                            
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
                    {{-- <a href="#">Forget Password</a> --}}
            </div>
            <button type="submit" class="btn">Add User!</button>
            <div class="register-link">
                <p>Wanna Go Back? <a href="{{url()->previous()}}">Previous Page!</a></p>

            </div>
        </form>
    </div>
</body>
</html>
