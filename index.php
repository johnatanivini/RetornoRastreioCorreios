<?php 

function rastrear( $codigo = null )
{
    $url='http://websro.correios.com.br/sro_bin/txect01$.Inexistente?P_LINGUA=001&P_TIPO=002&P_COD_LIS=' . $codigo;
   $retorno = file_get_contents( $url );
   preg_match( '/.*<\/TABLE>/s', $retorno, $tabela );

   return ( count( $tabela ) == 1 ) ? $tabela[0] : "objeto não encontrado" ;
}
//echo rastrear('PE039373771BR');
include("simple_html_dom.php");
$codigo = "PE039373771BR";
$url='http://websro.correios.com.br/sro_bin/txect01$.Inexistente?P_LINGUA=001&P_TIPO=002&P_COD_LIS=' . $codigo;

$dom = file_get_html($url);
///busca somente as linhas das tabelas
$html = $dom->find("tr");

/**
* POssíveis situações de retorno
**/
$situacao = array(
'entrega efetuada',
'saiu  para entrega ao destinatário',
'encaminhado',
'postado'
);
/// quero apenas a terceira coluna ( sem loop), tudo minuscula
$situacao_atual = strtolower($html[1]->find('td',2)->plaintext);

echo $situacao_atual;




