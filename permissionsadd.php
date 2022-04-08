
<div class="row text-gray-900">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="clearfix card-header">
                    <div class="float-right">
                        <a href="<?php echo base_url('/user/permission/add')?>" class="btn btn-primary btn-circle pull-right">
                        <i class="fas fa-backward" data-toggle="tooltip" data-placement="bottom" title="Back To role listing Page"></i>
                        </a>
                    </div>
                    <div class="float-left">
                     <h6 class="m-0 font-weight-bold text-primary">Permissions Management </h6>
                    </div>                                      
                </div>
                <div class="card-body">                
                <form class="needs-validation" novalidate action="<?php echo site_url('user/permission/insert_permission');?>" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">           
                    

                    <div class="form-group row">
                        <div class="col-sm-4">
                        <label>	Menu Name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="menu_name" placeholder="menu name" required value="">
                        </div>
                   
                    
                        <div class="col-sm-4">
                        <label>Submenu</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="submenu" placeholder="submenu" required value="">
                        </div>
                    
                   
                        <div class="col-sm-4">
                        <label>Page name </label><label style="color:red">*</label>
                        <select class="form-control" required="" id="page_name" name="page_name" required>
                        <option value="">Select Page</option>
                        <?php foreach($data['pages'] as $page){?>
                                <option value="<?php echo $page->id;?>"><?php echo $page->location;?></option>
                                
                        <?php } ?>
                        </select>
                        </div>
                    
                    
                        <div class="col-sm-4">
                         <label>Link page</label><label style="color:red">*</label>
                         <select class="form-control" required name="link_page">
                                <option value="">Want to link</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>

                        </select>
                        </div>                        
                    
                   
                     </select>
                   
                        <div class="col-sm-4">
                        <label>Order_no</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="order_no" placeholder="order_no" required value="">
                        </div>
                    
                    
                    
                        <div class="col-sm-4">
                        <label>	Description</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="description" placeholder="description" required value="">
                        </div>
                    
                    <!-- <label for="action">Action:</label>

                    <select name="action" id="action">
                    <option value="add">add</option>
                    <option value="edit">edit</option>
                    <option value="delete">delete</option>
                    <option value="deleteview">deleteview</option> -->
                    
                        <div class="col-sm-4">
                        <label>Action</label><label style="color:red">*</label>
                        <select class="form-control" required name="action">
                                <option value="">Select Action</option>
                                <option value="add">Add</option>
                                <option value="edit">edit</option>
                                <option value="delete">delete</option>
                                <option value="deleteview">deleteview</option>            

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
               

    
         

