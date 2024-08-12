<?php
$conn = mysqli_connect('localhost','root','','ecommerce_website');
if(isset($_GET['id'])){
    $product_id  = $_GET['id'];
        $sql = "SELECT * FROM cart WHERE product_id=$product_id";
        $result = $conn->query($sql);
        $total_cart = "SELECT * FROM  cart";
        $total_cart_result = $conn->query($total_cart);
        $cart_num = mysqli_num_rows($total_cart_result);
        if(mysqli_num_rows($result) > 0){
                $in_cart = "already in the cart";
                echo json_encode(['num_cart'=>$cart_num-1,"in_cart"=>$in_cart]);
        }else {
            $insert = "INSERT INTO cart(product_id) VALUES($product_id)";
            if($conn->query($insert) === true){
                        $in_cart = "added in the cart";
                        echo json_encode(['num_cart'=>$cart_num,"in_cart"=>$in_cart]);
    
            }else {
                echo "<script>alert('it doesnt matter')</script>";
            }
        }
}

if(isset($_GET["cart_id"])){
    $product_id = $_GET['cart_id'];
    $sql = "DELETE FROM cart where product_id = ".$product_id;
    if($conn->query($sql) === TRUE){
        echo "removed";
    }
}

?>