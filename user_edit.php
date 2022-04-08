
<div class="row text-gray-900">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="clearfix card-header">
                    <div class="float-right">
                        <a href="<?php echo base_url('/user/user')?>" class="btn btn-primary btn-circle pull-right">
                        <i class="fas fa-backward" data-toggle="tooltip" data-placement="bottom" title="Back To role listing Page"></i>
                        </a>
                    </div>
                    <div class="float-left">
                     <h6 class="m-0 font-weight-bold text-primary">User Management </h6>
                    </div>                                      
                </div>
                <div class="card-body">                
                <form class="needs-validation" novalidate action="<?php echo site_url('user/user/update_user');?>" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">           
                    

                    <div class="form-group row">
                        <div class="col-sm-4">
                        <label>User Name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="user_name" placeholder="User Name" required value="<?php echo $data['user_details'][0]->user_name?>">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Password</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="password" placeholder="password" required value="<?php echo $data['user_details'][0]->password?>">
                        </div>
                   
                    
                        <div class="col-sm-4">
                        <label>First name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="first_name" placeholder="first_name" required value="<?php echo $data['user_details'][0]->first_name?>">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Middle Name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="middle_name" placeholder="Roles Name"  value="<?php echo $data['user_details'][0]->middle_name?>">
                        </div>
                   
                    
                        <div class="col-sm-4">
                        <label>Last Name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="last_name" placeholder="Roles Name" required value="<?php echo $data['user_details'][0]->last_name?>">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Email</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="email" placeholder="Roles Name" required value="<?php echo $data['user_details'][0]->email?>">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Designation </label><label style="color:red">*</label>
                        <select class="form-control" id="designation" name="designation" required>
                        <option>-- Select option --</option>
                        <?php foreach($data['designation'] as $designation){?>
                                <option value="<?php echo $designation->id;?>" <?php if($data['user_details'][0]->designation==$designation->id){echo 'selected="selected"';}?>><?php echo $designation->designation_name;?></option>
                        <?php } ?>
                        
                        </select>
                        </div>
                    
                    
                    
                        <div class="col-sm-4">
                        <label>Role id</label><label style="color:red">*</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                        <option>-- Select option --</option>
                        <?php foreach($data['roles'] as $role){?>
                                <option value="<?php echo $role->id;?>" <?php if($data['user_details'][0]->role_id==$role->id){echo 'selected="selected"';}?>><?php echo $role->role_name;?></option>
                        <?php } ?>
                        
                        </select>
                        </div>
                    
                     <input type="hidden" value="<?php echo $data['user_details'][0]->id?>" name="user_id">
                   
                        <div class="col-sm-4">
                        <label>User Status</label><label style="color:red">*</label>
                        <select class="form-control" required name="is_active"> 
                                <option value="1" <?php echo ($data['user_details'][0]->is_active=='1' ? "selected":"");?>>Active</option>
                                <option value="0" <?php echo ($data['user_details'][0]->is_active=='0' ? "selected":"");?>>Inactive</option>            
                        </select>
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
               
