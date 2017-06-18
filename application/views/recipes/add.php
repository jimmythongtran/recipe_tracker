<h1>Add a recipe</h1>

<form role="form">

    <div class="form-group">
        <label>Name<span class="text-danger">*</span></label>
        <?php
        echo form_input(array(
            'name' => 'name',
            'class' => 'form-control'
        ));
        ?>
    </div>

    <div class="form-group">
        <label>Author<span class="text-danger">*</span></label>
        <?php
        echo form_dropdown('author_id', $author_options, '', 'class="form-control"');
        ?>
    </div>

    <div class="form-group form-time clearfix">
        <div><label>Prep Time<span class="text-danger">*</span></label></div>
        <?php
        echo form_dropdown('time_prep_hours', $hour_options, '', 'class="form-control"');
        ?>
        <label class="select-label">hr.</label>
        <?php
        echo form_dropdown('time_prep_minutes', $minute_options, '',
            'class="form-control"');
        ?>
        <label class="select-label">min.</label>
    </div>

    <div class="form-group form-time clearfix">
        <div><label>Cook Time<span class="text-danger">*</span></label></div>
        <?php
        echo form_dropdown('time_cook_hours', $hour_options, '', 'class="form-control"');
        ?>
        <label class="select-label">hr.</label>
        <?php
        echo form_dropdown('time_cook_minutes', $minute_options, '', 'class="form-control"');
        ?>
        <label class="select-label">min.</label>
    </div>

    <button type="submit" class="btn btn-lg btn-primary">Add Recipe</button>

</form>
