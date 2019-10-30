    <?php
    if(isset($_POST['submitted']) && !empty($_POST['submitted'])){
        $b_name = MSUtitlity::filterPostString('branchname');
        $m_name = MSUtitlity::filterPostString('manager_name');
//var_dump($b_query);
         die();
          require_once DB;
         $db_obj = new DataBO;
         $db_conn = $db_obj->get_conn();

         if($db_conn){
            //if the connection was successful

         //check to see if a staff has been assigned as the manager of a branch
         //if not assign him to a branch
         $b_check = "SELECT manager_id, branch_id FROM manager WHERE manager_id='$m_name' AND branch_id='$b_name'";
         $b_query = $db_conn->query($b_check);

         //if the query run successfully
         if($b_query){
            if($b_query->rowCount() ==1){
                echo "Sorry, This Branch already has a manager.";
       
            } // end if rowCount
         }// end if query

         $assign_query = "INSERT INTO manager (manager_id,branch_id) VALUES('$m_name','$b_name')";
         $query_result = $db_conn->query($assign_query);
    }//end if db_conn
}
?>