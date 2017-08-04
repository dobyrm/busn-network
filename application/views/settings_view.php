<section class="content">
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <?php
          $img = $_SESSION['auchUsersSetings']['ava'];
          if (file_exists($img)) { ?>
              <img class="profile-user-img img-responsive img-circle" src="<?=$_SESSION['auchUsersSetings']['ava'];?>" alt="<?=$_SESSION['auchUsersSetings']['name'];?>">
          <?php
          } else { ?>
              <img class="profile-user-img img-responsive img-circle" src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="<?=$_SESSION['auchUsersSetings']['name'];?>">
          <?php
          }
        ?>
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
        <li><a href="im">Повідомлення</a></li>
        <li><a href="friends">Користувачі</a></li>
        <li class="active"><a href="settings">Налаштування</a></li>
        <? if($_SESSION['auchUsersSetings']['position'] == 4 OR $_SESSION['auchUsersSetings']['position'] == 3) { ?>
        <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
        <? } ?>
        <li class="pull-right"><a href="?exit"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane formSettings" id="settings">
          <p class="SettingsView">Редагування персональних даних</p>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-sm-12">
                <label for="inputName" class="control-label">Ім'я</label>
                <input type="text" class="form-control" id="inputName" name="name" placeholder="<?=$_SESSION['auchUsersSetings']['name'];?>" value="<?=$_SESSION['auchUsersSetings']['name'];?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="inputName" class="control-label">Аватарка</label>
                <input name="file" type="file" /><br />
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="inputEmail" class="control-label">E-mail</label>
                <input type="text" class="form-control" id="inputEmail" name="email" placeholder="<?=$_SESSION['auchUsersSetings']['email'];?>" value="<?=$_SESSION['auchUsersSetings']['email'];?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="inputName" class="control-label">Посада</label>
                <input type="text" class="form-control" id="inputName" name="posada" placeholder="<?=$_SESSION['auchUsersSetings']['posada'];?>" value="<?=$_SESSION['auchUsersSetings']['posada'];?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="inputSkills" class="control-label">Освіта</label>
                <input type="text" class="form-control" id="inputSkills" name="education" placeholder="<?=$_SESSION['auchUsersSetings']['education'];?>" value="<?=$_SESSION['auchUsersSetings']['education'];?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="inputSkills" class="control-label">Адреса</label>
                <input type="text" class="form-control" id="inputSkills" name="address" placeholder="<?=$_SESSION['auchUsersSetings']['address'];?>" value="<?=$_SESSION['auchUsersSetings']['address'];?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="inputSkills" class="control-label">Навички</label>
                <input type="text" class="form-control" id="inputSkills" name="skills" placeholder="Навички" value="<?=$_SESSION['auchUsersSetings']['skills'];?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="inputExperience" class="control-label">Примітка</label>
                <textarea class="form-control" id="inputExperience" name="note" placeholder="Примітка"><?=$_SESSION['auchUsersSetings']['note'];?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
                <button type="submit" name="readMySeting" value="readMySeting" class="btn btn-primary">Відредагувати</button>
              </div>
            </div>
          </form>
          <hr />
          <p class="SettingsView">Зміна пароля</p>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label">Ваш пароль</label>
                <input type="password" class="form-control" name="pass" placeholder="Ваш пароль">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label">Новий пароль</label>
                <input type="password" class="form-control" name="newPass" placeholder="Новий пароль">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label">Повторити пароль</label>
                <input type="password" class="form-control" name="succesPass" placeholder="Повторити пароль">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
                <button type="submit" name="readMyPass" value="readMyPass" class="btn btn-primary">Змінити</button>
              </div>
            </div>
          </form>
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->