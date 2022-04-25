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
        //$data['monthly_wfh']= $this->wfh_model->get_all_monthly_wfh($user_id);
        //$data['month']= $this->wfh_model->get_all_month($user_id);
        $data['total_monthly_wfh']= $this->wfh_model->get_all_monthly_wfh($user_id);
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
                //          $difference = abs(strtotime($current_d) - strtotime($first_day));
                //          $years = floor($difference / (365*60*60*24));
                //          $months = floor(($difference - $years * 365*60*60*24) / (30*60*60*24));
                //  echo     $days = floor(($difference - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));die;
                // $difference=date_diff($current_d,$first_day);
                // $difference->format("%R%a days");
                    // $previous_wfh = $this->wfh_model->previous_wfh($wfh_date_to,$user_id,$wfh_date_from);
                    // // echo '<pre>';print_r($previous_wfh);die;
                    // $previous_wfh_date=$previous_wfh[0]->wfh_date_to;
                    // $previous_wfh_date_to = strtotime($previous_wfh_date);
                    // $previous_wfh_date2=$previous_wfh[0]->wfh_date_from;
                    // $previous_wfh_date_from = strtotime($previous_wfh_date2);
                    // $diff2=  $previous_wfh_date_from -$previous_wfh_date_to;
                    // $day2= abs(round($diff2 / 86400)) + 1; 

                        // if($first_day<$data['wfh_date_to']&& $data['wfh_date_to']<$current_d &&$day>1)
                        // {
                        //     $messge = array('message' => 'More than 2 wfh taken already ','class' => 'alert alert-danger fade in');  
                        //     $this->session->set_flashdata('work_from_home', $messge);
                        //     redirect('/user/work_from_home');

                        // }
                        // else   {
                          
                        
                        if( $day>2  )
                        {
                            $messge = array('message' => 'More than 2 wfh added already ','class' => 'alert alert-danger fade in');  
                            $this->session->set_flashdata('work_from_home', $messge);
                            redirect('/user/work_from_home');
                        }
                        else
                        {
                            $curent_wfh = $this->wfh_model->get_curent_wfh($user_id);
                            $wfh=$curent_wfh[0]->wfh_count;
                            $now_date_count =  $wfh-$day;
                            $day_data = array('wfh_count'=>$now_date_count);
                            //$this->wfh_model->update_day($day_data,$user_id);
                            $curent_monthly_wfh = $this->wfh_model->get_curent_monthly_wfh($user_id);
                            $wfh_monthly=$curent_monthly_wfh[0]->wfh_count;
                            $now_date_count_monthly =  $wfh_monthly-$day;
                            $day_data2 = array('wfh_count'=>$now_date_count_monthly);
                            //$this->wfh_model->update_day_monthly($day_data2,$user_id);
                           
                    
                       
                        
                    if($data['wfh_status']==1)
                    {
                       
                      
                    
                    
                    if($now_date_count_monthly<0)
                    {
                        $messge = array('message' => 'Cannot take more than 2 work from home in a month ','class' => 'alert alert-danger fade in');  
                            $this->session->set_flashdata('work_from_home', $messge);
                            redirect('/user/work_from_home');
                    }
                    else
                    $response=$this->wfh_model->add_wfh($data);
                    if($response==true){
                    $this->wfh_model->update_day($day_data,$user_id);
                    $this->wfh_model->update_day_monthly($day_data2,$user_id);
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
                $curent_wfh = $this->wfh_model->get_curent_wfh($user_id);
                $wfh=$curent_wfh[0]->wfh_count;
                $now_date_count =  $wfh-$day;
                $day_data = array('wfh_count'=>$now_date_count);
                //$this->wfh_model->update_day($day_data,$user_id);
                $curent_monthly_wfh = $this->wfh_model->get_curent_monthly_wfh($user_id);
                $wfh_monthly=$curent_monthly_wfh[0]->wfh_count;
                $now_date_count_monthly =  $wfh_monthly-$day;
                $day_data2 = array('wfh_count'=>$now_date_count_monthly);
                //$this->wfh_model->update_day_monthly($day_data2,$user_id);
              
                if($data['wfh_status']==1)
                {
                if($now_date_count_monthly<0)
                {
                    $messge = array('message' => 'Cannot take more than 2 work from home in a month ','class' => 'alert alert-danger fade in');  
                    $this->session->set_flashdata('work_from_home', $messge);
                    redirect('/user/work_from_home');
            }
            else
            $response=$this->wfh_model->update_wfh($data,$id);
            if($response==true){
            $this->wfh_model->update_day($day_data,$user_id);
            $this->wfh_model->update_day_monthly($day_data2,$user_id);
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
        }
		public function remove_wfh(){
            $wfh_id = $this->uri->segment(4);
            $rec = $this->wfh_model->remove_wfh($wfh_id);
            $messge = array('message' => 'Work from home successfully deleted','class' => 'alert alert-danger fade in');  
               $this->session->set_flashdata('work_from_home', $messge);
           return $rec;
       }    
    
	}