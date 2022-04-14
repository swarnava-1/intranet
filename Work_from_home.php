<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author: Swarnava Banerjee
 * FileName: User.php
 * Function: Controller for manging users login
 * Created: 21/03/2022
 *
 *
 * Dependencies:
 *
 * Modified on: 21/03/2022
 * Modified by:Swarnava Banerjee
 *
 * Scripting language: PHP5
 * Tested on: PHP version  7.2.25, Apache 2, Windows.
 *
 */

class Work_from_home extends MY_Controller {

	function __construct()
	{		
		parent::__construct();

		$this->load->module('layout');	
		$this->load->model('wfh_model');
        $this->load->model('user_model');
	}

	public function index()
	{
        $user_id=$this->session->userdata('id');
        $data['wfh']= $this->wfh_model->get_all_wfh();
        $data['total_wfh']= $this->wfh_model->get_all_total_wfh($user_id);
       // $data['leaves']= $this->leave_model->get_all_total_leave($user_id);
       // echo'<pre>';print_r($data['leaves']);die;
		$this->layout->load($data)->render();
	}
	public function add(){
		$user_id=$this->session->userdata('id');
        $data['users']= $this->wfh_model->get_all_users($user_id);
		$this->layout->load($data)->render();
    }
    public function insert_work_from_home() {
       
        if($this->input->post())
            {
                $user_id=$this->session->userdata('id');
                $data['wfh_purpose']=$this->input->post('wfh_purpose');
                $data['wfh_date_from']=$this->input->post('wfh_date_from');
                $data['wfh_date_to']=$this->input->post('wfh_date_to');
				$approved_to =implode(",",$this->input->post('approved_to'));
                $data['approved_to']=$approved_to;
				$data['wfh_status']=$this->input->post('wfh_status');
				$data['approved_by']=$this->input->post('approved_by');
                //echo '<pre>';print_r($data);die;
                $diff= strtotime($data['wfh_date_from'])-strtotime($data['wfh_date_to']);
                         $day= abs(round($diff / 86400)) + 1;
                        $current_d= date("Y/m/d") ;
                        $first_day = new DateTime('first day of this month');
                         $first_day->format('jS, F Y');
                      
                       
                      
                        if( $day>2)
                        {
                            $messge = array('message' => 'More than 2 wfh added already ','class' => 'alert alert-danger fade in');  
                            $this->session->set_flashdata('work_from_home', $messge);
                            redirect('/user/work_from_home');
                        }
                        else
                        {
                            $response=$this->wfh_model->add_wfh($data);
                        }
                            if($response==true){
                    
                       
                        
                    if($data['wfh_status']==1)
                    {
                       
                        $curent_wfh = $this->wfh_model->get_curent_wfh($user_id);
                        $wfh=$curent_wfh[0]->wfh_count;
                        $now_date_count =  $wfh-$day;
                        $day_data = array('wfh_count'=>$now_date_count);
                        $this->wfh_model->update_day($day_data,$user_id);
                       
                    }
                
                    
                    $messge = array('message' => 'work from home inserted successfull.','class' => 'alert alert-success fade in');  
                    $this->session->set_flashdata('work_from_home', $messge);
                    redirect('/user/work_from_home');

                }
                else{
                    $messge = array('message' => 'Something went wrong...!!!','class' => 'alert alert-danger fade in');  
                    $this->session->set_flashdata('work_from_home', $messge);
                    redirect('/user/work_from_home');
                    
                }
            }
                      
        }
		public function edit() {  
            $id = $this->uri->segment(4);
			$user_id=$this->session->userdata('id');
            $data['users']= $this->wfh_model->get_all_users($user_id);
            $data['wfh']=$this->wfh_model->get_wfh_by_id($id);
            //echo '<pre>';print_r($data['role_details']);die;
            $this->layout->load($data)->render();         
        }
    
        public function update_wfh(){
            $id = $this->input->post('wfh_id');
            $user_id=$this->session->userdata('id');
			$data['wfh_purpose']=$this->input->post('wfh_purpose');
			$data['wfh_date_from']=$this->input->post('wfh_date_from');
			$data['wfh_date_to']=$this->input->post('wfh_date_to');
			$approved_to =implode(",",$this->input->post('approved_to'));
			$data['approved_to']=$approved_to;
			$data['wfh_status']=$this->input->post('wfh_status');
			$data['approved_by']=$this->input->post('approved_by');
            //echo '<pre>';print_r($data);die;
            $diff= strtotime($data['wfh_date_from'])-strtotime($data['wfh_date_to']);
            echo $day= abs(round($diff / 86400)) + 1;
            if( $day>2)
            {
                $messge = array('message' => 'More than 2 wfh added already ','class' => 'alert alert-danger fade in');  
                $this->session->set_flashdata('work_from_home', $messge);
                redirect('/user/work_from_home');
            }
            else
            {
                $response=$this->wfh_model->update_wfh($data,$id);
            }
            if($response==true){
                if($data['wfh_status']==1)
                {
                    
                    $curent_wfh = $this->wfh_model->get_curent_wfh($user_id);
                    $wfh=$curent_wfh[0]->wfh_count;
                    $now_date_count =  $wfh-$day;
                    $day_data = array('wfh_count'=>$now_date_count);
                    $this->wfh_model->update_day($day_data,$user_id);
                }
                $messge = array('message' => 'Work from home updated  successfull.','class' => 'alert alert-success fade in');  
                $this->session->set_flashdata('work_from_home', $messge);
                redirect('/user/work_from_home');
            }
            else{
                $messge = array('message' => 'Something went wrong...!!!','class' => 'alert alert-danger fade in');  
                $this->session->set_flashdata('work_from_home', $messge);
                redirect('/user/work_from_home');
            }
        }
		public function remove_wfh(){
            $wfh_id = $this->uri->segment(4);
            $rec = $this->wfh_model->remove_wfh($wfh_id);
            $messge = array('message' => 'Work from home successfully deleted','class' => 'alert alert-danger fade in');  
               $this->session->set_flashdata('work_from_home', $messge);
           return $rec;
       }    
    
	}