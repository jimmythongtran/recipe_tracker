<div id="add_step_errors"></div>

<?php
$form_attributes = array(
    'id' => 'add_step_form',
    'class' => 'add-recipe-item-form',
);
echo form_open('recipes/create_step', $form_attributes);
?>

    <?php
    echo form_hidden('recipe_id', $recipe_id);
    ?>

    <div class="form-group">
        <label>Instructions</label>
        <?php
        echo form_textarea(array(
            'name' => 'instructions',
            'class' => 'form_control',
            'placeholder' => 'e.g. Next, mix the flour and...',
        ));
        ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Add</button>
    </div>

<?php
echo form_close();
?>

<p><a id="show_add_step" href="#">+ Add step</a></p>
