<?php


/*$result = all('products');*/

require_once "user.php";
require_once "../db.php";
$pdo = pdo();
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$result = $stmt->fetchAll();
?>

<p class="lead text-center text-muted">OUR LATEST BOOKS</p>
<br><br>
<div>
    <form action="store.php" method="post">
        <div class="d-flex justify-content-start ">
            <?php foreach ($result as $r) : ?>
                <div class="product-card bg-white border m-2 p-2 pb-3 text-center sh" style="width: 240px; overflow: hidden">
                    <div class="product-image w-100" style="height: 250px; background-image:url('../uploads/<?php echo $r['image']; ?>'); background-size: contain; background-position: center; background-repeat: no-repeat"></div>
                    <h4 class="card-title"><?php echo $r['name']; ?></h4>
                    <p class="card-text">Price:<?php echo $r['price']; ?></p>
                    <div class="product-card">
                        <select class="select">
                            <option value="0">Qty
                                <?php
                                for ($i = 1; $i <= $r['qty']; $i++) {
                                    echo "<option>$i</option>";
                                } ?>
                            </option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="submit" name="Add_To_Cart" class="btn btn-dark">Add To Cart</button>
                        <input type="hidden" name="name" value="book">
                        <button type="view" name="view" class="btn btn-info">View</button>

                    </div>


                </div>
            <?php endforeach; ?>
        </div>

    </form>
</div>