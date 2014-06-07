        <?php echo $this->Html->script('funcoes_snmp.js'); ?>
        <?php
        echo $this->Form->create('GerenciaRede');
        echo $this->Form->input('comando_snmp', array('type'=>'hidden','default' => 'snmp_walk' ,'options' => GerenciaRede::getFuncoesSnmpPhp()));
        echo $this->Form->input('ip', array('label' => 'IP'));
        echo $this->Form->end('Executar');
    
        if(isset($snmp_retorno)){
            
        }
        ?>
