<style>

</style>

<?php
include"./inc/head.inc";
?>







<link rel="stylesheet" type="text/css" href="css/style2.css">



<body>



    <!-- main content area -->
    <div id="main" class="wrapper">


        <!-- content area -->
        <section id="content" class="wide-content">
            <div class="row">

                <div class="grid_8">
                    <div class="grid_12">
                        <h1 class="first-header"> Ads</h1>


                        <?php
	//include('connect.php');	

	$tableName="sell";		
	$targetpage = "ads.php"; 	
	$limit = 12;
	const num=0;
	$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysqli_fetch_array(mysqli_query($con,$query));
	$total_pages = $total_pages[num];
	
	$stages = 3;

	if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	
		$start = ($page - 1) * $limit; 
			
    // Get page data
	$query1 = "SELECT * FROM $tableName  ORDER BY id DESC LIMIT $start, $limit";
	$result = mysqli_query($con,$query1);
	
	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	
	
	$paginate = '';
	if($lastpage > 1)
	{	
	

	
	
		$paginate .= "<div class='paginate'>";
		// Previous
		if ($page > 1){
			$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
		}else{
			$paginate.= "<span class='disabled'>previous</span>";	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<span class='current'>$counter</span>";
				}else{
					$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<a href='$targetpage?page=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}
			
		$paginate.= "</div>";		
	
	
}
 echo $total_pages.' Results';
 // pagination

?>

                        <ul>

                            <?php 
 

		while($row = mysqli_fetch_array($result))
		{
		                                  
   $iid=$row['ads_id'];
                                            $title=$row['title'];
                                            $priz=$row['prize'];
                                      //      $iimg=$row['item_pix'];
		                                           $iimg=$row['item_pix'];
							     $prize= number_format($priz);
echo"
     
<a href='detail.php?u=$iid'><div class='img'>
            <img src='$iimg'>
	                    <div class='title'>$title</div>
                <div class='desc'>$ $prize</div>
        </div>
    </a>
    ";
    
		}
	
	?>
                        </ul>


                        <div class='grid_12'>
                            <center><?php
	     echo $paginate;  
	      
	      ?></center>
                        </div>
                    </div>

                </div>


                <div class="grid_4">
                    <div class="grid_12">
                        <h1 class="first-header">Latest Request</h1>



                    </div>

                </div>

            </div>

    </div><!-- #end div #main .wrapper -->


    <?php

include "./inc/foot.inc";
?>