<?php $this->load->view('common/head')?>

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
                                            <li class="active-page"> Add Test Series</li>
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
                                    <h4>Add Price List</h4>
                                </div>
                            <div class="widget-container">
                                <div class=" widget-block">
                                    <form action="<?= base_url('add-pricelist')?>" method="post" enctype="multipart/form-data">
                                       

                                        <div class="form-group">
                                            <label>Price List</label>
                                            <input type="text" name="title"  class="form-control" required="" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>Add File</label>
                                            <input type="file" name="file" class="form-control" required="" accept="application/pdf /*">
                                        </div>

    									 
                                        <div class="form-group">
                        					<label>Status</label>
                    						<select class="form-control" name="status">
                    							<option value="Enable">Enable</option>
                    							<option value="Disable">Disable</option>
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

</div>
</div>
</body>
<script src="<?= base_url('public/')?>js/summernote.min.js"></script>
