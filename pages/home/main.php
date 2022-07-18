<?php

require_once(__DIR__ . '/../../models/Product.php');
require_once(__DIR__ . '/../../models/ProductCategory.php');

$productCategory = new ProductCategory;

?>

<main class="main">
    <div class="banner">
        <img class="img-banner" src="assets/images/banner.png" alt="">
    </div>

    <section class="main-products">
        <?php foreach ($productCategory->read() as $category) { ?>
            
            <h2 class="main-subtitle"><?=  $category['name']; ?></h2>

            <article class="products">
                <?php foreach ($productCategory->readByCategory($category['category_id']) as $product) { ?>
                    <figure class="product-items">
                        <a href="?page=product&slug=<?= $product['slug'] ?>">
                            <div class="background-product">
                                <img class="image-product" src="<?= DIR_IMG ?>/products/placeholder.webp" alt="">
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
        <?php } ?>
    </section>
</main>