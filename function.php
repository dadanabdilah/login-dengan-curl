<?php
    // jika website menggunakan token husus untuk login
	function get_token($url){
		// ambil token
	    $html = file_get_html($url);

	    $token = [];
	    // looping token
	    foreach($html->find('input[type=hidden]') as $hidden) {
	        $token[$hidden->name] = $hidden->value;
	    }
	    return $token;
	}

	function http_request($url, $data){
    // inisialisasi curl
    $ch = curl_init(); 
    
    // redirect
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // post data
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false); 

    // cookie
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie-name.txt');

    // eksekusi
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // retrurn hasil
    return $output;
}

?>