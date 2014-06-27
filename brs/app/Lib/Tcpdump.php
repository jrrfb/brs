 <?php
    class Tcpdump {
        public function buscarInformacoesLocalHost($dados){
             $arquivoSaida = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'saida.txt';
             $pidProcesso = shell_exec('tcpdump -ni '.$dados['GerenciaRede']['interface'].' > '. $arquivoSaida .' 2> /dev/null & echo $!');
             $msg = "PID do processo iniciado: " . $pidProcesso;
             
        }
        
        
        public function getInformacoesTcpdumpFromArquivo(){
            
        }
    }