<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form action="{{ route('auth.loginsubmit') }}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>
        <button type="submit">Login</button>
    </form>

    <a href="{{ route('auth.password.request') }}">Forgot password?</a>
    <br>
    
    <p>You don't have an account?</p>

    <button id="registerLink">Register here</button>
    <div id="registrationOptions" style="display: none">
        <h3>Choose your type</h3>
        <a href="{{ route('') }}"><button>Candidate</button></a>
        <a href="{{ route('auth.registercompany') }}"><button s>Company</button></a>
    </div>

    <script>
        document.getElementById('registerLink').addEventListener('click', function() {
            var options = document.getElementById('registrationOptions');
            if (options.style.display === 'none') {
                options.style.display = 'block';
            } else {
                options.style.display = 'none';
            }
        });
    </script>
</body>

</html>
