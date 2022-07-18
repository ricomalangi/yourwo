<?php
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "5JC2mC9gYH4NAFwL4mjcfqd";
function encryptId($kata) {
    global $ciphering, $encryption_key, $options, $encryption_iv;
    $add_text = "=4mjcfqd";
    $kata .= $add_text;
    $enkripsi = openssl_encrypt($kata, $ciphering,
    $encryption_key, $options, $encryption_iv);
    return $enkripsi;
}

function decryptId($kata) {
    global $ciphering, $encryption_key, $options, $encryption_iv;
    $result = "";
    $decryption = openssl_decrypt ($kata, $ciphering, $encryption_key, $options, $encryption_iv);
    for($i = 0; $i < strlen($decryption); $i++){
        if($decryption[$i] == "="){break;}
        $result .= $decryption[$i];
    }
    return $result;
}
