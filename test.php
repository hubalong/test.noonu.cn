<?php
     /**
     * 模拟post进行url请求
     * @param string $url
     * @param array $post_data
     */
    function request_post($url = '',$cookie='', $post_data = array()) {
        if(empty($url) || empty($post_data)) {
            return false;
        }
        
        $o = "";
        foreach ( $post_data as $k => $v ) 
        { 
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $post_data = substr($o,0,-1);

        $postUrl = $url;
        $curlPost = $post_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
       //curl_setopt($ch,CURLOPT_COOKIE,$cookie);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data;
    }
$url = 'http://xzfuli.cn/index.php?a=api_qiuqiu';
        $post_data['type']       = '4';
        $post_data['url']      = 'http://t.cn/RtUVG1Z';
	//$cookie = "url=".$post_data.";";
	$cookie = '';
        $res = request_post($url,$cookie , $post_data);       
        print_r($res);
	echo 'ddd';
