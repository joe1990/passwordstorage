<?php

class PasswordEncrypter {

    public static function encrypt($data, $userPassword) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC); //create a random initialization vector to use with CBC encoding
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        return base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $userPassword, $data, MCRYPT_MODE_CBC, $iv));
    }

    public static function decrypt($data, $userPassword) {
        $data = base64_decode($data);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC); //retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
        $iv = substr($data, 0, $iv_size);
        $data = substr($data, $iv_size); //retrieves the cipher text (everything except the $iv_size in the front)
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $userPassword, $data, MCRYPT_MODE_CBC, $iv), chr(0));
    }
}
?>
