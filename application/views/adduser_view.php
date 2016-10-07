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
        <li><a href="im">Повідомлення</a></li>
        <li><a href="friends">Користувачі</a></li>
        <li><a href="settings">Налаштування</a></li>
        <? if($_SESSION['auchUsersSetings']['position'] == 0) { ?>
        <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
        <? } ?>
        <li class="pull-right"><a href="?exit"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="settings">
          <p class="SettingsView">Регістрація нового користувача</p>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Логін</label>
                <input type="text" class="form-control" name="login" placeholder="Логін">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Пароль</label>
                <input type="password" class="form-control" name="pass" placeholder="Пароль">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Ім'я</label>
                <input type="text" class="form-control" name="name" placeholder="Ім'я">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Посада</label>
                <input type="text" class="form-control" name="posada" placeholder="Посада">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Факультет</label>
                <input type="text" class="form-control" name="serFac" placeholder="Факультет">
              </div>
              <div class="col-sm-6">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Кафедра</label>
                <input type="text" class="form-control" name="serKaf" placeholder="Кафедра">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Позиція</label>
                <select class="form-control" name="position">
                  <option value="1">Викладач</option>
                  <option value="2">Студент</option>
                  <option></option>
                  <option value="0">Адміністратор</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
                <button type="submit" name="addUser" value="addUser" class="btn btn-primary">Додати</button>
              </div>
            </div>
          </form>
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->