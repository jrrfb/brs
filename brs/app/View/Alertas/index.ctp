<?php echo $this->Html->css('cake.generic.css'); ?>
<div class="alertass index">
	<h2><?php echo __('Destaques');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			 <th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nome');?></th>
			<th><?php echo $this->Paginator->sort('valor');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($alertas as $alerta):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $alerta['Alerta']['id']; ?>&nbsp;</td>
		<td><?php echo $alerta['Alerta']['nome']; ?>&nbsp;</td>
		<td><?php echo $alerta['Alerta']['valor']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $alerta['Alerta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete', $alerta['Alerta']['id']), null, __('Você tem certeza que quer remover # %s?', $alerta['Alerta']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, exibindo {:current}  linhas de um  total de {:count}, inciando na linha {:start}, terminando em {:end}')
	));
	?>	</p>

	<div class="paging">
            <?php
                echo $this->Paginator->prev('< anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next('próximo >', array(), null, array('class' => 'next disabled'));
	    ?>
       </div>
</div>
<div class="actions">
	<h3><?php __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Adicionar Alerta'), array('action' => 'add')); ?></li>
	</ul>
</div>