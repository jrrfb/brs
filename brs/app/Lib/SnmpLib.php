<?php
  class SnmpLib {
    public static function buscarInformacoesHost($array_snmp){
        return self::retornarDadosConformeFuncaoSnmp($array_snmp);
        
        
    }
    
    public static function retornarDadosConformeFuncaoSnmp($array_snmp){
      $indice_funcao_snmp = $array_snmp['GerenciaRede']['comando_snmp'];
      $host_ip = $array_snmp['GerenciaRede']['ip'];
      $oid = $array_snmp['GerenciaRede']['oid'];
      $community = 'jose';
     
      if($indice_funcao_snmp == '1'){
         if($snmp = snmp2_get($host_ip, $community, $oid)) {
          return $snmp;
         }
         
         return 'Oid não encontrado!'; 
      }
      
      if($indice_funcao_snmp == '15'){
         if($snmp = snmpwalk($host_ip, $community,'')) {
          return $snmp;
         }
         
         return 'Não foi possível executar o comando snmpwalk!'; 
      }
      
    }
    
  }
  