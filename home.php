<?php


$result = all('products');

require_once "header.php";
require_once "db.php";

?>

<p class="lead text-center text-muted">OUR BOOKS</p>
<br><br>
<div>
    <form>
        <div class="d-flex justify-content-start ">
            <?php foreach ($result as $r) : ?>
                <div class="product-card bg-white border m-2 p-2 pb-3 text-center sh" style="width: 240px; overflow: hidden">
                    <div class="product-image w-100" style="height: 250px; background-image:url('uploads/<?php echo $r['image']; ?>'); background-size: contain; background-position: center; background-repeat: no-repeat"></div>
                    <h4 class="card-title"><?php echo $r['name']; ?></h4>
                    <p class="card-text">Price:<?php echo $r['price']; ?></p>

                    <div class="d-flex justify-content-around">
                        <button type="submit" name="Add_To_Cart" class="btn btn-danger">Add To Cart</button>
                        <input type="hidden" name="name" value="book">
                        <button type="view" name="view" class="btn btn-primary">View</button>

                    </div>


                </div>
            <?php endforeach; ?>
        </div>

    </form>
</div>