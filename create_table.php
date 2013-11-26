


<?php
	ini_set("display_errors","1");
	ini_set("memory_limit","-1");
	error_reporting(E_ALL);

//*********************THE CODE BELOW IS THE DRIVER***********************************
// ********PLEASE DO NOT UNCOMMENT AND RUN
// *******CAUTION! CODE WILL WRITE MORE DATA ONTO THE DATABASE

//*************^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*******************
//Read CSV file
$filelocation = 'fin11.csv';
$readcsv = new CSVread($filelocation);
//$readcsv->read_file();
$temphold = $readcsv->read_file();

//Test out update_college class
//$upcol_obj = new update_colleges();
//$upcol_obj->insert_data($temphold);

//$yn = 2011;
//$upenroll_obj = new update_enrollment();
//$upenroll_obj->insert_data($temphold,$yn);

//$yn = 2011;
//$upfin_obj = new update_finance();
//$upfin_obj->insert_data($temphold,$yn);

//*************************************************************
/**** HTML PART *****/
//Create Table by inputting an Array.
//$htmlclass = new html();
//$htmlclass-> Create_Table($temphold);


//print_r($readcsv->read_file());

class CSVread{
	
	public $fileholder ;
	function __construct($file){
		$this->fileholder = $file;
	}
	
	public function read_file(){
		//Switch Variable
		$first_loop = True;
		//Step 1 - Check if opening the file is succesful or not.
		If (($checkfile = fopen($this->fileholder, "r")) !== FALSE ){
			// fgetcsv - Gets line from file pointer and parse for CSV fields 
			While (($data = fgetcsv($checkfile, 0, ",")) !== FALSE){
				if($first_loop == TRUE) {
					//For the first run(first row) it gets and saves it into Field_names variable.
					$field_name = $this->createFieldNames($data);
					$first_loop = FALSE;
				} else {
					// For the other runs of the loop it creates records by calling the function createRecord.
					$records[] = $this->createRecord($field_name,$data);
					
				}			
			}
		}Else{
			//Entering here means that the fopen function failed to open the file.
			Echo "<h1> FAILED the IF statement! </h1>";
		}	
		
		//Returns the Array
		return $records;
	
	}
	
	public function createFieldNames($data){
		//Returns fieldname. For convienence.
		return $data;
	}
	public function createRecord($field_name,$data){
		// combines these two arrays and returns a new combined array.
		$record = array_combine($field_name, $data);
		return $record;
	}

	public function __deconstruct(){
		
	}
	
	
	
}

class writeCSV{
	
	function __construct($file,$addpart){
		echo "Entering WriteCSV";
		$fp = fopen($file,"a");
		foreach ($addpart as $fields){
			fputcsv($fp, $fields);
		}
	
		fclose($fp);
		echo "</br>CSV File Successfully Written!</br>";
	}
}

class html {
	
	function __construct(){
		
		
	}
	function Create_Table($arr_data){
		
		//echo "Im HERE!";
		//print "</br>-----------------START----------------- </br>";
		$Switch = TRUE;
		print "<table border='1'>";		
		foreach ($arr_data as $insideArr ){
			if ($Switch == TRUE){
				print "<tr>";
				foreach ($insideArr as $key => $value){
					print "<th>".$key."</th>";
				}
				print "</tr>";
				$Switch = FALSE;
			}
			print "<tr>";
			foreach ($insideArr as $key2 => $value2){
					print "<td>".$value2."</td>";
				}
			print "</tr>";
		}
		print "</table>";
	
	
	}
	
	
	
	
}
class update_colleges{
	
	function insert_data($arr_data){
		
		echo "Im HERE!";
		print "</br>-----------------START----------------- </br>";
		$Switch = TRUE;
		//****Connect to LocalDB*****
		
		//try{
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
			
		//}catch (PDOException $e){
		//	echo $e->getMessage();
		//}
		
		$id_count = 0;
		$array_count = 0;
		foreach ($arr_data as $insideArr ){
			foreach ($insideArr as $key2 => $value2){
					if ($Switch == TRUE){
						print "VAR INFO"; 
						print "<br>";
						$Switch = FALSE;
					}
					
					if ($key2 =="UNITID"){
						$temp_id=$value2;
						
						print $temp_id;
						print "<br>";
						$id_count= $id_count + 1;
					}
					if ($key2 =="INSTNM"){
						$temp_name=$value2;
						
						print $temp_name;
						print "<br>";
					}
					if ($key2 =="STABBR"){
						$temp_state=$value2;
						print $temp_state;
						print "<br>";
					}
									
				}
			
			//try{
			$results = $DBH->exec("INSERT INTO colleges(id,name,state) VALUES('$temp_id','$temp_name','$temp_state')");
			//}
			//catch(PDOException $e)
			//{
			//echo 'Query failed '.$e->getMessage();
			//}
			
			$array_count= $array_count + 1;		
		}
		print "NUMBER OF ID WENT THROUGH ".$id_count;
		print "<br>";
		print "NUMBER OF ARRAY WENT THROUGH ".$array_count;

	
	
	}
	
}
class update_enrollment{
	public $year;
	function insert_data($arr_data,$y){
		
		$this->year = $y;
		echo "Im HERE!";
		print "</br>-----------------START----------------- </br>";
		$Switch = TRUE;
		//****Connect to LocalDB*****

		$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
		foreach ($arr_data as $insideArr ){
			foreach ($insideArr as $key2 => $value2){
					if ($Switch == TRUE){
						print "VAR INFO"; 
						print "<br>";
						$Switch = FALSE;
					}
					
					if ($key2 =="UNITID"){
						$temp_id=$value2;
						
						print $temp_id;
						print "<br>";
					}
					if ($key2 =="EFFYLEV"){
						$temp_lvlstuf=$value2;
						
						print $temp_lvlstuf;
						print "<br>";
					}
					if ($key2 =="EFYTOTLT"){
						$temp_enroll=$value2;
						
						print $temp_enroll;
						print "<br>";
					}
														
				}
			
			try{
			$results = $DBH->exec("INSERT INTO enrollment(id,study_level,enroll_num,year) VALUES('$temp_id','$temp_lvlstuf','$temp_enroll','$this->year')");
			}catch (PDOException $e){
			echo $e->getMessage();
			}		
		}

	
	
	}
	
}
class update_finance{
	public $year;
	function insert_data($arr_data,$y){
		
		$this->year = $y;
		echo "Im HERE!";
		print "</br>-----------------START----------------- </br>";
		$Switch = TRUE;
		//****Connect to LocalDB*****


		$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
		foreach ($arr_data as $insideArr ){
			foreach ($insideArr as $key2 => $value2){
					if ($Switch == TRUE){
						print "VAR INFO"; 
						print "<br>";
						$Switch = FALSE;
					}
					
					if ($key2 =="UNITID"){
						$temp_id=$value2;
						
						print $temp_id;
						print "<br>";
					}
					if ($key2 =="F1A06"){
						$temp_ass=$value2;
						
						print $temp_ass;
						print "<br>";
					}
					if ($key2 =="F1A13"){
						$temp_liab=$value2;
						
						print $temp_liab;
						print "<br>";
					}
					if ($key2 =="F1D01"){
						$temp_rev=$value2;
						
						print $temp_rev;
						print "<br>";
					}									
				}
			
			try{
			$results = $DBH->exec("INSERT INTO fin11(id,total_assets,total_liabilities,total_revenue,year) VALUES('$temp_id','$temp_ass','$temp_liab','$temp_rev','$this->year')");
			}catch (PDOException $e){
			echo $e->getMessage();
			}		
		}

	
	
	}
	
}


?>



