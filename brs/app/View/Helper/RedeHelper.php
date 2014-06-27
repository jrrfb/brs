 <?php
 
 class RedeHelper extends AppHelper {
   
    public function getAplicacoes(){
        return array(
                      'snmp' => 'SNMP',
                      'tcpdump' => 'tcpdump'
                      );
    }
    
    public function  getInterfaces(){
     App::import('Lib', 'SnmpLib');
     $snmp = new SnmpLib();
     return $snmp->getInterfacesToTcpdump();
    }
 } 