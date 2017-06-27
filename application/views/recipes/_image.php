<?php if (!empty($recipe->image)) { ?>
<div class="recipe-image">
    <img src="<?php echo base_url('uploads/' . $recipe->image); ?>">
</div>
<?php } ?>

<?php
$form_attributes = array(
    'id' => 'upload_image_form',
    'class' => 'add-recipe-item-form',
);
echo form_open_multipart('recipes/upload_image', $form_attributes);
?>
    <div class="well">

        <?php echo form_hidden('recipe_id', $recipe_id); ?>

    <div class="form-group">
        <label>Recipe Image</label>
        <?php echo form_upload('image'); ?>
        <p class="help-block">Only .jpg and .png files allowed</p>
    </div>

    <button type="submit" class="btn btn-success">Upload</button>

</div>

<?php
echo form_close();
?>

<p><a id="show_upload_image" href="#">+ Set image</a></p>
