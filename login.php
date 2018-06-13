<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Memo IFM</title>
    <meta name="theme-color" content="#003a75">
    <meta name="apple-mobile-web-app-status-bar-style" content="#003a75">
    <meta name="theme-color" content="#003a75">
    <meta name="apple-mobile-web-app-status-bar-style" content="#003a75">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/auth.css">
    <link rel="icon" href="logo.png">
</head>
<body>
<main class="layout center-center">
    <div id="authBox">
        <h1>Login to <em class="text-light">Smart Memo</em></h1>

        <form action="process_login.php" method="POST">
            <div class="input-box">
                <input type="text" required id="email" name="email">
                <label for="email">Email</label>
            </div>

            <div class="input-box">
                <input type="password" required id="password" name="password">
                <label for="password">Password</label>
            </div>

            <div class="layout end-justified">
                <button class="rounded-btn" type="submit" name="login">
                    LOGIN
                </button>
            </div>
            <p>
                Don't have an account yet?  <a href="register.php"> Register</a>
            </p>
        </form>
    </div>
</main>

<script src="js/jquery.min.js"></script>

</body>
</html>