<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ;?>users/dashboard">Dashboard</a><i class="fa fa-angle-right"></i>Farm Group</li>
            </ol>
<?php if($all_farm_group == "" || $all_farm_group == NULL){?>
  <p class="alert alert-warning">No Farm Group has being added. Kindly add one</p><?php }else{?>


<div class="agile-grids">
  <div class="agile-tables">
    <h3>Manage Farm Group</h3>


      <!-- flash message -->
      <?php if ($this->session->flashdata('farm_group_added')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('farm_group_added'); ?></p>

    		<?php }
    		 if ($this->session->flashdata('farmer_edited')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('farmer_edited'); ?></p>

            <?php } ?>

    		<!--end flash message -->

   				  <table id="table-two-axis" class="two-axis">
   					<thead>
   					  <tr>
                <th>GroupID</th>
   						<th>Group Name</th>
              <th>Action</th>

   					  </tr>
   					</thead>
   					<tbody>
              <?php foreach ($all_farm_group as $key => $farm_group) {?>

   					  <tr>
   						<td><?php echo $farm_group['group_id']; ?></td>
   						<td><?php echo $farm_group['group_name']; ?></td>


              <td><a href="<?php echo site_url('/users/farmgroupdetails/' . $farm_group['group_id']); ?>" class="btn btn-primary">View Details</a></td>
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
