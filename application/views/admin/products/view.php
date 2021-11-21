<?php $this->load->view('common/head')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
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

                                        <li class="active-page"> Products</li>

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

                                <h4>Products</h4>

                            </div>

                            <div class="widget-container">

                                <div class=" widget-block">

                                     <table class="table table-bordered">

                                        <tbody>

                                            <tr>
                                                <td>Product name</td>
                                                <td><?= $products['product_name']?></td>
                                            </tr>

                                            <tr>
                                                <td>Price</td>
                                                <td><?= $products['Price']?></td>
                                            </tr>


                                            <tr>
                                                <td>Offer Price</td>
                                                <td><?= $products['offer_price']?></td>
                                            </tr>

                                            <tr>
                                                <td>Quantity</td>
                                                <td><?= $this->db->where('product_id',$products['id'])->get('product_quantity')->row_array()['quantity'];?></td>
                                            </tr>

                                            <tr>
                                                <td>Sort</td>
                                                <td><?= $products['sort']?></td>
                                            </tr>

                                            <tr>
                                                <td>Weight</td>
                                                <td><?= $products['weight']?></td>
                                            </tr>



                                            <tr>
                                                <td>URl</td>
                                                <td><?= $products['url']?></td>
                                            </tr>

                                             <tr>
                                                <td>Brands</td>
                                                <td><?= $products['brands']?></td>
                                            </tr>

                                            <tr>
                                                <td>Search Keyword</td>
                                                <td><?= $products['searchkeyword']?></td>
                                            </tr>


                                            <tr>
                                                <td>Meta Title</td>
                                                <td><?= $products['metatitle']?></td>
                                            </tr>



                                            <tr>
                                                <td>Meta Description</td>
                                                <td><?= $products['metadescription']?></td>
                                            </tr>


                                            <tr>
                                                <td>Meta Keywords</td>
                                                <td><?= $products['metakeyword']?></td>
                                            </tr>



                                            <tr>
                                                <td>Specification</td>
                                                <td><?= $products['specification']?></td>
                                            </tr>
                    <?php  $category=$this->db->select('productcategory.*')->from('procat')->where('product_id',$products['id'])->join('productcategory','productcategory.id=procat.category_id')->get()->result_array();
                    $category=implode(',',array_column($category, 'name'));
                                                                     ?>
                                            <tr>
                                                <td>Category</td>
                                                <td><?= $category; ?></td>
                                            </tr>


                                           
                                        </tbody>

                                    </table>

                                    <div class="row">
                                        <table class="table table-bordered">

                                            <td>Images</td>
                                             <?php 
                                                $images=$this->db->where('product_id',$products['id'])->get('product_image')->result_array();
                                                foreach($images as $i)
                                                { ?>
                                                    <td>
                                                        <a href="<?= base_url('uploads/products/'.$i['image'])?>" data-fancybox="gallery">
                                                    <img src="<?= base_url('uploads/products/'.$i['image'])?>" alt="" height="200px" width="150px" >
                                                </a>
                                                    <a href="<?= base_url('admin/products/delete_image/'.$i['id'])?>">Delete</a>
                                                </td>
                                              <?php  }
                                            ?>
                                            
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


<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    