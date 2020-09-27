<?php #
#########################################################################################
##																						#	
## Author : G Goutham Reddy																#
## Author Website : https://greddy.in                                                   #	 
## Description : This udemy api is property of courstrendz.xyz .   #	 
## Version : 1.0                                                                        #	  
#########################################################################################


	//function for getting course
		function get_data($url) {
		$ch = curl_init();
		$timeout = 5;

		//
		$udemy_client_id = 'k9yDyDJ9mjn2um4WiXnKR7J83DkIpbCUVwucxKfS';
		$udemy_client_secret = 'lr696ACS6DPgqhXGz63ieznaTHoXbL5sMi7qPoQXtln1URpyc2UMf49nTKf6OudVMEy3PC3VnG8fskPqinUswO6oNZ4qj6aqeXRUBqQ3pg0NdW6Af08FE06NwqpuFAT4';

		$key = $udemy_client_id.':'.$udemy_client_secret;
		//HTTP Authorization
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		   'X-Udemy-Client-Id: '.base64_encode($udemy_client_id),
		   'X-Udemy-Client-Secret: '.base64_encode($udemy_client_secret),
		   'Authorization:Basic '.base64_encode($key)
		   ));
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
		}
			// general cour
?>