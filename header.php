<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3"><img src="<?php echo base_url();?>assets/img/logo.jpg" alt=""/></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<!-- <li class="nav-item">
    <a class="nav-link active" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li> -->
<!-- <li class="nav-item">
    <a class="nav-link " href="agent.html">
        <i class="fas fa-user-tie"></i>
        <span>Agent</span></a>
</li> -->
<li class="nav-item ">
    <a class="nav-link" href="<?php echo base_url();?>user/dashboard">
        <i class="fas fa-street-view"></i>
        <span>Dashboard</span></a>
</li>
<!-- <li class="nav-item">
    <a class="nav-link" href="castingDirector.html">
        <i class="fas fa-user-alt"></i>
        <span>Casting Director</span></a>
</li> -->
<li class="nav-item">
    <div class="nav-link">
        
    <div class="dropdown">
    <i class="fas fa-vote-yea"></i><span class="dropdown-toggle" data-toggle="dropdown">
    Access Control</span>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="<?php echo base_url();?>user/user">User</a>
      <a class="dropdown-item" href="<?php echo base_url();?>user/role">Role</a>
      <a class="dropdown-item" href="<?php echo base_url();?>user/designation">Designation</a>
      <a class="dropdown-item" href="<?php echo base_url();?>user/page">Page</a>
      <a class="dropdown-item" href="<?php echo base_url();?>user/permission">Permission</a>
      <a class="dropdown-item" href="<?php echo base_url();?>user/Rolepermission">Rolepermission</a>
    </div>
  </div>
</div>
</li>
<li class="nav-item">
    <div class="nav-link">
        
    <div class="dropdown">
    <i class="fas fa-vote-yea"></i><span class="dropdown-toggle" data-toggle="dropdown">
    Leave</span>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="<?php echo base_url();?>user/leave">Leave Application form</a>
     
      
    </div>
  </div>
</div>
</li>
<li class="nav-item">
    <div class="nav-link">
        
    <div class="dropdown">
    <i class="fas fa-vote-yea"></i><span class="dropdown-toggle" data-toggle="dropdown">
    Work from home</span>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="<?php echo base_url();?>user/work_from_home">Work From Home Application form</a>
     
      
    </div>
  </div>
</div>
</li>


<!-- <li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-podcast"></i>
        <span>Project Wide Role</span></a>
</li> -->

<!-- Sidebar Toggler (Sidebar) -->
<!-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->

</ul>
<!-- End of Sidebar -->

