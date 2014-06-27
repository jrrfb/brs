<?php echo $this->Html->css('cake.generic.css'); ?>
<div class="alertas form">
    <?php echo $this->Form->create('Alerta', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo __('Editar Alerta'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->input('valor');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar', true)); ?>
</div>
<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Remover'), array('action' => 'delete', $this->Form->value('Destaque.id')), null, __('Você tem certeza que quer remover # %s?', $this->Form->value('Destaque.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Alertas'), array('action' => 'index')); ?></li>
    </ul>
</div>