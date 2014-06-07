        <?php
        class GerenciaRedesController extends AppController {
            public $helpers = array ('Html','Form');
    
            function index() {
              if(!empty($this->request->data)){
               App::import('Lib','SnmpLib');
               $sl = new SnmpLib();
               $snmp_retorno = $sl->buscarInformacoesHost($this->request->data);
               if(!$snmp_retorno){
                $snmp_retorno ='false';
               }
               
               $this->set('snmp_retorno', $snmp_retorno);
              }
              
                
            }
        }   