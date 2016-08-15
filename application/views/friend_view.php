<section class="content">
<?php
  foreach($data as $row)
  { 
?>
<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="assets/image/users/ava/<?=$row['ava'];?>" alt="<?=$row['name'];?>">
        <h3 class="profile-username text-center"><?=$row['name'];?></h3>
        <p class="text-muted text-center"><?=$row['posada'];?></p>

        <!--<a href="#" class="btn btn-primary btn-block"><b>Підписатись</b></a>-->
        <a href="dialog?id=<?=$row['id'];?>#bms" class="btn btn-success btn-block"><b>Повідомлення</b></a>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Про мене</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i>  Освіта</strong>
        <p class="text-muted"><?=$row['education'];?></p>
        <hr>
        <strong><i class="fa fa-map-marker margin-r-5"></i> Адреса</strong>
        <p class="text-muted"><?=$row['address'];?></p>
        <hr>
        <strong><i class="fa fa-pencil margin-r-5"></i> Навички</strong>
        <p>
          <span class="label label-success"><?=$row['skills'];?></span>
        </p>
        <hr>
        <strong><i class="fa fa-file-text-o margin-r-5"></i> Примітка</strong>
        <p><?=$row['note'];?></p>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Оголошення</a></li>
        <li><a style="color:#AAB7C5;" data-toggle="tab">Останій візит <?=$row['dataentry'];?></a></li>
        <li class="pull-right"><a href="?exit"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
        <li class="pull-right"><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li class="pull-right"><a href="<?=$_SERVER['HTTP_REFERER'];?>"><i class="fa fa-history" aria-hidden="true"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="assets/image/users/ava/<?=$row['ava'];?>" alt="<?=$row['name'];?>">
              <span class='username'>
                <a href="friends?id=<?=$row['id'];?>"><?=$row['name'];?></a>
              </span>
              <span class='description'>Опубліковано - 7:30 PM today</span>
            </div><!-- /.user-block -->
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>
          </div><!-- /.post -->
        </div><!-- /.tab-pane -->

      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
<?php 
  } 
?>
</section><!-- /.content -->