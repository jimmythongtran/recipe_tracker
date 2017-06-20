<h1>Add a recipe</h1>

<?php $this->load->view('_form_errors'); ?>

<?php echo validation_errors(); ?>

<?php echo form_open('recipes/create'); ?>

<form role="form">

    <div class="form-group">
        <label>Name<span class="text-danger">*</span></label>
        <?php
        echo form_input(array(
            'name' => 'name',
            'class' => 'form-control',
            'value' => set_value('name')
        ));
        ?>
    </div>

    <div class="form-group">
        <label>Author<span class="text-danger">*</span></label>
        <?php
        echo form_dropdown('author_id', $author_options, set_value('author_id'), 'class="form-control"');
        ?>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-12">
            <label>Number of servings <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-2">
            <?php
            echo form_input(array(
                'type' => 'number',
                'name' => 'servings',
                'class' => 'form-control',
                'value' => set_value('servings')
            ));
            ?>
        </div>
    </div>

    <div class="form-group form-time clearfix">
        <div><label>Prep Time <span class="text-danger">*</span></label></div>
        <?php
        echo form_dropdown('time_prep_hours', $hour_options, set_value('time_prep_hours'), 'class="form-control"');
        ?>
        <label class="select-label">hr.</label>
        <?php
        echo form_dropdown('time_prep_minutes', $minute_options, set_value('time_prep_minutes'), 'class="form-control"');
        ?>
        <label class="select-label">min.</label>
    </div>

    <div class="form-group form-time clearfix">
        <div><label>Cook Time<span class="text-danger">*</span></label></div>
        <?php
        echo form_dropdown('time_cook_hours', $hour_options, set_value('time_cook_hours'), 'class="form-control"');
        ?>
        <label class="select-label">hr.</label>
        <?php
        echo form_dropdown('time_cook_minutes', $minute_options, set_value('time_cook_minutes'), 'class="form-control"');
        ?>
        <label class="select-label">min.</label>
    </div>

    <button type="submit" class="btn btn-lg btn-primary">Add Recipe</button>

</form>

<?php echo form_close(); ?>
