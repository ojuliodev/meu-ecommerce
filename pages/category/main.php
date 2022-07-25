<?php

require_once(__DIR__ . '/../../models/ProductCategory.php');

$productCategory = new ProductCategory;

$category = $productCategory->readBySlug($_GET['slug']);

?>

<h2 class="main-subtitle subtitle-category"><?=  $category['name']; ?></h2>

<article class="products">
    <?php foreach ($productCategory->readByCategory($category['category_id']) as $product) { ?>
        <?php $image = file_exists(DIR_DOCUMENT . '/assets/images/' . $product['banner']) 
            ? DIR_IMG . '/' . $product['banner'] 
            : DIR_IMG . '/products/placeholder.png';?>

        <figure class="product-items">
        <a href="?page=product&slug=<?= $product['slug'] ?>">
            <div class="background-product">
                <img class="image-product" src="<?= $image ?>" alt="">
            </div>
        </a>

            <div class="items-about">
                <a href="?page=product&slug=<?= $product['slug'] ?>" class="product-slug">
                    <figcaption class="about"><?= $product['name'] ?></figcaption>
                </a>

                <figcaption class="value">R$ <?= str_replace('.', ',', $product['price']) ?></figcaption>
            </div>
        </figure>
    <?php } ?>
</article>