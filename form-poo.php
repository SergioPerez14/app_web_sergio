<?php

	/**
	* 
	*/
	class Formulario{

		public $nameErr;
		public $emailErr;
		public $genderErr;
		public $websiteErr;
		public $name; 
		public $email; 
		public $gender; 
		public $comment; 
		public $website;
		
		function datos($name,$email,$gender,$comment,$website)
		{
			$this->name=$name;
			$this->email=$email;
			$this->gender=$gender;
			$this->comment=$comment;
			$this->website=$website;
		}

		function test_input($data) {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
		}

		function imprimir(){
		    if (empty($_POST["name"])) {
		        $this->nameErr = "Name is required";
		        echo $this->nameErr;
		    } else {
		        $this->name = $this->test_input($_POST["name"]);
		        // check if name only contains letters and whitespace
		        if (!preg_match("/^[a-zA-Z ]*$/",$this->name)) {
		            $this->nameErr = "Only letters and white space allowed";
		            echo $this->nameErr;
		        }else
		        echo $this->name;
		    }
		    echo "<br><br>";
		    if (empty($_POST["email"])) {
		        $this->emailErr = "Email is required";
		        echo $this->emailErr;
		    } else {
		        $this->email = $this->test_input($_POST["email"]);
		        // check if e-mail address is well-formed
		        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
		            $this->emailErr = "Invalid email format";
		            echo $this->emailErr;
		        }else
		        	echo $this->email;
		    }
		    echo "<br><br>";
		    if (empty($_POST["gender"])) {
		        $this->genderErr = "Gender is required";
		        echo $this->genderErr;
		    } else {
		        $this->gender = $this->test_input($_POST["gender"]);
		        echo $this->gender;	
		    }
		    echo "<br><br>";
		    if (empty($_POST["website"])) {
		        $this->website = "";
		    } else {
		        $this->website = $this->test_input($_POST["website"]);
		        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->website)) {
		            $this->websiteErr = "Invalid URL: ";
		            echo $this->websiteErr;
		            echo $this->website;
		        }else{
		        	$this->websiteErr = "Valid URL: ";
		            echo $this->websiteErr;
		            echo $this->website;
		        }
		    }
			echo "<br><br>";
		    if (empty($_POST["comment"])) {
		        $this->comment = "";
		    } else {
		        $this->comment = $this->test_input($_POST["comment"]);
		        echo $this->comment;
		    }
		}
	}
?>