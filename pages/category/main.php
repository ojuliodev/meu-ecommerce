<?php

require_once(__DIR__ . '/../../models/ProductCategory.php');

$productCategory = new ProductCategory;

$category = $productCategory->readBySlug($_GET['slug']);

?>

<h2 class="main-subtitle subtitle-category"><?=  $category['name']; ?></h2>

<article class="products">
    <?php foreach ($productCategory->readByCategory($category['category_id']) as $product) { ?>
        <figure class="product-items">
        <a href="?page=product&slug=<?= $product['slug'] ?>">
            <div class="background-product">
                <img class="image-product" src="<?=DIR_IMG . '/' . $product['banner'] ?>" alt="">
            </div>
        </a>

            <div class="items-about">
                <a href="?page=product&slug=<?= $product['slug'] ?>" class="product-slug">
                    <figcaption class="about"><?= $product['name'] ?></figcaption>
                </a>

                <figcaption class="value">R$ <?= $product['price'] ?></figcaption>
            </div>
        </figure>
    <?php } ?>
</article>