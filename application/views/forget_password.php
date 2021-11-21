<?php $this->load->view('common_front/header');?>

<!--================ Banner =================-->

    <div class="single-page-banner">

        <div class="container">

            <div class="row">

                <div class="col-sm-6 single-page-banner-left">

                    <h4>Re-set Password </h4>

                </div>

                <div class="col-sm-6 single-page-banner-right">

                    <p><a href="<?= base_url()?>">Home</a> | <small>Re-set Password</small></p>

                </div>

            </div>

        </div>

    </div>



    <!--================ section 1 =================-->



    <div class="section">

        <div class="container">

        <div class="row">

              <div class="col-sm-6">

                  <div class="login-img">

                        <img src="<?= base_url('public/front/')?>images/loginbg.jpg" alt="">

                        <div class="overay">

                            <div class="text-box">

                                <h4>Forget your password?</h4>

                                <p>We will send you an email with an new password. <br> This is auto generated passsword.</p>

                            </div>

                        </div>

                  </div>

                 

              </div>

              <div class="col-sm-6">

                  <div class="login-box">

                        <div class="text-box">

                            <h4 class="space">Re-Set Password</h4>

                              <form action="<?= base_url('forget_password')?>" method="post">

                                  <input type="email" class="form-control" placeholder="Email id" name="email">

                                <div class="sm-space"></div>

                                  <button class="button">Send Password</button>

                              </form>

                            

                            </div>

                  </div>

              </div>

        </div>

        </div>

    </div>







<!-- scroll to top button -->

<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

<?php $this->load->view('common_front/footer');?>