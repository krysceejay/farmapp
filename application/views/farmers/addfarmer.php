<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Add Farmer
            </ol>

            <!--grid-->
   	<div class="validation-system">

   		<div class="validation-form">

        <form action="addfarmer" method="post" enctype="multipart/form-data">

          <?php if(validation_errors()){ ?>
          <div class="alert alert-danger col-md-6"><?php echo validation_errors(); ?></div>
          <div class="clearfix"> </div>
              <?php } ?>

               	<div class="vali-form">
                  <div class="col-md-6 form-group1">
                    <label class="control-label">Firstname</label>
                    <input type="text" name="fname" placeholder="Firstname" required="">
                  </div>
                  <div class="col-md-6 form-group1 form-last">
                    <label class="control-label">Lastname</label>
                    <input type="text" name="sname" placeholder="Lastname"  >
                  </div>
                  <div class="clearfix"> </div>
                  </div>

                  <div class="col-md-6 form-group1 group-mail">
                    <label class="control-label ">Date Of Birth</label>
                    <input type="text" name="dob" placeholder="dd/mm/yyyy" required="" >
                  </div>

                  <div class="col-md-6 form-group2 group-mail">
                  <label class="control-label">Gender</label>
                <select name="gender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                </div>
                <div class="clearfix"> </div>

                  <div class="col-md-6 form-group1 group-mail">
                    <label class="control-label">Phone Number</label>
                    <input type="number" name="phone" >
                  </div>

                    <div class="col-md-6 form-group2 group-mail">
                    <label class="control-label">Marital Status</label>
                  <select name="status">
                    <option value="Married">Married</option>
                    <option value="Single">Single</option>
                  </select>
                  </div>
                   <div class="clearfix"> </div>

                   <div class="col-md-6 form-group1 group-mail">
                     <label class="control-label">Number Of Dependant</label>
                     <input type="number" name="num_of_dep" >
                   </div>

                   <div class="col-md-6 form-group1 group-mail">
                     <label class="control-label">Additional Labour</label>
                     <input type="number" name="labour" >
                   </div>



                   <div class="clearfix"> </div>

                   <div class="col-md-6 form-group1 group-mail">
                     <label class="control-label">Crop Proficiency</label>
                     <input id="cropsearch" type="text" name="crop_prof">
                     <div id="result"></div>
                   </div>

                    <div class="col-md-6 form-group2 group-mail">
                    <label class="control-label">Farm Location</label>
                  <select name="location">
                    <?php foreach ($farm_location as $key => $location) {?>
                    <option value="<?php echo $location['location_id']; ?>"><?php echo $location['location']; ?></option><?php
                    } ?>

                  </select>
                  </div>


                   <div class="clearfix"> </div>


                   <div class="col-md-6 form-group2 group-mail">
                   <label class="control-label">State</label>
                 <select name="states" id="states">
                   <?php foreach ($states as $key => $state) {?>
                   <option value="<?php echo $state['state_id']; ?>"><?php echo $state['name']; ?></option><?php
                   } ?>

                 </select>
                 </div>

                   <div class="col-md-6 form-group2 group-mail">
                   <label class="control-label">LGA</label>
                   <div id="showlocal">
                 <select name="lga">
                   <?php foreach ($lgas as $key => $lga) {?>
                   <option value="<?php echo $lga['local_id']; ?>"><?php echo $lga['local_name']; ?></option><?php
                   } ?>

                 </select>
                 </div>

                 </div>


                 <div class="clearfix"> </div>

                 <div class="col-md-6 form-group2 group-mail">
                 <label class="control-label">Bank Name</label>
               <select name="bankname">
                 <?php foreach ($banks as $key => $bank) {?>
                 <option value="<?php echo $bank['bank_id']; ?>"><?php echo $bank['bank_name']; ?></option><?php
                 } ?>

               </select>
               </div>

               <div class="col-md-6 form-group1 group-mail">
                 <label class="control-label">Account Number</label>
                 <input type="number" name="acct_number" >
               </div>



<div class="clearfix"> </div>

                        <div class="col-md-6 form-group1 group-mail">
                        <label class="control-label">Land Area Farmed Previously (Acres)</label>
                        <input type="number" name="landarea" >
                        </div>

                        <div class="col-md-6 form-group1 group-mail">
                        <label class="control-label">Years of Farming Experience</label>
                        <input type="number" name="yr_of_exp" >
                        </div>

                          <div class="clearfix"> </div>

                            <div class="col-md-6 form-group2 group-mail">
                            <label class="control-label">Income Range Before Farmcrowdy</label>
                            <select name="income">
                              <option value="10-20k">10-20k</option>
                              <option value="21-30k">21-30k</option>
                              <option value="31-40k">31-40k</option>
                              <option value="41-50k">41-50k</option>
                              <option value="51-60k">51-60k</option>
                              <option value="61-70k">61-70k</option>
                              <option value="71-80k">71-80k</option>
                              <option value="51-60k">81-90k</option>
                              <option value="51-60k">91-100k</option>

                            </select>
                            </div>

                            <div class="col-md-6 form-group2 group-mail">
                            <label class="control-label">Assign to Farmers group</label>
                            <select name="farm_group">
                              <?php foreach ($farm_group as $key => $group) {?>
                              <option value="<?php echo $group['group_id']; ?>"><?php echo $group['group_name']; ?></option><?php
                              } ?>

                            </select>
                            </div>

                            <div class="clearfix"> </div>

                            <div class="col-md-6 form-group">
                              <div class="checkbox1">
                                <label>
                                  <input type="radio" ng-model="model.winner" name="training" value="1" class="ng-invalid ng-invalid-required">
                                  Has Previous Training
                                </label>
                              </div>
                            </div>
                            <div class="col-md-6 form-group">
                              <div class="checkbox1">
                                <label>
                                  <input type="radio" ng-model="model.winner" name="training" value="0" class="ng-invalid ng-invalid-required">
                                  No Previous Training
                                </label>
                              </div>
                            </div>
<div class="clearfix"> </div>
                              <div class="col-md-6 form-group">
                                <div class="checkbox1">
                                  <label class="control-label label label-info">Upload photo</label>
                                    <input type="file" name="pimage">

                                  </label>
                                </div>
                              </div>

                              <div class="clearfix"> </div>
<label class="btn btn-primary showtakephoto">Take Photo</label>

<!-- capture -->
<div class="takephoto" style="display: none;">

<script src="<?php echo base_url() ;?>assets/js/webcam.js"></script>
                  <div id="my_camera" style="width:320px; height:240px;" class="col-md-5"></div>
                  <div class="col-md-2"><a href="javascript:void(take_snapshot())" class="btn btn-success">Take Snapshot</a></div>
                    <div id="my_result" class="col-md-5"></div>
                    <input id="mydata" type="hidden" name="mydata" value=""/>

                    <script language="JavaScript">
                    Webcam.set({
                                width: 320,
                                height: 240,
                                image_format: 'jpeg',
                                jpeg_quality: 90
                              });

                      Webcam.attach( '#my_camera' );

                      function take_snapshot() {
                      Webcam.snap( function(data_uri) {
                        document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
                                  var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

                                  document.getElementById('mydata').value = raw_image_data;
                                  //document.getElementById('myform').submit();
                                } );
                      }
                    </script>



                    <div class="clearfix"> </div>

                  </div>

                  <!-- end capture -->

                  <div class="col-md-12 form-group1 ">
                    <label class="control-label">Comment</label>
                    <textarea name="comment"></textarea>
                  </div>
                   <div class="clearfix"> </div>


                  <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                  </div>
                <div class="clearfix"> </div>


              </form>

<script src="<?php echo base_url() ;?>assets/js/crops.js"></script>
<script src="<?php echo base_url() ;?>assets/js/capture.js"></script>
<script type="text/javascript">

function selectUser(val) {
  //$("#cropsearch").val(val);
  $("#cropsearch").val(function() {
    var s = this.value;
    var lastIndex = s.lastIndexOf(",");
    var s1 = s.substring(0, lastIndex);
    var n = s.startsWith(",");
  if(s1 == ""){
    return val;
  }else{
    return s1 +","+ val;
  }

      });

   $("#result").hide();
  }


</script>

</div>
</div>
