<?php //header('content-type: application/json');
 require_once("../../../Initialization/initialize.php"); 
 require("lib/class.PHPMailer.php");
 $mail = new PHPMailer(true);

 
 
$file = "stp_report.php"; // your template ex: DamReport.php
$title = "Water Level Monitoring Report"; // title

$objects_returned[] = array(
    'file' => $file,
    'title' => $title
);

#region SQL To
      $sqlTo = ""; // list of to recipient
    // $execTo = dynaset::load($sqlTo);
#endregion

#region SQL Cc
     $sqlCc = ""; // list of cc recipient
    // $execCc = dynaset::load($sqlCc);
#endregion

 

#region - EMAILING PROCESS
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
            $mail->isSMTP();                                         // Send using SMTP
            $mail->Host = "150.150.50.131";                          // Set the SMTP server to send through
        // $mail->SMTPAuth   = true;                                 // Enable SMTP authentication
            $mail->Username   = 'ULFS@universalleaf.com';                  // SMTP username
        //  $mail->Password   = '';                                 // SMTP password
        //  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 25;                                        // TCP port to connect to
 
            
            $mail->setFrom('ULFS@universalleaf.com', 'ULFS'); // optional if you use different address
            // if(mssql_num_rows($execTo)) {
            //     while($row = mssql_fetch_array($execTo)) {
            //          $to_res[] = array(
            //              $row['sortOrder'] => $row['email']
            //          );
                    
            //         $mail->AddAddress($row['email'], $row['Name']);
            //     }
            //     $objects_returned[] = array('To' => $to_res);
            // }
            $mail->AddAddress("Kim_Adorna@universalleaf.com.ph", "Kim Adorna");
       
            // if(mssql_num_rows($execCc)) {
            //     while($row = mssql_fetch_array($execCc)) {
            //          $cc_res[] = array(
            //              $row['sortOrder'] => $row['email']
            //          );

            //          $mail->AddCC($row['email'], $row['Name']);
            //     }
            //     $objects_returned[] = array('Cc' => $cc_res);
            // }
            $mail->AddCC("mark_curampez@universalleaf.com.ph", "mark curampez");
                
            // Attachments

            // Content
            $mail->isHTML(true);    // Set email format to HTML
            $mail->Subject = $title;
            //$mail->Body    = '';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            ob_start();
            include($file);
            $mail->Body = ob_get_contents();
            ob_end_clean();
          
   
            $mail->send();

            
            echo json_encode('{msg: "success"}');
    } catch (Exception $e) {
        $sentStatus[] = array(
            'status' => 'resource:0000'
        );
    }
#endregion - END EMAIL PROCESS
?>