<?php
	if(isset($_POST['mii'])){
			$id = $_POST['id2'];
			var_dump($id);
			$username = $_POST['username2'];
			$password = $_POST['password2'];
			
			$profiles = file_get_contents('profiles.json');
			$array = json_decode($profiles, true);
			if($id === "-1"){
                $idd = intval($id);
				$lastindex = count($array);
				$array[$lastindex]['id'] = $idd;
				$array[$lastindex]['username'] = $username;
				$array[$lastindex]['password'] = $password;
				$last = $array[$lastindex-1]['id'];
				$last = intval($last) + 1;
				$array[$lastindex]['id'] = $last;
			}
			else{
				$which = -1;
				$id = intval($id);
				for($i = 0; $i < count($array); $i++){
					if($array[$i]['id'] === $id){
						$which = $i;
						break;
					}
				}
				$array[$which]['id'] = $id;
				$array[$which]['username'] = $username;
				$array[$which]['password'] = $password;
			
			}
			$array2 = json_encode($array,JSON_UNESCAPED_SLASHES);
			file_put_contents('profiles.json', $array2);
			header("location: ./page9.php");
        }