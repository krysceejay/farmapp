<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Farmers List</li>
            </ol>
<?php if($all_farmers == "" || $all_farmers == NULL){?>
  <p class="alert alert-warning">No Farmer has being added. Kindly add a farmer</p><?php }else{?>


<div class="agile-grids">
  <div class="agile-tables">
    <h3>Manage Farmers</h3>


      <!-- flash message -->
      <?php if ($this->session->flashdata('farmer_added')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('farmer_added'); ?></p>

    		<?php }
    		 if ($this->session->flashdata('farmer_edited')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('farmer_edited'); ?></p>

            <?php } ?>

    		<!--end flash message -->

   				  <table id="table-two-axis" class="two-axis">
   					<thead>
   					  <tr>
   						<th>Name</th>
   						<th>Phone</th>
   						<th>Gender</th>
   						<th>Crop Proficiency</th>
   						<th>Land Area Farmed</th>
   						<th>Years of Experience</th>
   						<th>Added by</th>
              <th>Action</th>
   					  </tr>
   					</thead>
   					<tbody>
              <?php foreach ($all_farmers as $key => $farmers) {?>

   					  <tr>
   						<td><?php echo $farmers['fname'].'  '.$farmers['sname']; ?></td>
   						<td><?php echo $farmers['phone']; ?></td>
   						<td><?php echo $farmers['gender']; ?></td>
   						<td><?php echo $farmers['crop_proficiency']; ?></td>
   						<td><?php echo $farmers['land_area_farmed']; ?></td>
   						<td><?php echo $farmers['years_of_experience']; ?></td>
   						<td><?php echo $farmers['firstname'].'  '.$farmers['surname']; ?></td>

              <td><a href="<?php echo site_url('/farmers/farmerdetails/' . $farmers['id']); ?>" class="btn btn-primary">View Details</a></td>
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
