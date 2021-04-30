<?php

class Mpesa
{
    protected $mpesa_secret    = "o3p9P9AumgAibjJz";
    protected $mpesa_key       = "NJUQHP4YKMoJc1lODvI8K5mNJ7qST4GA";
    protected $mpesa_passkey   = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    protected $mpesa_shortcode = "174379";

    public function _GenerateToken()
    {
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $credentials = base64_encode($this->mpesa_key . ':' . $this->mpesa_secret);

        $cSession = curl_init();
        //step2
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        //step3
        $result = curl_exec($cSession);
        //step4
        curl_close($cSession);
        //step5
        return json_decode($result);
    }

    public function _STKPush($amount, Int $phone_number, string $acc_ref, string $transaction_description)
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $tkn = $this->_GenerateToken()->access_token;


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $tkn)); //setting custom header

        $d2 = new DateTime('now');
        $timedate = $d2->format('YmdHis');
        $password = base64_encode($this->mpesa_shortcode . $this->mpesa_passkey . $timedate);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $this->mpesa_shortcode,
            'Password' => $password,
            'Timestamp' => $timedate,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone_number,
            'PartyB' => $this->mpesa_shortcode,
            'PhoneNumber' => $phone_number,
            'CallBackURL' => 'http://178.62.28.107/return_url',
            'AccountReference' => $acc_ref,
            'TransactionDesc' => $transaction_description,
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);


        // echo $curl_response;
    }
}
