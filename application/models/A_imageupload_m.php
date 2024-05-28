<?php
Class A_imageupload_m extends CI_Model
{
	
	
	public function data_insert() {
        
		$error='';
			
		$title = $this->input->post('title');
		$post_author = $this->input->post('post_author');
		$post_date = $this->input->post('post_date');				
		$post_parent = $this->input->post('post_parent');
		$content = $this->input->post('content');
		$post_sub_content = $this->input->post('post_sub_content');	
		$blogtype='blog';				
		$slug = $this->tags->setslug($title);
		$btags = $this->tags->settag($this->input->post('btags'));
		
		if(empty($title)) $error='Title Required';
		else if(empty($slug)) $error='Title Required';
		else if(empty($post_parent)) $error='Select Category';
		else if(empty($post_date)) $error='Select Date';
		else if(empty($post_author)) $error='Select Author';
		else if( $this->check_post($blogtype,$slug) > 0) $error='Content Exists';				
		else if(empty($content)) $error='Detail Required';
		
		if(!empty($error)){
			echo $error;
			exit;		
		}
		
		//Setting values for tabel columns
		$data = array(
			'post_author' => $post_author,
			'post_date' => $post_date,
			'post_date_gmt' => '',
			'post_content' => $content,
			'post_sub_content' => $post_sub_content,
			'post_title' => $title,
			'post_name' => $slug,
			'post_status' => 'inherit',
			'comment_status' => 'open',
			'ping_status' => 'open',
			'post_parent' => $post_parent,
			'post_type' => $blogtype,
			'post_mime_type' => '',
			'comment_count' => '0',
			'btags' => $btags
		);
		//Transfering data to Model
		$this->db->insert('site_airticle_image', $data);	
		
		$id = $this->db->insert_id();
		$extension = end(explode(".", $_FILES["uploadfile"]["name"]));
		$post_author=$post_author;
		$uploadfolder = './user/images/users/user'.$post_author.'/blog/';
		$bigimg = $id.'.'.$extension;
		$file = $uploadfolder . $bigimg; 
		$file1 = $uploadfolder .'thumb1/' . $bigimg;
		$file2 = $uploadfolder .'thumb2/' . $bigimg;
					
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {			  				
			
			$this->imagecrop->thumb_image($file,$file1,$_FILES['uploadfile']['type'], $this->config->item('BL_THUMB1_WIDTH'), $this->config->item('BL_THUMB1_HEIGHT') );
			$this->imagecrop->thumb_image($file,$file2,$_FILES['uploadfile']['type'],$this->config->item('BL_THUMB2_WIDTH'),$this->config->item('BL_THUMB2_HEIGHT'));				
			$this->imagecrop->thumb_image_width($file,$file,$_FILES['uploadfile']['type'],$this->config->item('BL_THUMB4_WIDTH'));
			
			$data = array(				
				'image_upload' => $bigimg
			);
			
			$this->db->where('ID', $id);
			$this->db->update('site_airticle_image', $data);
			
		}		
		
		echo 'Create Successful';
			
   	} // End of function
	

	public function image_upload( $data) {
		
		$this->db->trans_start();
		$this->db->insert('site_airticle_image', $data);
		$this->db->trans_complete();
				
   	} // End of function


	public function deleted( $id ) {
		
		//Setting values for tabel columns		
		$this->db->where('ID', $id);
		$this->db->delete('site_airticle_image');
		
		
   	} // End of function

	
	
	public function record_count($post_author) {
        //$src=strtolower($src);
		$query = $this -> db -> query("select COUNT(id) AS ID from site_airticle_image where userid='".$post_author."' ");
        if ($query->num_rows() == 0)
            return '0';
        $row = $query->row();
        return $row->ID;
    } // End of function
	
	public function fetch_list($limit, $start, $post_author) {
		$this->db->limit($limit, $start); 		
		$this -> db -> select('*');
		$this -> db -> from('site_airticle_image');
		$this -> db -> where('userid = ' . "'" . $post_author . "'");
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	}

											
	
}//end of Class 
?>