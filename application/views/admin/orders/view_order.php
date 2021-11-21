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
                                        <li class="active-page"> Order Details</li>
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
                                <h4>Order Details</h4>
                            </div>
                            <div class="widget-container">
                                <div class=" widget-block">
                                     <table class="table table-bordered">
                                        <tbody>
                                            <?php foreach($orders as $key=>$o){ ?>
                                                <tr>
                                                    <td><?= $key; ?></td>
                                                    <td><?= $o; ?></td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>

                                    <div class="row">
                                        <table class="table">
                                            <caption>Products</caption>
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Image</th>
                                                    <th>Quantity </th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php 
                                            $pro=$this->db->where('order_id',$orders['order_id'])->get('orders')->row_array();
                                            foreach(json_decode($pro['products'],true) as $p)
                                            {
                                        ?>  <tr>
                                                    <td><?= $p['name']?></td>
                                                    <td><img src="<?= base_url('uploads/products/'.$p['options']['image'])?>" height="100px" width="100px"></td>
                                                    <td><?= $p['qty'];?></td>
                                                    <td><?= $p['price']?></td>
                                                </tr>
                                            <?php }?>

                                            <tr>
                                                <td>Total Amount Paid After Discount</td>
                                                <td colspan="3"><?= $orders['amount']; ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
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

    