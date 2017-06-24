
/* Custom JavaScript will be placed in this file */
$(document).ready(function() {
    /**
     * Add recipe ingredients
     */
    var $addIngredientForm = $('#add_ingredient_form');

    $('#show_add_ingredient').click(function(e) {
        e.preventDefault();
        $addIngredientForm.toggle();
    });
});
