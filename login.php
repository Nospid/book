<?php
require "db.php";
require "functions.php";

if (!empty($_POST)) {

    $email = request('email');
    $password = request('password');

    if (empty($email) || empty($password)) {
        setError("Please fill both fields!");
        redirect('login.php');
    }

    $user = where('users', 'email', '=', $email, false);

    if (empty($user)) {
        setError("No user found with given email address");
        redirect('login.php');
    }

    if (password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];

        if ($user['role'] == "Admin") {
            header("Location: admin/");
        } else if ($user['role'] == "User") {
            echo "<script>alert('User')</script>";
            header("Location: users/home.php");
        } else {
            header("Location: home.php");
        }
    } else {
        setError("Invalid Email or Password!");
        redirect('login.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>



    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="vh-100" style="background-color: black;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="images/123.jpg" alt="login form" class="img-fluid" style=" width:auto;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <?php if (hasError()) : ?>
                                        <div class="alert alert-danger">
                                            <?php echo getError(); ?>
                                        </div>
                                    <?php endif; ?>



                                    <form action="login.php " method="post">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Logo</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>

                                        <div class="pt-1 mb-2">
                                            <button class="btn btn-dark  btn-block" type="submit">Login</button>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;">Register here</a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

</body>

</html>