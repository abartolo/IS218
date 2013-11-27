

<?php

ini_set("display_errors","1");
ini_set("memory_limit","-1");
error_reporting(E_ALL);
	

			
$program = new Format();



Class Format{
	
	public $html = "";
	function __construct(){
		
		if (isset($_REQUEST['ques'])) {
		  	$page = $_REQUEST['ques'];
			
			$bob = new $page();
			$bob->GenerateTable();
		}else{
			$this->StartHTML();
		}

	}
	function StartHTML(){
		$this->html.= "<!DOCTYPE html>
				
				<html lang='en'>
				<head>
				
				
				  <title>Final Assignment</title>
				
				</head>
				
				<body>
				<br>
				<h3> Question Navigation </h3>
				<a href='main.php?ques=question1'>Question 1</a><br>
				<a href='main.php?ques=question2'>Question 2</a><br>
				<a href='main.php?ques=question3'>Question 3</a><br>
				<a href='main.php?ques=question4'>Question 4</a><br>
				<a href='main.php?ques=question5'>Question 5</a><br>
				<a href='main.php?ques=question6'>Question 6</a><br>
				<a href='main.php?ques=question7'>Question 7</a><br>
				<a href='main.php?ques=question8'>Question 8</a><br>
				<a href='main.php?ques=question9'>Question 9</a><br>
				<a href='main.php?ques=question10'>Question 10</a><br>
				<a href='main.php?ques=question11'>Question 11</a><br>
				<a href='main.php?ques=question12'>Question 12</a><br>
				
				";
	}
	function CloseHTML(){
		$this->html.= "</body></html>";
	}
	
	function __destruct(){
		$this->CloseHTML();
		echo $this->html;

		
	}
	
}

Class question1 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #1</h1>
					<br>
					<h3>Create a web page that shows the colleges that have the highest enrollment.</h3>	
					<br>
					<br>
					<h4>Answer</h4>
					<br>";
		
		//*******Connect DB********
		$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
		
		// ************* 2010 **************
			$sth = $DBH->prepare("SELECT colleges.*,enroll10.enroll_num,enroll10.year FROM colleges JOIN enroll10 ON colleges.id=enroll10.id  WHERE enroll10.year = 2010 AND enroll10.enroll_num >= 100000  Order By enroll_num DESC LIMIT 10");

			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results for 2010:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="enroll_num"||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		 	
		
			//************* 2011 ****************
			$sth2 = $DBH->prepare("SELECT colleges.*,enroll11.enroll_num,enroll11.year FROM colleges JOIN enroll11 ON colleges.id=enroll11.id  WHERE enroll11.year = 2011 AND enroll11.enroll_num >= 100000 Order By enroll_num DESC LIMIT 10");
			$sth2->execute();

			$results2 = $sth2->fetchAll();
			
			$this->html.= "<h4>Results for 2011:</h4>";	


			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results2 as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="enroll_num" ||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		}
	
}
Class question2 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #2</h1>
						<br>
						<h3>Create a web page that that lists the colleges with the largest amount of total liabilities.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			// ************* 2010 **************
			$sth = $DBH->prepare("SELECT colleges.*,fin10.total_liabilities,fin10.year FROM colleges JOIN fin10 ON colleges.id=fin10.id WHERE fin10.year=2010 AND fin10.total_liabilities >= 1000000000 ORDER BY fin10.total_liabilities DESC LIMIT 10");
			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results for 2010:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="total_liabilities" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="total_liabilities"||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
			
			//************* 2011 ****************
			$sth2 = $DBH->prepare("SELECT colleges.*,fin11.total_liabilities,fin11.year FROM colleges JOIN fin11 ON colleges.id=fin11.id WHERE fin11.year=2011 AND fin11.total_liabilities >= 1000000000  ORDER BY fin11.total_liabilities DESC LIMIT 10");
			$sth2->execute();

			$results2 = $sth2->fetchAll();
			
			$this->html.= "<h4>Results for 2011:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results2 as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="total_liabilities" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="total_liabilities" ||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		}
	
}
Class question3 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #3</h1>
						<br>
						<h3>Create a web page that lists the colleges with the largest amount of net assets.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			// ************* 2010 **************
			//$sth = $DBH->prepare("SELECT colleges.*,finance.total_assets,finance.year FROM colleges JOIN finance ON colleges.id=finance.id WHERE finance.year=2010 AND finance.total_assets > 1000000000 ORDER BY finance.total_assets  DESC LIMIT 10");
			$sth = $DBH->prepare("SELECT colleges.*,fin10.total_assets,fin10.year FROM colleges JOIN fin10 ON colleges.id=fin10.id WHERE fin10.year=2010 AND fin10.total_assets > 1000000000 ORDER BY fin10.total_assets  DESC LIMIT 10");
			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results for 2010:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="total_assets" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="total_assets"||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
			
			//************* 2011 ****************
			//$sth2 = $DBH->prepare("SELECT colleges.*,finance.total_assets,finance.year FROM colleges JOIN finance ON colleges.id=finance.id WHERE finance.year=2011 AND finance.total_assets > 1000000000 ORDER BY finance.total_assets  DESC LIMIT 10");
			$sth2 = $DBH->prepare("SELECT colleges.*,fin11.total_assets,fin11.year FROM colleges JOIN fin11 ON colleges.id=fin11.id WHERE fin11.year=2011 AND fin11.total_assets > 1000000000 ORDER BY fin11.total_assets  DESC LIMIT 10");
			$sth2->execute();

			$results2 = $sth2->fetchAll();
			
			$this->html.= "<h4>Results for 2011:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results2 as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="total_assets" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="total_assets" ||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		}
	
}
Class question4 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #4</h1>
						<br>
						<h3>Create a web page that lists the colleges with the largest amount of net assets.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			// ************* 2010 **************
			$sth = $DBH->prepare("SELECT colleges.*,fin10.total_assets,fin10.year FROM colleges JOIN fin10 ON colleges.id=fin10.id WHERE fin10.year=2010 AND fin10.total_assets > 1000000000 ORDER BY fin10.total_assets  DESC LIMIT 10");
			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results for 2010:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="total_assets" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="total_assets"||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
			
			//************* 2011 ****************
			$sth2 = $DBH->prepare("SELECT colleges.*,fin11.total_assets,fin11.year FROM colleges JOIN fin11 ON colleges.id=fin11.id WHERE fin11.year=2011 AND fin11.total_assets > 1000000000 ORDER BY fin11.total_assets  DESC LIMIT 10");
			$sth2->execute();

			$results2 = $sth2->fetchAll();
			
			$this->html.= "<h4>Results for 2011:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results2 as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="total_assets" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="total_assets" ||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		}
	
}

Class question5 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #5</h1>
						<br>
						<h3>Create a web page that lists the colleges with the largest amount of total revenues.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			// ************* 2010 **************
			$sth = $DBH->prepare("SELECT colleges.*,fin10.total_revenue,fin10.year FROM colleges JOIN fin10 ON colleges.id=fin10.id WHERE fin10.year=2010  ORDER BY fin10.total_revenue  DESC LIMIT 10");
			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results for 2010:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="total_revenue" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="total_revenue"||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
			
			//************* 2011 ****************
			$sth2 = $DBH->prepare("SELECT colleges.*,fin11.total_revenue,fin11.year FROM colleges JOIN fin11 ON colleges.id=fin11.id WHERE fin11.year=2011  ORDER BY fin11.total_revenue  DESC LIMIT 10");
			$sth2->execute();

			$results2 = $sth2->fetchAll();
			
			$this->html.= "<h4>Results for 2011:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results2 as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="total_revenue" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="total_revenue" ||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		}
	
}
Class question6 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #6</h1>
						<br>
						<h3>Create a web page that lists the colleges with the largest amount of total revenues per student.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			// ************* 2010 **************
			$sth = $DBH->prepare("SELECT colleges.*,enrollment_merged.enroll_num,finance.total_revenue,finance.year FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id WHERE enrollment_merged.year=2010 and finance.year=2010 AND finance.total_revenue > 100000000 ORDER BY (finance.total_revenue/enrollment_merged.enroll_num ) DESC LIMIT 10");
			$sth->execute();
			//AND fin10.total_revenue > 100000000
			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results for 2010:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"||$key=="total_revenue" ||$key=="year" ||$key="Rev_Per_Student"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="enroll_num"||$key2=="total_revenue"||$key2=="year"||$key2="Rev_Per_Student"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
			
			//************* 2011 ****************
			
			$sth2 = $DBH->prepare("SELECT colleges.*,enrollment_merged.enroll_num,finance.total_revenue,finance.year FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id WHERE enrollment_merged.year=2011 and finance.year=2011 AND finance.total_revenue > 100000000 ORDER BY (finance.total_revenue/enrollment_merged.enroll_num ) DESC LIMIT 10");
			$sth2->execute();

			$results2 = $sth2->fetchAll();
			
			$this->html.= "<h4>Results for 2011:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results2 as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"||$key=="total_revenue" ||$key=="year" ||$key="Rev_Per_Student"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="enroll_num"||$key2=="total_revenue" ||$key2=="year" ||$key2="Rev_Per_Student"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		
		}
	
}

Class question7 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #7</h1>
						<br>
						<h3>Create a web page that lists the colleges with the largest amount of net assets per student.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			// ************* 2010 **************
			$sth = $DBH->prepare("SELECT colleges.*,enrollment_merged.enroll_num,finance.total_assets,finance.year FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id WHERE enrollment_merged.year=2010 and finance.year=2010 ORDER BY (finance.total_assets/enrollment_merged.enroll_num ) DESC LIMIT 10");
			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results for 2010:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"||$key=="total_assets" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="enroll_num"||$key2=="total_assets"||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
			
			//************* 2011 ****************
			$sth2 = $DBH->prepare("SELECT colleges.*,enrollment_merged.enroll_num,finance.total_assets,finance.year FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id WHERE enrollment_merged.year=2011 and finance.year=2011 ORDER BY (finance.total_assets/enrollment_merged.enroll_num ) DESC LIMIT 10");
			$sth2->execute();

			$results2 = $sth2->fetchAll();
			
			$this->html.= "<h4>Results for 2011:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results2 as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"||$key=="total_assets" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="enroll_num"||$key2=="total_assets" ||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		}
	
}

Class question8 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #8</h1>
						<br>
						<h3>Create a web page that lists the colleges with the largest amount of total liabilities per student.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			// ************* 2010 **************
			$sth = $DBH->prepare("SELECT colleges.*,enrollment_merged.enroll_num,finance.total_liabilities,finance.year FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id WHERE enrollment_merged.year=2010 and finance.year=2010 ORDER BY (finance.total_liabilities/enrollment_merged.enroll_num ) DESC LIMIT 10");
			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results for 2010:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"||$key=="total_liabilities" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="enroll_num"||$key2=="total_liabilities"||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
			
			//************* 2011 ****************
			$sth2 = $DBH->prepare("SELECT colleges.*,enrollment_merged.enroll_num,finance.total_liabilities,finance.year FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id WHERE enrollment_merged.year=2011 and finance.year=2011 ORDER BY (finance.total_liabilities/enrollment_merged.enroll_num ) DESC LIMIT 10");
			$sth2->execute();

			$results2 = $sth2->fetchAll();
			
			$this->html.= "<h4>Results for 2011:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results2 as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"||$key=="total_liabilities" ||$key=="year"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name" ||$key2=="state" ||$key2=="enroll_num"||$key2=="total_liabilities" ||$key2=="year"){
							$this->html.= "<td>".$value2."</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
		}
	
}

Class question9 extends Format{
		
	function __construct(){
		$this->StartHTML();
		
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #9</h1>
						<br>
						<h3>Create a table that compares the top 5 colleges based on the statistics above.   The columns should be the 5 colleges and the rows should be the statistics.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		if (isset($_REQUEST['type'])) {
		 	$cat = $_REQUEST['type'];
		}else{
			$cat = "normal";
		}

		$this->$cat();
	}
	function normal(){

					//*******Connect DB********
					$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
					// ************* 205 **************
					$sth = $DBH->prepare("SELECT colleges.name,enrollment_merged.enroll_num,finance.total_liabilities,finance.total_assets,finance.total_revenue FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id  WHERE enrollment_merged.year = 2010 and finance.year=2010 ORDER BY finance.total_revenue  DESC LIMIT 5");
					$sth->execute();
		
					$results = $sth->fetchAll();
					
					$this->html.= "<h4>Results for 2010:</h4>";	
		
					$Switch = TRUE;
					$this->html.= "<table border='1'>";		
					foreach ($results as $insideArr ){
						if ($Switch == TRUE){
							$this->html.= "<tr>";
							foreach ($insideArr as $key => $value){
								//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
								if (gettype($key) == "string"){
									if($key=="name" ||$key=="total_liabilities" ||$key=="total_revenue" ||$key=="enroll_num" ||$key=="total_assets"){
										if ($key=="name"){
											$this->html.= "<th>".$key."</th>";
										}else{
											$this->html.= "<th><a href=main.php?ques=question9&type=".$key.">".$key."</a></th>";
										}
										
									}
								}	
							}
							$this->html.= "</tr>";
							$Switch = FALSE;
						}
						$this->html.= "<tr>";
						foreach ($insideArr as $key2 => $value2){
							if (gettype($key2) == "string"){	
								if($key2=="name" ||$key2=="total_liabilities" ||$key2=="total_revenue" ||$key2=="enroll_num" ||$key2=="total_assets"){
									$this->html.= "<td>".$value2."</td>";
								}
							}
						}
						$this->html.= "</tr>";
					}
					$this->html.= "</table>";
					$this->html.= "<br>";
					$this->html.= "<br>";
				}
	function enroll_num(){
					//*******Connect DB********
					$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
					// ************* 2010 **************
					$sth = $DBH->prepare("SELECT colleges.name,enrollment_merged.enroll_num,finance.total_liabilities,finance.total_assets,finance.total_revenue FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id  WHERE enrollment_merged.year = 2010 and finance.year=2010 ORDER BY enrollment_merged.enroll_num  DESC LIMIT 5");
					$sth->execute();
		
					$results = $sth->fetchAll();
					
					$this->html.= "<h4>Results for 2010:</h4>";	
		
					$Switch = TRUE;
					$this->html.= "<table border='1'>";		
					foreach ($results as $insideArr ){
						if ($Switch == TRUE){
							$this->html.= "<tr>";
							foreach ($insideArr as $key => $value){
								//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
								if (gettype($key) == "string"){
									if($key=="name" ||$key=="total_liabilities" ||$key=="total_revenue" ||$key=="enroll_num" ||$key=="total_assets"){
										if ($key=="name"){
											$this->html.= "<th>".$key."</th>";
										}else{
											$this->html.= "<th><a href=main.php?ques=question9&type=".$key.">".$key."</a></th>";
										}
										
									}
								}	
							}
							$this->html.= "</tr>";
							$Switch = FALSE;
						}
						$this->html.= "<tr>";
						foreach ($insideArr as $key2 => $value2){
							if (gettype($key2) == "string"){	
								if($key2=="name" ||$key2=="total_liabilities" ||$key2=="total_revenue" ||$key2=="enroll_num" ||$key2=="total_assets"){
									$this->html.= "<td>".$value2."</td>";
								}
							}
						}
						$this->html.= "</tr>";
					}
					$this->html.= "</table>";
					$this->html.= "<br>";
					$this->html.= "<br>";
				}
	function total_revenue(){

					//*******Connect DB********
					$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
					// ************* 2010 **************
					$sth = $DBH->prepare("SELECT colleges.name,enrollment_merged.enroll_num,finance.total_liabilities,finance.total_assets,finance.total_revenue FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id  WHERE enrollment_merged.year = 2010 and finance.year=2010 ORDER BY finance.total_revenue  DESC LIMIT 5");
					$sth->execute();
		
					$results = $sth->fetchAll();
					
					$this->html.= "<h4>Results for 2010:</h4>";	
		
					$Switch = TRUE;
					$this->html.= "<table border='1'>";		
					foreach ($results as $insideArr ){
						if ($Switch == TRUE){
							$this->html.= "<tr>";
							foreach ($insideArr as $key => $value){
								//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
								if (gettype($key) == "string"){
									if($key=="name" ||$key=="total_liabilities" ||$key=="total_revenue" ||$key=="enroll_num" ||$key=="total_assets"){
										if ($key=="name"){
											$this->html.= "<th>".$key."</th>";
										}else{
											$this->html.= "<th><a href=main.php?ques=question9&type=".$key.">".$key."</a></th>";
										}
										
									}
								}	
							}
							$this->html.= "</tr>";
							$Switch = FALSE;
						}
						$this->html.= "<tr>";
						foreach ($insideArr as $key2 => $value2){
							if (gettype($key2) == "string"){	
								if($key2=="name" ||$key2=="total_liabilities" ||$key2=="total_revenue" ||$key2=="enroll_num" ||$key2=="total_assets"){
									$this->html.= "<td>".$value2."</td>";
								}
							}
						}
						$this->html.= "</tr>";
					}
					$this->html.= "</table>";
					$this->html.= "<br>";
					$this->html.= "<br>";

				}
	function total_liabilities(){
		
					//*******Connect DB********
					$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
					// ************* 2010 **************
					$sth = $DBH->prepare("SELECT colleges.name,enrollment_merged.enroll_num,finance.total_liabilities,finance.total_assets,finance.total_revenue FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id  WHERE enrollment_merged.year = 2010 and finance.year=2010 ORDER BY finance.total_liabilities  DESC LIMIT 5");
					$sth->execute();
		
					$results = $sth->fetchAll();
					
					$this->html.= "<h4>Results for 2010:</h4>";	
		
					$Switch = TRUE;
					$this->html.= "<table border='1'>";		
					foreach ($results as $insideArr ){
						if ($Switch == TRUE){
							$this->html.= "<tr>";
							foreach ($insideArr as $key => $value){
								//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
								if (gettype($key) == "string"){
									if($key=="name" ||$key=="total_liabilities" ||$key=="total_revenue" ||$key=="enroll_num" ||$key=="total_assets"){
										if ($key=="name"){
											$this->html.= "<th>".$key."</th>";
										}else{
											$this->html.= "<th><a href=main.php?ques=question9&type=".$key.">".$key."</a></th>";
										}
										
									}
								}	
							}
							$this->html.= "</tr>";
							$Switch = FALSE;
						}
						$this->html.= "<tr>";
						foreach ($insideArr as $key2 => $value2){
							if (gettype($key2) == "string"){	
								if($key2=="name" ||$key2=="total_liabilities" ||$key2=="total_revenue" ||$key2=="enroll_num" ||$key2=="total_assets"){
									$this->html.= "<td>".$value2."</td>";
								}
							}
						}
						$this->html.= "</tr>";
					}
					$this->html.= "</table>";
					$this->html.= "<br>";
					$this->html.= "<br>";
				}
	function total_assets(){
		
					//*******Connect DB********
					$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
					$sth = $DBH->prepare("SELECT colleges.name,enrollment_merged.enroll_num,finance.total_liabilities,finance.total_assets,finance.total_revenue FROM colleges JOIN enrollment_merged ON colleges.id=enrollment_merged.id JOIN finance ON enrollment_merged.id=finance.id  WHERE enrollment_merged.year = 2010 and finance.year=2010 ORDER BY finance.total_assets  DESC LIMIT 5");
					$sth->execute();
		
					$results = $sth->fetchAll();
					
					$this->html.= "<h4>Results for 2010:</h4>";	
		
					$Switch = TRUE;
					$this->html.= "<table border='1'>";		
					foreach ($results as $insideArr ){
						if ($Switch == TRUE){
							$this->html.= "<tr>";
							foreach ($insideArr as $key => $value){
								//if($key=="id" ||$key=="name" ||$key=="state" ||$key=="enroll_num"){
								if (gettype($key) == "string"){
									if($key=="name" ||$key=="total_liabilities" ||$key=="total_revenue" ||$key=="enroll_num" ||$key=="total_assets"){
										if ($key=="name"){
											$this->html.= "<th>".$key."</th>";
										}else{
											$this->html.= "<th><a href=main.php?ques=question9&type=".$key.">".$key."</a></th>";
										}
										
									}
								}	
							}
							$this->html.= "</tr>";
							$Switch = FALSE;
						}
						$this->html.= "<tr>";
						foreach ($insideArr as $key2 => $value2){
							if (gettype($key2) == "string"){	
								if($key2=="name" ||$key2=="total_liabilities" ||$key2=="total_revenue" ||$key2=="enroll_num" ||$key2=="total_assets"){
									$this->html.= "<td>".$value2."</td>";
								}
							}
						}
						$this->html.= "</tr>";
					}
					$this->html.= "</table>";
					$this->html.= "<br>";
					$this->html.= "<br>";
				}
		
}


Class question10 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #10</h1>
						<br>
						<h3>Create a web page that allows you to enter in a state abbreviation in a form field and then retrieve the colleges that are in that state.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		$this->html.= "<form method='post' action='main.php?ques=question10'>
						<select name='state'>
							<option value='AL'>Alabama</option>
							<option value='AK'>Alaska</option>
							<option value='AZ'>Arizona</option>
							<option value='AR'>Arkansas</option>
							<option value='CA'>California</option>
							<option value='CO'>Colorado</option>
							<option value='CT'>Connecticut</option>
							<option value='DE'>Delaware</option>
							<option value='DC'>District of Columbia</option>
							<option value='FL'>Florida</option>
							<option value='GA'>Georgia</option>
							<option value='HI'>Hawaii</option>
							<option value='ID'>Idaho</option>
							<option value='IL'>Illinois</option>
							<option value='IN'>Indiana</option>
							<option value='IA'>Iowa</option>
							<option value='KS'>Kansas</option>
							<option value='KY'>Kentucky</option>
							<option value='LA'>Louisiana</option>
							<option value='ME'>Maine</option>
							<option value='MD'>Maryland</option>
							<option value='MA'>Massachusetts</option>
							<option value='MI'>Michigan</option>
							<option value='MN'>Minnesota</option>
							<option value='MS'>Mississippi</option>
							<option value='MO'>Missouri</option>
							<option value='MT'>Montana</option>
							<option value='NE'>Nebraska</option>
							<option value='NV'>Nevada</option>
							<option value='NH'>New Hampshire</option>
							<option value='NJ'>New Jersey</option>
							<option value='NM'>New Mexico</option>
							<option value='NY'>New York</option>
							<option value='NC'>North Carolina</option>
							<option value='ND'>North Dakota</option>
							<option value='OH'>Ohio</option>
							<option value='OK'>Oklahoma</option>
							<option value='OR'>Oregon</option>
							<option value='PA'>Pennsylvania</option>
							<option value='RI'>Rhode Island</option>
							<option value='SC'>South Carolina</option>
							<option value='SD'>South Dakota</option>
							<option value='TN'>Tennessee</option>
							<option value='TX'>Texas</option>
							<option value='UT'>Utah</option>
							<option value='VT'>Vermont</option>
							<option value='VA'>Virginia</option>
							<option value='WA'>Washington</option>
							<option value='WV'>West Virginia</option>
							<option value='WI'>Wisconsin</option>
							<option value='WY'>Wyoming</option>
						</select>
						<button type='submit'>Submit</button>
		
					   </form>
					   <br><br><br><br><br>";
		if (isset($_REQUEST['state'])) {
		 	$state = $_REQUEST['state'];

			//*******Connect DB********
				$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');
	
				// ************* 2010 **************
				$sth = $DBH->prepare("SELECT colleges.* FROM colleges WHERE colleges.state ='$state'");
				$sth->execute();
	
				$results = $sth->fetchAll();
				
				$this->html.= "<h4>Results for the state: ".$state."</h4>";	
	
				$Switch = TRUE;
				$this->html.= "<table border='1'>";		
				foreach ($results as $insideArr ){
					if ($Switch == TRUE){
						$this->html.= "<tr>";
						foreach ($insideArr as $key => $value){
							if (gettype($key) == "string"){
								if($key=="id" ||$key=="name" ||$key=="state"){
									
									$this->html.= "<th>".$key."</th>";
								}
							}	
						}
						$this->html.= "</tr>";
						$Switch = FALSE;
					}
					$this->html.= "<tr>";
					foreach ($insideArr as $key2 => $value2){
						if (gettype($key2) == "string"){	
							if($key2=="id" ||$key2=="name" ||$key2=="state"){
								$this->html.= "<td>".$value2."</td>";
							}
						}
					}
					$this->html.= "</tr>";
				}
				$this->html.= "</table>";
			}
			
			
		}
	
}

Class question11 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #11</h1>
						<br>
						<h3>Create a web page that shows the colleges with the largest percentage increase in total liabilities between 2011 and 2010.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			$sth = $DBH->prepare("SELECT colleges.id,colleges.name ,(((fin11.total_liabilities/fin10.total_liabilities)-1) *100) AS Percentage_Difference FROM colleges JOIN fin10 ON colleges.id=fin10.id JOIN fin11 ON fin10.id=fin11.id ORDER BY Percentage_Difference DESC LIMIT 10");
			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results:</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="Percentage_Difference"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name"){
							$this->html.= "<td>".$value2."</td>";
							
						}elseif($key2=="Percentage_Difference"){
							$this->html.= "<td>".$value2."%</td>";
						}
						
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";
			
			
		}
	
}

Class question12 extends Format{
		
	function __construct(){
		$this->StartHTML();
	}

	function GenerateTable(){
		$this->html.= "<h1>Question #12</h1>
						<br>
						<h3>Create a web page that shows the colleges with the largest percentage increase in enrollment between the years of 2011 and 2010.</h3>	
						<br>
						<br>
						<h4>Answer</h4>
						<br>";
		
		//*******Connect DB********
			$DBH = new PDO('mysql:host=sql.njit.edu;dbname=ab394','ab394','8w9oBvO5r');

			
			$sth = $DBH->prepare("SELECT DISTINCT(colleges.id),colleges.name ,(((enroll11.enroll_num/enroll10.enroll_num)-1) *100) AS Percentage_Difference FROM colleges JOIN enroll10 ON colleges.id=enroll10.id JOIN enroll11 ON enroll10.id=enroll11.id WHERE enroll10.id=enroll11.id and enroll10.enroll_num <5000 and enroll11.enroll_num <5000 ORDER BY Percentage_Difference DESC LIMIT 10");
			$sth->execute();

			$results = $sth->fetchAll();
			
			$this->html.= "<h4>Results</h4>";	

			$Switch = TRUE;
			$this->html.= "<table border='1'>";		
			foreach ($results as $insideArr ){
				if ($Switch == TRUE){
					$this->html.= "<tr>";
					foreach ($insideArr as $key => $value){
						
						if (gettype($key) == "string"){
							if($key=="id" ||$key=="name" ||$key=="Percentage_Difference"){
								
								$this->html.= "<th>".$key."</th>";
							}
						}	
					}
					$this->html.= "</tr>";
					$Switch = FALSE;
				}
				$this->html.= "<tr>";
				foreach ($insideArr as $key2 => $value2){
					if (gettype($key2) == "string"){	
						if($key2=="id" ||$key2=="name"){
							$this->html.= "<td>".$value2."</td>";
						}
						if($key2=="Percentage_Difference"){
								$this->html.= "<td>".$value2."%</td>";
						}
					}
				}
				$this->html.= "</tr>";
			}
			$this->html.= "</table>";

		}
	
}








?>