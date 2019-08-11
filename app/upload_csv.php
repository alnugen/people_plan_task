<?php
define ('DS', DIRECTORY_SEPARATOR);
define ('BASE_DIR', dirname(__FILE__) . DS . ".." . DS);
 //-----------------------------------------------------------------
require_once 'configs' . DS . 'configs.inc.php';
require_once 'autoload.php';
//-----------------------------------------------------------------


Utils::$templatePath = 'tmp' . DS;

$file = Utils::GetFile('employee.csv');

//-----------------------------------------------------------------
$dbo = new Db();
// $sql ="
// SELECT * FROM `users` " ;
// $retrieve_data = $dbo->execute($sql, []);
// echo $retrieve_data; die;

$i = 0;
$importData = [];
//import data from file
while (($getData = fgetcsv($file, 1000, ","))!== FALSE)
	{
		$num = count($getData);
        for ($j=0; $j < $num; $j++) {
        	$importData[$i][] = $getData[$j];
        }
        $i++;
	}
$skip = 0;
$log = [];
   // insert import data
   foreach($importData as $data){
   if($skip != 0){
     $username = $data[0];
   	 $created_date = $data[1];
	   // Checking duplicate entry
     $sql ="
  SELECT * FROM `users` where `username` = ? " ;
  	 $count_users = $dbo->numRows($sql, [$username]);
     if($count_users == 0){
       // Insert record
       $insert_query = "INSERT INTO `users`(`username`, `created_date`) values(?, ?)";
       $inserted_data = $dbo->execute($insert_query, [$username, $created_date]);
       $message = "SUCCESSS | " .$username. " inserted successfully |" .date('Y-m-d H:i:s');
       array_push($log, $message );
      } else {
        $message = "ERROR | Skipping: " .$username. " already exits | " .date('Y-m-d H:i:s');
  		      array_push($log, $message);
  	  }
    }
    $skip ++;
  }
fclose($file);

//Write to log file
Utils::WriteLog('log.txt', $log);

?>
