<?php

namespace oangia\InAppPurchase;

use oangia\CUrl\CUrl;

class IOS
{
	protected $errors = [
        21000 => 'The App Store could not read the JSON object you provided.',
        21002 => 'The data in the receipt-data property was malformed.',
        21003 => 'The receipt could not be authenticated.',
        21004 => 'The shared secret you provided does not match the
                shared secret on file for your account.',
        21005 => 'The receipt server is not currently available.',
        21007 => 'This receipt is a sandbox receipt, but it was sent to the production server.',
        21008 => 'This receipt is a production receipt, but it was sent to the sandbox server.'
    ];

    private function validateReceipt($receiptData, $sandbox = false)
	{
		$url = 'https://buy.itunes.apple.com/verifyReceipt';
	    if ($sandbox) {
	        $url = 'https://sandbox.itunes.apple.com/verifyReceipt/';
	    }

	    $curl = new CUrl;
	    $dataString = json_encode(array(
	        'receipt-data' => $receipt_data,
	        /*'password'     => '<<YOUR APPLE APP SECRET>>',*/
	    ));
	    $response = $curl->connect('POST', $url, $dataString);
	    /*curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'Content-Type: application/json',
	        'Content-Length: ' . strlen($data_string) )
	    );
	    $output   = curl_exec($ch);
	    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);
	    if (200 != $httpCode) {
	        return false;
	    }*/
	    $decoded = json_decode($response, true);
	    return $decoded;
	}
}
