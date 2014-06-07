  <?php
    class SnmpLib {
      public static function buscarInformacoesHost($array_snmp){
          return self::retornarDadosConformeFuncaoSnmp($array_snmp);
          
          
      }
      
      public static function retornarDadosConformeFuncaoSnmp($array_snmp){
        debug($array_snmp);
        $indice_funcao_snmp = $array_snmp['GerenciaRede']['comando_snmp'];
        $host_ip = $array_snmp['GerenciaRede']['ip'];
        if(!empty($array_snmp['GerenciaRede']['oid'])){
        $oid = $array_snmp['GerenciaRede']['oid'];
        }
        $community = 'jose';
      
        if($indice_funcao_snmp == '1'){
           if($snmp = snmp2_get($host_ip, $community, $oid)) {
            return $snmp;
           }
           
           return 'Oid não encontrado!'; 
        }
        
        if($indice_funcao_snmp == 'snmp_walk'){
          $dados_snmp = array();
           $snmp_system = snmpwalk($host_ip, $community,'1.3.6.1.2.1.1');
           $snmp_interfaces = snmpwalk($host_ip, $community,'1.3.6.1.2.1.2.2.1.2');
           $snmp_interfaces_macs = snmpwalk($host_ip, $community,'1.3.6.1.2.1.2.2.1.6');
           $snmp_interfaces_entrada = snmpwalk($host_ip, $community,'1.3.6.1.2.1.2.2.1.10');
           $snmp_interfaces_saida = snmpwalk($host_ip, $community,'1.3.6.1.2.1.2.2.1.16');
           $snmp_discos = snmpwalk($host_ip, $community,'1.3.6.1.2.1.25.2.3.1.3');
           $snmp_discos_total = snmpwalk($host_ip, $community,'1.3.6.1.4.1.2021.9.1.6');
           $snmp_discos_ocupado = snmpwalk($host_ip, $community,'1.3.6.1.4.1.2021.9.1.8');
           $snmp_discos_livre = snmpwalk($host_ip, $community,'1.3.6.1.4.1.2021.9.1.7');
           $snmp_discos_percentagem = snmpwalk($host_ip, $community,'1.3.6.1.4.1.2021.9.1.9');
           $snmp_softwares = snmpwalk($host_ip, $community,'1.3.6.1.2.1.25.6.3.1.2');
           $snmp_softwares_data = snmpwalk($host_ip, $community,'1.3.6.1.2.1.25.6.3.1.5');
           $snmp_softwares_rodando = snmpwalk($host_ip, $community,'1.3.6.1.2.1.25.4.2.1.2');
           $snmp_softwares_rodando_ram = snmpwalk($host_ip, $community,'1.3.6.1.2.1.25.5.1.1.2');
           $snmp_softwares_rodando_cpu = snmpwalk($host_ip, $community,'1.3.6.1.2.1.25.5.1.1.1');
        
        
            $dados_snmp['up_time'] = self::getUptime($snmp_system);
            $dados_snmp['descricao_system'] = self::getDescricaoSystem($snmp_system);
            $dados_snmp['localizacao']  =  self::getLocalizacao($snmp_system);
            $dados_snmp['interfaces'] = self::getInterfaces($snmp_interfaces);
            $dados_snmp['interfaces_entrada'] = self::getInterfacesEntradaSaida($snmp_interfaces_entrada);
            $dados_snmp['interfaces_saida'] = self::getInterfacesEntradaSaida($snmp_interfaces_saida);
            $dados_snmp['macs'] = self::getMacs($snmp_interfaces_macs);
            $dados_snmp['discos'] = self::getDiscos($snmp_discos);
            $dados_snmp['discos_total'] = self::getDiscosTotal($snmp_discos_total);
            $dados_snmp['discos_ocupado'] = self::getDiscosTotal($snmp_discos_ocupado);
            $dados_snmp['discos_livre'] = self::getDiscosTotal($snmp_discos_livre);
            $dados_snmp['discos_percentagem'] = self::getDiscosTotal($snmp_discos_percentagem);
            $dados_snmp['softwares'] = self::getSoftwares($snmp_softwares);
            $dados_snmp['softwares_data'] = self::getSoftwaresData($snmp_softwares_data);
            $dados_snmp['softwares_rodando'] = self::getSoftwaresRodando($snmp_softwares_rodando);
            $dados_snmp['softwares_rodando_ram'] = self::getSoftwaresRodandoRam($snmp_softwares_rodando_ram);
            $dados_snmp['softwares_rodando_cpu'] = self::getSoftwaresRodandoCpu($snmp_softwares_rodando_cpu);
            
            
            debug($dados_snmp);
              exit;
          
          
          
           }
           
           return 'Não foi possível executar o comando snmpwalk!'; 
        }
        
      
      
       public static function getUptime($snmp){
        $upTime = $snmp[2];
        $upTime = split(' ',$upTime);
        return $upTime[2];
      }
      
      public static function getDescricaoSystem($snmp){
        $descricao_system = $snmp[0];
        $descricao_system = str_replace('STRING: ', '',$descricao_system);
        return $descricao_system;
      }
      
      public static function getLocalizacao($snmp){
        $localizacao = $snmp[5];
        $localizacao = str_replace('STRING: ', '',$localizacao);
        return $localizacao;
      }
      
      public static function getInterfaces($interfaces){
        foreach($interfaces as &$insterface){
          $insterface = str_replace('STRING: ','', $insterface);
        }
        
        return $interfaces;
      }
      
      public static function getMacs($macs){
        foreach($macs as &$mac){
          $mac = str_replace('STRING: ','', $mac);
        }
        
        return $macs;
      }
      
       public static function getDiscos($discos){
        foreach($discos as &$disco){
          $disco = str_replace('STRING: ','', $disco);
        }
        
        return $discos;
      }
      
      public static function getDiscosTotal($discos_total){
        foreach($discos_total as &$disco_total){
          $disco_total = str_replace('INTEGER: ','', $disco_total);
        }
        
        return $discos_total;
      }
      
      public static function getSoftwares($softwares){
         foreach($softwares as &$software){
          $software = str_replace(array('STRING: ','"'),'', $software);
        }
        
        return $softwares;
      }
      
      
      public static function getSoftwaresData($softwares_data){
         foreach($softwares_data as &$software_data){
          $software_data = str_replace('STRING: ','', $software_data);
        }
        
        return $softwares_data;
      }
      
      public static function getInterfacesEntradaSaida($interfaces){
          foreach($interfaces as &$insterface){
          $insterface = str_replace('Counter32: ','', $insterface);
        }
        
        return $interfaces;
      }
      
      public static function getSoftwaresRodando($softwares_rodando){
        foreach($softwares_rodando as &$software_rodando){
          $software_rodando = str_replace('STRING: ','', $software_rodando);
        }
        
        return $softwares_rodando;
      }
      
      public static function getSoftwaresRodandoRam($softwares_rodando){
        foreach($softwares_rodando as &$software_rodando){
          $software_rodando = str_replace('INTEGER: ','', $software_rodando);
        }
        
        return $softwares_rodando;
      }
      
      public static function getSoftwaresRodandoCpu($softwares_rodando){
        foreach($softwares_rodando as &$software_rodando){
          $software_rodando = str_replace('INTEGER: ','', $software_rodando);
        }
        
        return $softwares_rodando;
      }
      
    }
    