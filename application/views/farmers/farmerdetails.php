<!--heder end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i><a href="<?php echo base_url(); ?>farmers/list">Manage Farmer</a> <i class="fa fa-angle-right"></i>Farmer details</li>
            </ol>
<!--four-grids here-->
		<div class="four-grids">

<div class="row profile">
<div class="col-md-4">
<div class="profile-sidebar">
<!-- SIDEBAR USERPIC -->
<div class="profile-userpic">
<img src="<?php echo base_url(); ?>assets/images/farmerpix/<?php echo $all_farmers['pro_image']; ?>" class="img-responsive img-rounded" alt="">
</div>
<!-- END SIDEBAR USERPIC -->
<!-- SIDEBAR USER TITLE -->
<div class="profile-usertitle">
<div class="profile-usertitle-name">
<?php echo $all_farmers['fname'].' '.$all_farmers['sname']; ?>
</div>

</div>
<!-- END SIDEBAR USER TITLE -->
<!-- SIDEBAR BUTTONS -->
<div class="profile-userbuttons">
<button type="button" class="btn btn-success btn-sm">Flag</button>
<a href="<?php echo site_url('/farmers/updatefarmer/' . $all_farmers['id']); ?>"><button type="button" class="btn btn-danger btn-sm">Edit</button></a>
</div>
<br/>

<div style="text-align: center;"><label class="label label-info">Added by: <?php echo $all_farmers['firstname']." ".$all_farmers['surname']; ?></label></div>

</div>
</div>
<div class="col-md-8">
<div class="profile-content">


<h3>Personal Details</h3>
<div>
  <div class="col-md-5">
    <strong>Gender</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['gender']; ?></p>
  </div>
</div>
<div class="clearfix"> </div>
<div>
  <div class="col-md-5">
    <strong>Date of birth</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['dob']; ?></p>
  </div>
</div>
<div class="clearfix"> </div>
<div>
  <div class="col-md-5">
    <strong>Phone Number</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['phone']; ?></p>
  </div>
</div>

<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>Marital Status</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['marital_status']; ?></p>
  </div>
</div>
<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>Number Of Dependant</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['number_of_dependants']; ?></p>
  </div>
</div>

<div class="clearfix"> </div>
<div>
  <div class="col-md-5">
    <strong>Crop Proficiency</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['crop_proficiency']; ?></p>
  </div>
</div>
<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>Farm Location</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['location']; ?></p>
  </div>
</div>

<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>State</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['name']; ?></p>
  </div>
</div>

<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>Local Govt</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['local_name']; ?></p>
  </div>
</div>
<!-- personal details -->

<div class="clearfix"> </div>
<hr>

<?php if($all_farmers['bank_name']!=="No bank"){?>
	<h3>Bank Details</h3>
<div>
  <div class="col-md-5">
    <strong>Bank Account</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['bank_name']; ?></p>
  </div>
</div>
<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>Account Number</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['acct_number']; ?></p>
  </div>
</div>
<div class="clearfix"> </div>
<hr>
<?php } ?>

<h3>Farm History</h3>

<div class="clearfix"> </div>
<div>
  <div class="col-md-5">
    <strong>Land Area Farmed Previously (Acres)</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['land_area_farmed']; ?></p>
  </div>
</div>

<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>Years of Experience</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['years_of_experience']; ?></p>
  </div>
</div>

<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>Income Range Before Farmcrowdy</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['income_range']; ?></p>
  </div>
</div>
<div class="clearfix"> </div>

<div>
  <div class="col-md-5">
    <strong>Any Previous Training?</strong>
  </div>
  <div class="col-md-5">
    <p><?php if ($all_farmers['previous_training']=='1'){echo 'YES';}else {echo 'NO';} ?></p>
  </div>
</div>
<div class="clearfix"> </div>
<div>
  <div class="col-md-5">
    <strong>Comment</strong>
  </div>
  <div class="col-md-5">
    <p><?php echo $all_farmers['comment']; ?></p>
  </div>
</div>

<div class="clearfix"> </div>

</div>
</div>
</div>

                      </div>
