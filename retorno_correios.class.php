<?php 
header("Content-type:text/html; charset=utf-8");
/**
** Aqui se usa a library simple_html_dom.php para
** percorrer o html do retorno dos correios para buscar o ultimo status
** do código de rastreamento
** por enquanto ainda é funcional
**/ 
include("simple_html_dom.php");
class RetornoCorreios extends simple_html_dom{
    
    private $codigo = "PI287643179BR";
    public $url ="http://websro.correios.com.br/sro_bin/txect01$.QueryList?P_TIPO=001&P_LINGUA=001&P_COD_UNI=";

    public function __construct() {
        parent::__construct();
    }
    
	
	
    public function statusRastreamento(){
    
       
        $dom = file_get_html("{$this->getUrl()}");
        $html = $dom->find('tr');
        if($html){
        /// Hora Atual
        $hora_atual = strtolower($html[1]->find('td',0)->plaintext);
        //// Local Atual
        $local_atual = strtolower($html[1]->find('td',1)->plaintext);
        /// quero apenas a terceira coluna ( sem loop), tudo minuscula
        $situacao_atual = strtolower($html[1]->find('td',2)->plaintext);
        /// Situação atual
        
        return $hora_atual." / ".$local_atual." / ".$situacao_atual;
        }else{
            $html = $dom->find('font',1)->plaintext;
            return $html;
        }
        
            
 
        

    }
    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }


    function getUrl() {
        return $this->url.$this->codigo;
    }

}






