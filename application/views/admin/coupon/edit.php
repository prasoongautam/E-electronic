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

                                        <li class="active-page"> Edit coupon</li>

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

                                <h4>Edit coupon</h4>

                            </div>

                            <div class="widget-container">

                                <div class=" widget-block">

                                    <form action="<?= base_url('admin/coupon/edit/'.$coupon['id'])?>" method="post" enctype="multipart/form-data">

                                         <legend>Edit coupon</legend>

                                   

                                  

                                     <div class="form-group">

                                        <label>Coupon</label>

                                         <input type="text" name="coupon" value="<?= $coupon['coupon']?>" class="form-control"  required="">

                                     </div>



                                      

                                     <div class="form-group">

                                        <label>Image</label>

                                         <input type="file" name="image" value="<?= $coupon['image']?>" class="form-control"  >

                                     </div>



                                     <div class="form-group">

                                        <label>Minimum Purchase</label>

                                         <input type="text" name="minimumpurchase" value="<?= $coupon['minimumpurchase']?>" class="form-control"  required="">

                                     </div>



                                     <div class="form-group">

                                        <label>Offer from</label>

                                         <input type="date" name="offer_from" value="<?= $coupon['offer_from']?>" class="form-control"  required="">

                                     </div>



                                     <div class="form-group">

                                        <label>Offer To</label>

                                         <input type="date" name="offer_to" value="<?= $coupon['offer_to']?>" class="form-control"  required="">

                                     </div>


                                       <div class="form-group">

                                        <label>Discount Type</label>
                                            <select name="discount_type" required="" class="form-control">
                                                <option <?php if($coupon['discount_type']=='Amount'){ echo 'selected'; }?> value="Amount">Amount</option>
                                                <option <?php if($coupon['discount_type']=='Percent'){ echo 'selected'; }?> value="Percent">Percent</option>
                                                
                                            </select>

                                     </div>

                                     <div class="form-group">

                                        <label>Offer</label>

                                         <input type="number" value="<?= $coupon['offer']?>" name="offer" class="form-control" >

                                     </div>
                                     

                                      <div class="form-group">

                                        <label>Sort Order</label>

                                         <input type="number" value="<?= $coupon['sort']?>" name="sort" class="form-control" >

                                     </div>



                                     <div class="form-group">

                                        <label> Status</label>

                                         <select class="form-control" name="status">

                                             <option <?php if($coupon['status']=='Active'){ echo 'selected'; }?>>Active</option>

                                             <option <?php if($coupon['status']=='Inactive'){ echo 'selected'; }?>>Inactive</option>

                                         </select>

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