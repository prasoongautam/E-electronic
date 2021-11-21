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
                        <div class="col-md-7">
                            <div class="page-breadcrumb-wrap">
                                <div class="page-breadcrumb-info">
                                    
                                    <ul class="list-page-breadcrumb">
                                        <li><a href="#">Home</a>
                                        </li>
                                        <li class="active-page"> productcategory</li>
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
                                <h4>productcategory</h4>
                            </div>
                            <div class="widget-container">
                                <div class=" widget-block">
                                     <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td><?= $productcategory['name']?></td>
                                            </tr>
                                             <tr>
                                                <td>Parent</td>
                                                <td><?= $productcategory['parent']?></td>
                                            </tr>

                                             <tr>
                                                <td>Offer</td>
                                                <td><?= $productcategory['offer']?></td>
                                            </tr>


                                             <tr>
                                                <td>Percentage</td>
                                                <td><?= $productcategory['percentage']?></td>
                                            </tr>
                                             <tr>
                                                <td>Sort</td>
                                                <td><?= $productcategory['sort']?></td>
                                            </tr>
                                             <tr>
                                                <td>Status</td>
                                                <td><?= $productcategory['status']?></td>
                                            </tr>
                                            
                                             <tr>
                                                <td>URL</td>
                                                <td><?= $productcategory['url']?></td>
                                            </tr>

                                             <tr>
                                                <td>Search Keyword</td>
                                                <td><?= $productcategory['searchkeyword']?></td>
                                            </tr>

                                             <tr>
                                                <td>Meta Title</td>
                                                <td><?= $productcategory['metatitle']?></td>
                                            </tr>


                                             <tr>
                                                <td>Meta Description</td>
                                                <td><?= $productcategory['metadescription']?></td>
                                            </tr>

                                             <tr>
                                                <td>Meta Keyword</td>
                                                <td><?= $productcategory['metakeyword']?></td>
                                            </tr>

                                            <tr>
                                                <td>ICON</td>
                                                <td><img src="<?= base_url('uploads/productcategory/'.$productcategory['icon'])?>" height="100" width="100"></td>
                                            </tr>

                                             <tr>
                                                <td>Image</td>
                                                <td><img src="<?= base_url('uploads/productcategory/'.$productcategory['image'])?>" height="100" width="100"></td>
                                            </tr>
                                        </tbody>
                                                </table>
                                           <div class="dt-pagination">
										
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                  <?php $this->load->view('common/foot'); ?>
        </div>
    </div>

    <?php $this->load->view('common/footer')?>

    