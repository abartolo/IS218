

<?php
	ini_set("display_errors","1");
	error_reporting(E_ALL);
	

//****************** The Driver *****************************
//*********************THE CODE BELOW IS THE DRIVER***********************************
// ********PLEASE DO NOT UNCOMMENT AND RUN
// *******CAUTION! CODE WILL TRANSFER AND MERGE MORE DATA ONTO THE DATABASE

//*************^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*******************

$DBconnect = new ConnectDB();


//$year1 = 2010;
//$year2 = 2011;
//$Trans = new Transfer_Enroll();

//$Trans->Transfer($year1);
//$Trans->Transfer($year2);


//************************ END ********************************

class ConnectDB {
	
	function __construct(){
		
		$this->Connect();
		}

	function Connect(){
		//brings in file and uses varaibles from that file
		include ("account.php") ;
		//*************Connection to MySQL********************
		( $dbh = mysql_connect ( $hostname, $username, $password ) )
			        or    die ( "Unable to connect to MySQL database" );
		
		mysql_select_db( $project )  or die ("Incorrect database name"); 			
		//print "Connected to MySQL <br>";
	}

}
class Transfer_Enroll{
	

	function Transfer($year){

		$reg_query = "SELECT DISTINCT(enrollment.id) FROM enrollment WHERE year='$year'";
		
		//Executing Query
		$reg_db_result = mysql_query($reg_query);
		
		//If statements
		if ($reg_db_result == FALSE){
			//Instantiate ERROR class page for grade.
			die("<br><h2> First query failed.</h2><br>");
		}else{
			echo "We hit 3";
			while ($holder = mysql_fetch_array($reg_db_result)){
					//ID to keep
					$var_id= $holder['id'];
					
					//Grab Specific ID enrollment information
					$spec_id_query = "SELECT * FROM enrollment WHERE id = '$var_id'and year='$year' ";
					echo "The SQL QUERY Executed is: ".$spec_id_query;
					$enrolldb_result = mysql_query($spec_id_query);
					$num_rows = mysql_num_rows($enrolldb_result);
					
					if ($num_rows == 0){
						
						$GLOBALS['html'] .= "<br>";
						$GLOBALS['html'] .= "<h3> Issue with id:'$var_id' on year: '$year' </h3>";
						$GLOBALS['html'] .= "====================================================";
						echo $GLOBALS['html'];
					}else{
						$h_enum = 0;		
						while ($id_res = mysql_fetch_array($enrolldb_result)){
							
							$h_id=$id_res['id'];
							$h_enum= $h_enum + $id_res['enroll_num'];
							$h_year=$id_res['year'];

						}	
						//Insert Here
						$insert_q = "INSERT INTO enroll11(id,enroll_num,year) VALUES('$h_id','$h_enum','$h_year')";
						echo "The SQL INSERT QUERY Executed is: ".$insert_q;
						$exe_insert = mysql_query($insert_q);
						
						
					}
						
			}
						

		}

	}
	}


?>