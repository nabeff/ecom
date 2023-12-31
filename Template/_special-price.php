<!-- Special Price -->
<?php
$brand = array_map(function ($pro) {
    return $pro['item_brand'];
}, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['special_price_submit'])) {
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>
<section id="special-price">
    <div class="container">

        <h4 class="font-rubik font-size-20">Special Price</h4>
        <hr>
        <div id="filters" class="button-group font-baloo font-size-16 text-end ">
            <button class="btn is-checked border" data-filter="*">All Brand</button>
            <?php
            array_map(function ($brand) {
                printf('<button class="btn border m-1" data-filter=".%s">%s</button>', $brand, $brand);
            }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item) use ($in_cart) { ?>
                <div class="grid-item  <?php echo $item['item_brand'] ?? "Brand"; ?>">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product  d-flex flex-column justify-content-center">

                            <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>" class="d-flex  justify-content-center"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid " style="height: 120px;"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>

                                <div class="price py-2">
                                    <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $in_cart ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                    } else {
                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                    }
                                    ?>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->