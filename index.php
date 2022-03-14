<?php
require_once "./includes/file.inc.php";
session_start();

if(isset($_POST['add'])){
    if (isset($_SESSION['cart'])){
   ;
    $item_array_id = array_column($_SESSION['cart'], 'product_id');
    if(in_array($_POST['product_id'], $item_array_id)){
        echo "<script>alert('Item already in Cart')</script>";
        echo "<script>window.location='index.php'</script>";
    
    }else{
    $count = count($_SESSION['cart']);
    $item_array =array(
        'product_id' => $_POST['product_id']
    );
    $_SESSION['cart'][$count] = $item_array;
    //print_r($_SESSION['cart']);
    }
    }else{
    $item_array =array(
        'product_id' => $_POST['product_id']
    );
    $_SESSION['cart'][0] = $item_array;
    }
    }
?>

    <?php require_once "header.php"; ?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
            foreach ($items as $item) {

                echo ('<div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                 <div class="card shadow">
                    <div>
                        <img src= "' . $item['image'] . '" alt="image 1" class="img-fluid" card-img-top>
                     </div>
                    <div class="card-body">
                      <h5 class="card-title">' . $item['title'] . '</h5>
                         <h6>
                             <i class = "fas fa-star"></i>
                             <i class = "fas fa-star"></i>
                             <i class = "fas fa-star"></i>
                             <i class = "fas fa-star"></i>
                             <i class = "far fa-star"></i>
                         </h6>
                         <p class="card-text"></p>
                         <p style=" text-align:justify; height:85px; font-family: Verdana, Arial, Tahoma, sans-serif; overflow: hidden; font-size: 14px; vertical-align:text-top; margin: 0; padding:0; line-height:1.5; ">' . $item['description'] . '</p>
                            
                         <h5>
                         <small><s class="text-secondary">$519</s></small>  
                         <span class="price">' . $item['price'] . '</span></h5>
                        <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart<i class="fas fa-shopping-cart"></i></button>
                        <input type="hidden" name = "product_id" value =' . $item['id'] . '>
                    </div>
                </div>
                </form>
                </div>'
                
                );
                
            }
            ?>
        </div>
    </div>

    <?php
require_once "footer.php";
?>