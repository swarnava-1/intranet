
<div class="row text-gray-900">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="clearfix card-header">
                    <div class="float-right">
                        <a href="<?php echo base_url('/user/designation/add')?>" class="btn btn-primary btn-circle pull-right">
                        <i class="fas fa-backward" data-toggle="tooltip" data-placement="bottom" title="Back To role listing Page"></i>
                        </a>
                    </div>
                    <div class="float-left">
                     <h6 class="m-0 font-weight-bold text-primary">Designation Management </h6>
                    </div>                                      
                </div>
                <div class="card-body">                
                <form class="needs-validation" novalidate action="<?php echo site_url('user/designation/insert_designation');?>" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">           
                    

                    <div class="form-group row">
                        <div class="col-sm-6">
                        <label>Designation Name</label><label style="color:red">*</label>
                        <input type="text" class="form-control" required="" name="designation_name" placeholder="Designation Name" required value="">
                        </div>
                    
                   
                        <div class="col-sm-6">
                        <label>Designation Status</label><label style="color:red">*</label>
                        <select class="form-control" required name="is_active"> 
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
               
