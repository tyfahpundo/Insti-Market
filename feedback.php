<?php
include "./inc/head.inc";
?>




<!-- main content area -->
<div id="main" class="wrapper">


    <!-- content area -->
    <section id="content" class="wide-content">
        <div class="row">

            <form class="form-mini" method="post" action="feedback.php">

                <?php

// $code = addslashes(strip_tags($_POST['gen']));
 
 //$email = addslashes(strip_tags($_POST['email']));


if(isset($_POST['sennd']))
{
$name=($_POST['name']);
$email=($_POST['email']);
$text=($_POST['texxt']);

 $name = stripslashes($name);
$email= stripslashes($email);
$text= stripslashes($text);

$name = mysqli_real_escape_string($con,$name);
$email = mysqli_real_escape_string($con,$email);
$text = mysqli_real_escape_string($con,$text);

	if($email=="" || $text=="")
        {
		echo "Please fill the email and text<br/>";
        }
        else
        {
 
  $insert = "INSERT INTO feedback (name,email,feed)
VALUES ('$name','$email','$text')";
		mysqli_query($con,$insert) or die('Cannot add record '.mysqli_error());
		
                echo "Feedback sent successfully";          
                
		
        }
}


?>
                <div class="form-row">
                    <input type="text" name="name" placeholder="Name">
                </div>

                <div class="form-row">
                    <input type="email" name="email" placeholder="Your Email">
                </div>

                <div class="form-row">
                    <textarea type="text" name="texxt" placeholder="Content">

		    </textarea>
                </div>


                <div class="form-row form-last-row">
                    <button type="submit" name="sennd">Send feedback</button>
                </div>



            </form>

            <!--middlle ends-->
        </div>

        <div class="grid_4">

            <!----regform--start-->

            <!--reg form endz-->
        </div>
    </section><!-- end content area -->




</div><!-- #end div #main .wrapper -->


<?php

include "./inc/foot.inc";
?>