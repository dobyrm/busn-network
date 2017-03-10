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
$se = $_SESSION['auchUsersSetings']['id'];
$querys = "SELECT * FROM `bu_users_setings`, `bu_im` WHERE `id_user_a` = `id_user`  AND `name` LIKE '%" . $search . "%'";
$query = mysqli_query($db,$querys);
if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_array($query);
    ?>
    <table class="table table-hover table-striped">
            <tbody>
    <?php
    do{
        ?>
        <style>.hiddenAjax{display:none;}</style>
        <tr>
            <td class="mailbox-star"><a><i class="fa fa-star text-yellow"></i></a></td>
            <td class="mailbox-name"><a href="dialog?id=<?=$row['id_user'];?>"><?=$row['name'];?></a></td>
            <td class="mailbox-subject"><?=substr($row['text'],0,100);?></td>
            <td class="mailbox-attachment"></td>
            <td class="mailbox-date"><?=$row['data'];?></td>
            <td class="mailbox-date">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="dialogID" value="<?=$row['id_dialog'];?>">
                    <button type="submit" name="deleteMessage" value="deleteMessage" class="btn btn-primary" style="    padding:0px 5px!important;"><i class='fa fa-times'></i></button>
                </form>
            </td>
        </tr>
<?php
    }while($row = mysqli_fetch_array($query));
    ?>
    </tbody>
          </table><!-- /.table -->
<?php
}else{
    echo "<p align='center'>Немає результатів</p>";
}
