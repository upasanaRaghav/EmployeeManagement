$(document).ready(function(){
    $('#password').focusin(function(){
        $('form').addClass('up');
    });
    $('#password').focusout(function(){
        $('form').removeClass('up');
    });

    // Panda Eye move
    $(document).on("mousemove", function(event) {
        var dw = $(document).width() / 15;
        var dh = $(document).height() / 15;
        var x = event.pageX / dw;
        var y = event.pageY / dh;
        $('.eye-ball').css({
            width : x,
            height : y
        });
    });

    // Animation for wrong entry
    $('.btn').click(function(event){
        if ($('.alert').text().trim() !== '') {
            $('form').addClass('wrong-entry');
            setTimeout(function(){ 
                $('form').removeClass('wrong-entry');
            }, 3000);
        }
    });
});
