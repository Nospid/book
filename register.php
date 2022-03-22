<?php
require "db.php";

if (!empty($_POST)) {

    $name = request('name');
    $email = request('email');
    $password = request('password');
    $password_verify = request('password_verify');


    if (empty($email) || empty($password) || empty($name) || empty($password_verify)) {
        die("Please fill all the fields!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please provide an valid email!");
    }

    $user = where('users', 'email', '=', $email, false);

    if ($user) {
        die("Email has already been taken!");
    }

    if ($password != $password_verify) {
        die("Password and Confirm Password do not match!");
    }

    if (strlen($password) < 5) {
        die("Password must be 5characters or more!");
    }

    create('users', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);
    header("Location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-middle, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>



    <section class="h-100 bg-info">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-3">
                        <div class="row g-0 bg-dark">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="images/71d754c418ff75a9815a407d086c8c75.jpg" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-3 text-light">
                                    <h3 class="mb-5 text-uppercase bg-light"> Registration form</h3>
                                    <form action="register.php" method="post">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone no.</label>
                                            <input type="text" name="phone" id="phone" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_verify" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_verify" id="password_verify" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-info" <a href="login.php">
                                            Register</a>
                                        </button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>