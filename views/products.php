<div class="container mt-3 px-5">

    <?php if (app()->session->hasFlash('success')); { ?>
        <p class="has-text-success">
            <?= app()->session->getFlash('success'); ?>
        </p>
    <?php } ?>

    <form method="POST" action="/product/mass-delete" id="products">
        <div class="row justify-content-center justify-content-sm-start">
            <?php foreach ($products as $product) : ?>
                <div class="col-10 col-sm-6 col-md-4 col-lg-3 my-3">

                    <div class="card border border-secondary rounded-lg">
                        <div class="card-body text-center">

                            <!-- checkbox -->
                            <div class="form-check">
                                <input class="form-check-input delete-checkbox DVD" name="<?php echo $product['product_id'] ?>" type="checkbox" value="<?php echo $product['type'] ?>" id="flexCheckDefault">
                            </div>
                            <!-- showing Product sku -->
                            <h6><?php echo $product['sku'] ?></h6>
                            <!-- showing Product name -->
                            <h6><?php echo $product['name'] ?></h6>
                            <!-- showing Product price -->
                            <h6><?php echo round($product['price'], 2) . ' $' ?></h6>
                            <!-- showing Product size -->
                            <h6><?php echo $idsWithSpecialAttrs[$product['product_id']] ?></h6>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </form>
</div>