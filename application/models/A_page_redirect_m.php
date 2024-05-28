<?php
class A_page_redirect_m extends CI_Model{
		
	public function has_access($id,$menu){
		$this->db->trans_start();
		$this->db->select('Grouprole_Id')
                ->from(DB_PREFIX . 'admin_user_role')
                ->where('Main_menu_id', $menu)
                ->where('Admin_id', $id);
        $query = $this->db->get();
        $result = $query->row();
    
		$this->db->trans_complete();
		if($result){
			return $result->Grouprole_Id;
		}else{
			return 0;
		}
	    
		
	}

	public function has_access_sub($id,$menu){
		$this->db->trans_start();
		$this->db->select('Sub_Menu_Access')
                ->from(DB_PREFIX . 'admin_user_sub_menu_access')
                ->where('Sub_menu_Id', $menu)
                ->where('Admin_id', $id);
        $query = $this->db->get();
        $result = $query->row();
    
		$this->db->trans_complete();
		if($result){
			return $result->Sub_Menu_Access;
		}else{
			return 0;
		}
	    
		
	}
	public function has_menu($menu){
		$this->db->trans_start();
		$this->db->select('Main_menu_id')
                ->from(DB_PREFIX . 'admin_user_main_menu')
                ->where('Main_menu_Link', $menu)
                ->where('Main_menu_Status',1);
        $query = $this->db->get();
        $result = $query->row();
    
		$this->db->trans_complete();
		if($result){
			 return $result->Main_menu_id;
		}else{
			return 0;
		}
	   
	}

		public function has_sub_menu($menu){
			$this->db->trans_start();
			$this->db->select('Sub_menu_Id')
	                ->from(DB_PREFIX . 'admin_user_sub_menu')
	                ->where('Sub_menu_Link', $menu)
	                ->where('Sub_menu_Status',1);
	        $query = $this->db->get();
	        $result = $query->row();
	    
			$this->db->trans_complete();
			if($result){
				 return $result->Sub_menu_Id;
			}else{
				return 0;
			}
		   
		}


	public function Unauthorized_access($sess_id,$link){
		$data=array(
			'Unauthorized_User_Id'=>$sess_id,
			'Link'=>$link
		);
		$this->db->trans_start();
		$this->db->insert(DB_PREFIX.'admin_user_unauthorized_access',$data);            
		$this->db->trans_complete();

	}

	public function access_accept_links(){
		$session_data = $this->session->userdata('sht_ssndata');
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

			$type_link = $_SERVER['REQUEST_URI'];
			$type_link = str_replace($this->config->item('DIRDEL'),'',$type_link);

			
			// if(in_array($actual_link,$accessed_array)){

			// }else{
				$has_menu=$this->A_page_redirect_m->has_menu($type_link);
				
				if($has_menu!=0){
				    $has_access=$this->A_page_redirect_m->has_access($session_data['id'],$has_menu);
				    if($has_access==0){
				        $this->A_page_redirect_m->Unauthorized_access($session_data['id'],$type_link);
				        redirect('admin/access_denied', 'refresh');
				    }
				}else{
						
					$has_sub_menu=$this->A_page_redirect_m->has_sub_menu($type_link);
					//echo $has_sub_menu;
					$has_access=$this->A_page_redirect_m->has_access_sub($session_data['id'],$has_sub_menu);
					// echo $has_access;
					// exit();
					if($has_access==0){
					    $this->A_page_redirect_m->Unauthorized_access($session_data['id'],$type_link);
					    redirect('admin/access_denied', 'refresh');
					};
				}
			// }
	}

	public function imageUploadLink(){
		
	}
	
	public function unlink_img($file_path,$img_name){
			$full_path=$this->config->item('IMAGE_UPLOAD_PATH_URL').$file_path.$img_name;
			return $full_path;
		}

	public function unlink_img_folderwise($file_path,$img_name){
			$full_path=$this->config->item('IMAGE_UPLOAD_BASE_PATH_URL').$file_path.$img_name;
			return $full_path;
		}

	public function get_full_path($File_Path,$Image_Name,$DB_NAME,$Check_Field,$id){
		$query=$this->db->select("$File_Path,$Image_Name")
				->from(DB_PREFIX.$DB_NAME)
				->where($Check_Field,$id)
				->get();

		return $query->row();
		
	}

										
	
}//end of Class 
?>