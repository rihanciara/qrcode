<?php 

session_start();
if($_SESSION['user_id'] == '')
	{
	header('location:index.php');
	}
include('include/dbconnect.php');
$user= $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Cash collection</title>
	<!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
     <style>
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
    background-color:yellow;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
    <!-- Main JS-->
    <script src="js/global.js"></script>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
<form method="post">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search Account No..." />
        <div class="result"></div>
    </div>
	
						<?php
						//echo"SELECT acc_recpt_no FROM drwf ORDER BY W_id  DESC LIMIT 1";
                        
  $sql2= $conn->query("SELECT acc_recpt_no FROM deposite ORDER BY W_id  DESC LIMIT 1");
    while($row = $sql2->fetch_assoc())
		
          { 
		    $recipt_no1=$row['acc_recpt_no'];        	
	      }
		  
         $recipt_no2=(int)$recipt_no1+1;
	

 						?>

    <div class="page-wrapper bg-gra-02 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
					<div class="q1" style="text-align: Right ;">
                    <?php echo $_SESSION['user_id'];  ?>
					<!--<a href="include/with_dwn.php" tite="download ">download</a>-->
			        <a href="view.php" tite="view ">Transactions</a>&nbsp 
			        <a href="logout.php" tite="view ">Exit</a>
					</div>
                  <!--  <h2 class="title">Daru Rahma</h2>-->
                    <form name="form1"  method="POST" action="collection.php" >
						<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Transaction Type *</label>
                                    <div class="p-t-10">
										<label class="radio-container m-r-45">Deposit
                                            <input type="radio" name="tr_type" value="dep"  checked="checked" onclick="show1();" >
                                            <span class="checkmark"></span>
                                        </label>
										<label class="radio-container">Withdraw
                                            <input type="radio" name="tr_type" value="wit"onclick="show2();" >
                                            <span class="checkmark"></span>
                                        </label>
                                        
                                        
                                    </div>
                                </div>
							</div>
						
					
						<div class=""id="div1">	
						 <div class="col-2" >
                                <div class="input-group">
                                    <label class="label">Account type *</label>
                                    <div class="p-t-10">
                        				 <label class="radio-container">DRCF
                                            <input type="radio" checked="checked" name="ac_type"value="C">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container m-r-45">DRWF
                                            <input type="radio" name="ac_type" value="W" >
                                            <span class="checkmark"></span>
                                        </label>
                                       
                                    </div>
                                </div>
							 </div>
							
						
                          <!-- <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Recipt no</label>
                                    <input class="input--style-4" type="number" name="recipt_no" readonly value="<?php echo $recipt_no2;?> ">
                                </div>
                            </div>-->
							</div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Account No *</label>
                                    <input class="input--style-4" type="number" pattern="\d*" name="acc_no" id="acno" required/>
                                </div>
                            </div>
							
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Amount *</label>
                                    <input class="input--style-4"  name="amount" type="number" pattern="\d*" id="amt" required />
                                </div>
                            </div>
<div class="col-2">
                             
						
                       
							<button class="btn btn--radius-2 btn--blue" type="submit" name="submit" >Submit</button>
             

						</div><div class="p-t-15">
                           <div class="input-group">
                                    <label class="label">Remarks</label>
                                    <input class="input--style-4" type="text" name="acc_name">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
		     
        </div>
    </div>
	

<?php
	
	
	
if (isset($_POST['submit'])) {
//echo "hi";
//
  $sql2= $conn->query("SELECT acc_recpt_no FROM deposite ORDER BY W_id  DESC LIMIT 1");
    while($row = $sql2->fetch_assoc())
		
          { 
		    $recipt_no1=$row['acc_recpt_no'];        	
	      }

          
		  
         $recipt_no2=(int)$recipt_no1+1;

    //$recipt_no = $_POST['recipt_no'];
    $recipt_no = $recipt_no2;
    $ac_type = $_POST['ac_type'];
    $acc_no = $_POST['acc_no'];
    $acc_name= $_POST['acc_name'];
    $tr_type= $_POST['tr_type'];
	$amount= $_POST['amount'];
   
     if($tr_type!='dep')
     { $amount= $amount * -1;}
		 
		 	
		$sql ="INSERT INTO `deposite`(`acc_no`, `acc_name`, `acc_type`, `tr_type`, `acc_recpt_no`, `amout`,`inserted_at`,`user`) VALUES ('$acc_no','$acc_name','$ac_type' ,'$tr_type', '$recipt_no','$amount',now(),'$user')";
?>
<script type="text/javascript">
window.location="./view.php";
</script>
	<?php
  

/*else 
	 {
    
	 $sql ="INSERT INTO `deposite`(`acc_no`, `acc_name`, `acc_type`, `tr_type`, `acc_recpt_no`, `amout`,`inserted_at`) VALUES ('$acc_no','$acc_name','$ac_type' ,'$tr_type', '$recipt_no','$amount',now())";?>
     

		
	 }*/
	if (mysqli_query($conn, $sql)!="") {

        echo "<h3> data saved to database </h3>";
	    //header('location:index.php?msg=Cash collected succesfully');
     } else {
		// header('location:index.php?msg=Cash collection failed');
        echo "<h3> couldn't save data</h3>";
    }

}
?>

	<script>

	//show and hide recept part	
	
		function show2(){
         document.getElementById('div1').style.display ='none';
          }
        function show1(){
         document.getElementById('div1').style.display = 'block';
          }
	//set required field	

   

	
	</script>

    
	
	


</body>
</html>
<!-- end document-->
