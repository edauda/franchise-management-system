<?php   
        //start output buffering to prevent header already sent error
    ob_start();
    session_name('franchise');
    session_start();
    session_regenerate_id(true);

include_once('page_includes/main-header2.php');
$page="addmovie";
?>


<body class="skin-default fixed-layout">

    <div id="main-wrapper">
          <?php include_once('page_includes/topnav.php'); ?>
      <?php include_once('page_includes/sidenav.php'); ?>
       

        <div class="page-wrapper">
      
            <div class="container-fluid">
            
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Add New Movie</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">Add New Movie</a></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
               <?php include_once('addmovieprocess.php'); ?>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">Adding a New Movie</h4>
                           
                            <form class="form-horizontal m-t-40" action="addmovie.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Movie Title</label>
                                    <input type="text" class="form-control" name="movietitle" id="movietitle">
                                </div>
                                <div class="form-group ">
                                    <label>Movie Rating</label>
                                    <select class="custom-select col-12" id="rating" name="rating">
                                        <option selected>Select...</option>
                                        <option value="18+">18+</option>
                                        <option value="PG">PG</option>
                                        <option value="SNVL">SNVL</option>
                                        <option value="PG 13">PG 13</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="example-email">Main Actor(s)/Actress(es)</label>
                                    <input type="text" id="actors" name="actors" class="form-control" placeholder="Tom Cruise, Ali Nuhu, Sanni Danger, Angelina Jolie etc...">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" placeholder="Price #1500" name="price" id="price">
                                </div>
                                <div class="form-group">
                                    <label>Trailer URL</label>
                                    <input type="text" class="form-control" placeholder="Trailer URL" name="trailer" id="trailer">
                                </div>
                    

                                <div class="form-group row p-t-20">

                                    <div class="col-sm-4">
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Action">
                                            <label class="form-check-label" for="">Action</label>
                                        </div>
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Adventure">
                                            <label class="form-check-label" for="">Adventure</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Fantasy">
                                            <label class="form-check-label" for="">Fantasy</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Romance">
                                            <label class="form-check-label" for="">Romance</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Comedy">
                                            <label class="form-check-label" for="customCheck1">Comedy</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Horror">
                                            <label class="form-check-label" for="customCheck1">Horror</label>
                                        </div>
                                    </div>

                                     <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" >
                                            <label class="form-check-label" for="customCheck1">Crime</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Drama">
                                            <label class="form-check-label" for="customCheck1">Drama</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Sci-Fi">
                                            <label class="form-check-label" for="customCheck1">Sci-Fi</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Mystery">
                                            <label class="form-check-label" for="customCheck1">Mystery</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Thriller">
                                            <label class="form-check-label" for="customCheck1">Thriller</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Western">
                                            <label class="form-check-label" for="customCheck1">Western</label>
                                        </div>
                                    </div>

                                <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Animation">
                                            <label class="form-check-label" for="customCheck1">Animation</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Historical">
                                            <label class="form-check-label" for="customCheck1">Historical</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Political">
                                            <label class="form-check-label" for="customCheck1">Political</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Saga">
                                            <label class="form-check-label" for="customCheck1">Saga</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Urban">
                                            <label class="form-check-label" for="customCheck1">Urban</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="genre[]" value="Tv Series">
                                            <label class="form-check-label" for="customCheck1">Tv Series</label>
                                        </div>
                                    </div>
                                
                                </div>

                            <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                
                                <label for="input-file-now-custom-1">Image Upload</label>
                                <input type="file" id="input-file-now-custom-1" class="dropify" name="fileToUpload" />
                            </div>
                        </div>
                    </div>
                                
                                <div class="form-group">
                                    <label>Short Description of Movie</label>
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit" id="submit">Submit</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light" name="cancel-submit" id="cancel-submit">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
       
            </div>
          
        </div>
<?php include_once('page_includes/footer.php');?>

   