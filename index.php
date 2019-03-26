<?php

require 'vendor/autoload.php'; 


$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("test@example.com", "Example User");  // อีเมล์เรา ใส่อะไรก็ได้ ไม่จำเป็นต้องของจริง
$email->setSubject("Sending with SendGrid is Fun"); // หัวเรื่อง Email
$email->addTo("60011270016@msu.ac.th", "Example User");  // อีเมล์ที่จะส่งถึง
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>" // ข้อความที่จะส่ง เขียนเป็น HTML ได้
);
$sendgrid = new \SendGrid('API_KEY');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>