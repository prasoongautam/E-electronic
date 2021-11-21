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
                                        <li class="active-page"> Add blog</li>
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
                                <h4>Add blog</h4>
                            </div>
                            <div class="widget-container">
                                <div class=" widget-block">
                                    <form action="<?= base_url('admin/blog/add')?>" method="post" enctype="multipart/form-data">
                                         <legend>Add blog</legend>
                                   
                                   <div class="form-group">
                                        <label>Category</label>
                                         <select class="form-control " name="category" required>
                                                <option value="">Select Category</option>
                                                <?php $cat=$this->db->where('status','Active')->get('blogcategory')->result_array();
                                                    foreach($cat as $c)
                                                    { ?>
                                                        <option value="<?= $c['id']?>"><?= $c['name']?></option>
                                                   <?php }
                                                ?>
                                         </select>
                                     </div>

                                     <div class="form-group">
                                        <label>Title</label>
                                         <input type="text" name="title" value="<?= set_value('title')?>" class="form-control"  required="">
                                     </div>

                                      <div class="form-group">
                                        <label>Date</label>
                                         <input type="date" name="date" value="<?= set_value('date')?>" class="form-control"  required="">
                                     </div>

                                     <div class="form-group">
                                        <label>Short Content</label>
                                         <textarea name="short_description" class="form-control full-editor"  required=""><?= set_value('short_description')?></textarea>
                                     </div>

                                      <div class="form-group">
                                        <label> Content</label>
                                         <textarea name="description" class="form-control full-editor"  required=""><?= set_value('description')?></textarea>
                                     </div>

                                     <div class="form-group">
                                        <label>Image</label>
                                         <input type="file" name="image" value="<?= set_value('title')?>" class="form-control"  >
                                     </div>

                                     

                                     
                                      <div class="form-group">
                                        <label>Sort Order</label>
                                         <input type="number" value="<?= set_value('sort')?>" name="sort" class="form-control" >
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