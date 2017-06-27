<li class="list-group-item" data-type="step" data-id="<?php echo $step->id; ?>">
<button class="btn btn-danger btn-xs pull-right delete-recipe-item" type="button">
<i class="glyphicon glyphicon-remove"></i></button>
    <?php
    echo $step->instructions;
    ?>
</li>
