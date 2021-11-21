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
                                        <li class="active-page">View Notes</li>
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
                                <h4>View Price List</h4>
                            </div>
                            <div class="widget-container">
                                <div class=" widget-block">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>SNo</th>
                                                <th>Title</th>
                                                <th>File</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                $sno=1; 
                                                foreach($file as $p){ 
                                            ?>
                                            <tr>
                                                <td><?= $sno++;?></td>
                                                <td><?= $p['title']?></td> 
                                                <td><?= $p['file']?></td> 
                                                <td><?= $p['status']?></td>
                                                <td>
                                                
                                                    <a href="<?= base_url('del-pricelist/' .$p['id'])?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                    
                                                </td>
                                            </tr>
                                            <?php }?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('common/foot'); ?>
            </div>
        </div>
    </div>
</div>
</body>
<?php $this->load->view('common/footer')?>