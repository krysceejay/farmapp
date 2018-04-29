<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ;?>users/dashboard">Dashboard</a><i class="fa fa-angle-right"></i>Farm Group</li>
            </ol>
<?php if($all_farm_location == "" || $all_farm_location == NULL){?>
  <p class="alert alert-warning">No Farm Location has being added. Kindly add one</p><?php }else{?>


<div class="agile-grids">
  <div class="agile-tables">
    <h3>Manage Farm Location</h3>


      <!-- flash message -->
      <?php if ($this->session->flashdata('farm_location_added')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('farm_location_added'); ?></p>

    		<?php }
    		 if ($this->session->flashdata('farmer_edited')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('farmer_edited'); ?></p>

            <?php } ?>

    		<!--end flash message -->

   				  <table id="table-two-axis" class="two-axis">
   					<thead>
   					  <tr>
                <th>Location ID</th>
   						<th>Location</th>
            

   					  </tr>
   					</thead>
   					<tbody>
              <?php foreach ($all_farm_location as $key => $farm_location) {?>

   					  <tr>
   						<td><?php echo $farm_location['location_id']; ?></td>
   						<td><?php echo $farm_location['location']; ?></td>


              					  </tr>

              <?php
              } ?>

   					</tbody>
   				  </table>

   				</div>

          <ul class="pagination pull-right">
<?php  echo $this->pagination->create_links(); ?>
          </ul>
   				<!-- //tables -->

   			</div>
      <?php } ?>
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
