        <?php echo $this->Html->script('funcoes_snmp.js'); ?>
        <h1>SNMP</h1>
        <?php
        echo $this->Form->create('GerenciaRede');
        echo $this->Form->input('comando_snmp', array('options' => GerenciaRede::getFuncoesSnmpPhp()));
        echo '</br>';
        echo '<h1>Descrição da Função SNMP</h1>';
        echo '<div id="descricao_funcao">';
        echo '</div>';
        echo $this->Form->input('ip', array('label' => 'IP'));
        echo $this->Form->input('oid', array('label' => 'OID'));
        echo $this->Form->end('Executar');
    
        if(isset($snmp_retorno)){
            echo '</br><table>';
            echo '<tr>
                   <th>Retorno do Comando</th>
                  </tr>';
            if(is_array($snmp_retorno)){
             foreach($snmp_retorno as $snmp){
                echo '<tr>';
                echo '<td>'.$snmp.'</td>';
                echo '</tr>';
             }
            }else{
                echo '<tr>';
                echo '<td>'.$snmp_retorno.'</td>';
                  echo '</tr>';
            }
          
            echo '</table>';
            
        }
        ?>
