<?php

add_action('admin_menu', 'al_local_dia_palestra_menu');


/**
 *  Dentro da função add_menu_page existe um parametro chamado capability, ele é 
 *  o terceiro paramentro a ser a adicionado, no nosso caso foi o manage_options.
 *  Essa parametro trata-se de uma opção para indicar quais são as permissões que
 *  o usuário deverá ter para visualizar essa entrada no menu administrativo.
 */

function al_local_dia_palestra_menu() {
    add_menu_page(
        'Local Palestra',
        __('Local Palestra', 'al_local_dia_palestra'),
        'manage_options',
        'local-palestra',
        'al_local_dia_palestra_menu_pagina',
        'dashicons-location-alt',
        -1 
    );
}

function al_local_dia_palestra_menu_pagina() {
    ?>
    <div>
        <h1><?= __('Local Palestras', 'al_local_dia_palestra')?></h1>
        <form method="post" action="options.php">
            <?php 
                // Função no wordpress para mostrar mensagem (sucesso, erros);
                settings_errors();
                do_settings_sections('local-palestra');
                settings_fields('al_local_dia_palestra_settings');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_menu', 'al_local_dia_palestra_secao');

/**
 * A funçao de callback serve para quando quisermos redenrizar um conteudo 
 * adicional, mostrando detalhes, como o plugin trabalha, o que que o usuário
 * tem que colocar.
 */

function al_local_dia_palestra_secao() {

    // Código relacionado a seção
    add_settings_section(
        'al_local_dia_palestra_secao',
        __('Configurações do local da palestra', 'al_local_dia_palestra'),
        'al_local_dia_palestra_campos_secao_detalhes',
        'local-palestra'

    );


    // PCódigo relacioando ao campo endereço
    add_settings_field(
        'al_local_dia_palestra_endereco',
        __('Endereço', 'al_local_dia_palestra'),
        'al_loca_dia_palestra_endereco',
        'local-palestra',
        'al_local_dia_palestra_secao'
    );

    // Esse código salva as informações no banco de dados, que tem que ser
    // processado pela API de settings, API de configuração do wordpress;
    register_setting(
        'al_local_dia_palestra_settings',
        'al_local_dia_palestra_endereco',
        'verifica_endereco'
    );

    // Código relacionado ao campo cidade

     add_settings_field(
        'al_local_dia_palestra_cidade',
        __('Cidade', 'al_local_dia_palestra'),
        'al_local_dia_palestra_cidade',
        'local-palestra',
        'al_local_dia_palestra_secao'
    );

     // Esse código salva as informações no banco de dados, que tem que ser
    // processado pela API de settings, API de configuração do wordpress;

    register_setting(
        'al_local_dia_palestra_settings',
        'al_local_dia_palestra_cidade',
        'verifica_cidade'
    );

    // Código relacionado ao campo de data (contagem regressiva)

    add_settings_field(
        'al_local_dia_palestra_data',
        __('Data', 'al_local_dia_palestra'),
        'al_local_dia_palestra_data',
        'local-palestra',
        'al_local_dia_palestra_secao'
    );

     // Esse código salva as informações no banco de dados, que tem que ser
    // processado pela API de settings, API de configuração do wordpress;

    register_setting(
        'al_local_dia_palestra_settings',
        'al_local_dia_palestra_data',
        'verifica_data'
    );

}

// Função callback do endereço

function al_loca_dia_palestra_endereco() {
    ?>
    <input type="text" id="al_local_dia_palestra_endereco" 
    name="al_local_dia_palestra_endereco" value="<?=esc_attr(get_option('al_local_dia_palestra_endereco'))?>" required>
    <?php
}

// Função callbacks da seção

function al_local_dia_palestra_campos_secao_detalhes() {
    ?>
    <p><?=__('Insira os dados do endereço, cidade e data da próxima palestra Alura.', 'al_local_dia_palestra')?></p>
    <?php
}

// Função de callback da cidade

function al_local_dia_palestra_cidade() {
    ?>
    <input type="text" name="al_local_dia_palestra_cidade" 
    id="al_local_dia_palestra_cidade" value="<?=esc_attr(get_option('al_local_dia_palestra_cidade'))?>" required>
    <?php
}


// Função callback da data

function al_local_dia_palestra_data() {
    ?>
    <input type="date" name="al_local_dia_palestra_data" 
    id="al_local_dia_palestra_data" value="<?=esc_attr(get_option('al_local_dia_palestra_data'))?>" required>
    <?php
}

// Função callback para verificar  os campos inputs

// Função de endereço

function verifica_endereco($endereco) {
    if(empty($endereco)) {
        $endereco = get_option('al_local_dia_palestra_endereco');
        add_settings_error(
            'al_local_dia_palestra_mensagem_de_erro',
            'al_local_dia_palestra_error_endereco',
            __('O campo endereço não pode ser vazio!', 'al_local_dia_palestra'),
            'error'
        );
    }

    return $endereco;
}

// Função de cidade

function verifica_cidade($cidade) {
    if(empty($cidade)) {
        $cidade = get_option('al_local_dia_palestra_cidade');
        add_settings_error(
            'al_local_dia_palestra_mensagem_de_erro',
            'al_local_dia_palestra_error_cidade',
            __('O campo cidade não pode ser vazio!', 'al_local_dia_palestra'),
            'error'
        );
    }

    return $cidade;
}

// Função de data

function verifica_data($data) {
    if(empty($data)) {
        $data = get_option('al_local_dia_palestra_data');
        add_settings_error(
            'al_local_dia_palestra_mensagem_de_erro',
            'al_local_dia_palestra_error_data',
            __('O campo data não pode ser vazio!', 'al_local_dia_palestra'),
            'error'
        );
    }

    return $data;
}