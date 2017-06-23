<h1><?php echo $recipe->name; ?></h1>

<div class="row recipe-quick-facts">
    <div class="col-md-4">
        <h4>Servings</h4>
        <?php echo $recipe->servings; ?>
    </div>
    <div class="col-md-4">
        <h4>Prep Time</h4>
        <?php echo display_time($recipe->time_prep); ?>
    </div>
    <div class="col-md-4">
        <h4>Cook Time</h4>
        <?php echo display_time($recipe->time_cook); ?>
    </div>
</div>

<div class="recipe-ingredients">

    <h2>Ingredients</h2>

    <ul id="ingredients" class="list-group">
    <?php
    foreach ($ingredients as $single_ingredient) {
        $data = array(
            'ingredient' => $single_ingredient
    );
    $this->load->view('recipes/_ingredient', $data);
    }
    ?>
    </ul>

</div><!-- /.recipe-ingredients -->

<div class="recipe-steps">

    <h2>Steps</h2>

    <ul id="steps" class="list-group">
    <?php
    foreach ($steps as $single_step) {
        $data = array(
            'step' => $single_step
        );
        $this->load->view('recipes/_step', $data);
    }
    ?>
    </ul>
</div><!-- /.recipe-steps -->
