jQuery(document).ready(function($) {
    $('#evento').countdown(data, function(e) {
        $('#dias').html(e.strftime('%D Dias'));
        $('#horas').html(e.strftime('%H Horas'));
        $('#minutos').html(e.strftime('%M Min.'));
        $('#segundos').html(e.strftime('%S Seg.'));
    });
});