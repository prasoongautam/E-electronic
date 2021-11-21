<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Products extends CI_Controller 

{

	 function __construct() 

	 {

        parent::__construct();

        $this->load->database();

    
$x=$this->session->userdata('iletsadmin');
        if( $x['role']!=1)
        {
            return redirect('admin', 'refresh');
        }

    }



    public function getcategory()

    {

        $cat=$this->db->select('id,name as label,name as value')->from('productcategory')->where('status','Active')->like('name',$_GET['term'])->get()->result_array();

        echo json_encode($cat);

    }



    public function index()

    {

        $query=$this->db->select('products.product_name,products.id,products.status,products.price,productcategory.name as cat')->from('products')->join('procat','products.id=procat.product_id')->join('productcategory','procat.category_id=productcategory.id')->order_by('products.id','desc')->get();

        $data['products']=$query->result_array();

       

        $this->load->view('admin/products/index',$data);

    }



    public function add()

    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') 

        {

         $this->load->helper(array('form'));

         $this->load->library('form_validation');

         $this->form_validation->set_rules('product_name', 'Product Name', 'required'); 

         $this->form_validation->set_rules('price', 'Price', 'required'); 

         $this->form_validation->set_rules('category_ids', 'Category', 'required');

         $this->form_validation->set_rules('specification', 'Specification', 'required'); 

         $this->form_validation->set_rules('url', 'URL', 'required');

            if ($this->form_validation->run() == FALSE) 

             { 

                 $this->load->view('admin/products/add');

             } 

             else 

             { 

                

                unset($_POST['category']);

                $cat=$_POST['category_ids'];
                $quantity=$_POST['quantity'];
                unset($_POST['quantity']);
                unset($_POST['category_ids']);
                              if($_FILES['main_image']['name']!='')

                {

                    $ext=pathinfo($_FILES['main_image']['name'],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $_FILES['main_image']['name']);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

                $config['file_name'] = time() . $jname.'.'.$ext;

                $config['upload_path'] = './uploads/products/';

                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

                $this->upload->initialize($config);

                $this->upload->do_upload('main_image');

                $_POST['main_image'] = $config['file_name'];

                }

                if($this->db->insert('products',$_POST))

                {

                     $id=$this->db->insert_id();

               

                    $dataInfo = array();

                $files = $_FILES;

                $cpt = count($_FILES['image']['name']);

                 if($_FILES['image']['name'][0]!='')

                {

                if ($cpt > 0) {

                    for ($i = 0;$i < $cpt;$i++) {



                        $ext=pathinfo($files['image']['name'][$i],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $files['image']['name'][$i]);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

               

                        $_FILES['image']['name'] = time() . $jname.'.'.$ext;

                        $_FILES['image']['type'] = $files['image']['type'][$i];

                        $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];

                        $_FILES['image']['error'] = $files['image']['error'][$i];

                        $_FILES['image']['size'] = $files['image']['size'][$i];

                        $this->upload->initialize($this->set_upload_options());

                        $this->upload->do_upload('image');

                        $dataInfo[] = $_FILES['image']['name'];

                        $this->db->insert('product_image',['product_id'=>$id,'image'=>$_FILES['image']['name']]);



                    }

                    

                }

                }



                $category=explode(',',$cat);

                array_pop($category);

                foreach($category as $c)

                {

                    $this->db->insert('procat',['product_id'=>$id,'category_id'=>$c]);

                }

                $this->db->insert('product_quantity',['product_id'=>$id,'quantity'=>$quantity]);

                    $this->session->set_flashdata('msg', 'products Successfully Added');

                    return redirect(base_url('admin/products'),'refresh');

                }

                else

                {

                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');

                    return redirect(base_url('admin/products/add'),'refresh');

                }

             } 

        }

        else

        {

            $this->load->view('admin/products/add');

        }

    }



    public function edit($id='')

    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') 

        {

         $this->load->helper(array('form'));

         $this->load->library('form_validation');

         $this->form_validation->set_rules('product_name', 'Product Name', 'required'); 

         $this->form_validation->set_rules('price', 'Price', 'required'); 

         $this->form_validation->set_rules('category_ids', 'Category', 'required');

         $this->form_validation->set_rules('specification', 'Specification', 'required'); 

         $this->form_validation->set_rules('url', 'URL', 'required');

            if ($this->form_validation->run() == FALSE) 

             { 

                 $data['products']=$this->db->where('id',$id)->get('products')->row_array();

                 $this->load->view('admin/products/edit',$data);

             } 

             else 
             { 

                 

                unset($_POST['category']);

                $cat=$_POST['category_ids'];

                unset($_POST['category_ids']);

                $quantity=$_POST['quantity'];
                unset($_POST['quantity']);
                      if($_FILES['main_image']['name']!='')

                {

                    $ext=pathinfo($_FILES['main_image']['name'],PATHINFO_EXTENSION);

                     $journalName = str_replace(' ', '_', $_FILES['main_image']['name']);

                     $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

                $config['file_name'] = time() . $jname.'.'.$ext;

                $config['upload_path'] = './uploads/products/';

                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

                $this->upload->initialize($config);

                $this->upload->do_upload('main_image');

                $_POST['main_image'] = $config['file_name'];

                }

                if($this->db->where('id',$id)->update('products',$_POST))

                {
               
                     $dataInfo = array();

                $files = $_FILES;
                //print_r($files);exit;
                $cpt = count($_FILES['image']['name']);

                 if($_FILES['image']['name'][0]!='')

                {

                if ($cpt > 0) {

                    for ($i = 0;$i < $cpt;$i++) {



                        $ext=pathinfo($files['image']['name'][$i],PATHINFO_EXTENSION);

                      $journalName = str_replace(' ', '_', $files['image']['name'][$i]);

                      $jname=preg_replace('/[^A-Za-z0-9\-]/', '', $journalName);

               
                     $iname=time() . $jname.'.'.$ext;
                        $_FILES['image']['name'] = $iname;

                        $_FILES['image']['type'] = $files['image']['type'][$i];

                        $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];

                        $_FILES['image']['error'] = $files['image']['error'][$i];

                        $_FILES['image']['size'] = $files['image']['size'][$i];

                        $this->upload->initialize($this->set_upload_options());

                        $this->upload->do_upload('image');

                        $dataInfo[] = $_FILES['image']['name'];

                        $this->db->insert('product_image',['product_id'=>$id,'image'=>$iname]);



                    }

                    //print_r($dataInfo);exit;

                }

                }



                $category=explode(',',$cat);

                array_pop($category);

                foreach($category as $c)

                {
                    $avail=$this->db->where(['product_id'=>$id,'category_id'=>$c])->get('procat')->row_array();
                    if(empty($avail))
                    {
                    $this->db->insert('procat',['product_id'=>$id,'category_id'=>$c]);
                    }

                }

                $quan=$this->db->where(['product_id'=>$id])->get('product_quantity')->row_array();
                if(empty($quan))
                {
                    $this->db->insert('product_quantity',['product_id'=>$id,'quantity'=>$quantity]);

                }
                else
                {
                    $this->db->where(['product_id'=>$id])->update('product_quantity',['product_id'=>$id,'quantity'=>$quantity]);

                }
                
                    $this->session->set_flashdata('msg', 'products Successfully Added');

                    return redirect(base_url('admin/products'),'refresh');

                }

                else

                {

                    $this->session->set_flashdata('err', 'Please try Again After SomeTimes');

                    return redirect(base_url('admin/products/edit/'.$id),'refresh');

                }

             }

        }

        else

        {

            $data['products']=$this->db->where('id',$id)->get('products')->row_array();

            $this->load->view('admin/products/edit',$data);

        }

    }



    public function view($id='')

    {

         $data['products']=$this->db->where('id',$id)->get('products')->row_array();

         $this->load->view('admin/products/view',$data);

    }



    public function delete($id='')

    {

        if($this->db->where('id',$id)->delete('products'))

        {

            $this->session->set_flashdata('msg', 'Success Deleted products');

        }

        else

        {

            $this->session->set_flashdata('err', 'Please try After Sometimes...');

        }

        return redirect(base_url('admin/products'),'refresh');

    }



     private function set_upload_options() {

        //upload an image options

        $config = array();

        $config['upload_path'] = './uploads/products/';

        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|jpeg';

        $config['max_size'] = '0';

        $config['overwrite'] = FALSE;

        return $config;

    }

    public function delete_image($id='')
    {
        $products_id=$this->db->where('id',$id)->get('product_image')->row_array()['product_id'];
        if($this->db->where('id',$id)->delete('product_image'))
        {
            $this->session->set_flashdata('msg', 'Image Deleted Successfully');
        }
        else
        {
            $this->session->set_flashdata('err', 'Please try Again After Sometimes');
        }
        return redirect(base_url('admin/products/view/'.$products_id),'refresh');
        
    }

}

