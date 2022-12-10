<?php

/**
 *  É necessário adicionar um action para que o nosso widget apareça
 *  lá na aréa de administrador.
 */

 add_action('widgets_init', 'al_pat_pal_registra_widget');

 function al_pat_pal_registra_widget() {
    register_widget('patrocinadoresPalestras');
 }

 /**
 *  O que é necessário para desenvolver um widget para o Wordpress?
 *  É necessário criar uma classe e herdar a classe WP_Widget do Wordpress
 *  através do uso da palavra reservada extends, como é mostrando a abaixo.
 */

class patrocinadoresPalestras extends WP_Widget {

    public function __construct() 
    {
        parent::__construct(
             'al_patrocinadores_palestras_widget',
             'Patrocinadores Palestras',
             array('description' => 'Selecione os patrocinadores da palestra')
        );
    }

    /**
     *  Precisei utilizar a função checked com o objetivo de manter selecionado
     *  o patrocinador escolhido no  formulário do Widget.
     */

    public function form($instance) 
    {
        ?>
            <p>
                <input type="checkbox" id="<?= $this->get_field_id('caelum') ?>"
                name="<?= $this -> get_field_name('caelum') ?>" value="1" 
                <?php checked('1', $instance['caelum']); ?> />
                <label for="<?= $this->get_field_id('caelum')?>">Caelum</label>
                
            </p>

             <p>
                <input type="checkbox" id="<?= $this->get_field_id('casa_do_codigo') ?>"
                name="<?= $this -> get_field_name('casa_do_codigo') ?>" value="1"
                <?php checked('1', $instance['casa_do_codigo']); ?>  />
                <label for="<?= $this->get_field_id('casa_do_codigo')?>">Casa do Código</label>
                
            </p>

             <p>
                <input type="checkbox" id="<?= $this->get_field_id('hipsters') ?>"
                name="<?= $this -> get_field_name('hipsters') ?>" value="1" 
                <?php checked('1', $instance['hipsters']); ?> />
                <label for="<?= $this->get_field_id('hipsters')?>">Hipsters</label>
                
            </p>

        <?php
    }

    /**
     *  Utilização da funçaõ strip_tags para segurança. O que ela faz? ela vai
     * remover tags HTML e PHP. Uma vez que estamos processando dados vindos do 
     * formulário, o usuário poderá fazer modificações que podem vir a comprometer 
     * a segurança do sistema caso não sejam analisadas. A função strip_tags tem 
     * como objetivo remover tags PHP e HTML, garantindo assim que o usuário não 
     * está inserindo nenhum código indevido.
     */

    public function update($new_instance, $old_instance) 
    {
        $instance = array();

        $instance['caelum'] = 
        !empty($new_instance['caelum']) ? strip_tags($new_instance['caelum']) : '';

        $instance['casa_do_codigo'] = 
        !empty($new_instance['casa_do_codigo']) ? strip_tags($new_instance['casa_do_codigo']) : '';

        $instance['hipsters'] = 
        !empty($new_instance['hipsters']) ? strip_tags($new_instance['hipsters']) : '';

        return $instance;
        
    }

    public function widget($args, $instance) 
    {
        ?>
            <section class="patrocinadores-principais">
                <h3 class="titulo-patrocinadores">Patrocinadores</h3>
                <ul class="lista-patrocinadores">
                    <?php if(!empty($instance['caelum'])) : ?> 
                        <li><img src="<?=plugin_dir_url(__FILE__) . '../images/caelum.svg'?>" alt=""></li>
                    <?php endif; ?>

                    <?php if(!empty($instance['casa_do_codigo'])) : ?> 
                        <li><img src="<?=plugin_dir_url(__FILE__) . '../images/cdc.svg'?>" alt=""></li>
                    <?php endif; ?>

                    <?php if(!empty($instance['hipsters'])) : ?> 
                        <li><img src="<?=plugin_dir_url(__FILE__) . '../images/hipsters.svg'?>" alt=""></li>
                    <?php endif; ?>
                </ul>
            </section>
        <?php
    }
}