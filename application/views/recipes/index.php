<h1>
    <a class="btn btn-success add-recipe" href="<?php echo site_url('recipes/add'); ?>"><i class="glyphicon glyphicon-plus"></i> Recipe</a>
    Recent Recipes
</h1>

<?php echo $this->session->flashdata('message'); ?>

<div class="list-group recipes-list">
    <?php foreach ($recipes as $recipe) { ?>
    <a class="list-group-item clearfix" href="<?php echo site_url('recipes/' . $recipe->id); ?>">
    <?php if (!empty($recipe->image)) { ?>
        <img src="<?php echo base_url('uploads/' . $recipe->image); ?>">
    <?php }?>
        <h4 class="list-group-item-heading"><?php echo $recipe->name; ?></h4>
        <p class="list-group-item-text">
            <?php echo $recipe->time_cook; ?><br>
            <?php echo $recipe->author_name; ?><br>
        </p>
        </a>
    <?php } ?>
</div>
