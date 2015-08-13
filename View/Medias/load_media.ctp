<?php
$uuid = time();
foreach($medias as $media) {?>
    <div class="img-item" id="img-<?php echo $media['Media']['id']?>">
        <label>
            <?php echo $this->Media->image($media['Media']['file'], 100, 150, array('class' => 'thumbnail'));?>
            <input type="checkbox" name="group[<?php echo $uuid; ?>][medias][]" value="<?php echo $media['Media']['id']?>"/>
        </label>
    </div>
<?php } ?>
<input type="hidden" id="uuid" value="<?php echo $uuid; ?>">
