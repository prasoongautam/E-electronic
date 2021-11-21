

<?php $this->load->view('common_front/header');?>
<!--================ Banner =================-->
<div class="single-page-banner">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 single-page-banner-left">
            <h4>Change Password</h4>
         </div>
         <div class="col-sm-6 single-page-banner-right">
            <p><a href="<?= base_url()?>">Home</a> | <small>Change Password</small></p>
         </div>
      </div>
   </div>
</div>
<!--================ section 1 =================-->
<div class="section" style="background: #cbcbd226;">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-3 col-sm-3">
            <div class="user-card">
               <div class="card-image bg"></div>
               <div class="user-card-body">
                  <div class="user-card-img">
                     <img src="<?= base_url('public/front/')?>images/default-avatar.png" alt="">
                  </div>
                  <h4 class="name">Shubham Pandey</h4>
                  <div class="user-card-body-decc">
                     <p><b>Email Id : </b> <span class="pull-right">abc@gmail.com</span></p>
                     <p><b>Mobile No. : </b> <span class="pull-right">+91-8989-899-899</span></p>
                     <p><b>Values : </b> <span class="pull-right">abc@gmail.com</span></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-9">
            <div class="dashboard-top-link">
               <ul class="dashboard-link">
                  <li><a href="<?= base_url('my_profile')?>">My Profile</a></li>
                  <li><a href="<?= base_url('my_order')?>">My Orders</a></li>
                  <li class="active"><a href="<?= base_url('change_password')?>">Change Password</a></li>
               </ul>
            </div>
            <div class="dashboard-right">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="fill_detail_box">
                        <form method="post" action="<?= base_url('change_password')?>">
                        <div class="row">
                           <div class="col-sm-12 md-space">
                              <h3 class="heading">Update Password</h3>
                              <img src="<?= base_url('public/front/')?>images/ribbon.png" alt="">
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label for="">Old Password*</label>
                                 <input type="password"  placeholder="Old Password" name="old_password" required class="form-control">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label for="">New Password*</label>
                                 <input type="password" placeholder="New password" class="form-control" name="password" required>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label for="">Confirm Password*</label>
                                 <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-sm-12 text-right">
                              <button class="button">update Password</button>
                           </div>
                        </div>
                    </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- scroll to top button -->
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
<?php $this->load->view('common_front/footer');?>

