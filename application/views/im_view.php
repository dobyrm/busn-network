<section class="content">
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?=$_SESSION['auchUsersSetings']['ava'];?>" alt="<?=$_SESSION['auchUsersSetings']['name'];?>">
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
        <? if($_SESSION['auchUsersSetings']['position'] == 0) { ?>
        <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
        <? } ?>
        <li class="pull-right"><a href="?exit"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="message">
          <!--SEARSH PO DIALOGAH <div class="row">
            <div class="col-md-12">
              <form class="form-horizontal" action="" method="post" name="form" onsubmit="return false;">
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="searchim" name="serValue" value="<?php if($_POST['serValue']) echo $_POST['serValue']; ?>" placeholder="Ім'я або Прізвище">
                  </div>
                </div>
              </form>
            </div>
          </div>-->
          <div class="table-responsive mailbox-messages">
          <div id="resSearch"></div>
          <table class="table table-hover table-striped">
            <tbody>
            <?php
              foreach($data as $row)
              { 
            ?>
                <tr class="hiddenAjax">
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