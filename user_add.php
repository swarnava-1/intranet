
<div class="row text-gray-900">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="clearfix card-header">
                    <div class="float-right">
                        <a href="<?php echo base_url('/user/user/add')?>" class="btn btn-primary btn-circle pull-right">
                        <i class="fas fa-backward" data-toggle="tooltip" data-placement="bottom" title="Back To role listing Page"></i>
                        </a>
                    </div>
                    <div class="float-left">
                     <h6 class="m-0 font-weight-bold text-primary">User Management </h6>
                    </div>                                      
                </div>
                <div class="card-body">                
                <form class="needs-validation" novalidate action="<?php echo site_url('user/user/insert_user');?>" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">           
                    

                    <div class="form-group row">
                        <div class="col-sm-4">
                        <label>User Name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="user_name" placeholder="User Name" required value="">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Password</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="password" placeholder="password" required value="">
                        </div>
                   
                    
                        <div class="col-sm-4">
                        <label>First name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="first_name" placeholder="first name" required value="">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Middle name</label><label style="color:red"></label>
                        <input type="text" class="form-control"  name="middle_name" placeholder=" middle_name"  value="">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Last name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="last_name" placeholder="last_name" required value="">
                        </div>
                   
                    
                        <div class="col-sm-4">
                        <label>Email</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="email" placeholder="email" required value="">
                        </div>
                    
                    
                        <div class="col-sm-4">
                        <label>Role id</label><label style="color:red">*</label>
                        <select class="form-control" required="" id="role_id" name="role_id" required>
                        <option value="">Select Role</option>
                        <?php foreach($data['roles'] as $role){?>
                                <option value="<?php echo $role->id;?>"><?php echo $role->role_name;?></option>
                        <?php } ?>
                        </select>
                        </div>
                   
                    
                   
                        <div class="col-sm-4">
                        <label>Designation </label><label style="color:red">*</label>
                        <select class="form-control" required="" id="designation" name="designation" required>
                        <option value="">Select Designation</option>
                        <?php foreach($data['designation'] as $designation){?>
                                <option value="<?php echo $designation->id;?>"><?php echo $designation->designation_name;?></option>
                                
                        <?php } ?>
                        </select>
                        </div>
                    
                    
                
                    
                        <div class="col-sm-4">
                        <label>User Status</label><label style="color:red">*</label>
                        <select class="form-control" required name="is_active" required> 
                        <option value="">Select status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>            
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
               
