
<?php

/*
*   Os plugins são uma forma de adicionar uma nova funcionalidade no Wordpress.

*   Quando estamos desenvolvendo um plugin, temos que ter em mente que diferentes
    pessoas podem utilizar o plugin e é importante pensarmos na questão de segurança.

*   Vimos que podemos verificar se está havendo algum acesso direto ao arquivo 
    do plugin que não esteja autorizado, através da verificação.

    if(!defined('ABSPATH')){
       die;
    }

*   Aprendemos que para que o Wordpress reconheça um plugin é necessário adicionar
    um cabeçalho com o nome do Plugin (Plugin Name) e outros parâmetros adicionais.

*   Vimos que um Widget é uma forma na qual o administrador do site tem uma grande
    possibilidade de interagir com o conteúdo sendo disponibilizado na página, podendo
    facilmente alterar posições, remover ou adicionar conteúdo

*   Para criar um formulário utilizado pelo Widget utilizamos a função form

*   No formulário utilize as funções da classe WP_Widget como get_field_id e 
    get_field_name para montar o formulário de maneira correta.

*   A função utilizada para pegar os dados do formulário é a update, lembre-se
    de fazer uma verificação do que o usuário está enviando e de retornar um array

*   Não se esqueça de mostrar a devida imagem do patrocinador no frontend da
    aplicação, utilizando para isso a função widget

*   Criação de uma nova entrada no menu administrativo através da função add_menu_page
    e configuração do nome de indentificação da página de configuração

*   Configuração da seção através da função add_settings_section e os campos
    através da função add_settings_field.

*   Regitro dos campos através da função register_setting.

*   Imprimindo o conteúdo da seção e dos campos na página de configuração com 
    as funções do_settings_section e settings_fields.


*   Os dados vindos da página de configuração são salvos na tabela wp_options.



*/