<?php
/*
Gtau kesambet apa tiba2 buka Visual Studio Code
*/


header('Content-type: application/json');

if(!isset($_GET['resi']))
{
    die("Gacooooooooor Kangggggggggggg");
}

function cekResi($resi)
{
    $date = floor(time());
    $url = 'https://spx.co.id/api/v2/fleet_order/tracking/search?sls_tracking_number='.$resi.'|'.$date.''.hash('sha256', $resi.''.$date.'MGViZmZmZTYzZDJhNDgxY2Y1N2ZlN2Q1ZWJkYzlmZDY=');
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

    return json_decode($resp, true);
}

print_r(cekResi($_GET['resi']));

?>
