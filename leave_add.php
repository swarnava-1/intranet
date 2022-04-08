<!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
	<script type="text/javascript">
		$('select').selectpicker();
	</script>
</head>



<div class="row text-gray-900">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="clearfix card-header">
                    <div class="float-right">
                        <a href="<?php echo base_url('/user/leave/')?>" class="btn btn-primary btn-circle pull-right">
                        <i class="fas fa-backward" data-toggle="tooltip" data-placement="bottom" title="Back To leave listing Page"></i>
                        </a>
                    </div>
                    <div class="float-left">
                     <h6 class="m-0 font-weight-bold text-primary">Leave Management </h6>
                    </div>                                      
                </div>
                <div class="card-body">   
                <form class="needs-validation" novalidate action="<?php echo site_url('user/leave/insert_leave');?>" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">           
                    
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3">
                            <label>Leave type</label><label style="color:red">*</label>
                            <select class="form-control" required name="leave_type"> 
                                <option value="casual">Casual Leave</option>
                                <option value="medical">Medical Leave </option>            
                        </select>
                        </div> 
                        <div class="col-sm-4 mb-3">
                            <label>Leave Purpose</label><label style="color:red">*</label>
                            <input type="text" class="form-control" required="" name="leave_purpose" placeholder="purpose " required value="">
                        </div> 
                        <div class="col-sm-4 mb-3">
                         <label>Leave Date From</label><label style="color:red">*</label>
                         <input type="date" class="form-control" required="" name="leave_date_from" placeholder="Leave Date From " required value="">
                        </div>
                        <div class="col-sm-4 mb-3">
                         <label>Leave Date to</label><label style="color:red">*</label>
                        <input type="date" class="form-control" required="" name="leave_date_to" placeholder="purpose " required value="">
                        </div> 
                        <div class="col-md-4 mb-3">
                        <label>Approved to </label><label style="color:red">*</label>
                        <select class="form-control form-control-select selectpicker" multiple data-live-search="true" id="approved_to" name="approved_to[]" required>
                        <option value="">Select </option>
                        <?php foreach($data['users'] as $user){?>
                                <option value="<?php echo $user->id;?>"><?php echo $user->full_name;?></option>
                        <?php } ?>
                        </select>
                        </div>  
                        <div class="col-sm-4">
                         <label>Leave Status</label><label style="color:red">*</label>
                         <select class="form-control" required name="leave_status"> 
                                <option value="1">Accepted</option>
                                <option value="0">Rejected</option>            
                        </select>
                        </div>
                        <div class="col-md-4 mb-3">
                        <label>Approved by </label><label style="color:red">*</label>
                        <select class="form-control "  id="approved_by" name="approved_by" required>
                        <option value="">Select </option>
                        <?php foreach($data['users'] as $user){?>
                                <option value="<?php echo $user->id;?>"><?php echo $user->full_name;?></option>
                        <?php } ?>
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
               
