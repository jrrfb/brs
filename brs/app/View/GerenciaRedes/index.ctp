<?php
echo $this->Html->script('funcoes_snmp.js');
echo $this->Html->css('/js/jquery-ui11/jquery-ui.min.css');
?>

<style>
    fieldset {
      border: 0;
    }
    label {
      display: block;
     
    }
    select {
      width: 200px;
    }
    .overflow {
      height: 200px;
    }
    
   
    
    .ui-tabs-vertical { width: 70em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 20em; }
  .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 44em;}
   alerta{
        color: red;
    }
  </style>
<script>
$(function() {
    $( "#tabsv" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabsv li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    $( "#tabs" ).tabs();
    $( "#GerenciaRedeInterface" ).selectmenu();
});
</script>
         
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Snmp</a></li>
    <li><a href="#tabs-2">tcpdump</a></li>
  </ul>


<div id="tabs-1">
    <?php
    $classe = '';
    $indices_ieen = array();
    $indices_iesa = array();
    $indices_disco = array();
    $indices_disco_o =  array();
    $indices_disco_l =  array();
    $indices_disco_p = array();
    $indices_uso_m = array();
    $indices_uso_c = array();
    $classe_en = '';
    $classe_sa ='';
    $classe_disco = '';
    $classe_disco_o = '';
    $classe_disco_l = '';
    $classe_disco_p = '';
    $classe_uso_m = '';
    $classe_uso_c = '';
       echo $this->Form->create('GerenciaRede');
       echo $this->Form->input('comando_snmp', array('type'=>'hidden','default' => 'snmp_walk' ,'options' => GerenciaRede::getFuncoesSnmpPhp()));
       echo '<br>';
       echo $this->Form->input('ip', array('label' => 'IP'));
       echo '<br>';
       echo $this->Form->end(array('label' => 'Executar','name' => 'snmp'));
       
       if(isset($snmp)):
       foreach($alertas as $alerta){
        if($alerta['Alerta']['nome'] == 'Interface Entrada'){
          $valor_cadastrado = $alerta['Alerta']['valor'];
           foreach($snmp['interfaces_entrada'] as $k => $item){
           if( $valor_cadastrado < $item  ){
            $indices_ieen[$k] = $k;
              $classe_en = 'color:red';
           }
       }
        }
       
       if($alerta['Alerta']['nome'] == 'Interface Saida'){
        
          $valor_saida = $alerta['Alerta']['valor'];
           foreach($snmp['interfaces_saida'] as $k => $item){
          
           if( $valor_saida < $item  ){
            $indices_iesa[$k] = $k;
              $classe_sa = 'color:red';
           }
       }
       
       
        }
        
        
         if($alerta['Alerta']['nome'] == 'Disco'){
        
          $valor_disco = $alerta['Alerta']['valor'];
           foreach($snmp['discos_total'] as $k => $item){
          
           if( $valor_disco > $item  ){
            $indices_disco[$k] = $k;
              $classe_disco = 'color:red';
           }
       }
       
       
        }
        
        if($alerta['Alerta']['nome'] == 'DiscoOcupado'){
        
          $valor_disco_o = $alerta['Alerta']['valor'];
           foreach($snmp['discos_ocupado'] as $k => $item){
          
           if( $valor_disco_o <  $item  ){
            $indices_disco_o[$k] = $k;
              $classe_disco_o = 'color:red';
           }
       }
       
       
        }
        
         if($alerta['Alerta']['nome'] == 'DiscoLivre'){
        
          $valor_disco_l = $alerta['Alerta']['valor'];
           foreach($snmp['discos_livre'] as $k => $item){
          
           if( $valor_disco_l >  $item  ){
            $indices_disco_l[$k] = $k;
              $classe_disco_l = 'color:red';
           }
       }
       
       
        }
        
        
          if($alerta['Alerta']['nome'] == 'DiscoPorcentagem'){
        
          $valor_disco_p = $alerta['Alerta']['valor'];
           foreach($snmp['discos_percentagem'] as $k => $item){
          
           if( $valor_disco_p <  $item  ){
            $indices_disco_p[$k] = $k;
              $classe_disco_p = 'color:red';
           }
       }
       
       
        }
        
      if($alerta['Alerta']['nome'] == 'UsoMemoriaSoftware'){
        
          $uso_m = $alerta['Alerta']['valor'];
           foreach($snmp['softwares_rodando_ram'] as $k => $item){
            $valor_uso_m = explode(' ',$item);
           if( $uso_m <  $valor_uso_m[0]  ){
            $indices_uso_m[$k] = $k;
              $classe_uso_m = 'color:red';
           }
       }
       
       
        }
        
        
         if($alerta['Alerta']['nome'] == 'UsoCpuSoftware'){
        
          $uso_c = $alerta['Alerta']['valor'];
           foreach($snmp['softwares_rodando_cpu'] as $k => $item){
          
           if( $uso_c <  $item  ){
            $indices_uso_c[$k] = $k;
              $classe_uso_c = 'color:red';
           }
       }
       
       
        }
        
        
        
 
       }
       echo '<br>';
       echo '<br>';
       echo '<br>';
       echo '<br>';
       echo '<br>';
   
       ?>
<div id="tabsv">
  <ul>
    <li><a href="#tabsv-1">Status de uptime</a></li>
    <li><a href="#tabsv-2">Descrição do Dispositivo</a></li>
    <li><a href="#tabsv-3">Localização dos Dispositivos</a></li>
    <li><a href="#tabsv-17">Interfaces</a></li>
    <li><a href="#tabsv-4" style="<?php echo $classe_en?>">Interfaces de Entrada</a></li>
    <li><a href="#tabsv-5"  style="<?php echo $classe_sa?>">Interfaces de Saída</a></li>
    <li><a href="#tabsv-6">Macs</a></li>
    <li><a href="#tabsv-7">Discos</a></li>
    <li><a href="#tabsv-8"  style="<?php echo $classe_disco; ?>">Discos Espaço Total</a></li>
    <li><a href="#tabsv-9" style="<?php echo $classe_disco_o; ?>" >Discos Espaço Ocupado</a></li>
    <li><a href="#tabsv-10" style="<?php echo $classe_disco_l; ?>">Discos Espaço Livre</a></li>
    <li><a href="#tabsv-11" style="<?php echo $classe_disco_p; ?>">Discos Espaço Porcentagens</a></li>
    <li><a href="#tabsv-12">Softwares Instalados</a></li>
    <li><a href="#tabsv-13">Softwares Data</a></li>
    <li><a href="#tabsv-14">Softwares em Execução</a></li>
    <li><a href="#tabsv-15" style="<?php echo $classe_uso_m;?>" >Uso de Memória Softwares</a></li>
    <li><a href="#tabsv-16" style="<?php echo $classe_uso_c;?>" >Uso da CPU Softwares</a></li>
  </ul>
<div id="tabsv-1">
    <h2>Status de uptime</h2>
    <p width="25px"><?php echo $snmp['up_time']; ?></p>
</div>
<div id="tabsv-2">
    <h2>Descrição Sistema do Dispositivo</h2>
    <p><?php echo $snmp['descricao_system']; ?></p>
</div>
<div id="tabsv-3">
    <h2>Localização dos Dispositivos</h2>
    <p><?php echo $snmp['localizacao']; ?></p>
   
</div>
<div id="tabsv-17">
    <h2>Interfaces</h2>
    <?php foreach($snmp['interfaces'] as $k => $item): ?>
    <p><?php echo 'Interface'.$k.': '.$item; ?></p>
    <?php endforeach; ?>
</div>
<div id="tabsv-4">
    <h2 style="<?php echo $classe_en; ?>">Interfaces de Entrada</h2>
    <?php foreach($snmp['interfaces_entrada'] as $k => $item):
       if(in_array($k, $indices_ieen)){
       ?> 
    
    
    
    <p style="<?php echo $classe_en;?>"><?php echo 'Entrada Interface'.$k.': '.$item; ?></p>
   <?php }else{
   ?>
   <p><?php echo 'Entrada Interface'.$k.': '.$item; ?></p>
   <?php }?>
   
    <?php endforeach; ?>
</div>
<div id="tabsv-5">
    <h2 style="<?php echo $classe_sa; ?>">Interfaces de Saída</h2>
  <?php foreach($snmp['interfaces_saida'] as $k => $item):
       if(in_array($k, $indices_iesa)){
       ?> 
    <p style="<?php echo $classe_sa;?>"><?php echo 'Saída Interface'.$k.': '.$item; ?></p>
   <?php }else{
   ?>
   <p><?php echo 'Saída Interface'.$k.': '.$item; ?></p>
   <?php }?>
   
    <?php endforeach; ?>
  
</div >
<div id="tabsv-6">
    <h2>Macs</h2>
   <?php foreach($snmp['macs'] as $k => $item): ?>
     <p><?php echo 'Mac'.$k.': '.$item; ?></p>
    <?php endforeach; ?>
</div>
<div id="tabsv-7">
    <h2>Discos</h2>
    <?php foreach($snmp['discos'] as $k => $item): ?>
     <p><?php echo 'Disco'.$k.': '.$item; ?></p>
    <?php endforeach; ?>
</div>
<div id="tabsv-8">
    <h2 style="<?php echo $classe_disco;?>">Discos Espaço Total</h2>
       <?php foreach($snmp['discos_total'] as $k => $item):
       if(in_array($k, $indices_disco)){
       ?>
          <p  style="<?php echo $classe_disco;?>"><?php echo 'Total Espaço Disco'.$k.': '.$item; ?></p>
  
   <?php }else{
   ?>
    <p><?php echo 'Total Espaço Disco'.$k.': '.$item; ?></p>
   <?php }?>
   
    <?php endforeach; ?>
</div>
<div id="tabsv-9">
    <h2 style="<?php echo $classe_disco_o;?>">Discos Espaço Ocupado</h2>
       <?php foreach($snmp['discos_ocupado'] as $k => $item):
       if(in_array($k, $indices_disco_o)){
       ?>
          <p  style="<?php echo $classe_disco_o;?>"><?php echo 'Espaço Ocupado Disco'.$k.': '.$item; ?></p>
  
   <?php }else{
   ?>
   <p><?php echo 'Espaço Ocupado Disco'.$k.': '.$item; ?></p>
   <?php }?>
   
    <?php endforeach; ?>
</div>
<div id="tabsv-10">
     <h2 style="<?php echo $classe_disco_l;?>">Discos Espaço Livre</h2>
       <?php foreach($snmp['discos_livre'] as $k => $item):
       if(in_array($k, $indices_disco_l)){
       ?>
          <p  style="<?php echo $classe_disco_l;?>"><?php echo 'Espaço Livre Disco'.$k.': '.$item; ?></p>
  
   <?php }else{
   ?>
   <p><?php echo 'Espaço Livre Disco'.$k.': '.$item; ?></p>
   <?php }?>
   
    <?php endforeach; ?>
</div>
<div id="tabsv-11">
      <h2 style="<?php echo $classe_disco_p;?>">Discos Espaço Porcentagem</h2>
       <?php foreach($snmp['discos_percentagem'] as $k => $item):
       if(in_array($k, $indices_disco_p)){
       ?>
          <p  style="<?php echo $classe_disco_p;?>"><?php echo 'Porcentagem Disco'.$k.': '.$item; ?></p>
  
   <?php }else{
   ?>
   <p><?php echo 'Porcentagem Disco'.$k.': '.$item; ?></p>
   <?php }?>
   
    <?php endforeach; ?>
</div>
<div id="tabsv-12">
    <h2>Softwares Instalados</h2>
     <?php foreach($snmp['softwares'] as $k => $item): ?>
     <p><?php echo 'Instalado Software'.$k.': '.$item; ?></p>
    <?php endforeach; ?>
</div>
<div id="tabsv-13">
    <h2>Softwares Data</h2>
    <?php foreach($snmp['softwares_data'] as $k => $item): ?>
     <p><?php echo 'Data de Instalação Software'.$k.': '.$item; ?></p>
    <?php endforeach; ?>
</div>
<div id="tabsv-14">
    <h2>Softwares em Execução</h2>
    <?php foreach($snmp['softwares_rodando'] as $k => $item): ?>
     <p><?php echo 'Em Execução Software'.$k.': '.$item; ?></p>
    <?php endforeach; ?>
</div>
<div id="tabsv-15">
       <h2 style="<?php echo $classe_uso_m;?>">Uso de Memória Softwares</h2>
       <?php foreach($snmp['softwares_rodando_ram'] as $k => $item):
       if(in_array($k, $indices_uso_m)){
       ?>
          <p  style="<?php echo $classe_uso_m;?>"><?php echo 'Uso da Memória RAM Software'.$k.': '.$item; ?></p>
  
   <?php }else{
   ?>
   <p><?php echo 'Uso da Memória RAM Software'.$k.': '.$item; ?></p>
   <?php }?>
   
    <?php endforeach; ?>
</div>
<div id="tabsv-16">
        <h2 style="<?php echo $classe_uso_c;?>">Uso da CPU Softwares</h2>
       <?php foreach($snmp['softwares_rodando_cpu'] as $k => $item):
       if(in_array($k, $indices_uso_c)){
       ?>
          <p  style="<?php echo $classe_uso_c;?>"><?php echo 'Uso CPU Software'.$k.': '.$item; ?></p>
  
   <?php }else{
   ?>
   <p><?php echo 'Uso CPU Software'.$k.': '.$item; ?></p>
   <?php }?>
   
    <?php endforeach; ?>
</div>

</div>
<?php
        endif;
    ?>
</div>

<div id="tabs-2">
        <?php
        echo $this->Form->create('GerenciaRede');
        echo $this->Form->input('interface', array('options' => $this->Rede->getInterfaces(),'empty' => 'Selecione'));
        echo '<br>';
        echo $this->Form->input('tempo');
        echo '<br>';
         echo $this->Form->end(array('label' => 'Executar','name' => 'tcpdump'));
        ?>
</div>
</div>
</div>