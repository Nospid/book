<?php
session_start();
require_once "../db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Simple Shopping Cart using Session in PHP</title>
    <link rel="stylesheet" type="text/css" href="..//css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">

                    <h1 class="container text-center text-white  mt-3 p-3 rounded shadow" style="background-color:#09386e">Shopping Products</h1>

                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <!-- left nav here -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1 class="page-header text-center" style="background-color:#004fed43">Cart Details</h1>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-info text-center">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }

                ?>
                <form method="POST" action="save_cart.php">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                            //initialize total
                            $total = 0;
                            if (!empty($_SESSION['cart'])) {
                                //connection

                                //create array of initail qty which is 1
                                $index = 0;
                                if (!isset($_SESSION['qty'])) {
                                    $_SESSION['qty'] = array_fill(0, count($_SESSION['cart']), 1);
                                }

                                $pdo = pdo();
                                $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")");
                                $stmt->execute($sql);

                                $data = $stmt->fetch(); {
                            ?>
                                    <tr>
                                        <td>
                                            <a href="delete_item.php?id=<?php echo $data['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo number_format($data['price'], 2); ?></td>
                                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                        <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                                        <td><?php echo number_format($_SESSION['qty'][$index] * $data['price'], 2); ?></td>
                                        <?php $total += $_SESSION['qty'][$index] * $row['price']; ?>
                                    </tr>
                                <?php
                                    $index++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4" class="text-center">No Item in Cart</td>
                                </tr>
                            <?php
                            }

                            ?>
                            <tr>
                                <td colspan="4" align="right"><b>Total</b></td>
                                <td><b><?php echo number_format($total, 2); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                    <button type="submit" class="btn btn-info" name="save">Save Changes</button>
                    <a href="clear_cart.php" class="btn btn-secondary"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
                    <a href="checkout.php" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Checkout</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>