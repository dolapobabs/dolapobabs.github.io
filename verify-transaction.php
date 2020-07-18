<?php

$reference = $_GET['reference'];


function verifyTransaction($reference){
$result =  false;
$url = 'https://api.paystack.co/transaction/verify/' . $reference;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        [
            'Authorization: Bearer sk_test_72d039a582a3504fdeeffd3930914247ba070db3'
        ]
    );
    $request = curl_exec($ch);
    if (curl_error($ch)) {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);

    if ($request) {
        $result = json_decode($request, true);
    }

    if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
   
      ///
      $result = true;
    }
    return $result;
}


?>