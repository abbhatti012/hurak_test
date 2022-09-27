<?php
  
     header("Access-Control-Allow-Credentials: true");
     header("Access-Control-Max-Age: 600");

     $message = "First task done from Abdul Basit and email is ab.pko12@gmail.com";

    //  $to_email = 'webdevelopers@hurak.co.uk';
     $to_email = 'ab.pk012@gmail.com';
     $subject = "First task done from Abdul Basit";
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=UTF-8';
     $headers[] = "From: <$email>";

    echo mail($to_email, $subject, $message, implode("\r\n", $headers));
?>