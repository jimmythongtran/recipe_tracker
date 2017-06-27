<li class="list-group-item" data-type="ingredient" data-id="<?php echo $ingredient->id; ?>">
<button class="btn btn-danger btn-xs pull-right delete-recipe-item" type="button">
<i class="glyphicon glyphicon-remove"></i></button>
    <?php
    echo $ingredient->amount . ' ' . $ingredient->unit . ' ' . $ingredient->name;
    ?>
</li>
