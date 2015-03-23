<?php

include_once 'config.php';

class FireLog{
	
	private $data = array();
	
	public function __construct($company_id, $platform_name, $user_id){
		// PUSH TOKEN : fix after created
		$this->data["company_id"] = $company_id;
		// PUSH platform_name
		$this->data["platform_name"] = $platform_name;
		// PUSH TIME : always refresh when sendLog() called
		$this->data["time"] = $this->getCurrentTime();
		// RESERVE USER_ID : normally in one session, user_id only need set once
		// IF USER_ID = 0 PUBLIC STATUS
		$this->data['user_id'] = $user_id;
	}	
	
	// this could be a unique user id in your application database
	public function setOperateType($activityType){
		$this->data['activityType'] = $activityType;
	}
	
	public function setDocumentId($document_id){
		$this->data['document_id'] = $document_id;	
	}
	
// 	public function addLogAttribute($key, $value){
// 		$key = trim($key);
// 		$value = trim($value);
// 		$key = str_replace(" ", "_", $key);
// // 		$value = str_replace(" ", "_", $value);
		
// 		if(strcmp($key, "token") == 0 
// 				|| strcmp($key, "time") == 0 
// 				|| strcmp($key, "user_id") == 0
// 				|| strcmp($key, "log_name") == 0
// 		){
// 			echo "CUSTOMIZED LOG KEY NAME CANNOT BE 'TOKEN', 'TIME', 'USER_ID' AND OTHER RESERVED KEY,
// 					TO SET THESE KEY VALUE, GO TO SPECIFIC FUNCTION.";
// 			exit();
// 		}else if(sizeof($this->data) > 9){
// 			echo "Log attribute has full, you can create a new fireLog after send this one!";
// 		}
		
// 		$this->data[$key] = $value;
// 	}
	
	private function getCurrentTime(){
		date_default_timezone_set('America/Chicago');
		$date = date('Y-m-d H:i:s', time());
		return $date;
	}
	
	public function toString(){
		print_r($this->data);
	}
	
	public function sendLog(){
		// SET TIME
		$this->data['time'] = $this->getCurrentTime();
		
		// SENDING LOG
		echo "SENDING . . .<br><br>";
		global $LOG_API_URL;
		echo "Location: ".$LOG_API_URL."<br><br>Data: <br>";
		
		print_r($this->data);

		// $CURL = curl_init();
		// curl_setopt_array($CURL, array(
		// CURLOPT_RETURNTRANSFER => 1,
		// CURLOPT_URL => $LOG_API_URL,
		
		// CURLOPT_POST => 1,
		// CURLOPT_POSTFIELDS => $this->data
		// ));
		
		// // Send the request & save response to $resp
		// $resp = curl_exec($CURL);
		// echo "<br><br>[RESPONSE]<br>".$resp."<BR>[RESPONSE DONE]";
		// // Close request to clear up some resources
		// curl_close($CURL);




	    $context =
		array("http"=>
		  array(
		    "method" => "post",
		    "header" => 'Content-Type: application/json'. "\r\n",
		    "content" => $this->data
		  )
		);
		$context = stream_context_create($context);
		$result = file_get_contents($LOG_API_URL, false, $context);
		echo $result;
		
		// TODO: CLEAN UP ALL THE CUSOMIZED DATA
		
	}
	
}