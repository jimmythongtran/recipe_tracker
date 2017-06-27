
$(document).ready(function() {

  /**
   * Add recipe ingredients
   */

  var $addIngredientForm = $('#add_ingredient_form');

  $('#show_add_ingredient').click(function(e) {
    e.preventDefault();
    $addIngredientForm.toggle();
  });

  $addIngredientForm.submit(function(e) {
    e.preventDefault();

    // Get the form's URL from its "action" attribute
    // that was set with the proper url using form_open()
    var formURL = $addIngredientForm.attr('action');

    // Get the form inputs' values in a string
    // formatted as name1=value1&name2=value2, etc.
    var formData = $addIngredientForm.serialize();

    // Get the current number of ingredients
    // and set our new ingredient's order to that number + 1
    var $ingredientList = $('#ingredients');
    var ingredientOrder = $ingredientList.find('li').length + 1;

    // Add the order value to our form data
    formData = formData + "&order=" + ingredientOrder;

    // Submit the form data via Ajax
    $.post(
      formURL,
      formData,
      function(json) {
        // Clear any previous errors
        var $addIngredientErrors = $('#add_ingredient_errors');
        $addIngredientErrors.empty();

        // Act according to the status returned
        var status = json["status"];
        if (status == "success") {
          var ingredientHTML = json["ingredient"];
          $ingredientList.append(ingredientHTML);

          // Reset the text input values and hide the form
          $addIngredientForm.find('input[type="text"]').val('');
          $addIngredientForm.hide();
        }
        else if (status == "fail") {
          var errorsHTML = json["errors"];
          $addIngredientErrors.html(errorsHTML);
        }
      },
      'json'
    );

  }); //end add Ingredients form

  /**
   * Add recipe steps
   */

  var $addStepForm = $('#add_step_form');

  $('#show_add_step').click(function(e) {
      e.preventDefault();
      $addStepForm.toggle();
  });

  $addStepForm.submit(function(e) {
      e.preventDefault();

      var formURL = $addStepForm.attr('action');
      var formData = $addStepForm.serialize();
      var $stepList = $('#steps');
      var stepOrder = $stepList.find('li').length + 1;
      formData = formData + "&order=" + stepOrder;

      $.post(
        formURL,
        formData,
        function(json) {
            var $addStepErrors = $('#add_step_errors');
            $addStepErrors.empty();

            var status = json["status"];
            if (status == "success") {
                var stepHTML = json["step"];
                $stepList.append(stepHTML);

                $addStepForm.find('input[type="text"]').val('');
                $addStepForm.hide();
            }
            else if (status == "fail") {
                var errorsHTML = json["errors"];
                $addStepErrors.html(errorsHTML);
            }
        },
        'json'
        );
  });//end submit

  /**
   * upload recipe image
   */

  var $uploadImageForm = $('#upload_image_form');

  $('#show_upload_image').click(function(e) {
      e.preventDefault();
      $uploadImageForm.toggle();
  });

  /**
   * delete ingredients/steps
   */

  $('.delete-recipe-item').click(function() {
      var $recipeItem = $(this).closest('.list-group-item');
      var itemType = $recipeItem.attr('data-type');
      var itemId = $recipeItem.attr('data-id');

      // Confirm the deletion before executing it
      if (confirm(
          'Are you sure you wish to remove this ' + itemType + '?')) {
          // Assemble the necessary information,
          // and make the AJAX request to delete the item...
      }
  }); //end delete-recipe-item

}); // end JavaScript
