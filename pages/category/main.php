<?php

require_once(__DIR__ . '/../../models/ProductCategory.php');

$productCategory = new ProductCategory;

$category = $productCategory->readBySlug($_GET['slug']);

?>

<h2 class="main-subtitle"><?=  $category['name']; ?></h2>

<article class="products">
    <?php foreach ($productCategory->readByCategory($category['category_id']) as $product) { ?>
        <figure class="product-items">
            <div class="background-product">
                <img class="image-product" src="<?= DIR_IMG ?>/products/<?= $product['product_id'] ?>.jpg" alt="">
            </div>

            <div class="items-about">
                <figcaption class="about"><?= $product['name'] ?></figcaption>
                <figcaption class="value">R$ <?= $product['price'] ?></figcaption>
            </div>
        </figure>
    <?php } ?>
</article>