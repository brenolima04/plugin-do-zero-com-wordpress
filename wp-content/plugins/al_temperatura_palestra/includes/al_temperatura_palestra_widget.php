<?php

add_action('widgets_init', 'al_temperatura_palestra_registra_widget');

function al_temperatura_palestra_registra_widget() {
    register_widget('TemperaturaPalestra');
}

class TemperaturaPalestra extends WP_Widget{

    public function __construct() {
        parent::__construct(
            'al_temperatura_palestra_widget',
            'Temperatura Palestra',
            array(
                'description' => 'Mostrar a temperatura no local da palestra'
            )
        );
    }

    /**
     * No processo de desenvolvimento de um widget para o Wordpress, você está
     * acessando um serviço externo que tem um chave de acesso. Sabendo disso, 
     * qual das alternativas abaixo seria a melhor forma de utilizar essa chave 
     * dentro do Wordpress?
     * 
     * Nós podemos definir uma constante em wp-config.php com o valor da chave 
     * e utilizar essa constante nos locais correspondentes.
     */

    public function widget($args, $instance) {
        $cidade = urldecode(get_option('al_local_dia_palestra_cidade'));

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.openweathermap.org/data/2.5/weather?q='. $cidade . '&appid='. 'f4b08891c8c454702a41812cbe6e48e2');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($curl);
        $resultadoArray = json_decode($resultado, true);

        ?>
        <section class="container-temperatura">
            <p class="cidade-temperatura"><?=get_option('al_local_dia_palestra_cidade')?></p>
            <p class="temperatura"><?= round($resultadoArray['main']['temp'] - 273.15)?> °C</p>
        </section>
        <?php
    }
}