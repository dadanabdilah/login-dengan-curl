<?php
require_once 'simple_html_dom.php';
require_once 'function.php';

$user = 'user';
$pass = 'pass';

// set url ambil token
$url = 'https://satu.com';
// jika url post data berbeda
$url2 = 'https://satu.com/auth';

// set data post
$data = [
    'txtUser'   => $user,
    'txtPass'   => $pass,
    'btnLogin'  => 'Login',
];

// tanpa token
// var_dump(http_request($url2, $data));

// gabung token
$data = array_merge(get_token($url), $data);
var_dump(http_request($url2, $data));

?>