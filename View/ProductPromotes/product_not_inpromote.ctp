<?php foreach ($products as $product) { ?>
    <div class="p-media col-md-4" id="product_<?php echo $product['Product']['id']; ?>" data-id="<?php echo $product['Product']['id']; ?>">
        <?php echo $this->Media->image($product['Thumb']['file'], 50, 70, array ('class' => 'thumbnail')); ?>
        <a href="javascript:;" onclick="add_item(<?php echo $product['Product']['id']; ?>)"
           class="btn-info plug">
            <i class="glyphicon glyphicon-plus"></i>
        </a>
        <a href="javascript:;" onclick="remove_item(<?php echo $product['Product']['id']; ?>)"
           class="btn-info hidden minus">
            <i class="glyphicon glyphicon-minus"></i>
        </a>
        <h4 class=""><?php echo $product['Product']['name']; ?></h4>
    </div>
<?php } ?>
