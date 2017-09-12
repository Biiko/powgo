$(function() {
        $(".btn").click(function(){
            $(this).button('loading').delay(5).queue(function() {
            // $(this).button('reset');
            // $(this).dequeue(); 
            });
        });
    }); 