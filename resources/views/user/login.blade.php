<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('fe/login.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://kit.fontawesome.com/0b5cba3b4d.js" crossorigin="anonymous"></script>


</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="/login/auth" method="post">
                    @csrf
                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    @if (session('loginError'))
                    <p class="error-message" style="color: red">{{ session('loginError') }}</p>
                @endif
                @if (session('statusError'))
                    <p class="error-message" style="color: red">{{ session('statusError') }}</p>
                @endif
                    <input type="submit" style="margin-top: 20px" value="Login" class="btn solid">
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">

                <img src="image/login.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of Us?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquid, inventore. Recusandae, ex.</p>
                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                    @if (session('loginError'))
                        <p class="error-message">{{ session('loginError') }}</p>
                    @endif
                    @if (session('statusError'))
                        <p class="error-message">{{ session('statusError') }}</p>
                    @endif
                </div>

                <img src="image/welcome.svg" class="image" alt="">
            </div>

        </div>
    </div>

    <script src="login.js"></script>
</body>

</html>
