<section class="content">
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="assets/image/users/ava/<?=$_SESSION['auchUsersSetings']['ava'];?>" alt="<?=$_SESSION['auchUsersSetings']['name'];?>">
        <h3 class="profile-username text-center"><?=$_SESSION['auchUsersSetings']['name'];?></h3>
        <p class="text-muted text-center"><?=$_SESSION['auchUsersSetings']['posada'];?></p>

        <!--<ul class="list-group list-group-unbordered">
          <li class="list-group-item">
             <b>Повідомленнь</b> <a class="pull-right">255</a>
          </li>
          <li class="list-group-item">
             <b>Оголошеннь</b> <a class="pull-right">255</a>
          </li>
        </ul>-->
        <p style="color:red;text-align:center;font-weight:bold;"><?=$dataOne;?></p>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Про мене</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i>  Освіта</strong>
        <p class="text-muted"><?=$_SESSION['auchUsersSetings']['education'];?></p>
        <hr>
        <strong><i class="fa fa-map-marker margin-r-5"></i> Адреса</strong>
        <p class="text-muted"><?=$_SESSION['auchUsersSetings']['address'];?></p>
        <hr>
        <strong><i class="fa fa-pencil margin-r-5"></i> Навички</strong>
        <p>
          <span class="label label-success"><?=$_SESSION['auchUsersSetings']['skills'];?></span>
        </p>
        <hr>
        <strong><i class="fa fa-file-text-o margin-r-5"></i> Примітка</strong>
        <p><?=$_SESSION['auchUsersSetings']['note'];?></p>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li><a href="/">Оголошення</a></li>
        <li><a href="timeline">Лінія</a></li>
        <li class="active"><a href="im">Повідомлення</a></li>
        <li><a href="friends">Користувачі</a></li>
        <li><a href="settings">Налаштування</a></li>
        <li class="pull-right"><a href="?exit"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="message">
          <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>
            <?php
              foreach($data as $row)
              { 
            ?>
                <tr>
                  <td class="mailbox-star"><a><i class="fa fa-star text-yellow"></i></a></td>
                  <td class="mailbox-name"><a href="dialog?id=<?=$row['id'];?>"><?=$row['name'];?></a></td>
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
              } 
            ?>
            </tbody>
          </table><!-- /.table -->
        </div>
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->