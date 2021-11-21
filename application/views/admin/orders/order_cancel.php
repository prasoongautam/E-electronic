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

                                        <li class="active-page">Cancelled Orders</li>

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

                                <h4>Cancelled Orders</h4>

                            </div>

                            <div class="widget-container">

                                <div class=" widget-block">

                                     <table class="table table-bordered">

                                                <thead>

                                                    <tr>

                                                        

                                                        <th>Order ID</th>

                                                        <th>Order Date</th>

                                                        <th>Pyment Type</th>

                                                        <th>Amount</th>

                                                        <th>Email</th>

                                                        <th>Contact</th>
                                                        

                                                        <th>Action</th>

                                                    </tr>

                                                </thead>



                                                <tbody>

                                                    <?php foreach($orders as $o){ 



                                                        ?>

                                                    <tr>

                                                     

                                                       <td><?= $o['order_id']; ?></td>
                                                       <td><?= $o['order_date']; ?></td>
                                                       <td><?= $o['paymentType']; ?></td>
                                                       <td><?= $o['amount']; ?></td>
                                                       <td><?= $o['email']; ?></td>
                                                       <td><?= $o['mobile']; ?></td>

                                                        <td>

                                                            <a href="<?= base_url('admin/orders/view/'.$o['order_id'])?>" class="btn btn-primary">View Order</a>

                                                             <a href="<?= base_url('admin/orders/approve_order/'.$o['order_id'])?>" onclick="return confirm('Are You Sure Want To Approve Order ?')" class="btn btn-primary">Approve Order</a>

                                                               <a href="<?= base_url('admin/orders/cancel/'.$o['order_id'])?>" onclick="return confirm('Are You Sure Want To Cancel Order?')" class="btn btn-primary">Cancel Order</a>
                                                          <!--   <a onclick="return confirm('Are You Sure Want to delete')" href="<?= base_url('admin/orders/delete/'.$c['id'])?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a> -->

                                                        </td>

                                                    </tr>

                                                    <?php }?>

                                                    

                                                </tbody>

                                            </table>

                                           <div class="dt-pagination">

										<?= $links?>

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



    