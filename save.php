<?php
	
	if($_POST['name'] != '' && $_POST['email'] !='' && $_POST['username'] !='' && $_POST['pass'] !='' && $_POST['conpass'] !='' && $_POST['Gender'] !='' && $_POST['dateofbirth'] !=''){

		if (file_exists('SublimeText/student_data.json')) {

		$current_data = file_get_contents('SublimeText/student_data.json');
		$array_data = json_decode($current_data,true);
		$new_data = array(
					'Name' => $_POST['name'],
					'Email' => $_POST['email'], 
					'Username' => $_POST['username'],
					'Password' => $_POST['pass'],
					'Confirm Password' => $_POST['conpass'],
					'Gender' => $_POST['Gender'],
					'Date Of Birth' => $_POST['dateofbirth'],
				);

			$array_data [] = $new_data;
			$json_data = json_encode($array_data,JSON_PRETTY_PRINT);

			if (file_put_contents('SublimeText/student_data.json', $json_data)) {
				echo "<h3>Successfully Save data in JSON File .</h3>";
			}else{
				echo "<h3>UnSuccessfully Save data in JSON File .</h3>";
			}
		}	else{
				echo "<h3>JSON File not Exist .</h3>";
			}

	}
	else{
		echo "<h3>All filed are Reqiuired</h3>";
	}
  ?>