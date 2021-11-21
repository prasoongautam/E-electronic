<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['verify_customer_account/(:any)']='Front/verify_customer_account/$1';
$route['change-password/(:any)']='Front/change_customer_password/$1';
$route['customer-profile']='Customer/customer_profile';
$route['update-customer-profile']='Customer/update_customer_profile';
$route['delivery-information']='Front/delivery_information';
$route['ordersuccess']='Front/ordersuccess';
$route['place-order']='Front/place_order';
$route['order-success/(:any)']='Front/ordersuccess/$1';
$route['order-failure/(:any)']='Front/orderfailure/$1';
$route['products/search/(:any)']='Front/searchpro/$1';
$route['payment-responseccave']='Front/paymentresponseccave';
$route['cancelpayment-responseccave']='Front/paymentresponseccave';


$route['change_pass']='Admin/change_pass';
$route['save_password']='Admin/save_password';
$route['logout']='Admin/logout';

$route['admin/brands']='Brands/index';

$route['admin/brands/add']='Brands/add';

$route['admin/brands/edit/(:num)']='Brands/edit/$1';

$route['admin/brands/delete/(:num)']='Brands/delete/$1';

$route['admin/brands/view/(:num)']='Brands/view/$1';



$route['admin/faqcategory']='Faqcategory/index';

$route['admin/faqcategory/add']='Faqcategory/add';

$route['admin/faqcategory/edit/(:num)']='Faqcategory/edit/$1';

$route['admin/faqcategory/delete/(:num)']='Faqcategory/delete/$1';

$route['admin/faqcategory/view/(:num)']='Faqcategory/view/$1';



$route['admin/faq']='Faq/index';

$route['admin/faq/add']='Faq/add';

$route['admin/faq/edit/(:num)']='Faq/edit/$1';

$route['admin/faq/delete/(:num)']='Faq/delete/$1';

$route['admin/faq/view/(:num)']='Faq/view/$1';





$route['admin/products']='Products/index';

$route['admin/products/add']='Products/add';

$route['admin/products/edit/(:num)']='Products/edit/$1';

$route['admin/products/delete/(:num)']='Products/delete/$1';

$route['admin/products/view/(:num)']='Products/view/$1';

$route['admin/products/delete_image/(:num)']='Products/delete_image/$1';



$route['admin/coupon']='Coupon/index';

$route['admin/coupon/add']='Coupon/add';

$route['admin/coupon/edit/(:num)']='Coupon/edit/$1';

$route['admin/coupon/delete/(:num)']='Coupon/delete/$1';

$route['admin/coupon/view/(:num)']='Coupon/view/$1';



$route['admin/productcategory']='Productcategory/index';

$route['admin/productcategory/add']='Productcategory/add';

$route['admin/productcategory/edit/(:num)']='Productcategory/edit/$1';

$route['admin/productcategory/delete/(:num)']='Productcategory/delete/$1';

$route['admin/productcategory/view/(:num)']='Productcategory/view/$1';


$route['admin/pincodes']='Pincode/index';

$route['admin/pincodes/add']='Pincode/add';

$route['admin/pincodes/edit/(:num)']='Pincode/edit/$1';

$route['admin/pincodes/delete/(:num)']='Pincode/delete/$1';

$route['admin/pincodes/view/(:num)']='Pincode/view/$1';


$route['admin/slider/product/(:num)']='Slider/add/$1';
$route['admin/slider/category/(:num)']='Slider/add/$1';
$route['admin/slider/add']='Slider/add';
$route['admin/slider']='Slider/index';
$route['admin/slider/edit/(:num)']='Slider/edit/$1';
$route['admin/slider/delete/(:num)']='Slider/delete/$1';


$route['admin/orders/new-orders']='Orders/new_orders';
$route['admin/orders/processing-orders']='Orders/processing_orders';
$route['admin/orders/completed-orders']='Orders/completed_orders';
$route['admin/orders/view/(:any)']='Orders/view/$1';
$route['admin/orders/cancel/(:any)']='Orders/cancel/$1';
$route['admin/orders/approve_order/(:any)']='Orders/approve_order/$1';
$route['admin/orders/cancelled-orders']='Orders/cancelled_orders';
$route['admin/orders/send_email/(:any)']='Orders/send_email/$1';
$route['admin/orders/completed/(:any)']='Orders/completed/$1';


$route['view-file']='File/index';
$route['add-catalog']='File/addCatalog';
$route['add-pricelist']='File/addPriceList';
$route['view-pricelist']='File/viewpricelist';
$route['del-pricelist/(:num)']='File/delpricelist/$1';
$route['del-catlist/(:num)']='File/delcatist/$1';
$route['files']='File/viewFilePage';


$route['admin/information']='Information/index';

$route['admin/information/add']='Information/add';

$route['admin/information/edit/(:num)']='Information/edit/$1';

$route['admin/information/delete/(:num)']='Information/delete/$1';

$route['admin/information/view/(:num)']='Information/view/$1';


$route['info/(:any)']='Front/info/$1';

$route['default_controller'] = 'Admin';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;



$route['aboutus']='Front/aboutus';

$route['faqs']='Front/faqs';

$route['privacy_policy']='Front/privacy_policy';

$route['termscondition']='Front/termscondition';

$route['contactus']='Front/contactus';

$route['my_profile']='Front/my_profile';

$route['my_order']='Customer/my_order';

$route['order_detail/(:any)']='Customer/order_detail/$1';

$route['product/(:any)']='Front/product/$1';

$route['change_password']='Customer/change_password';

$route['signin']='Front/signin';

$route['register']='Front/register';

$route['forget_password']='Front/forget_password';

$route['wishlist']='Front/wishlist';

$route['cart_detail']='Front/cart_detail';

$route['my_addresses']='Front/my_addresses';

$route['checkout']='Front/checkout';

$route['brand/(:any)']='Front/brand_product1/$1';
$route['brand/(:any)/(:any)']='Front/brand_product/$1/$2';

$route['product_search']='Front/product_search';


$route['search-products']='Front/search_product';

$route['product']='Front/product';

$route['product_detail/(:any)']='Front/product_detail/$1';

$route['pincode']='Front/pincode_price';
