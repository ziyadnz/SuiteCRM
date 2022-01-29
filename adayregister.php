<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'dbconnect.php';   
    
    $first_name = $_POST["first_name"]; 
    $last_name = $_POST["last_name"]; 
    $phone_mobile = $_POST["phone_mobile"]; 
    $phone_fax = $_POST["phone_fax"]; 
    $id = md5(uniqid());
    $date=date("Y-m-d h:i:s");
    $aday="aday";
   

            /*
    
    $sql = "Select `last_name` FROM `contacts` WHERE `first_name`='BBBB'";
    
    $result = mysqli_query($conn, $sql);


    
    $num = mysqli_num_rows($result); 
   echo  "<h2>" . $date . "</h2>";
   echo  "<h2>" . $num . "</h2>";
   echo  "<h2>" . $id . "</h2>";
   */
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
$sql = $conn->prepare("INSERT INTO contacts (id,first_name, last_name,date_entered,phone_mobile,description,primary_address_city,department,phone_fax,title)
            VALUES (:id, :first_name, :last_name,:date_entered, :phone_mobile, :phone_fax,:secilenil,:liseadi,:secilensinif,:aday)");

            $sql->bindParam('id', $id);
            $sql->bindParam('first_name', $_POST["first_name"]);
            $sql->bindParam('last_name', $_POST["last_name"]);
            $sql->bindParam('phone_mobile', $_POST["phone_mobile"]);
            $sql->bindParam('phone_fax', $_POST["phone_fax"]);
            $sql->bindParam('date_entered', $date);
            $sql->bindParam('secilenil', $_POST["secilenil"]);
            $sql->bindParam('liseadi', $_POST["liseadi"]);
            $sql->bindParam('secilensinif', $_POST["secilensinif"]);
            $sql->bindParam('aday', $aday);

            

            
           $sql->execute();

$sqle = $conn->prepare("INSERT INTO email_addresses (id,email_address,date_created)
            VALUES (:id, :email_address, :date_entered)");

            $sqle->bindParam('id', $id);
            $sqle->bindParam('email_address', $_POST["email_address"]);
            $sqle->bindParam('date_entered', $date);

          $result=  $sqle->execute();


   
$sqle = $conn->prepare("INSERT INTO email_addr_bean_rel (id,email_address_id,bean_id, bean_module,primary_address, date_created)
            VALUES (:id,:id,:id,'Contacts',1, :date_entered)");

            $sqle->bindParam('id', $id);
            $sqle->bindParam('email_address', $_POST["email_address"]);
            $sqle->bindParam('date_entered', $date);

          $result=  $sqle->execute();



    
            if ($result) {
                $showAlert = true; 
            }
    
    
    
  
    
}//end if   
    
?>
    
<!doctype html>
    
<html lang="en">
  
  
<head>
    
    <!-- Required meta tags --> 
    <meta charset="utf-8"> 
    <meta name="viewport" content=
        "width=device-width, initial-scale=1, 
        shrink-to-fit=no">
    
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity=
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">  
</head>
    
<body>
    
<?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Tebrikler!</strong> Kaydınız başarıyla oluşturulmuştur. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Hata!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
    
<div class="container my-4 ">
    
    <h1 class="text-center">Bilgi Al</h1> 
    <form action="adayregister.php" method="post">
    
        <div class="form-group"> 
            <label for="first_name">Ad</label>
        <span class="error"  style="color:red">(zorunlu)</span>  
        <input type="text" class="form-control" id="first_name"
            name="first_name" aria-describedby="emailHelp" required>    
        </div>
    
       
        <div class="form-group"> 
            <label for="last_name">Soyad</label>
        <span class="error"  style="color:red">(zorunlu)</span>  
        <input type="text" class="form-control" id="last_name"
            name="last_name" aria-describedby="emailHelp" required>    
        </div>

        <div class="form-group"> 
            <label for="email_address">E-posta</label>
        <span class="error"  style="color:red">(zorunlu)</span>  
        <input type="email" class="form-control" id="email_address"
            name="email_address" aria-describedby="emailHelp" required>    
        </div>

        <div class="form-group"> 
            <label for="phone_mobile">Telefon No</label>
        <span class="error"  style="color:red">(zorunlu)</span>  
        <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="form-control" id="phone_mobile"
            name="phone_mobile" aria-describedby="emailHelp" required>    
        </div>

<?php 

$iller = array('Adana', 'Adıyaman', 'Afyon', 'Ağrı', 'Amasya', 'Ankara', 'Antalya', 'Artvin',
'Aydın', 'Balıkesir', 'Bilecik', 'Bingöl', 'Bitlis', 'Bolu', 'Burdur', 'Bursa', 'Çanakkale',
'Çankırı', 'Çorum', 'Denizli', 'Diyarbakır', 'Edirne', 'Elazığ', 'Erzincan', 'Erzurum', 'Eskişehir',
'Gaziantep', 'Giresun', 'Gümüşhane', 'Hakkari', 'Hatay', 'Isparta', 'Mersin', 'İstanbul', 'İzmir', 
'Kars', 'Kastamonu', 'Kayseri', 'Kırklareli', 'Kırşehir', 'Kocaeli', 'Konya', 'Kütahya', 'Malatya', 
'Manisa', 'Kahramanmaraş', 'Mardin', 'Muğla', 'Muş', 'Nevşehir', 'Niğde', 'Ordu', 'Rize', 'Sakarya',
'Samsun', 'Siirt', 'Sinop', 'Sivas', 'Tekirdağ', 'Tokat', 'Trabzon', 'Tunceli', 'Şanlıurfa', 'Uşak',
'Van', 'Yozgat', 'Zonguldak', 'Aksaray', 'Bayburt', 'Karaman', 'Kırıkkale', 'Batman', 'Şırnak',
'Bartın', 'Ardahan', 'Iğdır', 'Yalova', 'Karabük', 'Kilis', 'Osmaniye', 'Düzce','İl Seçiniz');
?>
 <label for="il">İl/Şehir seçiniz:</label>
<?php 
echo "<select name='secilenil'>";
        foreach ($iller as $illers) {
            echo "<option selected='selected' value='$illers'>$illers</option>";

    }
echo "</select>";

?>
  <br><br>
  
   <div class="form-group"> 
            <label for="liseadi">Lise Adı</label> 
        <input type="text" class="form-control" id="liseadi"
            name="liseadi" aria-describedby="emailHelp" >    
        </div>

        <br>

        <?php 

$siniflar = array('1','2','3','4');
?>
 <label for="sinif">Sınıfınızı seçiniz:</label>
<?php 
echo "<select name='secilensinif'>";
        foreach ($siniflar as $sinif) {
            echo "<option selected='selected' value='$sinif'>$sinif</option>";

    }
echo "</select>";

?>
  <br><br>
     
            <script type="text/javascript">
        $(document).ready(function(){
        var maxChars = $("#phone_fax");
        var max_length = maxChars.attr('maxlength');
        if (max_length > 0) {
            maxChars.bind('keyup', function(e){
                length = new Number(maxChars.val().length);
                counter = max_length-length;
                $("#sessionNum_counter").text(counter);
            });
        }
    });
</script>
<label for="phone_fax">Açıklama</label>
                 <span class="error"  style="color:red">(zorunlu)</span> Bilgi almak istediğiniz konuyu kısaca belirtiniz. 

        <br>
<textarea name="phone_fax" id="phone_fax" style="width:800px;" rows="3" maxlength="99" type="text" required></textarea>
    
            <small id="emailHelp" class="form-text text-muted">
            100 karakter ile sınırlıdır.
            </small> 
        </div>

<div style="text-align:center">
         <input type="checkbox" id="KVKK" name="KVKK" value="KVKK" required>
  <label for="vehicle1"> <a href="https://akademi-tr.agu.edu.tr/uploads/KVKK_akademi/kvkk%20ayd%C4%B1nlatma_acik_riza_metni.pdf?_t=1640162186" 
  target="_blank">KVKK'yı</a> okudum ve onaylıyorum.  </label><br>  

</div>

<br>
        <div style="text-align:center">

        <button type="submit" class="btn btn-primary">
        Kayıt Ol & Bilgi Al
        </button>
        </div>
 
    </form> 
</div>
    
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
<script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
</script>
    
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous">
</script>
    
<script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
    integrity=
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous">
</script> 
</body> 
</html>