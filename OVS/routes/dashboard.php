<?php
  session_start();
  if(!isset($_SESSION['userdata'])){   // if session will not activate on login page then this dashboard will not open
    header("location: ../");
  }
  
  $userdata = $_SESSION['userdata'];
  $groupsdata = $_SESSION['groupsdata'];

  if($_SESSION['userdata']['status']==0){
      $status = '<b style="color:red">Not Voted</b>';
  }
  else{
    $status = '<b style="color:green">Voted</b>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<style>
 #backbtn{
    padding: 10px;
    border-radius: 5px;
    background-color: burlywood;
    cursor: pointer;
    color: black;
    font-size: 15px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    float: left;
    margin: 10px;
}

#logoutbtn{
    padding: 10px;
    border-radius: 5px;
    background-color: burlywood;
    cursor: pointer;
    color: black;
    font-size: 15px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    float: right;
    margin: 10px;
}

#profile{
    background-color: white;
    width: 25%;
    padding: 20px;
    float: left;
}

#Group{
    background-color: white;
    width: 60%;
    padding: 20px;
    float: right;
    /* object-fit: cover; */
    /* height: 100vh; */
}

#votebtn{
    padding: 10px;
    border-radius: 5px;
    background-color: burlywood;
    cursor: pointer;
    color: black;
    font-size: 15px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    float: left;
}

#mainpanel{
    padding: 10px;
}

#voted{
    padding: 10px;
    border-radius: 5px;
    background-color: green;
    cursor: pointer;
    color: white;
    font-size: 15px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    float: left;
}

</style>

<body>
   <div id="mainsection">
    <center>
      <div id="headersection">
      <a href="../"><button id="backbtn">Back</button></a>
      <a href="logout.php"><button id="logoutbtn">Logout</button></a>
         <h1>Online Voting System</h1>
      </div>
    </center>
      <hr>

    <div id="mainpanel">
       <div id="profile">
            <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"></center><br><br>
            <b>Name: </b><?php echo $userdata['name'] ?> <br><br>
            <b>Mobile: </b><?php echo $userdata['mobile'] ?> <br><br>
            <b>Address: </b><?php echo $userdata['address'] ?> <br><br>
            <b>Status: </b><?php echo $status ?> <br><br>
       </div>

       <div id="Group">
            <?php
               if($_SESSION['groupsdata']){
                   for($i=0; $i<count($groupsdata); $i++){
                      ?>
                      <div>
                        <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                          <?>Group Name: </b><?php echo $groupsdata[$i]['name'] ?><br><br>
                          <b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                            <form action="../api/vote.php" method="POST">
                               <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                               <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                               <?php
                                 if($_SESSION['userdata']['status']==0){
                                    ?>
                                    <input type="submit" name="votebtn" value="vote" id="votebtn"> 
                                    <?php
                                 }
                                 else{
                                     ?>  
                                     <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button> 
                                     <?php
                                 }
                               ?>
                              
                            </form>
                      </div>
                      
                    
                      <?php
                   }
                } 
               else{

                }
            ?>
        </div>
     </div>
      </div>
     
    </body>
    </html> 
                         
                          
                     