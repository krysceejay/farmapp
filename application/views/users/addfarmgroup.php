<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ;?>users/dashboard">Dashboard</a><i class="fa fa-angle-right"></i>Add Farm Group
            </ol>

            <!--grid-->
   	<div class="validation-system">

   		<div class="validation-form">

        <form action="addfarmgroup" method="post">

          <?php if(validation_errors()){ ?>
          <div class="alert alert-danger col-md-6"><?php echo validation_errors(); ?></div>
          <div class="clearfix"> </div>
              <?php } ?>

               	<div class="vali-form">
                  <div class="col-md-6 form-group1">
                    <label class="control-label">Farm Group</label>
                    <input type="text" name="gname" placeholder="farm group" required="">
                  </div>

                  <div class="clearfix"> </div>
                  </div>



                  <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                  </div>
                <div class="clearfix"> </div>


              </form>


</div>
</div>
