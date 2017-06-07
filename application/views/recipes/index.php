<h1>Recent Recipes</h1>
<div class="list-group">
    <?php foreach ($recipes as $recipe) { ?>
        <div class="list-group-item clearfix">
            <h4 class="list-group-item-heading"><?php echo $recipe->name; ?></h4>
        <p class="list-group-item-text">
            <?php echo $recipe->time_cook; ?>
        </p>
        </div>
    <?php } ?>
</div>
