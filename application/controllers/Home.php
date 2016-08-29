<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    public function index(){
        $this->lv('home/index','');
    }
    public function test(){
        echo 'dfsfs';
    }
    /*
	private $iv = "01234567";
    private $key="Av37tiM1N1cyLBaA12dfFbR4";
    private $text = 'EPXOWhg6ZXbCEzsomiOubxiIP/Jou2Au';
    public function index3(){
        // 1. 初始化
        $ch = curl_init();
        // 2. 设置选项，包括URL
        curl_setopt($ch,CURLOPT_URL,"http://test.noonu.cn/welcome/test");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        // 3. 执行并获取HTML文档内容
        echo $output = curl_exec($ch);
        if($output === FALSE ){
            echo "CURL Error:".curl_error($ch);
        }
        // 4. 释放curl句柄
        curl_close($ch);
        die;
        $ch = curl_init("http://test.noonu.cn/home/test");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回  
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
        echo $output = curl_exec($ch) ;
    }
    
	public function index2()
	{
		$a = array(  ) ;   //
		$str = '';
        foreach( $a as $k => $v){
            $str .=  chr( $v );
        }
        $this->iv = $str;
		//echo $this->session->userdata('username');
		echo $this->decryptText(base64_decode($this->text),$this->key,$this->iv);
		//$this->lv('home/index','');
	}
	private function pkcs5Pad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize); // in php, strlen returns the bytes of $text
        return $text . str_repeat(chr($pad), $pad);
    }

    private function pkcs5Unpad($text) {
        $pad = ord($text{strlen($text)-1});
        if ($pad > strlen($text)) return false;
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
        return substr($text, 0, -1 * $pad);
    }

    private function encryptText($plain_text, $key, $iv) {
        $padded = $this->pkcs5Pad($plain_text, mcrypt_get_block_size(MCRYPT_TRIPLEDES, MCRYPT_MODE_CBC));
        return base64_encode(mcrypt_encrypt(MCRYPT_3DES, $key, $padded, MCRYPT_MODE_CBC, $iv));
    }

    private function decryptText($cipher_text, $key, $iv) {
        $plain_text = mcrypt_decrypt(MCRYPT_TRIPLEDES, $key, $cipher_text, MCRYPT_MODE_CBC, $iv);
        return $this->pkcs5Unpad($plain_text);
    }
    */
}