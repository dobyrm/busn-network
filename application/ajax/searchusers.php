<?php
$search = $_POST['search'];
$search = addslashes($search);
$search = htmlspecialchars($search);
$search = stripslashes($search);
   if($search == ''){
       exit("<p align='center'>Почніть вводити запит</p>");
   }
$db = mysqli_connect("wstudi01.mysql.ukraine.com.ua","wstudi01_busn","6sahjvsy","wstudi01_busn");
//mysqli_select_db("db_busn",$db);
mysqli_query($db,"SET NAMES utf8");

$querys = "SELECT * FROM `bu_users_setings` WHERE `name` LIKE '%" . $search . "%'
			AND `hidden` = '0'";
$query = mysqli_query($db,$querys);
if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_array($query);
    ?>
    <?php
    do{
        ?>
        <style>.hiddenAjax{display:none;}</style>
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?=$row['ava'];?>" alt="<?=$row['name'];?>">
                    <a href="editadmuser?id=<?=$row['id_user'];?>"><h3 class="profile-username text-center"><?=$row['name'];?></h3></a>
                    <p class="text-muted text-center"><?=$row['posada'];?></p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
<?php
    }while($row = mysqli_fetch_array($query));
    ?>
<?php
}else{
    echo "<p align='center'>Немає результатів</p>";
}
