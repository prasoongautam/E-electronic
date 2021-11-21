<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="<?= base_url('public/front/')?>images/fav-icon.png" rel="shortcut icon" />
<title>Bluebird overseas</title>
<link rel="stylesheet" href="<?= base_url('public/front/')?>css/bootstrap.css">
<link rel="stylesheet" href="<?= base_url('public/front/')?>css/my-style.css">
<link rel="stylesheet" href="<?= base_url('public/front/')?>css/nav.css">
<link rel="stylesheet" href="<?= base_url('public/front/')?>css/responsive.css">
<link href="<?= base_url('public/front/')?>css/responsive-slider.css" rel="stylesheet">
<link href="<?= base_url('public/front/')?>css/fonts.css" rel="stylesheet">

</head>
<body>

<div class="section">
<div class="container">

<div class="row" style="margin-top:35px;">

<div class="col-sm-4">
&nbsp;
</div>

<div class="col-sm-4">
<div class="box-shedow">
<a href="<?= base_url()?>"><img src="<?= base_url('public/front/')?>images/logo-blue.png"></a>
<span><a href="<?= base_url()?>" class="home-icon"><i class="fa fa-home"></i></a></span>
<div class="row">
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
<form method="post" action="<?= base_url('update_password')?>">
  <input type="hidden" name="id" value="<?= $pass['id']?>">
<div class="col-md-12">
<div class="form-group">
<label for="exampleInputEmail1">Password</label>
<input type="password" name="password" class="form-control" required>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label for="exampleInputEmail1">Confirm Password</label>
<input type="password" name="confirm_password" class="form-control" required>
</div>
</div>


<div class="col-md-12">
<button type="submit" class="btn btn-default login-button">Submit</button>
</div>
</form>

<div class="col-md-12" style="margin-top:20px;">
<a href="<?= base_url('signin')?>" class="reset-pass"> Go Back</a>
</div>


</div>


</div>
</div>

<div class="col-sm-4">
&nbsp;
</div>

</div>
</div>
</div>

<script src="<?= base_url('public/front/')?>js/a.js"></script>
<script src="<?= base_url('public/front/')?>js/b.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url('public/front/')?>js/theme.js"></script>
<script src="<?= base_url('public/front/')?>js/fontawesome.js"></script>
<!-- ================== Scroll top JS ======================= -->
<script>
$(window).scroll(function() {
if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
$('#return-to-top').fadeIn(200);    // Fade in the arrow
} else {
$('#return-to-top').fadeOut(200);   // Else fade out the arrow
}
});
$('#return-to-top').click(function() {      // When arrow is clicked
$('body,html').animate({
scrollTop : 0                       // Scroll to top of body
}, 500);
});
</script>
<!-- ================== Banner JS ======================= -->
<!-- owl curousel slider -->
<script src="<?= base_url('public/front/')?>js/crousal.js"></script>
<script>
//    testinomial
$(document).ready(function(){
$("#testimonial-slider1").owlCarousel({
items:3,
itemsDesktop:[1000,2],
itemsDesktopSmall:[980,2],
itemsTablet:[768,1],
itemsMobile:[650,1],
pagination:true,
navigation:false,
slideSpeed:1000,
autoPlay:true
});
});

</script>
<script src="<?= base_url('public/front/')?>js/responsive-slider.js"></script>
</body>
</html>