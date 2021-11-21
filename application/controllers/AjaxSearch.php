<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: *');
header("Access-Control-Allow-Headers: *");
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxSearch extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();
    }


    public function search(){

        $search=  $this->input->post('search');
        $data = $this->db->select('products.product_name as name,url')->from('products')->where("searchkeyword LIKE '%$search%'")->get()->result_array();

        echo json_encode ($data);
    }



  //   public function searchData(){
  //   	$s1=$_REQUEST["n"];
		// $select_query="select name from productcategory where name like '%".$s1."%'";
		// // $select_query=$this->db->select('productcategory.name')->from('productcategory')->where("name LIKE '%$s1%'")->get()->result_array();
		// $sql=mysql_query($select_query) or die (mysql_error());
		// $s="";
		// while($row=mysql_fetch_array($sql))
		// {
		// 	$s=$s."
		// 	<a class='link-p-colr' href='view.php?product=".$row['id']."'>
		// 		<div class='live-outer'>
		//             	<div class='live-im'>
		//                 	<img src='imeg/".$row['pro_image']."'/>
		//                 </div>
		//                 <div class='live-product-det'>
		//                 	<div class='live-product-name'>
		//                     	<p>".$row['name']."</p>
		//                     </div>
		//                     <div class='live-product-price'>
		// 						<div class='live-product-price-text'><p>Rs.".number_format($row['price'])."</p></div>
		//                     </div>
		//                 </div>
		//             </div>
		// 	</a>
		// 	"	;
		// }
		// echo $s;
  //   }
   
}