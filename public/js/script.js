$(function() {
    $( ".sortable" ).sortable({
        connectWith: ".connectedSortable",
        receive: function( event, ui ) {
            numberOfCards1 = $(this).children().length;
            let link = $(this).siblings().children('a');
            var classParts = link.children().attr('class');
            if(classParts) {
                var limit = classParts.split(' ')[1];
            }

            if(limit && limit !== '0'){
                if(numberOfCards1 > limit) {
                    alert('You exceeded the Limit for this Column.');
                    ui.sender.sortable("cancel");
                }
            }
        },
    }).disableSelection();

    $('.add-button').click(function() {
        $('.alert-success').empty();
        let number;
        let txtNewItem = $('#new_text').val();
        classParts = $('#to-do').attr('class');

        if(classParts){
            number = classParts.split(' ')[1];
        } else {
            number = '0';
        }

        var numberOfCards1 = $("#to-do-sortable").children().length;

        if (numberOfCards1 < number || number == '0' || !number){
            $(this).closest('div.container').find('ul').append('<li class="card">'+txtNewItem+'</li>');
            if($('#new_text').val()) {
                $('.link-div #new_text').val('');
            }
        } else {
            alert('You exceeded the Limit for this Column.');
        }
    });
});