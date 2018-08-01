<?php
header("Content-type: application/json; charset=utf-8");
require 'Core.php';
//reCaptcha
$secret=Core::getInstance()->recaptcha_secretkey;
$response=(!empty($_POST["captcha"])?$_POST["captcha"]:'');

//Sanitize data
$fullname = (!empty($_POST["fullname"])?stripslashes($_POST["fullname"]):'');
$email = (!empty($_POST["email"])?stripslashes($_POST["email"]):'');
$phone = (!empty($_POST["phone"])?stripslashes($_POST["phone"]):'');
$website = (!empty($_POST["website"])?stripslashes($_POST["website"]):'');
$subject = (!empty($_POST["subject"])?stripslashes($_POST["subject"]):'');
$message = (!empty($_POST["message"])?stripslashes($_POST["message"]):'');

//build mail
$post_array = [
    'To'            => 'div.it@tkd.co.id',
    'Subject'       => $subject,
    'Message'       => '<b>'.Core::lang('fullname').':</b> '.$fullname.'<br><b>'.Core::lang('email').':</b> '.$email.'<br><b>'.Core::lang('phone').':</b> '.$phone.'<br><b>'.Core::lang('website').':</b> '.$website.'<br><b>'.Core::lang('subject').':</b> '.$subject.'<br><b>'.Core::lang('message').':</b><br>'.$message,
    'Html'          => true,
    'From'          => $email,
    'FromName'      => $fullname,
    'CC'            => '',
    'BCC'           => '',
    'Attachment'    => ''
];

//Validation
if (!empty(Core::getInstance()->email) && !empty($fullname) && !empty($email) && !empty($subject) && !empty($message)){
    //Verify reCaptcha
    $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success=json_decode($verify);
    if ($captcha_success->success==false) {
        //reCaptcha failed
        echo json_encode(['status' => 'error','code' => '0','message' => Core::lang('val_failed_recaptcha')]);
    }
    else if ($captcha_success->success==true) {
        //Sending to mail server
        $data = Core::execPostRequest(Core::getInstance()->api.'/mail/send',$post_array);
        if(!empty($data)){
            echo $data;
        } else {
            echo json_encode(['status' => 'error','code' => '0','message' => Core::lang('core_not_connected')]);        
        }
    }
} else {
    echo json_encode(['status' => 'error','code' => '0','message' => Core::lang('val_wrong_input_field')]);
}
?>