<?php //Shastho Khobor
$sk = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_POST['sk']) && !empty($_POST['sk'])) {
         
        $sk = $_POST['sk'];
     
      
					// Add this image into the database now
					include "connect_to_mysql.php";
					$sql = mysql_query("INSERT INTO `shasthokhobor`(`sk_news`) 
										VALUES ('$sk')") 
						   or die (mysql_error());
                        
					$sk_id = mysql_insert_id();
				
					ob_start();
					header("location: admin.php");
					ob_end_flush();
					exit();
                    
            
        }
    }



//Health Tips
$ht = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_POST['ht']) && !empty($_POST['ht'])) {
         
        $ht = $_POST['ht'];
     
      
					// Add this image into the database now
					include "connect_to_mysql.php";
					$sql = mysql_query("INSERT INTO `healthtips`(`ht_tips`) 
										VALUES ('$ht')") 
						   or die (mysql_error());
                        
					$ht_id = mysql_insert_id();
				
					ob_start();
					header("location: admin.php");
					ob_end_flush();
					exit();
                    
            
        }
    }

//Diesease photo
$disease_name = "";
$gallery_dateerr = "";

$imageerr = "";
$typeerr = "";
$sizeerr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_POST['disease_name']) && !empty($_POST['disease_name'])) {
         
        $disease_name = $_POST['disease_name'];
     
        if(isset($_FILES['galleryField']) && $_FILES['galleryField']['error'] == 0) {
             
            $allowedExts = array("JPEG", "jpeg", "jpg", "JPG");
            $temp = explode(".", $_FILES["galleryField"]["name"]);
            $extension = end($temp);
             
            if ((
               ($_FILES["galleryField"]["type"] == "image/JPEG")
            || ($_FILES["galleryField"]["type"] == "image/jpeg")
            || ($_FILES["galleryField"]["type"] == "image/jpg")
			|| ($_FILES["galleryField"]["type"] == "image/png")
            || ($_FILES["galleryField"]["type"] == "image/PNG")
            || ($_FILES["galleryField"]["type"] == "image/JPG"))
            && in_array($extension, $allowedExts)){
                 
                
                     
                if($_FILES['galleryField']['size'] > 1048576) { //1 MB (size is also in bytes)
                    $sizeerr = "Photo must be within 1 MB";
                } else{ 
				
					// Add this image into the database now
					include "connect_to_mysql.php";
					$sql = mysql_query("INSERT INTO `dpic`(`pic_details`) 
										VALUES ('$disease_name')") 
						   or die (mysql_error());
                        
					$gallery_id = mysql_insert_id();
					// Place image in the folder 
					$newgallery = "$gallery_id.jpg";
					
                    move_uploaded_file( $_FILES['galleryField']['tmp_name'], "../images/disease_gallery/$newgallery");
					ob_start();
					header("location: admin.php");
					ob_end_flush();
					exit();
                    }
            }else{
                $typeerr = "You have to put Image file";
            }
        }else{
                $imageerr = "No Image Selected";
        }
    }else{
        $gallery_dateerr = "Disease name is required";
    }
}

//hospital based ambulance info
$hbai = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_POST['hbai']) && !empty($_POST['hbai'])) {
         
        $hbai = $_POST['hbai'];
     
      
					// Add this image into the database now
					include "connect_to_mysql.php";
					$sql = mysql_query("INSERT INTO `ambulance`(`hbai`) 
										VALUES ('$hbai')") 
						   or die (mysql_error());
                        
					$hbai_id = mysql_insert_id();
				
					ob_start();
					header("location: admin.php");
					ob_end_flush();
					exit();
                    
            
        }
    }

//private ambulance info
$pai = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_POST['pai']) && !empty($_POST['pai'])) {
         
        $pai = $_POST['pai'];
     
      
					// Add this image into the database now
					include "connect_to_mysql.php";
					$sql = mysql_query("INSERT INTO `priv_amb_info`(`pai_info`) 
										VALUES ('$pai')") 
						   or die (mysql_error());
                        
					$pai_id = mysql_insert_id();
				
					ob_start();
					header("location: admin.php");
					ob_end_flush();
					exit();
                    
            
        }
    }

//air ambulance info
$aai = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_POST['aai']) && !empty($_POST['aai'])) {
         
        $aai = $_POST['aai'];
     
      
					// Add this image into the database now
					include "connect_to_mysql.php";
					$sql = mysql_query("INSERT INTO `air_amb_info`(`aai_info`) 
										VALUES ('$aai')") 
						   or die (mysql_error());
                        
					$aai_id = mysql_insert_id();
				
					ob_start();
					header("location: admin.php");
					ob_end_flush();
					exit();
                    
            
        }
    }

//health insurance preview
$hip = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_POST['hip']) && !empty($_POST['hip'])) {
         
        $hip = $_POST['hip'];
     
      
					// Add this image into the database now
					include "connect_to_mysql.php";
					$sql = mysql_query("INSERT INTO `health_ins_prev`(`hip_info`) 
										VALUES ('$hip')") 
						   or die (mysql_error());
                        
					$hip_id = mysql_insert_id();
				
					ob_start();
					header("location: admin.php");
					ob_end_flush();
					exit();
                    
            
        }
    }

//Ambulance photo
$amb_name = "";
$gallery_dateerr1 = "";

$imageerr1 = "";
$typeerr1 = "";
$sizeerr1 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    if (isset($_POST['amb_name']) && !empty($_POST['amb_name'])) {
         
        $amb_name = $_POST['amb_name'];
     
        if(isset($_FILES['galleryField1']) && $_FILES['galleryField1']['error'] == 0) {
             
            $allowedExts = array("JPEG", "jpeg", "jpg", "JPG");
            $temp = explode(".", $_FILES["galleryField1"]["name"]);
            $extension = end($temp);
             
            if ((
               ($_FILES["galleryField1"]["type"] == "image/JPEG")
            || ($_FILES["galleryField1"]["type"] == "image/jpeg")
            || ($_FILES["galleryField1"]["type"] == "image/jpg")
			|| ($_FILES["galleryField1"]["type"] == "image/png")
            || ($_FILES["galleryField1"]["type"] == "image/PNG")
            || ($_FILES["galleryField1"]["type"] == "image/JPG"))
            && in_array($extension, $allowedExts)){
                 
                
                     
                if($_FILES['galleryField1']['size'] > 1048576) { //1 MB (size is also in bytes)
                    $sizeerr1 = "Photo must be within 1 MB";
                } else{ 
				
					// Add this image into the database now
					include "connect_to_mysql.php";
					$sql = mysql_query("INSERT INTO `amb_pic`(`amb_pic_details`) 
										VALUES ('$amb_name')") 
						   or die (mysql_error());
                        
					$gallery_id = mysql_insert_id();
					// Place image in the folder 
					$newgallery = "$gallery_id.jpg";
					
                    move_uploaded_file( $_FILES['galleryField1']['tmp_name'], "../images/ambulance_pics/$newgallery");
					ob_start();
					header("location: admin.php");
					ob_end_flush();
					exit();
                    }
            }else{
                $typeerr1 = "You have to put Image file";
            }
        }else{
                $imageerr1 = "No Image Selected";
        }
    }else{
        $gallery_dateerr1 = "Ambulance details is required";
    }
}

?>



<!DOCTYPE html>
<html>

<head>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	
	<script>
	function readURL(input) {
		
		document.getElementById('blahup').style.visibility='visible';
		
    	if (input.files && input.files[0]) {
    		var reader = new FileReader();

    		reader.onload = function (e) {
    			$('#blahup')
    			.attr('src', e.target.result)
    			.width(600)
    			.height(300);
    		};

   		reader.readAsDataURL(input.files[0]);
    	}
    }
	
	
	</script>
</head>
<body>
	<img id="blahup" src="#" alt="" style="visibility:hidden"/>
	<div id="wrapper">
			<form name="upload-form" class="upload-form" method="post" action="admin.php" enctype="multipart/form-data">
				<div class="upload_header">
					<h2 style = "font-family: 'orbitron'; text-align:center;padding-top:1%;">Upload Shastho Khobor</h2>
				</div>
				<div class="upload_content">
					 <!-- Input Shastho Khobor-->
					
					<textarea name="sk" type="text" id="sk" class="input image_caption" rows="7" cols="40">			
							</textarea>
					
				</div>
			
				
				<div class="upload_button">
					<input type="submit" name="button" id="button" class = "button "value="Upload" onclick="uploadFile()"/><!--Submit-->
				</div>
			</form>
	</div>
	
	<div id="wrapper_event">
			<form name="upload-event-form" class="upload-form" method="post" action="admin.php" enctype="multipart/form-data">
				<div class="upload_header">
					<h2 style = "font-family: 'orbitron'; text-align:center;padding-top:1%;">Upload Health Tips</h2>
				</div>
				<div class="upload_content">
				
					<textarea name="ht" type="text" id="ht" class="input image_caption" rows="7" cols="40">			
							</textarea>
					
				</div>
				
				<div class="upload_button">
					<input type="submit" name="button" id="button" class = "button "value="Upload" onclick="uploadFile()"/><!--Submit-->
				</div>
			</form>
	</div>
	
	
	<div id="wrapper_gallery">
			<form name="upload-gallery-form" class="upload-form" method="post" action="admin.php" enctype="multipart/form-data">
				<div class="upload_header">
					<h2 style = "font-family: 'orbitron'; text-align:center;padding-top:1%;">Upload Disease Photo</h2>
				</div>
				<div class="upload_content">
					<input name="disease_name" type="text" id="disease_name" class="input gallery_caption" placeholder="Disease Name" /> <!-- Input Disease Name-->
					<span class="error"> 	
						<?php echo $gallery_dateerr; ?> 
					</span>
					<input type='file' name="galleryField" id="galleryField" class="input fileField" onchange="readURL(this);" /><!-- Input Image File-->
					
					<span class="error"> 	
						<?php echo $sizeerr; ?>
						<?php echo $typeerr; ?>
						<?php echo $imageerr; ?>
					</span>
				</div>
				
				<div class="upload_button">
					<input type="submit" name="button" id="button" class = "button "value="Upload" onclick="uploadFile()"/><!--Submit-->
				</div>
			</form>
	</div>

	<div id="wrapper_event">
			<form name="upload-event-form" class="upload-form" method="post" action="admin.php" enctype="multipart/form-data">
				<div class="upload_header">
					<h2 style = "font-family: 'orbitron'; text-align:center;padding-top:1%;">Upload Hospital Based Ambulance Info</h2>
				</div>
				<div class="upload_content">
				
					<textarea name="hbai" type="text" id="ht" class="input image_caption" rows="7" cols="40">			
							</textarea>
					
				</div>
				
				<div class="upload_button">
					<input type="submit" name="button" id="button" class = "button "value="Upload" onclick="uploadFile()"/><!--Submit-->
				</div>
			</form>
	</div>

	<div id="wrapper_event">
			<form name="upload-event-form" class="upload-form" method="post" action="admin.php" enctype="multipart/form-data">
				<div class="upload_header">
					<h2 style = "font-family: 'orbitron'; text-align:center;padding-top:1%;">Upload Private Ambulance Info</h2>
				</div>
				<div class="upload_content">
				
					<textarea name="pai" type="text" id="ht" class="input image_caption" rows="7" cols="40">			
							</textarea>
					
				</div>
				
				<div class="upload_button">
					<input type="submit" name="button" id="button" class = "button "value="Upload" onclick="uploadFile()"/><!--Submit-->
				</div>
			</form>
	</div>

	<div id="wrapper_event">
			<form name="upload-event-form" class="upload-form" method="post" action="admin.php" enctype="multipart/form-data">
				<div class="upload_header">
					<h2 style = "font-family: 'orbitron'; text-align:center;padding-top:1%;">Upload Air Ambulance Info</h2>
				</div>
				<div class="upload_content">
				
					<textarea name="aai" type="text" id="ht" class="input image_caption" rows="7" cols="40">			
							</textarea>
					
				</div>
				
				<div class="upload_button">
					<input type="submit" name="button" id="button" class = "button "value="Upload" onclick="uploadFile()"/><!--Submit-->
				</div>
			</form>
	</div>

	<div id="wrapper_event">
			<form name="upload-event-form" class="upload-form" method="post" action="admin.php" enctype="multipart/form-data">
				<div class="upload_header">
					<h2 style = "font-family: 'orbitron'; text-align:center;padding-top:1%;">Upload Health Insurance Preview</h2>
				</div>
				<div class="upload_content">
				
					<textarea name="hip" type="text" id="ht" class="input image_caption" rows="7" cols="40">			
							</textarea>
					
				</div>
				
				<div class="upload_button">
					<input type="submit" name="button" id="button" class = "button "value="Upload" onclick="uploadFile()"/><!--Submit-->
				</div>
			</form>
	</div>

	<div id="wrapper_gallery">
			<form name="upload-gallery-form" class="upload-form" method="post" action="admin.php" enctype="multipart/form-data">
				<div class="upload_header">
					<h2 style = "font-family: 'orbitron'; text-align:center;padding-top:1%;">Upload Ambulance Photo</h2>
				</div>
				<div class="upload_content">
					<input name="amb_name" type="text" id="disease_name" class="input gallery_caption" placeholder="Ambulance Details" /> <!-- Input Disease Name-->
					<span class="error"> 	
						<?php echo $gallery_dateerr1; ?> 
					</span>
					<input type='file' name="galleryField1" id="galleryField1" class="input fileField" onchange="readURL(this);" /><!-- Input Image File-->
					
					<span class="error"> 	
						<?php echo $sizeerr1; ?>
						<?php echo $typeerr1; ?>
						<?php echo $imageerr1; ?>
					</span>
				</div>
				
				<div class="upload_button">
					<input type="submit" name="button" id="button" class = "button "value="Upload" onclick="uploadFile()"/><!--Submit-->
				</div>
			</form>
	</div>

</body>
</html>