<?php
ob_start();
// include header.php file
include('header.php');
?>

<?php


count($product->getData('cart')) ? include('Template/_cart-template.php') :  include('Template/notFound/_cart_notFound.php');

count($product->getData('wishlist')) ? include('Template/_wishilist-template.php') :  include('Template/notFound/_wishlist-notFound.php');


/*  include top sale section */
include('Template/_top-sale.php');
/*  include top sale section */


?>


<?php
// include footer.php file
include('footer.php');
?>