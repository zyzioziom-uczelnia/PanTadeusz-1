<?php

// send mail about new reflection
$url = 'https://mandrillapp.com/api/1.0/messages/send.json';
$params = [
'message' => array(
'subject' => $title,
'text' => $reflection,
'html' => '<p>'.$reflection.'</p>',
'from_email' => 'uek@no-replay.com',
'to' => array(
  array(
    'email' => $mail_recipient,
    'name' => $mail_recipient_name
  )
)
)
];

$params['key'] = $mandill_api_key;
$params = json_encode($params);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

$head = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

?>
