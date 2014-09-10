<?php
error_reporting(0);

function sendEmailWithAttachment($to_email, $subject, $body, $from=false, $login_details=false, $attachements=array(), $html_body='', $embedded_images=array()) {
    $crlf = "\n";
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = new Mail_mime($crlf);
    $mime->setTXTBody($body);
    if($embedded_images) {
        foreach ($embedded_images as $key => $value) {
            $mime->addHTMLImage($value, finfo_file($finfo, $value), $key);
            //print "Embedded $key\n";
        }
    }

    if($attachements) {
        if(!is_array($attachements)) $attachements = array($attachements);

        foreach ($attachements as $attachement_file) {
            if($attachement_file and file_exists($attachement_file)) {
                $mime->addAttachment($attachement_file, finfo_file($finfo, $attachement_file));
                //print "Attached $attachement_file\n";
            }
        }
    } 

    if($html_body) {
        if($embedded_images) {
            $cid = $mime->_html_images[count($mime->_html_images)-1]['cid'];
            $html_body = str_replace('%CID%', $cid, $html_body);
        }
        $mime->setHTMLBody($html_body);
    }

    
    if(!$from or !$login_details) die("Need login details of the SMTP Account to sent the emails from.");
    
    //do not ever try to call these lines in reverse order
    $body = $mime->get();
    $headers = $mime->headers(array(
        'From'    => $from,
        'Subject' => $subject
    ));
    
    $login_details['auth'] = true;
    $smtp = Mail::factory('smtp', $login_details);
    $send = $smtp->send($to_email, $headers, $body);

    if(@PEAR::isError($send)) echo $send->getMessage();
    finfo_close($finfo);
}
