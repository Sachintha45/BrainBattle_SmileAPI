<?php require_once "../Data/signindb.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>

    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/LogReg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
</head>
<body>
    <main>
        <h1 class="display-4 pt-3">BRAIN BATTLE</h1>
        <section class="container wrapper">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                <div class="form-row">
                    <div class="col-md-2 label-col">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-md-10 input-col">
                        <div class="form-group <?php (!empty($username_err)) ? 'has_error' : ''; ?>">
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-2 label-col">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-10 input-col">
                        <div class="form-group <?php (!empty($password_err)) ? 'has_error' : ''; ?>">
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-2 label-col">
                        <label for="confirm_password">ConfirmPassword</label>
                    </div>
                    <div class="col-md-10 input-col">
                        <div class="form-group <?php (!empty($confirm_password_err)) ? 'has_error' : ''; ?>">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group text-center mx-auto">
                    <input type="submit" class="btn btn-sm btn-rounded btn-danger" value="Submit">
                    <input type="reset" class="btn btn-sm btn-rounded btn-transparent" value="Reset">
                </div>
                <div class="text-center">
                    <p>Already have an account? <a href="login.php">Login here</a>.</p>
                </div>
            </form>
        </section>
    </main>
</body>
</html>