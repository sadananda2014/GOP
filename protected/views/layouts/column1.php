<?php $this->beginContent('//layouts/main'); ?>

  <?php if(isset(Yii::app()->user->id)) { ?>
     <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo Profile::model()->findByPk(Yii::app()->user->id)->image; ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo User::model()->findByPk(Yii::app()->user->id)->username; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form 
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <!--<li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>-->
            <?php if(UserModule::isAdmin()) { ?>
             <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Admin Menu</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>User Manage</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=user/admin/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=user/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
        
         <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Coach</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=coach/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=coach/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
                
                
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Fee</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=fee/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=fee/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
            
        <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Center & Batch</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
         <ul class="treeview-menu">  
     
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Batch</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=batch/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=batch/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
        
        <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Center</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=center/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=center/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
         </ul>
                </li>

       <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Merchandise</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
         <ul class="treeview-menu">  
     
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Brand</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=brand/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=brand/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>  
                
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Colour</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=color/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=color/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
                
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Size</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=size/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=size/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
                
                
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Item</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=item/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=item/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
           </ul>
       </li>     
                
               
                
                
                            </ul>
                        </li>
            <?php } if(UserModule::isAdmin() || UserModule::isDataentry()) { ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Enquiry</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=enquiry/create"><i class="fa fa-angle-double-right"></i> Create</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=enquiry/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                                <!--<li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>-->
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Registration</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=registration/create"><i class="fa fa-angle-double-right"></i> Create</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=registration/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                                <!--<li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
                                <li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                                <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>-->
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Assign Batch</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=batchStudents/createbatch"><i class="fa fa-angle-double-right"></i> create</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=batchStudents/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                               <!-- <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>-->
                            </ul>
                        </li>
            
            <?php }  ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Attendance</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=attendance/attupdate"><i class="fa fa-angle-double-right"></i> Create</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=attendance/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                            </ul> 
                        </li>
            <?php  if(UserModule::isAdmin() || UserModule::isDataentry() ) { ?>
            
            
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Payment</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=payment/create"><i class="fa fa-angle-double-right"></i> Create</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=payment/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
              </ul>
                        </li>
            
             <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Inventory</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=inventoryHistory/create"><i class="fa fa-angle-double-right"></i> Create</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=inventory/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                            </ul>
                        </li>
             <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Kit</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                   
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=studentKit/create"><i class="fa fa-angle-double-right"></i> Create</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=studentKit/replace"><i class="fa fa-angle-double-right"></i> Replace</a></li>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=studentKit/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                            </ul>
                        </li>
                     
                 <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Jersey</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Jersey Inventory</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=jersy/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=jersy/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
                              
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder"></i> <span>Jersey Assign</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
              
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=studentJersy/create"><i class="fa fa-angle-double-right"></i> Add</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=studentJersy/admin"><i class="fa fa-angle-double-right"></i> List</a></li>
                  </ul>
                </li>
                   </ul>
                   </li>
                              
                       <?php } ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
      <div class="clear"></div>
       <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
               <section class="content-header">
         
               

          <?php } echo $content; ?>
          
          <?php if(isset(Yii::app()->user->id)) { ?>
             </section><!-- /.content -->
            </aside><!-- /.right-side -->
<?php } $this->endContent(); ?>