<?php 
header("Content-type:text/html; charset=utf-8");
/**
** Aqui se usa a library simple_html_dom.php para
** percorrer o html do retorno dos correios para buscar o ultimo status
** do código de rastreamento
** por enquanto ainda é funcional
**/ 
include("simple_html_dom.php");
$codigo = "PE039373771BR";
$url='http://websro.correios.com.br/sro_bin/txect01$.Inexistente?P_LINGUA=001&P_TIPO=002&P_COD_LIS=' . $codigo;
//// Função do Simple Html Dom retorna uma instancia.
$dom = file_get_html($url);
///busca somente as linhas das tabelas
$html = $dom->find("tr");
/**
* Possíveis situações de retorno 
* para uso em demais eventos
**/
$situacao = array(
'entrega efetuada',
'saiu  para entrega ao destinatário',
'encaminhado',
'postado'
);
/// Hora Atual 
$hora_atual = strtolower($html[1]->find('td',0)->plaintext);
//// Local Atual
$local_atual = strtolower($html[1]->find('td',1)->plaintext);
/// quero apenas a terceira coluna ( sem loop), tudo minuscula
$situacao_atual = strtolower($html[1]->find('td',2)->plaintext);
/// Situação atual
echo $hora_atual." / ".$local_atual." / ".$situacao_atual;




