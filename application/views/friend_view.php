<section class="content">
<div class="row">
<?php
  foreach($data as $row)
  { 
?>
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
      <?php
        $img = $row['ava'];
        if (file_exists($img)) { ?>
            <img class="profile-user-img img-responsive img-circle" src="<?=$row['ava'];?>" alt="<?=$row['name'];?>">
        <?php
        } else { ?>
            <img class="profile-user-img img-responsive img-circle" src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="<?=$row['name'];?>">
        <?php
        }
      ?>
        <h3 class="profile-username text-center"><?=$row['name'];?></h3>
        <p class="text-muted text-center"><?=$row['posada'];?></p>

        <!--<a href="#" class="btn btn-primary btn-block"><b>Підписатись</b></a>-->
        <a href="dialog?id=<?=$row['id'];?>" class="btn btn-success btn-block"><b>Повідомлення</b></a>
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
        <li class="pull-right"><a href="friends"><i class="fa fa-history" aria-hidden="true"></i></a></li>
      </ul>
  <?php 
  } 
?>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <?php
            foreach($dataOne as $row)
            {

              if(date("d.m.Y") >= $row['date_in'] AND date("d.m.Y") <= $row['date_out'])
              {

          ?>
          <div class="post">
            <div class="user-block">
            <?php
              $img = $row['ava'];
              if (file_exists($img)) { ?>
                  <img class="img-circle img-bordered-sm" src="<?=$row['ava'];?>" alt="<?=$row['name'];?>">
              <?php
              } else { ?>
                  <img class="img-circle img-bordered-sm" src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="<?=$row['name'];?>">
              <?php
              }
            ?>
              <span class='username'>
                <a href="friend?id=<?=$row['id'];?>"><?=$row['name'];?></a>
              </span>
              <span class='description'>Опубліковано - <?=$row['data'];?></span>
            </div><!-- /.user-block -->
            <p>
              <?=$row['declared'];?>
            </p>
          </div><!-- /.post -->
          <?php 
              }
            } 
          ?>
        </div><!-- /.tab-pane -->

      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->