<?php
    ob_start();
    session_name('franchise');
    session_start();
    session_regenerate_id(true);
?>
<?php include_once('page_includes/regheader.php'); 
 include_once('registeradminprocess.php');
    $page="registeradmin";
    ?>
  <body class="skin-default card-no-border">
   
    <section id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
                <a href="" class="text-center m-b-40"><img src="assets/images/logo-icon.png" alt="Home" /><br/><img src="assets/images/logo-text.png" alt="Home" /></a>
                <!-- multistep form -->
                <form id="msform" method="POST" action="registeradmin.php" name="registeradmin">
                    <!-- progressbar -->
                    <ul id="eliteregister">
                        <li class="active">Account Setup</li>
                        <li>Official Details</li>
                        <li>Personal Details</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Create your account</h2>
                        <h3 class="fs-subtitle">This is step 1</h3>
                        <input type="text" name="username" placeholder="Username" />
                        <input type="password" name="pass" placeholder="Password" />
                        <input type="password" name="cpass" placeholder="Confirm Password" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Official Details</h2>
                        <h3 class="fs-subtitle">Step 2</h3>
                        <input type="text" name="email" placeholder="Email" />
                        <input type="text" name="position" placeholder="Position" />
                       <!-- <input type="text" name="location" placeholder="Location to Manage" />-->
                       <select class="custom-select col-md-12" id="manager" name="manager" >
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
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Personal Details</h2>
                        <h3 class="fs-subtitle">Step 3</h3>
                        <input type="text" name="fname" placeholder="First Name" />
                        <input type="text" name="lname" placeholder="Last Name  Other Name" />
                        <input type="text" name="phone" placeholder="Phone" />
                        <textarea name="address" placeholder="Home Address"></textarea>
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="hidden" name="submitted" value="TRUE" />
                        <input type="submit" name="submit" class="submit action-button" value="Submit" />
                    </fieldset>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </section>
<?php include_once('page_includes/regfooter.php'); ?>