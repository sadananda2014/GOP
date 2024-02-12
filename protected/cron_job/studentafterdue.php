#!/usr/local/bin/php.cli
<?php 
date_default_timezone_set('Asia/Kolkata');
 require('class.email-query-results-as-csv-file.php');
 require_once 'Mandrill.php';
  $host="localhost";
  $uname="vediclabs";
  $pass="admin4890";
  $database = "roots_sports"; 
$connection=mysql_connect($host,$uname,$pass) 
or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or die("Database could not be selected"); 
$result1=mysql_select_db($database)
or die("database cannot be selected <br>");
$result1 = mysql_query("SELECT * FROM payment p1 JOIN (registration,fee) on (registration.register_id=p1.student_id and fee.id=p1.course_id) where p1.payment_due_date<NOW()  and transaction_no=(select max(p2.transaction_no) from payment p2 where p1.student_id=p2.student_id GROUP BY p2.student_id) group by student_id,transaction_no
ORDER BY p1.transaction_no");
//print_r($result);

if (!$result1) {
    die('Invalid query: ' . mysql_error());
}


while ($row = mysql_fetch_array($result1)) {
	
$pcp=$row['primary_contact_person'];
if($pcp=="father"){  
	$name=$row['fathers_name'];
	$phone=$row['fathers_phone'];
	$email=$row['fathers_email'];
}
else if($pcp=="mother")
{  
	$name=$row['mothers_name'];  
	$phone=$row['mothers_phone'];  
	$email=$row['mothers_email']; 
}
else if($pcp=="self")
{  
	$name=$row['name']; 
	$phone=$row['trainee_phone'];  
	$email=$row['trainee_email'];

}
else if($pcp=="guardian")
{ 
	
	$email=$row['guardian_email'];
	$name=$row['guardian_name'];
    $phone=$row['guardian_phone'];

}
$mandrill = new Mandrill('TkY1C36IpIl7GFtJEDAr6w');

 //$email="amit@gameonsport.in";
 //$name="Amit";
try{
 
        $message = array(
                'subject' => 'Payment Reminder - Roots Football',
                'html' => '<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><center>
        <table width="580" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #DBDBDB; margin-top:5px;">
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="10" >
                      <tr>
                        <td ><img src="http://gameonsports.in/images/logo.png" alt="Roots Football School" title=""Roots"" style="margin:10px 10px 0px 10px" /></td>
                      </tr>
                      <tr>
                        <td style="font-size:18px; color:#D83A1F; font-family: Helvetica,Arial,sans-serif; padding-left:20px">Dear Parent, </td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td style="font-size:12px; font-family: Helvetica,Arial,sans-serif;"><table width="100%" border="0" cellspacing="0" cellpadding="10" >
                      <tr>
                        <td style="font-size:16px; font-family: Helvetica,Arial,sans-serif; padding-left:20px">
                                 Football coaching fees of Rs. '.$row['total_fee'].' for '.$row['duration'].' months for '.$row['name']." ".$row['last_name'].'  was due on <span style="color:red">'.$row['payment_due_date'].'</span>. Please pay the due amount immediately for continuing the coaching programme.
                      
                       <p>Payment Options: Cash/ Cheque/ NEFT</p>
                       <p>Cheque in favour of "Game On Sports Management Pvt. Ltd"</p>
                       
                       <p> <strong> BANK DETAILS: </strong><br/>
							A/C NAME: GAME ON SPORTS MANAGEMENT PVT. LTD.<br/>
							ACCOUNT NO: 00098190000016<br/>
							ACCOUNT TYPE: CURRENT ACCOUNT<br/>
							Bank: HDFC BANK, 24/3 HDFC HOUSE, NO.51, KASTURBA ROAD<br/>
							IFSC CODE: HDFC0000009 </p>
                       
                       <p>For any queries, please feel free to write in to us at RootsFS@GameOnSports.in</p>
                       
                       <p> We appreciate your patronage and welcome your feedback/suggestions.</p>

						<p style="padding-left:0px;">Regards,<br/>
						Team Roots FS</p>
                          </td>
                      </tr>
             
                      <tr>
                       
                        <td style="font-size:10px; font-family: Helvetica,Arial,sans-serif; padding-left:20px"> 
							<p>Game On Sports Management Pvt.Ltd.<br>
							110, Classic Business Center, 14/1, M.G. Road, Bangalore-560001<br>
							T: 080-25591118/40988084<br>
							E: <a href="mailto:rootsfs@gameonsports.in" target="_blank">RootsFS@gameonsports.in</a> | <a href="www.GameOnSports.in">www.GameOnSports.in</a></p>
							
							
                        
                        
                         </td>
                          
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td style="font-size:12px; font-family: Helvetica,Arial,sans-serif;"><table width="100%" border="0" cellspacing="0" cellpadding="10" >
                      
                    </table></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td></td>
          </tr>
        </table>
      </center></td>
  </tr>
</table>
                ', // or just use 'html' to support HTMl markup
                'from_email' => 'rootsfs@gameonsports.in',
                'from_name' => 'Roots Football', //optional
                'to' => array(
                        array( // add more sub-arrays for additional recipients
                                'email' => "sadanand@vediclabs.com",
                                'name' => "sada", // optional
                                'type' => 'to' //optional. Default is 'to'. Other options: cc & bcc
                                )
                ),
 
                /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE',
                  'track_clicks' => TRUE) go here */
        );
 
    $result = $mandrill->messages->send($message);
    //print_r($result); //only for debugging
 
} catch(Mandrill_Error $e) { 
 
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
 
    throw $e;
}

}
$filename="payment due over".date("Y-m-d").".csv";

$emailCSV = new

EmailQueryResultsAsCsv('localhost','roots_sports','vediclabs','admin4890');
$emailCSV->setCSVname($filename);
$emailCSV->setQuery("SELECT CONCAT(registration.name, '', registration.last_name) as name,fee.duration as duration,fee.description as description,p1.payment_date as old_paid_date,p1.payment_due_date as due_date,p1.total_fee as fee_payable,fathers_phone,mothers_phone,guardian_phone FROM payment p1 JOIN (registration,fee) on (registration.register_id=p1.student_id and fee.id=p1.course_id) where p1.payment_due_date<NOW() and transaction_no=(select max(p2.transaction_no) from payment p2 where p1.student_id=p2.student_id GROUP BY p2.student_id) group by student_id,transaction_no
ORDER BY p1.transaction_no");
$emailCSV->sendEmail("gameonsports.in","rootsfs@gameonsports.in","Payment Reminder - Roots Football Report ");

//echo "completed....................";
?>

