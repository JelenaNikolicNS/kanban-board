$(function() {
    $( ".sortable" ).sortable({
        connectWith: ".connectedSortable",
        receive: function( event, ui ) {
            numberOfCards1 = $(this).children().length;
            var link = $(this).siblings().children('a');
            var classParts = link.children().attr('class');
            if(classParts) {
                var limit = classParts.split(' ')[1];
            }

            if(limit && limit !== '00'){
                if(numberOfCards1 > limit) {
                    alert('You excedeed the Limit for this Column.');
                    ui.sender.sortable("cancel");
                }
            }
        },
    }).disableSelection();

    $('.add-button').click(function() {
        var number;
        var txtNewItem = $('#new_text').val();
        classParts = $('#to-do').attr('class');

        if(classParts){
            number = classParts.split(' ')[1];
        } else {
            number = '00';
        }

        var numberOfCards1 = $("#to-do-sortable").children().length;

        if (numberOfCards1 < number || number == '00' || !number){
            $(this).closest('div.container').find('ul').append('<li class="card">'+txtNewItem+'</li>');
        } else {
            alert('You excedeed the Limit for this Column.');
        }
    });
});