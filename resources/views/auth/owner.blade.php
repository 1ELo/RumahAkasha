<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>

<!-- Pop-up login -->
<div id="loginPopup" class="popup">
        <div class="header">
            <h1>Only For Owner</h1>
            <h4>Please login using owner username</h4>
        </div>

        <div class="form-login">
            <form action="POST" name="login">
                <label for="username">Username:</label><br>
                <input type="text" name="username"><br>
            </form>
        </div>
        <button type="submit" class="button-login">
            <h3>LOGIN</h3>
        </button>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>