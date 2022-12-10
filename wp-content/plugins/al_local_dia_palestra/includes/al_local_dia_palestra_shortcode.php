<?php

/**
 *  O que é um shortcode?
 *  Seria o nome dado para blocos de códigos que devem ser executados o qual
 *  são referenciados por uma tag de indentificação.
 * 
 */


add_shortcode('al_local_dia_palestra', 'al_local_dia_palestra_codigo_gerado');

function al_local_dia_palestra_codigo_gerado() {

    $endereco = urlencode(get_option('al_local_dia_palestra_endereco'));
    $cidade = urlencode(get_option('al_local_dia_palestra_cidade'));
    $data = get_option('al_local_dia_palestra_data');

    return '
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=' . esc_attr($endereco) . esc_attr($cidade) . '&t=&z=13&ie=UTF8&iwloc=&output=embed" 
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

            </iframe>
        </div>
    </div>
    <h2 class="proximo-evento">Próximo Evento</h2>
    <div id="evento">
        <div id="dias"></div>
        <div id="horas"></div>
        <div id="minutos"></div>
        <div id="segundos"></div>
    </div>';
}