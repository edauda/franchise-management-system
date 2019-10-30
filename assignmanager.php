<?php   
        //start output buffering to prevent header already sent error
    ob_start();
    session_name('franchise');
    session_start();
    session_regenerate_id(true);

include_once('page_includes/main-header2.php');
include_once('assignmanagerprocess.php');
$page="assignmanager";
?>


<body class="skin-default fixed-layout">

    <div id="main-wrapper">
         <?php include_once('page_includes/topnav.php'); ?>
      <?php include_once('page_includes/sidenav.php'); ?>

        <div class="page-wrapper" style="margin-bottom: 140px;">

            <div class="container-fluid">
              
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Assign Manager to Branch</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">assignManager</li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
         <?php include_once('addbranchprocess.php'); ?>
        
                <div class="row">
                    <div class="col-12">
                                    
                        <div class="card card-body">
                                                      
                           
                                <div class="col-sm-12 col-xs-12">
                                    <form name="assignmanager" method="post" action="assignmanager.php" id="assignmanager">
                                        <div class="form-group ">
                                    <label>Branch Name</label>
                                    <select class="custom-select col-12" id="branchname" name="branchname">
                                        <option selected>Select...</option>
                                        <?php
                                         require_once DB;
         $db_obj = new DataBO;
         $db_conn = $db_obj->get_conn();
                                             $query1 = "SELECT branch_name FROM branch";
                                             $result = $db_conn->query($query1);

                                             if($result){
                                                //if query ran successfully
                                                while($row=$result->fetch()){
                                                    $b_name = $row['branch_name'];

                                                    echo "<option> $b_name </option>";
                                                }
                                             }
                                        ?>
                                    
                                    </select>
                                 </div>
                                    <div class="form-group ">
                                    <label>Manager Name</label>
                                    <select class="custom-select col-12" id="manager_name" name="manager_name">
                                        <option selected>Select...</option>
                                        <?php
                                            $query2 = "SELECT id,fname,lname,oname FROM staff_profile ";
                                            $result2 = $db_conn->query($query2);

                                            if($result2){
                                                //if query ran successfully
                                                while($row=$result2->fetch()){
                                                    $staff_id = $row['id'];
                                                    $fname = $row['fname'];
                                                    $lname = $row['lname'];
                                                    $oname = $row['oname'];
                                                    $fullname = $lname ." ". $fname. " " . $oname;

                                                    echo "<option> $fullname </option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                 </div>
                                       
                                        <input type="hidden" name="submitted" value="True"/>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit" id="submit">Assign</button>
                                        <button type="submit" name="cancel-submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                           
                        </div>
      
            </div>
        </div>
        </div>
    </div>
      <?php include_once('page_includes/footer.php');?>