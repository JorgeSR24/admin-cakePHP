 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?= $this->Url->build('/admin', ["fullBase"=> true]);   ?>" class="brand-link">

   <?=
      $this->Html->image('/dist/img/AdminLTELogo.png',[
        "alt"   => "AdminLTE Logo",
        "class" => "brand-image img-circle elevation-3",
        "style" => "opacity: .8"
      ])
   ?>
     <span class="brand-text font-weight-light">AcademicManager</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
        <?=
      $this->Html->image('/dist/img/user2-160x160.jpg',[
        "alt"   => "User Image",
        "class" => "img-circle elevation-2",
        "style" => "opacity: .8"
      ])
   ?>
       </div>
       <div class="info">
         <a href="#" class="d-block"><?= $Auth["name"];  ?><br>
        <?= $Auth["email"];  ?></a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
           <a href="<?= $this->Url->build('/admin', ["fullBase"=> true]);   ?>" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               DashBoards
             </p>
           </a>
         </li>

        

         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-university"></i>
             <p>
               Manage College
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/add-college', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add College</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/list-colleges', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>List College</p>
               </a>
             </li>
             
           </ul>
         </li>

          <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-list-ul"></i>
             <p>
               Manage Branch
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/add-branch', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Branch</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/list-branches', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>List Branch</p>
               </a>
             </li>
            
           </ul>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-graduation-cap"></i>
             <p>
               Manage Students
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/add-student', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Student</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/list-students', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>List Student</p>
               </a>
             </li>
             
           </ul>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
             <p>
               Manage Staffs
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/add-staff', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Staffs</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/list-staffs', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>List Staffs</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-tasks"></i>
             <p>
               Reports
                <i class="right fas fa-angle-left"></i>
             </p>
           </a>

           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/college-report', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Colleges Report</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/student-report', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Students Report</p>
               </a>
             </li>

              <li class="nav-item">
               <a href="<?= $this->Url->build('/admin/staff-report', ["fullBase"=> true]);   ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Staffs Report</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item">
           <a href="<?= $this->Url->build("/admin/users/logout"); ?>" class="nav-link">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>
               Logout
             </p>
           </a>
         </li>

       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>