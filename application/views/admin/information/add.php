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
                                        <li class="active-page"> Add information</li>
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
                    <div >
                    <div class="box-widget widget-module">
                            <div class="widget-head clearfix">
                                <span class="h-icon"><i class="fa fa-bars"></i></span>
                                <h4>Add information</h4>
                            </div>
                            <div class="widget-container">
                                <div class=" widget-block">
                                    <form action="<?= base_url('admin/information/add')?>" method="post" enctype="multipart/form-data">
                                         <legend>Add information</legend>
                                   

                                     <div class="form-group">
                                        <label>Title</label>
                                         <input type="text" name="title" value="<?= set_value('title')?>" class="form-control"  required="">
                                     </div>

                                       <div class="form-group">
                                        <label>Description</label>
                                         <textarea name="description" class="form-control full-editor"  required=""><?= set_value('description')?></textarea>
                                     </div>
                                     
                                    

                                    
                                     <div class="form-group">
                                        <label> Status</label>
                                         <select class="form-control" name="status">
                                             <option <?php if(set_value('status')=='Active'){ echo 'selected'; }?>>Active</option>
                                             <option <?php if(set_value('status')=='Inactive'){ echo 'selected'; }?>>Inactive</option>
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