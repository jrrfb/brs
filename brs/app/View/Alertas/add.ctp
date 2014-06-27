<?php echo $this->Html->css('cake.generic.css'); ?>
<div class="alertass form">
    <?php echo $this->Form->create('Alerta'); ?>
    <fieldset>
        <legend><?php __('Adicionar Alerta'); ?></legend>
        <?php
        echo $this->Form->input('nome');
        echo $this->Form->input('valor');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Listar Alertas'), array('action' => 'index')); ?></li>
    </ul>
</div>