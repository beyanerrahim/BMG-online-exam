<?php
error_reporting(false);

              use PHPMailer\PHPMailer\PHPMailer;
              use PHPMailer\PHPMailer\Exception;

              require './PHPMailer/Exception.php';
              require './PHPMailer/PHPMailer.php';
              require './PHPMailer/SMTP.php';
              require './PHPMailer/OAuth.php';
              require './PHPMailer/POP3.php';


              function send_mail($email,$username,$subject,$message,$emailfrom,$adminname){

                 //echo $email . $username . $subject . $message;
                  date_default_timezone_set("Europe/Istanbul");

                  $mail = new PHPMailer(true);
                  if (!PHPMailer::ValidateAddress($email)) { // or !$mail->validateAddress($email)
                    return "E-posta adresi geçersiz!";
                  }
                  try {
                    $mail->SetLanguage("tr", "phpmailer/language/");
                    $mail->CharSet  = "utf-8";

        

                    //Tell PHPMailer to use SMTP
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->SMTPKeepAlive = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587; //ssl:465 tls:587
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Username = "learnarabic0192@gmail.com";
                    $mail->Password = "selin2021";
                    $mail->addAddress($email,$username); //'email','first-last name'

                    //Password to use for SMTP authentication
                    
                    $mail->setFrom($emailfrom, 'Online Exam');
                    $mail->addReplyTo($emailfrom,$adminname);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $body= $message;
                    $mail->AltBody = $body;


                    //Ask for HTML-friendly debug output
                    $mail->Debugoutput = 'html';
                    $mail->msgHTML($body);
                    if($mail->send()){
                      ?>
                      <h6 class="alert alert-dark" >basarila donderildi    </h6>
<?php
                    }
        

                    //send the message
                    $mail->smtpConnect([
                      'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                      ]
                    ]);
                    
                  } catch (Exception $e) {
                    echo $e->getMessage(); //Boring error messages from anything else!
                  }
                }
                function send_mail1($email,$username,$subject,$message){

                    date_default_timezone_set("Europe/Istanbul");
  
                    $mail = new PHPMailer(true);
                    if (!PHPMailer::ValidateAddress($email)) { // or !$mail->validateAddress($email)
                      return "E-posta adresi geçersiz!";
                    }
                    try {
                      $mail->SetLanguage("tr", "phpmailer/language/");
                      $mail->CharSet  = "utf-8";
  
          
  
                      //Tell PHPMailer to use SMTP
                      $mail->isSMTP();
                      $mail->SMTPAuth = true;
                      $mail->SMTPKeepAlive = true;
                      $mail->SMTPSecure = 'tls';
                      $mail->Port = 587; //ssl:465 tls:587
                      $mail->Host = 'smtp.gmail.com';
                      $mail->Username = "learnarabic0192@gmail.com";
                      $mail->Password = "selin2021";
                      $mail->addAddress($email,$username); //'email','first-last name'
  
                      //Password to use for SMTP authentication
                      
                      $mail->setFrom("learnarabic0192@gmail.com", 'Online Exam');
                      $mail->addReplyTo("selin2021",'Online Exam');
                      $mail->isHTML(true);
                      $mail->Subject = $subject;
                      $body= $message;

                      $mail->AltBody = $body;
  
  
                      //Ask for HTML-friendly debug output
                      $mail->Debugoutput = 'html';
                      $mail->msgHTML($body);
                      if($mail->send()){
                        ?>
                        <h6 class="alert alert-dark" > basariyla gonderilmis  </h6>
  <?php                      }
          
  
                      //send the message
                      $mail->smtpConnect([
                        'ssl' => [
                          'verify_peer' => false,
                          'verify_peer_name' => false,
                          'allow_self_signed' => true
                        ]
                      ]);
                      
                    } catch (Exception $e) {
                      echo $e->getMessage(); //Boring error messages from anything else!
                    }
                    return true;
                  }
              ?>