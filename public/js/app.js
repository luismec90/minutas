$(function () {

    $('.btn-file-input :file').change(function () {
        var input = $(this);
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().siblings("input").val(label);
    });

    $('#form-minutas').on('submit', function () {
        coverOn();
    });
    
    $('#contact-form').on('submit', function () {
        coverOn();
    });

});

function coverOn() {
    $("#cover-display").css({
        "opacity": "1",
        "width": "100%",
        "height": "100%"
    });
}

function coverOff() {
    $("#cover-display").css({
        "opacity": "0",
        "width": "0",
        "height": "0"
    });
}
