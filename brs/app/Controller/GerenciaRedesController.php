            <?php
            class GerenciaRedesController extends AppController {
                public $helpers = array ('Html','Form','Rede');
                public $uses = array('Alerta');
        
                function index() {
                   
               
                   if(!empty($this->data['snmp'])){
                        App::import('Lib','SnmpLib');
                        $sl = new SnmpLib();
                        $snmp_retorno = $sl->buscarInformacoesHost($this->data);
                       
                        if(!$snmp_retorno){
                          $snmp_retorno ='false';
                        }
                         
                        $this->set('snmp', $snmp_retorno);
                   }
                  
                   if(!empty($this->data['tcpdump'])){
                    debug($this->data);
                    exit;
                    App::import('Lib','Tcpdump');
                    $tcp = new Tcpdump();
                    $snmp_retorno = $tcp->buscarInformacoesLocalHost($this->data);
                    
                   }
                   
                   $this->set('alertas',$this->Alerta->find('all'));
                    
                }
            }   