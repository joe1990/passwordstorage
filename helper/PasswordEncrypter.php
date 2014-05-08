<?php

/**
 * PasswordEncrypter. Include methods to encrypt and decrypt an account password with the user password. Use the mcrypt-library.
 * 
 * @author Joel Holzer <joe_ehcb@hotmail.com>
 * @version 1.0
 */
class PasswordEncrypter {

    /**
     * Encrypt a plaintext password with the user password.
     * The password will firstly encrypt with MCRYPT_RIJNDAEL_256 and then base64-encode. 
     * 
     * @param string $data Plaintext password to encrypt.
     * @param string $userPassword User password which is used as key to encrypt the plaintext password.
     * @return string encrypted password as base64-encode.
     */
    public static function encrypt($data, $userPassword) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC); //create a random initialization vector to use with CBC encoding
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        return base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $userPassword, $data, MCRYPT_MODE_CBC, $iv));
    }

    /**
     * Decrypt a MCRYPT_RIJNDAEL_256, base64-encoded password with the user password and return the decrypted, plaintext password.
     * 
     * @param string $data MCRYPT_RIJNDAEL_256, base64-encoded password to decrypt.
     * @param string $userPassword User password which is used as key to decrypt the encrypted password.
     * @return type decrypted, plaintext password.
     */
    public static function decrypt($data, $userPassword) {
        $data = base64_decode($data);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC); //retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
        $iv = substr($data, 0, $iv_size);
        $data = substr($data, $iv_size); //retrieves the cipher text (everything except the $iv_size in the front)
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $userPassword, $data, MCRYPT_MODE_CBC, $iv), chr(0));
    }
}
?>
