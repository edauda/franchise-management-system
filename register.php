<?php include_once('page_includes/regheader.php');
    include_once('registerprocess.php');
    $page="register";
?>

    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="register.php" method="post">
                   
                    <h3 class="box-title" >Register Now</h3><small>Create your account and enjoy</small>
                    
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="First Name" name="fname">
                        </div>
                        <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Last Name" name="lname">
                        </div>
                        
                    </div>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Other Name" name="oname">
                        </div>
                        
                    </div>

                    <div class="form-group m-t-20 ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Phone Number" name="phone_no">
                        </div>
                    </div>
                    <div class="form-group m-t-20 ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Confirm Password" name="cpassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Address" name="address">
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">

                                <input type="hidden" name="submitted" value="TRUE" />
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="login.php" class="text-info m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
       
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>

</html>