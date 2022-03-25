<?php 

    function encryptString($text = '') {
        $VECTOR  = '1234567891011121'; // 16 BYTES
        $KEY     = 'Bl@ckC0d3r$';
        $CIPHER  = 'AES-128-CTR';

        return openssl_encrypt($text, $CIPHER, $KEY, 0, $VECTOR);
    }

    function decryptString($text = '') {
        $VECTOR  = '1234567891011121'; // 16 BYTES
        $KEY     = 'Bl@ckC0d3r$';
        $CIPHER  = 'AES-128-CTR';
        
        return openssl_decrypt($text, $CIPHER, $KEY, 0, $VECTOR);
    }