  $(function(){
    var funcao_selecionada = verificarFuncaoSnmpSelecionada();
    $('#GerenciaRedeComandoSnmp').change(function(){
       var funcao_selecionada = verificarFuncaoSnmpSelecionada();
        exibirDescricaoDaFuncao(funcao_selecionada);
    });
    
    exibirDescricaoDaFuncao(funcao_selecionada);
  } );
  
  function  verificarFuncaoSnmpSelecionada() {
      return $('#GerenciaRedeComandoSnmp :selected').text();
  }
  
  function exibirDescricaoDaFuncao(funcao_selecionada){
      var html = '';
      
      if (funcao_selecionada == 'snmp2_get') { 
           html += 'O snmp2_get é usado para ler o valor de um objeto SNMP especificado pelo object_id .';
         $('#descricao_funcao').html(html);
      }
      
      if (funcao_selecionada == 'snmpwalk') { 
           html += 'snmpwalk é usado para ler todos os valores de um SNMP agente especificado pelo ip de um host .';
         $('#descricao_funcao').html(html);
      }
      
      
      
  }