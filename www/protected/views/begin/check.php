<?php

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($_POST)
    )
);

$context = stream_context_create($options);
$result = file_get_contents('http://127.0.0.1:8888', false, $context);

if ($result === FALSE) {
    /* Handle error */
} else if (strlen($result) == 0) {
   
    echo "Отличное начало. Продолжай в том же духе!";
} else {
    echo $result;
}
