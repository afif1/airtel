<?php 
session_start();
if(!isset($_SESSION["CUSTOMERCARE_ID"])){
	ob_start();
	header("location: login.php");
	ob_end_flush();	
}
$agent_name = "";
$agent_name = $_SESSION["CUSTOMERCARE_USERNAME"];
?>
<?php
include "scripts/connect_to_mysql.php"; 
?>

<?php 
$msg = "";

$dialed_no = "";
$reason = "";
$name = "";
$national_id = "";
$passport_no = "";
$driving_license = "";
$second_contact_no = "";
$dob = "";
$gender = "";
$current_address = "";
$billing_address = "";
$email = "";
$occupation = "";
$father_name = "";
$mother_name = "";
$spouse_name = "";
$identifier_name = "";
$identifier_number = "";
$identifier_nid = "";
$delivery_date = "";
$delivery_address = "";
$package = "";
$comments = "";
$delivery_status = "";
$customer_age = "";
$nominee_name = "";
$nominee_nid = "";
$nominee_passport = "";
$nominee_driving_license = "";
$relation = "";
$nominee_father_name = "";
$nominee_mother_name = "";
$nominee_age = "";
	

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$dialed_no = $_POST["mobile"];
	$reason = $_POST["Reason"];
	$name = $_POST["name"];
	$national_id = $_POST["nid"];
	$passport_no = $_POST["passport"];
	$driving_license = $_POST["DL"];
	$second_contact_no = $_POST["mobile_2"];
	$dob = $_POST["dob"];
	$gender = $_POST["gender"];
	$current_address = $_POST["current_address"];
	$billing_address = $_POST["billing_address"];
	$email = $_POST["email"];
	$occupation = $_POST["Occupation"];
	$father_name = $_POST["father_name"];
	$mother_name = $_POST["mother_name"];
	$spouse_name = $_POST["spouse_name"];
	$identifier_name = $_POST["identifier_name"];
	$identifier_number = $_POST["identifier_number"];
	$identifier_nid = $_POST["identifier_nid"];
	$delivery_date = $_POST["delivery_date"];
	$delivery_address = $_POST["delivery_address"];
	$package = $_POST["package"];
	$comments = $_POST["comments"];
	$delivery_status = $_POST["delivery_status"];
	$customer_age = $_POST["customer_age"];
	$nominee_name = $_POST["nominee_name"];
	$nominee_nid = $_POST["nominee_nid"];
	$nominee_passport = $_POST["nominee_passport"];
	$nominee_driving_license = $_POST["nominee_driving_license"];
	$relation = $_POST["relation"];
	$nominee_father_name = $_POST["nominee_father_name"];
	$nominee_mother_name = $_POST["nominee_mother_name"];
	$nominee_age = $_POST["nominee_age"];
	

	$sql1 = mysql_query("INSERT INTO `information`(`name`,`password`,`mobile`, `national_id`, `passport`,`driving_license`, `mobile_2`,`date_of_birth`, `gender`,`present_address`, `email`,`occupation`,`father_name`,`mother_name`, `spouse_name`,`age`) 
							VALUES (
									'$name',		
									'$dialed_no',		
									'$dialed_no',
									'$national_id',
									'$passport_no',
									'$driving_license',
								    '$second_contact_no',
									'$dob',
									'$gender',
									'$current_address',
									'$email',
								    '$occupation',
									'$father_name',
									'$mother_name',
									'$spouse_name',
									'$customer_age'
									
									)") OR DIE(mysql_error());
									
	$information_id = mysql_insert_id();
									
	$sql2 = mysql_query("INSERT INTO `nominee`(`information_id`,`name`, `nid`, `passport`,`driving_license`, `relation`,`father_name`, `mother_name`,`age`) 
									   VALUES (		
									'$information_id',
									'$nominee_name',
									'$nominee_nid',
									'$nominee_passport',
								    '$nominee_driving_license',
									'$relation',
									'$nominee_father_name',
									'$nominee_mother_name',
									'$nominee_age'
									
												)") OR DIE(mysql_error());
									
	$sql3 = mysql_query("INSERT INTO `airtel_connection`(`information_id`, `reason`, `billing_address`,`identifier_name`, `identifier_number`,`identifier_nid`, `package`,`comment`, `delivery_date`,`delivery_address`,`delivery_status`,`agent`) 
												 VALUES (		
									'$information_id',
									'$reason',
									'$billing_address',
									'$identifier_name',
								    '$identifier_number',
									'$identifier_nid',
									'$package',
									'$comments',
									'$delivery_date',
								    '$delivery_address',
									'$delivery_status',
									'$agent_name'
									
														)") OR DIE(mysql_error());
							
	if($sql1 && $sql2 && $sql3){    
		ob_start();
		header("location: index.php"); 
		ob_end_flush();
		exit();
	}else{
		$msg = "Unsuccessfull";
	}
}
?>

<!DOCTYPE html>
<!-- saved from url=(0030)http://aparajito.com/priyojon/ -->
<html lang="en" class="no-js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3">
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class">
        <meta name="author" content="Codrops">
        <link rel="shortcut icon" href="Login and Registration Form_files/only_logo.png"> 
        <link rel="stylesheet" type="text/css" href="./Login and Registration Form_files/demo.css">
        <link rel="stylesheet" type="text/css" href="./Login and Registration Form_files/style.css">
		<link rel="stylesheet" type="text/css" href="./Login and Registration Form_files/animate-custom.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
	<link href="http://bimajito.aparajito.com/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="./Login and Registration Form_files/jquery-1.9.1.js"></script>
	<script src="./Login and Registration Form_files/jquery-ui-1.10.3.custom.js"></script>
	<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
	<script>

	
	
	    $(function () {
            $("#dob").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
                minDate: "-100Y", maxDate: "+0M"
            });
        });
        
         $(function () {
            $("#ndob").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
                minDate: "-100Y", maxDate: "+0M"
            });
        });
		
		



$(document).ready(function () {
    $('.group').hide();
    $('#aparajito_bondhu').show();
    $('#selectMe').change(function () {
        $('.group').hide();
        $('#'+$(this).val()).show();
    })
});


		  
	</script>
 
  
    <link href="./Login and Registration Form_files/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
	
</head>
    <body>
	<div id="footer">
      <div class="container">
        <p class="muted credit">Do you want to <b> <a style="color:red;" href="logout.php">Logout?</a> </b></p>
      </div>
    </div>
        <div class="container">
            <header>
                <!--h1><img src="images/apjt_logo_bng.png" width="100px" />&nbsp;&nbsp;&nbsp;<img src="images/banglalink-logo.png" width="120px" />&nbsp;&nbsp;&nbsp;Priojon Insurance Registration Form </h1-->
				</header>
            <section>				
                <div id="container_demo">
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
					<?php echo $msg; ?>
                        <div id="login" class="animate form">
                            <form method="post" action="insert.php" class="form-horizontal" role="form"> 
                                <h3><img src="./Login and Registration Form_files/apjt_logo_bng.png" width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registration Form </h3> 
                                <p> 
                                    </p><span>  </span><p></p><p> 
                                    </p><span>  </span><p></p><p> 
                                    </p><span>  </span><p></p><p> 
                                    </p><span>  </span><p></p><p> 
                                    </p><p></p><p> 
                                    </p><p></p><p> 
                                    </p><span>  </span><p></p><p> 
                                    </p><span>  </span><p></p><p> 
                                    </p><p></p><p class="login button"> 
                                    </p><p></p>
                                    
                          <table width="100%">
                                <tbody>
                                
                                
                                <tr><td><label> Dialed No. </label></td>
                                    <td><input name="mobile" required type="text" placeholder="Dialed No." style="width:200px; height:20px; float:right"></td>
                                    
                                </tr>
                                
                                <tr><td><label>Reason  </label></td>
                                    <td>
									<select name="Reason" style="width:200px; height:20px; float:right">
                                      		<option value="airtel">Airtel</option>
                                            <option value="banglalink">Banglalink</option>
                                            <option value="aparajito">Aparajito</option>
                                      </select></td>
                                    
                                </tr>
								
								
                                
                                <tr><td><label> Name </label></td>
                                    <td><input name="name" required type="text" placeholder="Name" style="width:200px; height:20px; float:right"></td>
                                    
                                </tr>
                                <tr><td><label>National ID</label></td>
                                    <td><input name="nid" required type="text" placeholder="National ID" style="width:200px; height:20px; float:right"></td>
                                    
                                </tr>
                                
                                <tr><td><label>Passport No </label></td>
                                    <td><input name="passport" type="text" placeholder="Passport No" style="width:200px; height:20px; float:right"></td>
                                    
                                </tr>
                                
                                <tr><td><label>Driving License </label></td>
                                    <td><input name="DL" type="text" placeholder="Driving License" style="width:200px; height:20px; float:right"></td>
                                    
                                </tr>
                                
                                <tr><td><label> 2nd Cont No </label></td>
                                    <td><input name="mobile_2" required type="text" placeholder="2nd Cont No" style="width:200px; height:20px; float:right"></td>
                                    
                                </tr>
                                
                                <tr>
                                	<td><label> Date Of Birth </label></td>
                                	<td>
                                    <span id="sprydob">
                                 <input name="dob" type="date" id="dob" class="textbox hasDatepicker" required placeholder="Date Of Birth" style="width:200px; height:20px; 			float:right">
                                     </span>
                                   </td>
                                </tr>
                                
                                                
                                <tr>
                               	  <td><label> Gender </label></td>
                                    <td><!--input name="Gender" required type="number" placeholder="Gender" style="width:200px; height:20px; float:right"-->
                                      <span id="spryselect1">
                                      <label for="gender"></label>
                                      <select name="gender" id="gender" style="width:200px; height:20px; float:right">
                                      		<option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                      </select>
                                    <span class="selectRequiredMsg">Please select an item.</span></span></td>
                                                    
                                  </tr>
                                <tr>
                               		 <td><label> Current Address </label></td>
                              		  <td><input name="current_address" required type="text" placeholder="Current Address" style="width:200px; height:20px; float:right"></td>
                                 </tr>
                                 
                                <tr>
                                <td><label> Billing Address (For postpaid only) </label></td>
                                <td><input name="billing_address" required type="text" placeholder="Billing Address (For postpaid only)" style="width:200px; height:20px; float:right"></td>
                                  </tr>
                                                
                                <tr>
                                <td><label> email </label></td>
                                <td><input name="email" required type="text" placeholder="email" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                
                                <tr>
                                <td><label> Occupation </label></td>
                                <td><input name="Occupation" required type="text" placeholder="Occupation" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                
                                <tr>
                                <td><label> Father's Name </label></td>
                                <td><input name="father_name" required type="text" placeholder="Father's Name" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                
                                <tr>
                                <td><label> Mother's Name </label></td>
                                <td><input name="mother_name" required type="text" placeholder="Mother's Name" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Spouse's Name </label></td>
                                <td><input name="spouse_name" required type="text" placeholder="Spouse's Name" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Identifier Name </label></td>
                                <td><input name="identifier_name" required type="text" placeholder="Identifier Name" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Identifier Number </label></td>
                                <td><input name="identifier_number" required type="text" placeholder="Identifier Number" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Identifier NID </label></td>
                                <td><input name="identifier_nid" required type="text" placeholder="Identifier NID" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Delivery  Date/Time </label></td>
                                <td><span id="sprydob">
                                 <input name="delivery_date" type="date" id="dd" class="textbox hasDatepicker" required placeholder="Delivery  Date/Time" style="width:200px; height:20px; 			float:right">
                                        </span></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Delivery Address </label></td>
                                <td><input name="delivery_address" required type="text" placeholder="Delivery Address" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Package </label></td>
                                <td><input name="package" required type="text" placeholder="Package" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Comments </label></td>
                                <td><select name="comments" style="width:200px; height:20px; float:right">
                                      		<option value="not reachable">Not Reachable</option>
                                            <option value="follow-up call">Follow-up Call</option>
                                            <option value="incomplete data">Incomplete Data</option>
                                            <option value="sold">Sold</option>
                                            <option value="not interested">Not Interested</option>
                                            <option value="customer call">Customer Call</option>
                                            <option value="customer retention">Customer Retention</option>
                                      </select></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Delivery Status </label></td>
                                <td><input name="delivery_status" required type="text" placeholder="Delivery Status" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Customer Age </label></td>
                                <td><input name="customer_age" required type="number" placeholder="Customer Age" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Nominee Name </label></td>
                                <td><input name="nominee_name" required type="text" placeholder="Nominee Name" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Nominee NID</label></td>
                                <td><input name="nominee_nid" required type="text" placeholder="Nominee NID" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                
                                <tr>
                                <td><label> Nominee Passport </label></td>
                                <td><input name="nominee_passport" type="text" placeholder="Nominee Passport" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                
                                <tr>
                                <td><label> Nominee Driving License </label></td>
                                <td><input name="nominee_driving_license" type="text" placeholder="Nominee Driving License" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                
                                <tr>
                                <td><label> Relation </label></td>
                                <td><input name="relation" required type="text" placeholder="Relation" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Nominee Father's Name </label></td>
                                <td><input name="nominee_father_name" required type="text" placeholder="Nominee Father's Name" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Nominee Mother's Name </label></td>
                                <td><input name="nominee_mother_name" required type="text" placeholder="Nominee Mother's Name" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>
                                <tr>
                                <td><label> Nominee Age </label></td>
                                <td><input name="nominee_age" required type="number" placeholder="Nominee Age" style="width:200px; height:20px; float:right"></td>
                                                    
                                </tr>                
                               
				</tbody></table>
				
				
				<input type="submit" class="btn btn-default btn-block" value="Submit Information" />
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
		
    
<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="position: absolute; top: 246px; left: 719.5px; z-index: 23; display: none;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all ui-state-disabled" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><select class="ui-datepicker-month" data-handler="selectMonth" data-event="change"><option value="0">Jan</option><option value="1" selected="selected">Feb</option></select><select class="ui-datepicker-year" data-handler="selectYear" data-event="change"><option value="1915">1915</option><option value="1916">1916</option><option value="1917">1917</option><option value="1918">1918</option><option value="1919">1919</option><option value="1920">1920</option><option value="1921">1921</option><option value="1922">1922</option><option value="1923">1923</option><option value="1924">1924</option><option value="1925">1925</option><option value="1926">1926</option><option value="1927">1927</option><option value="1928">1928</option><option value="1929">1929</option><option value="1930">1930</option><option value="1931">1931</option><option value="1932">1932</option><option value="1933">1933</option><option value="1934">1934</option><option value="1935">1935</option><option value="1936">1936</option><option value="1937">1937</option><option value="1938">1938</option><option value="1939">1939</option><option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015" selected="selected">2015</option></select></div></div><table class="ui-datepicker-calendar"><thead><tr><th class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th><span title="Monday">Mo</span></th><th><span title="Tuesday">Tu</span></th><th><span title="Wednesday">We</span></th><th><span title="Thursday">Th</span></th><th><span title="Friday">Fr</span></th><th class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="1" data-year="2015"><a class="ui-state-default" href="http://aparajito.com/priyojon/#">1</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="1" data-year="2015"><a class="ui-state-default" href="http://aparajito.com/priyojon/#">2</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="1" data-year="2015"><a class="ui-state-default" href="http://aparajito.com/priyojon/#">3</a></td><td class=" " data-handler="selectDay" data-event="click" data-month="1" data-year="2015"><a class="ui-state-default" href="http://aparajito.com/priyojon/#">4</a></td><td class=" ui-datepicker-days-cell-over  ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="1" data-year="2015"><a class="ui-state-default ui-state-highlight ui-state-hover" href="http://aparajito.com/priyojon/#">5</a></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">6</span></td><td class=" ui-datepicker-week-end ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">7</span></td></tr><tr><td class=" ui-datepicker-week-end ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">8</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">9</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">10</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">11</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">12</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">13</span></td><td class=" ui-datepicker-week-end ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">14</span></td></tr><tr><td class=" ui-datepicker-week-end ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">15</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">16</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">17</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">18</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">19</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">20</span></td><td class=" ui-datepicker-week-end ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">21</span></td></tr><tr><td class=" ui-datepicker-week-end ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">22</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">23</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">24</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">25</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">26</span></td><td class=" ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">27</span></td><td class=" ui-datepicker-week-end ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">28</span></td></tr></tbody></table></div>
		
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>
</body></html>