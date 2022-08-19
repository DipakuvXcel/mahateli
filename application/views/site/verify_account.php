<?php 
	$this->load->view('site/_includes/header');
?>

<style>
.fade {
    opacity: 1;
}
.counddown {
    /* display:inline; */
    padding: 5px;
    color: #000;
    font-family: Verdana, sans-serif, Arial;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
}

body {
  padding: 20px;
  text-align: center;
}
</style>   

	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?php echo base_url(''); ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
		<span class="s-text17">
			Verify Account
		</span>
	</div>
	 
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-4 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						 
					</div>
				</div>

				<div class="col-sm-6 col-md-4 col-lg-4 p-b-50  text-center">
				 	<div class="formd" >
						<form id="registration_form" action="<?php echo base_url('site/otp_verify');?>"  method="post" autocomplete="off">
							<h3>Verify Account</h3>
							<p class="p-t-10">Verify your account by otp do not refresh the page</p>
							
							<?php if($this->session->flashdata("success_message")!=""){?>
			                <div class="Metronic-alerts alert alert-info fade in">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<i class="fa-lg fa fa-check"></i>  <?php echo $this->session->flashdata("success_message");?>
			                </div>
							<?php }?>
						  
							<?php if($this->session->flashdata("error_message")!=""){?>
							<div class="Metronic-alerts alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true"></button>
								<i class="fa-lg fa fa-warning"></i> <?php echo $this->session->flashdata("error_message");?>
			                </div>
							<?php }?>
			              
							<?php if(validation_errors()!=""){?>
			                <div
								class="Metronic-alerts alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true"></button>
								<i class="fa-lg fa fa-warning"></i>  <?php echo validation_errors();?>
			                </div>
							<?php }?>
			              
							<?php if( $this->upload->display_errors()!=""){?>
			                <div
								class="Metronic-alerts alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true"></button>
								<i class="fa-lg fa fa-warning"></i>  <?php echo  $this->upload->display_errors();?>
			                </div>
							<?php }?>
							
							<div class="text-center m-t-20"> 
								<div class="form-group">
									<label for="email_id" style="float: left;">Enter OTP</label><span style="color:red;float: left;">*</span>
									<input type="text" style="border: 1px solid #989898 !important;" class="form-control" id="otp" name="otp" aria-describedby="emailHelp" placeholder="Enter OTP" value="<?= set_value('otp'); ?>" />
									<div class="counddown" id="ten-countdown"></div>
								</div>

								<div class="row" >
									<div class="  p-t-20 col-lg-6 col-md-6 col-sm-6" >
										<button type="submit" class="btn dark_gray_bt" > Verify </button>
									</div> 
									<div class="p-t-20 col-lg-6 col-md-6 col-sm-6" >
										<button type="reset" class="btn dark_gray_bt" > Reset </button>
									</div> 
								</div>   
							</div>
						</form>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-4 col-lg-4 p-b-50">
					 
				</div>
			</div>
		</div>
	</section>
    <!--================End Category Product Area =================-->

<?php 
	$this->load->view('site/_includes/footer');
?>
  <script>
	  function countdown(elementName, minutes, seconds) {
   var element, endTime, hours, mins, msLeft, time;

   function twoDigits(n) {
      return n <= 9 ? "0" + n : n;
   }

   function updateTimer() {
      msLeft = endTime - +new Date();
      if (msLeft < 1000) {
         element.innerHTML = "Time is up!";
      } else {
         time = new Date(msLeft);
         hours = time.getUTCHours();
         mins = time.getUTCMinutes();
         element.innerHTML =
            (hours ? hours + ":" + twoDigits(mins) : mins) +
            ":" +
            twoDigits(time.getUTCSeconds());
         setTimeout(updateTimer, time.getUTCMilliseconds() + 500);
      }
   }

   element = document.getElementById(elementName);
   endTime = +new Date() + 1000 * (60 * minutes + seconds) + 500;
   updateTimer();
}

countdown("ten-countdown", 5, 0);
</script>