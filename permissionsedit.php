

<div class="row text-gray-900">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="clearfix card-header">
                    <div class="float-right">
                        <a href="<?php echo base_url('/user/permission')?>" class="btn btn-primary btn-circle pull-right">
                        <i class="fas fa-backward" data-toggle="tooltip" data-placement="bottom" title="Back To page listing Page"></i>
                        </a>
                    </div>
                    <div class="float-left">
                     <h6 class="m-0 font-weight-bold text-primary">Permission Management </h6>
                    </div>                                      
                </div>
                <div class="card-body">                
                <form class="needs-validation" novalidate action="<?php echo site_url('user/permission/update_permission');?>" method="POST">
                <input type= "hidden" name = "permission_id" value="<?php echo $data['permission_details'][0]->id?>">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">           
                    
                  <div class="form-group row">
                        <div class="col-sm-4">
                        <label>Menu</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="menu_name" placeholder="action" required value="<?php echo $data['permission_details'][0]->menu_name?>">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Submenu</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="submenu" placeholder="action" required value="<?php echo $data['permission_details'][0]->submenu?>">
                        </div>
                    
                   
                        <div class="col-sm-4">
                        <label>Page name </label><label style="color:red">*</label>
                        <select class="form-control" id="page_name" name="page_name" required>
                        <option>-- Select option --</option>
                        <?php foreach($data['pages'] as $page){?>
                                <option value="<?php echo $page->id;?>" <?php if($data['permission_details'][0]->page_name==$page->id){echo 'selected="selected"';}?>><?php echo $page->location;?></option>
                        <?php } ?>
                        
                        </select>
                        </div>
                    
                   
                        <div class="col-sm-4">
                        <label>Link Page</label><label style="color:red">*</label>
                        <select class="form-control" required name="link_page"> 
                                <option value="yes" <?php echo ($data['permission_details'][0]->link_page=='1' ? "selected":"");?>>yes</option>
                                <option value="no" <?php echo ($data['permission_details'][0]->link_page=='0' ? "selected":"");?>>no</option>                
                        </select>
                        </div>                        
                   
                   
                        <div class="col-sm-4">
                        <label>order_no</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="order_no" placeholder="action" required value="<?php echo $data['permission_details'][0]->order_no?>">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Action</label><label style="color:red">*</label>
                        <select class="form-control" required name="action">
                        <option>-- Select option --</option> 
                                <option value="add" <?php echo ($data['permission_details'][0]->action=='add' ? "selected":"");?>>add</option>
                                <option value="edit" <?php echo ($data['permission_details'][0]->action=='edit' ? "selected":"");?>>edit</option>
                                <option value="delete" <?php echo ($data['permission_details'][0]->action=='delete' ? "selected":"");?>>delete</option>
                                <option value="deleteview" <?php echo ($data['permission_details'][0]->action=='deleteview' ? "selected":"");?>>deleteview</option>            
                        </select>
                        </div>                        
                   
                    
                        <div class="col-sm-4">
                        <label>Description</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="description" placeholder="description" required value="<?php echo $data['permission_details'][0]->description?>">
                        </div>
                    </div>
                    
                  
                   
                    
                    <div class="form-group row">
                        
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                        </div>
                        <div class="col-sm-3">
                            <input type="reset" id="reset" class="btn btn-user btn-block btn-secondary" value="Reset">
                        </div>                        
                    </div>                    
                </form>
                </div>
            </div>
        </div>    
    </div>
         
    </div>
               
   