<?php 
   include('config.php');
   try {
	$conn = new PDO("mysql:host=".$sugar_config['dbconfig']['db_host_name'].";dbname=".$sugar_config['dbconfig']['db_name'].";charset=utf8", $sugar_config['dbconfig']['db_user_name'], $sugar_config['dbconfig']['db_password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 if($conn) {
        // echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    } 
    } catch (PDOException $e) {
    echo "Noconnection";

    die($e->getMessage());
}
   
  /*   $sql = "Select * FROM contacts WHERE first_name='ziya'";
    echo "ok";
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    echo  "<h2>" . $num . "</h2>";

    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($_POST) {
        if($_POST["method"] == "register") {

$conn = new mysqli($servername, $username, $password, $dbname);

//to create uniqueid
$token = md5(uniqid());
$date=date("Y-m-d h:i:s");
//phone fax bizim 100 karakterli yer
$sql = $db->prepare("INSERT INTO contacts (id,first_name, last_name,date_entered,phone_mobile,phone_fax)
            VALUES (:token, :first_name, :last_name,:date_entered, :phone_mobile, :phone_fax )");

            $sql->bindParam('token', $token);
            $sql->bindParam('first_name', $_POST["first_name"]);
            $sql->bindParam('last_name', $_POST["last_name"]);
            $sql->bindParam('phone_mobile', $_POST["phone_mobile"]);
            $sql->bindParam('phone_fax', $_POST["phone_fax"]);
            $sql->bindParam('date_entered', $date);
            
            $sql->execute();
$sqle = $db->prepare("INSERT INTO email_addresses (id,email_address,date_created)
            VALUES (:token, :email_address, date_entered)");

            $sql->bindParam('token', $token);
            $sqle->bindParam('email_address', $_POST["email_address"]);
            $sql->bindParam('date_entered', $date);

           
           $result= $sqle->execute();


         header("Location:".$link."register.php?message=user_created");
         7/   exit();


        }


   }*/
   ?>