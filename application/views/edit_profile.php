<?php $this->load->view('common_front/header');?>

	
<!-- Banners -->
<div class="sec1 ">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                     <p>My Profile</p>
                    </div>
                    <div class="col-sm-4 text-right">
                        <div class="row">
                            <div class="col-xs-10">
                          <?php  $user=$this->session->userdata('apne_log_user');?>
                                <span><b><?= $user['first_name']?> <?= $user['last_name']?></b> </span> <br>
                           <span><a href="<?= base_url('user_logout')?>" class="btn btn-xs btn-success">Logout</a></span>
                       </div>
                            <div class="col-xs-2 ">
                               <div class="profile-img">
                                 <img src="<?= base_url('public/front/')?>images/sushila.jpg" alt="">
                               </div>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
     </div>
<div class="clearfix"></div>
<div class="botton_nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                   <li><a href="<?= base_url('user_profile')?>"><i class="fa fa-user"></i> My Profile</a></li>
                    <li><a href="<?= base_url('my-child')?>"><i class="fa fa-file"></i><span> My Child</span> </a></li>
                    <li><a href="<?= base_url('my-donate-history')?>"> <i class="fa fa-folder-open"></i> <span>My Donate History</span></a></li>
                    <li> <a href="<?= base_url('program-update')?>"> <i class="fa fa-rocket"></i> <span>Program Update</span>  </a>  </li>
                    <li> <a href="<?= base_url('change-password')?>"> <i class="fa fa-tags"></i> <span>Change Password</span> </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="main-content">
    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                        <div class="my-profile-div shadow">
                           <form action="<?= base_url('edit-profile')?>" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12">
                                        <div class="form-group">
                                                <label for="">Title*</label>
                                                <select name="title" id="" class="form-control" required>
                                                    <option value="">Title</option>
                                                    <option <?php if($user['title']=='Mr'){ echo 'selected'; } ?> value="Mr">Mr</option>
                                                    <option <?php if($user['title']=='Mrs'){ echo 'selected'; } ?> value="Mrs">Mrs</option>
                                                    <option <?php if($user['title']=='Miss'){ echo 'selected'; } ?> value="Miss">Miss</option>
                                                </select>
                                            </div>
                                </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">First Name</label>
                                                <input required type="text" value="<?= $user['first_name']?>" placeholder="First Name" name="first_name" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input required type="text" value="<?= $user['last_name']?>" placeholder="Last Name" name="last_name" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" value="<?= $user['email']?>" placeholder="Email" name="email" class="form-control" required readonly>
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="text" value="<?= $user['phone']?>" name="phone" placeholder="Phone" required class="form-control" readonly>
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Address 1</label>
                                                <input type="text" value="<?= $user['address']?>" name="address" placeholder="Address Line 1" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Address 2</label>
                                                <input type="text" value="<?= $user['address2']?>" name="address2" placeholder="Address Line 2" class="form-control">
                                        </div>
                                   </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Country</label>
                                                <input type="text" value="<?= $user['country']?>" placeholder="Country" name="country" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">State</label>
                                                <input type="text" value="<?= $user['state']?>" placeholder="State" name="state" class="form-control">
                                        </div>
                                   </div>

                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">City</label>
                                                <input type="text" value="<?= $user['city']?>" placeholder="City" name="city" class="form-control">
                                        </div>
                                   </div>
                                   
                                  
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Pin Code</label>
                                                <input type="text" value="<?= $user['pincode']?>" placeholder="Pin Code" name="pincode" class="form-control">
                                        </div>
                                   </div>
                                   
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Nationality</label>
                                                <input type="text" value="<?= $user['nationality']?>" placeholder="Nationality" name="nationality" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="">Profile Image</label>
                                                <input type="file"  placeholder="" name="profile" class="form-control">
                                        </div>
                                   </div>
                                 <div class="space"></div>
                                 
                                        <div class="col-sm-12 text-center"> 
                                            <input type="submit" class="btn btn-success" value="Update Profile"> 
                                            
                                    </div>
                                </form>

                        </div>
                </div>


            </div>
        </div>
    </div>
</div>


<?php $this->load->view('common_front/footer');?>