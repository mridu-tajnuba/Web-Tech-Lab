<?php
     $name="";
	 $err_name="";
	 $uname="";
	 $err_uname="";
	 $pass="";
     $err_pass="";
     $email="";
     $err_email="";
     $confirm_pass="";
     $err_confirm_pass="";
     $code="";
     $number="";
     $err_phone="";
     $addr="";
     $err_addr="";
     $city="";
     $state="";
     $err_region="";
     $zip="";
     $err_zip="";
     $gender="";
     $err_gender="";
     $checks=[];
	 $err_checks="";
     $day="";
     $month="";
     $year="";
     $err="";

     $hasError=false;

     $Days= array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
     $Months= array("January","February","March","April","May","June","July","Agust","September","Octobor","November","December");
     $Years= array("1997","1998","1999","2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010");

     if ($_SERVER["REQUEST_METHOD"] == "POST") 
     {
     	if(empty($_POST["name"]))  //Name Validation
     	{
			$err_name="Name Required";
			$hasError = true;
		}

		else
		{
			$name=$_POST["name"];
		}

		if(empty($_POST["username"]))   //Username Validation
     	{
			$err_uname="Username Required";
			$hasError = true;
		}

		elseif(strlen($_POST["username"])<=6) 
		{
			$err_uname="Username shold be more than 6 character";
			$hasError = true;
		}

		elseif(strpos($_POST["username"]," "))
		{
            $err_uname="Username shold not have any space";
			$hasError = true;
		}

		else
		{
			$uname=$_POST["username"];
		}

		if(empty($_POST["password"]))   //Password Validation
     	{
			$err_pass="Password Required";
			$hasError = true;
		}

		elseif (strlen($_POST["password"])<=8 && !is_numeric($_POST["password"]) && !ctype_upper($_POST["password"]) && !ctype_lower($_POST["password"]) && (!strpos($_POST["email"],'#') || !strpos($_POST["email"],'?')))  
	    {
			$err_pass="Required";
			$hasError = true;
		}

		else
		{
			$pass=$_POST["password"];
		}

		if(empty($_POST["confirm_password"]))    //Confirm password validation
     	{
			$err_confirm_pass="Confirm Password Required";
			$hasError = true;
		}

		elseif ($_POST["password"]!=$_POST["confirm_password"])  
	    {
			$err_confirm_pass="Password does not Matched";
			$hasError = true;
		}

		else
		{
			$confirm_pass=$_POST["confirm_password"];
		}

		if(empty($_POST["email"]))      //Email validation
     	{
			$err_email="Email Required";
			$hasError = true;
		}

		elseif(!strpos($_POST["email"],'@') && !strpos($_POST["email"],'.'))
		{
             $err_email="First use @ and then .(dot)";
			 $hasError = true;
		}

		elseif (strpos($_POST["email"],'@') ) 
		{
			if (strpos($_POST["email"],'.')) 
			{
				$email=$_POST["email"];
			}
		}

		elseif(strpos($_POST["email"],'.'))
		{
			if (!strpos($_POST["email"],'@') || strpos($_POST["email"],'@')) 
			{
				$err_email="First use @ and then .(dot)";
			    $hasError = true;
			}
		}

		else
		{
			$email=$_POST["email"];
		}

		if(empty($_POST["code"]) && empty($_POST["number"]))   //Phone Number validation
     	{
			$err_phone="Code & Number Recuired";
			$hasError = true;
		}

		elseif (!is_numeric($_POST["code"]) && !is_numeric($_POST["number"])) 
		{
			$err_phone="Numeric Value Recuired";
			$hasError = true;
		}

		elseif (!empty($_POST["code"])) 
		{
			if(!empty($_POST["number"]))
			{
				$code=$_POST["code"];
				$number=$_POST["number"];
			}

			else if(empty($_POST["number"]))
			{
				$err_phone="Number Required";
			    $hasError = true;
			    $code=$_POST["code"];
			}
		}

		elseif (!empty($_POST["number"])) 
		{
			if(empty($_POST["code"]))
			{
				$err_phone="Code Recuired";
			    $hasError = true;
			    $number=$_POST["number"];
			}
		}

		if(empty($_POST["city"]) && empty($_POST["state"]))      //City & State Validation
     	{
			$err_region="Confirm City & State";
			$hasError = true;
		}

		elseif (!empty($_POST["city"])) 
		{
			if(!empty($_POST["state"]))
			{
				$city=$_POST["city"];
				$state=$_POST["state"];
			}

			else if(empty($_POST["state"]))
			{
				$err_region="State Required";
			    $hasError = true;
			    $city=$_POST["city"];
			}
		}

		elseif (!empty($_POST["state"])) 
		{
			if(empty($_POST["city"]))
			{
				$err_region="City Recuired";
			    $hasError = true;
			    $state=$_POST["state"];
			}
		}

		if(empty($_POST["zip"]))       // Zip Validation
     	{
			$err_zip="Zip/Postal Required";
			$hasError = true;
		}

		else
		{
			$zip=$_POST["zip"];
		}

		if(empty($_POST["address"]))    // Address Validation
     	{
			$err_addr="Address Required";
			$hasError = true;
		}

		else
		{
			$addr=$_POST["address"];
		}

		if(!isset($_POST["Gender"]))   //Gender Validation
		{
			$err_gender="Gender Required";
			$hasError = true;
		}
		else
		{
			$gender = $_POST["Gender"];
		}

		if(!isset($_POST["checks"]))   //Check Box Validation
		{
			$err_checks="Required tick";
			$hasError = true;
		}
		else
		{
			$checks = $_POST["checks"];
		}


		if (!isset($_POST["Day"]) && !isset($_POST["Month"]) && !isset($_POST["Year"]))  //Date, Month & Year Validation
		{
			$err= "Day, Month & Year Required";
			$hasError = true;
		}

		else if(isset($_POST["Day"]) && isset($_POST["Month"]) && isset($_POST["Year"]))
		{
			$day = $_POST["Day"];
			$month = $_POST["Month"];
			$year = $_POST["Year"];
		}

		elseif (!isset($_POST["Day"])) 
		{
			if(isset($_POST["Month"]) && isset($_POST["Year"]))
			{
				$err= "Day Required";
			    $hasError = true;
			    $month = $_POST["Month"];
			    $year = $_POST["Year"];
			}

			elseif(isset($_POST["Month"]))
			{
                $err= "Day & Year Required";
			    $hasError = true;
			    $month = $_POST["Month"];
			}

			elseif(isset($_POST["Year"]))
			{
                $err= "Day & Month Required";
			    $hasError = true;
			    $year = $_POST["Year"];
			}
		}

		elseif (!isset($_POST["Month"])) 
		{
			if(isset($_POST["Day"]) && isset($_POST["Year"]))
			{
				$err= "Month Required";
			    $hasError = true;
			    $day = $_POST["Day"];
			    $year = $_POST["Year"];
			}

			elseif(isset($_POST["Day"]))
			{
                $err= "Month & Year Required";
			    $hasError = true;
			    $day = $_POST["Day"];
			}

			elseif(isset($_POST["Year"]))
			{
                $err= "Day & Month Required";
			    $hasError = true;
			    $year = $_POST["Year"];
			}
		}

		elseif (!isset($_POST["Year"])) 
		{
			if(isset($_POST["Day"]) && isset($_POST["Month"]))
			{
				$err= "Year Required";
			    $hasError = true;
			    $day = $_POST["Day"];
			    $month = $_POST["Month"];
			}

			elseif(isset($_POST["Day"]))
			{
                $err= "Month & Year Required";
			    $hasError = true;
			    $day = $_POST["Day"];
			}

			elseif(isset($_POST["Month"]))
			{
                $err= "Day & Year Required";
			    $hasError = true;
			    $month = $_POST["Month"];
			}
		}

     }

     function CheckBox($check)
     {
		global $checks;
		foreach($checks as $c)
		{
			if($c == $check)
			{
				return true;
			}
		}
		return false;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Validation</title>
</head>
<body>
      <h1>Register Form Validation</h1>

      <form method="Post">
      	    <table>
      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Name:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="text" name="name" value="<?php echo $name;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_name;?>
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Username:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="text" name="username" value="<?php echo $uname;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_uname;?>
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Password:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="Password" name="password" value="<?php echo $pass;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_pass;?>
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Confirm Password:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="Password" name="confirm_password" value="<?php echo $confirm_pass;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_confirm_pass;?>
      	    	   	   </td>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Email:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="text" name="email" value="<?php echo $email;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_email;?>
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Phone:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="text" name="code" placeholder="code" value="<?php echo $code;?>"> -
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="text" name="number" placeholder="Number" value="<?php echo $number;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_phone;?>
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Address:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="text" name="address" placeholder="Select Address" value="<?php echo $addr;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_addr;?>
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	    
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="text" placeholder="City" name="city"  value="<?php echo $city;?>"> -
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="text" placeholder="State"  name="state" value="<?php echo $state;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_region;?>
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	    
      	    	   	   </td>
      	    	   	   
      	    	   	   <td>
      	    	   	   	   <input type="text" name="zip" placeholder="Postal/Zip Code" value="<?php echo $zip;?>">
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <?php echo $err_zip;?>
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Birth Date:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <select name="Day">
      	    	   	   	   	       <option selected="Day" disabled="Day">Day</option>

      	    	   	   	   	       <?php
                                        foreach ($Days as $dy) 
                                        {
                                        	if ($day==$dy) 
                                        	{
                                        		echo "<option selected>$dy</option>";
                                        	}
                                        	else
											   echo "<option>$dy</option>";
                                        }
      	    	   	   	   	       ?>
      	    	   	   	   	       echo $day;
      	    	   	   	   </select>

      	    	   	   	   <select name="Month">
      	    	   	   	   	       <option selected="Month" disabled="Month">Month</option>

      	    	   	   	   	       <?php
                                        foreach ($Months as $my) 
                                        {
                                        	if ($month==$my) 
                                        	{
                                        		echo "<option selected>$my</option>";
                                        	}
                                        	else
											   echo "<option>$my</option>";
                                        }
      	    	   	   	   	       ?>
      	    	   	   	   </select>

      	    	   	   	   <select name="Year">
      	    	   	   	   	       <option selected="Year" disabled="Year">Year</option>

      	    	   	   	   	       <?php
                                        foreach ($Years as $yy) 
                                        {
                                        	if ($year==$yy) 
                                        	{
                                        		echo "<option selected>$yy</option>";
                                        	}
                                        	else
											   echo "<option>$yy</option>";
                                        }
      	    	   	   	   	       ?>
      	    	   	   	   </select>
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   		<?php echo $err;?>	
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	   Gender:
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   	   <input type="radio" value="Male" <?php if($gender == "Male") echo "checked";?> name="Gender"> Male <input type="radio" value="Female" <?php if($gender == "Female") echo "checked";?> name="Gender"> Female
      	    	   	   </td>

      	    	   	   <td>
      	    	   	   		<?php echo $err_gender;?>	
      	    	   	   </td>
      	    	   </tr>

      	    	   <tr align="right">
      	    	   	   <td>
      	    	   	   	
      	    	   	   </td>
      	    	   </tr>
      	    	   <tr align="right">
                       <td>
                       	   <input type="submit" value="register">
                       </td>
      	    	   	    
      	    	   </tr>
      	    	 
      	    </table>
      </form>
</body>
</html>