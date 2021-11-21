<?php $this->load->view('common/head')?>

<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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

                                        <li class="active-page"> Add Product</li>

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

                                <h4>Add Products</h4>

                            </div>

                            <div class="widget-container">

                                <div class=" widget-block">

                                    <form action="<?= base_url('admin/products/add')?>" method="post" enctype="multipart/form-data">

                                         <legend>Add Products</legend>

                                   

                                  <div class="col-sm-6">

                                     <div class="form-group">

                                        <label>Product Name</label>

                                         <input type="text" name="product_name" value="<?= set_value('product_name')?>" class="form-control"  required="">

                                     </div>

                                 </div>

                                 <div class="col-sm-6">

                                      <div class="form-group">

                                        <label>Category</label>

                                         <input type="text" name="category" value="<?= set_value('category')?>" id="category" class="form-control"  required="">

                                     </div>

                                 </div>

                                     <input type="hidden" name="category_ids"  id="category_ids">

                                      <div class="col-sm-6">

                                     <div class="form-group">

                                        <label>Price</label>

                                         <input type="number" name="price" value="<?= set_value('price')?>" class="form-control">

                                     </div>

                                 </div>



                                 <div class="col-sm-6">

                                     <div class="form-group">

                                        <label>Offer Price</label>

                                         <input type="number" name="offer_price" value="<?= set_value('offer_price')?>" class="form-control">

                                     </div>

                                 </div>



                                     <div class="form-group">

                                        <label>Specification</label>

                                         <textarea name="specification" class="form-control full-editor" required></textarea>

                                     </div>



                                     <div class="col-sm-6">

                                      <div class="form-group">

                                        <label>Sort Order</label>

                                         <input type="number" value="0" name="sort" class="form-control" >

                                     </div>

                                 </div>

                                   <div class="col-sm-6">

                                      <div class="form-group">

                                        <label>Quantity</label>

                                         <input type="number" value="0" min="0" name="quantity" class="form-control" >

                                     </div>

                                 </div>

                                 <div class="col-sm-6">

                                     <div class="form-group">

                                        <label>URL</label>

                                         <input type="text" value="<?= set_value('url')?>" name="url" class="form-control" required>

                                     </div>

                                 </div>



                                 <div class="col-sm-6">

                                     <div class="form-group">

                                        <label>Search keyword</label>

                                         <input type="text" value="<?= set_value('searchkeyword')?>" name="searchkeyword" class="form-control" >

                                     </div>

                                 </div>



                                 <div class="col-sm-6">

                                     <div class="form-group">

                                        <label>Meta Title</label>

                                         <input type="text" value="<?= set_value('metatitle')?>" name="metatitle" class="form-control" >

                                     </div>

                                 </div>

                                 <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Meta Keywords</label>

                                         <input type="text" value="<?= set_value('metakeyword')?>" name="metakeyword" class="form-control" >

                                     </div>

                                 </div>

                                 <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Weight</label>

                                         <input type="text" value="<?= set_value('weight')?>" name="weight" class="form-control" >

                                     </div>

                                 </div>

                                  <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Product Main Image</label>

                                         <input type="file" value="<?= set_value('main_image')?>" name="main_image" class="form-control" required>

                                     </div>

                                 </div>


                                 <div class="col-sm-12">

                                     <div class="form-group">

                                        <label>Images(Press Control Select Multiple Images)</label>

                                         <input type="file" name="image[]" class="form-control" multiple required>

                                     </div>

                                 </div>



                                 <div class="col-sm-12">

                                     <div class="form-group">

                                        <label>Meta Description</label>

                                         <input type="text" value="<?= set_value('metadescription')?>" name="metadescription" class="form-control" >

                                     </div>

                                 </div>



                                     

                                   <div class="col-sm-6">
                                     <div class="form-group">

                                        <label> Brands</label>

                                         <select class="form-control" name="brands">
                                          <?php 
                                            $brands=$this->db->where('status','Active')->get('brands')->result_array();
                                            foreach($brands as $b)
                                            { ?>
                                              <option value="<?= $b['id']?>"><?= $b['name']?></option>
                                          <?php  }
                                          ?>
                                         </select>

                                     </div>
                                 </div>



                                  <div class="col-sm-6">



                                     <div class="form-group">

                                        <label> Status</label>

                                         <select class="form-control" name="status">

                                             <option <?php if(set_value('status')=='Active'){ echo 'selected'; }?>>Active</option>

                                             <option <?php if(set_value('status')=='Inactive'){ echo 'selected'; }?>>Inactive</option>

                                         </select>

                                     </div>

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

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>



  <script>

    $=jQuery;

  $( function() {

    

    function split( val ) {

      return val.split( /,\s*/ );

    }

    function extractLast( term ) {

      return split( term ).pop();

    }

 

    $( "#category" )

      // don't navigate away from the field on tab when selecting an item

      .on( "keydown", function( event ) {

        if ( event.keyCode === $.ui.keyCode.TAB &&

            $( this ).autocomplete( "instance" ).menu.active ) {

          event.preventDefault();

        }

      })

      .autocomplete({

        source: function( request, response ) {

          $.getJSON( "<?= base_url('products/getcategory')?>", {

            term: extractLast( request.term )

          }, response );

        },

        search: function() {

          // custom minLength

          var term = extractLast( this.value );

          if ( term.length < 2 ) {

            return false;

          }

        },

        focus: function() {

          // prevent value inserted on focus

          return false;

        },

        select: function( event, ui ) {

          var terms = split( this.value );

          

          var ids=split($('#category_ids').val());          

          ids.pop();

          ids.push(ui.item.id);

          ids.push( "" );

          ids.join( "," );

          console.log(ids);

          $('#category_ids').val(ids);

          // remove the current input

          terms.pop();

          // add the selected item

          //alert(ui.item.id)

          terms.push( ui.item.value );

          // add placeholder to get the comma-and-space at the end

          terms.push( "" );

          this.value = terms.join( ", " );

          return false;

        }

      });

  } );

  </script>