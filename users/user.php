<?php


require_once "../db.php";
//getting user data form database table
/*$user = find("users", $_SESSION["user_id"], false);*/


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Store</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#314354;">
        <div class="container-fluid">
            <h3 class="navbar-brand" " href=" home.php">Book Store</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class=" collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="index.php" role="button" aria-expanded="false">Categoreis</a>
                        <ul class="dropdown-menu">
                        </ul>
                    </li>


                    <li>
                        <a class="nav-link" href="../logout.php">Logout</a>

                    </li>


                    <button type="button" class="btn btn-info position-relative">
                        Cart
                        <span class="position-absolute top-0 start-10 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span>New Alerts</span>
                        </span>
                    </button>

            </div>



            </ul>



            <form class="d-flex">
                <input class="form-control me-sm-2" style="background-color:secondary" type="text" placeholder="Search">
                <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        </div>

    </nav>
    <div class="jumbotron border" style="  background: url('https://www.econlib.org/wp-content/uploads/2018/02/LF-books-background.png') no-repeat center center;background-size: cover;height:400px;
;
  ">
        <div class="container">
            <h1 style="text-align:center; margin:6% auto;">WELCOME TO THE BOOKSTORE</h1>
            <p style="text-align:center; margin:5% auto; color:#19211c;">Here you can find your favourite books and order them online!</p>
        </div>
    </div>
    </table>
</body>

</html>