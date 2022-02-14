<?php
$NameError=""; /* we assigned here empty because on first page in not show Name is required */
$EmailError="";
$GenderError="";
$WebsiteError="";
if(isset($_POST["submit"])){
	if (empty($_POST["Name"])) {
   $NameError="Name is Required";
	}else{
		$Name=Test_User_Input($_POST["Name"]);
		if(!preg_match("/^[A-Za-z . ]*$/",$Name)){
			$NameError="only Letters and white space are allowed";
		}
	}

if (empty($_POST["Email"])) {
   $EmailError="Email is Required";
	}else{
		$Email=Test_User_Input($_POST["Email"]);
		if(!preg_match("/[a-zA-Z0-9.\-_\/?\$\=\&\#\~\`\!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`\!]*/",$Email)){
			$EmailError="Invalid Email";
		}
	}

	if (empty($_POST["Gender"])) {
   $GenderError="Gender is Required";
	}else{
		$Gender=Test_User_Input($_POST["Gender"]);
	}

	if (empty($_POST["Website"])) {
   $WebsiteError="Website is Required";
	}else{
		$Website=Test_User_Input($_POST["Website"]);
		if(!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\/?\$=&\#\~`!]*/",$Website)){
			$WebsiteError="Invalid Website Address Format";
		}
	}

if (!empty($_POST["Name"]) && !empty($_POST["Email"]) && !empty($_POST["Website"])){
if((preg_match("/^[A-Za-z . ]*$/",$Name)==true) && (preg_match("/[a-zA-Z0-9.\-_\/?\$\=\&\#\~\`\!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`\!]*/",$Email)==true)&&(preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\/?\$=&\#\~`!]*/",$Website)==true))
{
echo "<h2>Your Submit Information<h2><br>";
echo "Name: {$_POST["Name"]} <br>";
echo "Email: {$_POST["Email"]} <br> ";
echo "Gender: {$_POST["Gender"]} <br> ";
echo "Website: {$_POST["Website"]} <br> ";
echo "Comments: {$_POST["comment"]} <br> ";
}else{
	echo "Please complete and correct your Form again";
}

}



}
function Test_User_Input($Data){
	return $Data;
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Validation Project</title>
</head>
<body>

<h2>Form Validation With PHP.</h2>

<form action="form.php" method="POST">
	<legend>* Please Fill The Following Fields.</legend>
	<fieldset>
		Name:<br>
		<input class="input" type="text" name="Name" value=" ">
		*<?php echo $NameError;?><br>
		E-mail:<br>
		<input class="input" type="text" name="Email" value="">
		*<?php echo $EmailError; ?><br>
		Gender:<br>
		<input class="radio" type="radio" Name="Gender" value="">Female
		<input class="radio" type="radio" Name="Gender" value="">Male
		*<?php echo $GenderError;?><br><br>
		Website:<br>
		<input class="input" type="text" name="Website" value="">
		*<?php echo $WebsiteError;?><br>
		comment:<br>
		<textarea name="comment" rows="5" cols="25"></textarea>
		*<br>
		<br>
		<input type="submit" name="submit" value="submited">
	</fieldset>
</form>

</body>
</html>