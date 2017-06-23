<div id="add_ingredient_errors"></div>

<?php
$form_attributes = array(
    'id' => 'add_ingredient_form',
    'class' => 'add-recipe-item-form',
);
echo form_open('recipes/create_ingredient', $form_attributes);
?>
    <?php echo form_hidden('recipe_id', $recipe_id); ?>
    <div class="form-group row">
        <div class="col-xs-3">
        <label>Amount</label>
        <?php
        echo form_input(array(
            'name' => 'amount',
            'class' => 'form-control',
            'placeholder' => 'e.g. 3',
        ));
        ?>
    </div>
    <div class="col-xs-3">
        <label>Unit</label>
        <?php
        echo form_input(array(
            'name' => 'unit',
            'class' => 'form-control',
            'placeholder' => 'e.g. tbsp',
        ));
        ?>
        </div>
    <div class="col-xs-4">
        <label>Ingredient</label>
        <?php
        echo form_input(array(
            'name' => 'name',
            'class' => 'form-control',
            'placeholder' => 'e.g. cinnamon',
        ));
        ?>
    </div>
    <div class="col-xs-2">
        <button class="btn btn-success" type="submit">Add</button>
    </div>
    </div>

<?php
echo form_close();
?>

<p><a id="show_add_ingredient" href="#">+ Add ingredient</a></p>
