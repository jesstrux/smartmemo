<?php include("includes/connection.php");?>
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/flex.css">
    <link rel="stylesheet" href="css/auth.css">
    <link rel="icon" href="logo.png">
</head>
<body >
<main style="align-items: flex-start; padding: 5em 0">
    <div id="authBox" style="min-width: 630px; display: block;">
        <h1>Register for <em class="text-light">Smart Memo</em></h1>

        <form action="process_register.php" method="POST" autocomplete="off">
            <div class="input-box">
                <input type="text" required id="fname" name="fname">
                <label for="fname">First Name</label>
            </div>
            <div class="layout">
                <div class="input-box flex">
                    <input type="text" required id="lname" name="mname">
                    <label for="full_name">Middle Name</label>
                </div>
                <div class="input-box flex">
                    <input type="text" required id="surname" name="surname">
                    <label for="surname">Surname</label>
                </div>
            </div>

            <div class="layout">
                <div class="input-box flex">
                    <select required id="department" name="department">
                        <option value=""></option>
                        <?php
                        $query = "SELECT * FROM department";
                        $result =	mysqli_query($con, $query); //execute the query
                        while($data	=	mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $data['id']?>"><?php echo $data['name']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="department">Choose Department</label>
                </div>

                <div class="input-box flex">
                    <select required id="job_title" name="job_title">
                        <option value=""></option>
                        <?php
                        $query = "SELECT * FROM job";
                        $result =	mysqli_query($con, $query); //execute the query
                        while($data	=	mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $data['id']?>"><?php echo $data['name']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="job_title">Choose Job title</label>
                </div>
            </div>

           <div class="layout">
                <div class="input-box flex">
                    <input type="number" required id="mobile" name="mobile">
                    <label for="mobile">Phone number</label>
                </div>
                <div class="input-box flex">
                    <input type="email" required id="email" name="email">
                    <label for="email">Email</label>
                </div>
           </div>

            <div class="input-box">
                <input type="password" required id="password" name="password">
                <label for="password">Password</label>
            </div>
            <div>
                <meter max="4" id="password-strength-meter" style="width: 100%;max-width: 390px;"></meter>
                <p id="password-strength-text" style="max-width: 348px;color: #f44336;font-size: 11px;margin: 5px;"></p>
            </div>

            <div class="input-box">
                <input type="password" required id="confirm" name="confirm">
                <label for="confirm">Confirm Password</label>

            </div>
            <div id="divCheckPasswordMatch"></div>



            <div class="layout end-justified">
                <button class="rounded-btn" tupe="submit" id="register" name="register" disabled>
                    REGISTER
                </button>
            </div>

            <p>
                Already have an account? <a href="login.php">Login</a>
            </p>
        </form>
    </div>
</main>

<?php include ("partials/js.php"); ?>



</body>

</body>
</html>