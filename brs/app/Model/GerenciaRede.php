    <?php
    class GerenciaRede extends AppModel {
        public $name = 'GerenciaRede';
        public $useTable = false;
        
        public static function getFuncoesSnmpPhp(){
            return array( 
            '1' => 'snmp2_get',
            '2' => 'snmp2_getnext',
            '3' => 'snmp2_real_walk',
            '4' => 'snmp2_set',
            '5' => 'snmp2_walk',
            '6' => 'snmp3_get',
            '7' => 'snmp3_getnext',
            '8' => 'snmp3_real_walk',
            '9' => 'snmp3_set',
            '10' => 'snmp3_walk',
            '11' => 'snmpget',
            '12' => 'snmpgetnext',
            '13' => 'snmprealwalk',
            '14' => 'snmpset',
            '15' => 'snmpwalk',
            '16' => 'snmpwalkoid'
            );
        }
    }
    ?>