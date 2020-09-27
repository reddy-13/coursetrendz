<?php 
	 require_once('udemy.php');
	 $query ='';
	 $page = '1';
		//echo $returned_content;
		//var_dump($results);
		//function for it results
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		if(isset($_GET['query'])){
			$query = $_GET['query'];
		}
		//echo $page;// debugging purpose
		if($query || $page){
			$returned_content = get_data("https://www.udemy.com/api-2.0/courses/?page=$page&page_size=12&search=$query&fields[course]=@all&price=price-free");
			echo $returned_content;
		}	
	}else{
		$returned_content = get_data('https://www.udemy.com/api-2.0/courses/?page=$page');
		echo $returned_content;
	}
 ?>