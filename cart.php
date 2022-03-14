<?php
session_start();
require_once "includes/file.inc.php";

if (isset($_POST['remove'])) {


    //print_r($_GET["id"])."<br>";
    if ($_GET['action'] == 'remove') {

        foreach ($_SESSION['cart'] as $key => $value) {

            //  print_r($_SESSION['cart']);
            // echo $value['product_id'];
            // echo $_GET['id']."<br>";
            //         echo $value['product_id'];
            if ($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }
}

?>

<body>
    <?php require_once "header.php"; ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>
                    <?php

                    if (isset($_SESSION['cart'])) {

                        $total = 0;
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        foreach ($items as $item) {
                            foreach ($product_id as $id) {
                                if ($item['id'] == $id) {
                                    echo ('<form action="cart.php?action=remove&id=' . $item['id'] . '" method="post" class="cart-items">
                                                    <div class="border rounded">
                                                        <div class="row bg-white">
                                                            <div class="col-md-3 pl-0">
                                                                <img src="' . $item['image'] . '" alt="" class="img-fluid">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="pt-2">' . $item['title'] . '</h5>
                                                                <small class="text-secondary">Seller: dailytuition</small>
                                                                <h5 class = "pt-2">$' . $item['price'] . '</h5>
                                                                <button type="submit" class="btn btn-warning">Save for later</button>
                                                                <button type="submit" class="btn btn-danger mx-2" name = "remove">Remove</button>
                                                            </div>
                                                            <div class="col-md-3 py-5">
                                                                <div>
                                                                    <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                                                                    <input type="text" value="1" class="form-control w-25 d-inline">
                                                                    <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>'
                                    );

                                    $total = $total + (int)$item['price'];
                                }
                            }
                        }
                    } else {

                        echo "<h5>Empty Cart</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php

                            if (isset($_SESSION['cart'])) {

                                $count = count($_SESSION['cart']);
                                echo "<h6>Price($count items)</h6>";
                            } else {
                                echo "<h6>Price(0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6><?php
                                if (isset($_SESSION['cart'])) {
                                    echo '$' . $total;
                                }
                                ?></h6>
                            <h6 class="text-success"><?php if (isset($_SESSION['cart'])) {
                                                            echo 'FREE.<br><hr>';
                                                        } ?></h6>

                            <h6><?php if (isset($_SESSION['cart'])) {
                                    echo '$' . $total;
                                } ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<?php
require_once "footer.php";
?>