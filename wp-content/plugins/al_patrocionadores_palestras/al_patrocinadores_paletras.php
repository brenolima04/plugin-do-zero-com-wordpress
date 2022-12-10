<?php
/* 
    Para que o wordpress possa reconhecer o plugin temos que colocar algumas
    informações. A obrigatória é o Plugin Name, com o nosso plugin, as outras 
    são opcionais, porém seria imporante colocar. sobre o nome do arquivo, pode
    ser qualquer um.
*/

/*
*   Plugin Name: Patrocinadores Alura
*   Description: Selecionar patrocinadores da palestra da Alura
*   Version: 1.0.0
*   Author: Breno Nicácio Lima Nunes 
*/

/*  
    Manda uma mensagem pro log do Apage no Xampp para termos certeza que o 
    nosso plugin foi ativado.
*/

error_log('O plugin foi ativado com sucesso!');

/* 
    Processo de verificação para aumentar a segurança do nosso plugin, onde
    impede que terceiros possam usa-lo de forma indevida, tentando conseguir
    informações pessoais. Essa constante (ABSPATH) se encontra dentro do arquivo
    wp_config.php, ela indica que quando foi definida é o alguem usuários 
    dentro do wordpress que internamente está tentando acessar meu plugin, 
    mas se ela não foi definida, é porque terceiros estão tentando acessar fora
    do wordpress o nosso plugin, então ele morre para esse tipo de usuários.
*/

if(!defined('ABSPATH')) {
    die;
}

/**
 * Precisamos referenciar o arquvivo al_patrocinadores_paletras_widget aqui
 * porque é aqui que o wordpress vai procurar.
 */

 require_once plugin_dir_path(__FILE__) . '/includes/al_patrocinadores_palestras_widget.php';