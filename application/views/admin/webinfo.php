<?php $this->load->view('common/head')?>

<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">

<body>

<div class="page-container list-menu-view">

<!--Leftbar Start Here -->

<?php $this->load->view('common/sidebar')?>



    <div class="page-content">

    <!--Topbar Start Here -->

    <?php $this->load->view('common/header') ?>

        <div class="main-container">

            <div class="container-fluid">

                <div class="page-breadcrumb">

                    <div class="row">

                        <?php if(validation_errors()!=''){?>

                    <div class="alert alert-danger alert-dismissible">

                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <?php echo validation_errors(); ?>

                    </div>

                        <?php }?>

                        <div class="col-md-7">

                            <div class="page-breadcrumb-wrap">

                                <div class="page-breadcrumb-info">

                                    

                                    <ul class="list-page-breadcrumb">

                                        <li><a href="#">Home</a>

                                        </li>

                                        <li class="active-page"> Add webinfo</li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-5">



                        </div>

                    </div>

                </div>

                 <?php 

                    if($this->session->flashdata('msg')!=''){

                        echo '<div class="alert alert-success alert-dismissible">

                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                              <strong>'.$this->session->flashdata('msg').'</strong> 

                            </div>';

                    }

                    if($this->session->flashdata('err')!=''){

                        echo '<div class="alert alert-danger alert-dismissible">

                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                              <strong>'.$this->session->flashdata('err').'</strong> 

                            </div>';

                    }

                ?>

                <div class="row">

                    <div class="col-md-12 ">

                    <div class="box-widget widget-module">

                            <div class="widget-head clearfix">

                                <span class="h-icon"><i class="fa fa-bars"></i></span>

                                <h4>Add webinfo</h4>

                            </div>

                            <div class="widget-container">

                                <div class=" widget-block">

                                    <form action="<?= base_url('webinfo/index')?>" method="post" enctype="multipart/form-data">

                                         <legend>Add webinfo</legend>

                              



                                     <div class="form-group">

                                        <label>Facebook</label>

                                         <input type="text" name="fb" value="<?= $webinfo['fb']?>" class="form-control"  >

                                     </div>


                                       <div class="form-group">

                                        <label>Twitter</label>

                                         <input type="text" name="twitter" value="<?= $webinfo['twitter']?>" class="form-control"  >

                                     </div>


                                       <div class="form-group">

                                        <label>Insta</label>

                                         <input type="text" name="insta" value="<?= $webinfo['insta']?>" class="form-control"  >

                                     </div>


                                     <div class="form-group">

                                        <label>Linkedin</label>

                                         <input type="text" name="linkedin" value="<?= $webinfo['linkedin']?>" class="form-control"  >

                                     </div>


                                    
                                     <div class="form-group">

                                        <label>Address</label>

                                         <input type="text" name="address" value="<?= $webinfo['address']?>" class="form-control"  >

                                     </div>


                                     <div class="form-group">

                                        <label>Contact</label>

                                         <input type="text" name="contact" value="<?= $webinfo['contact']?>" class="form-control"  >

                                     </div>


                                     <div class="form-group">

                                        <label>Email</label>

                                         <input type="email" name="email" value="<?= $webinfo['email']?>" class="form-control"  >

                                     </div>


                                     <input type="submit" name="" class="btn btn-primary" value="Submit">

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                    </div>

                  <?php $this->load->view('common/foot'); ?>

        </div>

    </div>



    <?php $this->load->view('common/footer')?>



<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>