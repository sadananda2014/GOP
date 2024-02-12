#!/usr/local/bin/php.cli
<?php 
  date_default_timezone_set('Asia/Kolkata');
  $host="localhost";
  $uname="vediclabs";
  $pass="admin4890";
  $database = "roots_sports"; 
$connection=mysql_connect($host,$uname,$pass) 
or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or die("Database could not be selected"); 
$result=mysql_select_db($database)
or die("database cannot be selected <br>");
$result = mysql_query("SELECT * FROM registration");

while ($row = mysql_fetch_array($result)) {

$id=$row["register_id"];
  //echo"row".$id;
$startDate = $row["dob"];
  //echo "1".$startDate;
$endDate = date("Y-m-d");
  //echo "2".$endDate;
//------------------------------------------------------------------------------------

  $startDate = strtotime($startDate); 
  $endDate = strtotime($endDate); 
            if ($startDate === false || $startDate < 0 || $endDate === false || $endDate < 0 || $startDate > $endDate) 
                return false; 
                
            $years = date('Y', $endDate) - date('Y', $startDate); 
            
            $endMonth = date('m', $endDate); 
            $startMonth = date('m', $startDate); 
            
            // Calculate months 
            $months = $endMonth - $startMonth; 
            if ($months <= 0)  { 
                $months += 12; 
                $years--; 
            } 
            if ($years < 0) 
                return false; 
            
            // Calculate the days 
                        $offsets = array(); 
                        if ($years > 0) 
                            $offsets[] = $years . (($years == 1) ? ' year' : ' years'); 
                        if ($months > 0) 
                            $offsets[] = $months . (($months == 1) ? ' month' : ' months'); 
                        $offsets = count($offsets) > 0 ? '+' . implode(' ', $offsets) : 'now'; 

                        $days = $endDate - strtotime($offsets, $startDate); 
                        $days = date('z', $days);  





//----------------------------------------------------------------------------------------






$mdate=$years." years ". $months ."months";   
  //echo $mdate;

$result1=mysql_query("UPDATE registration SET age='$mdate' WHERE register_id='$id'");
if (!$result1) {
    die('Invalid query: ' . mysql_error());
}
          
}


mysql_close($connection);

  //echo "completed...............";
?>
