$('document').ready(function(){

    function displayIngredients() {
        const idIngredientToDisplay = '#' +  $('#ddl-food').val() + '-ingredients';
        $('.ingredient-list').hide();
        $(idIngredientToDisplay).show();
    }

    $('#ddl-food').on('change', function (event) {
        displayIngredients();
    });
    displayIngredients();
});