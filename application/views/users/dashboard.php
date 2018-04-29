<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url() ;?>users/dashboard">Home</a> <i class="fa fa-angle-right"></i></li>
				</ol>
<!--four-grids here-->
<div class="four-grids">
	<div class="col-md-3 four-grid">
		<div class="four-w3ls">
			<div class="icon">
				<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
			</div>
			<div class="four-text">
				<h3>Users</h3>
				<h4><?php echo $total_users ;?></h4>

			</div>

		</div>
	</div>
			<div class="col-md-3 four-grid">
				<div class="four-w3ls">
					<div class="icon">
						<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
					</div>
					<div class="four-text">
						<h3>Farmers</h3>
						<h4><?php echo $total_farmers ;?></h4>

					</div>

				</div>
			</div>

			<div class="clearfix"></div>
		</div>
<!--//four-grids here-->
<!--//w3-agileits-pane-->
<!-- script-for sticky-nav -->
<script>
$(document).ready(function() {
	 var navoffeset=$(".header-main").offset().top;
	 $(window).scroll(function(){
		var scrollpos=$(window).scrollTop();
		if(scrollpos >=navoffeset){
			$(".header-main").addClass("fixed");
		}else{
			$(".header-main").removeClass("fixed");
		}
	 });

});
</script>
<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights farmcopy">
<p>&copy; <?php echo date('Y'); ?> Farmcrowdy. All Rights Reserved</a></p>
</div>
<!--COPY rights end here-->
