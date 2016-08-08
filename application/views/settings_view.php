<section class="content">
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="image/users/ava/<?=$_SESSION['auchUsersSetings']['ava'];?>" alt="<?=$_SESSION['auchUsersSetings']['name'];?>">
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
        <li class="pull-right"><a href="?exit">Вихід</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="settings">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Ім'я</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name" placeholder="<?=$_SESSION['auchUsersSetings']['name'];?>" value="<?=$_SESSION['auchUsersSetings']['name'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Аватарка</label>
              <div class="col-sm-10">
                <input name="file" type="file" /><br />
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail" name="email" placeholder="<?=$_SESSION['auchUsersSetings']['email'];?>" value="<?=$_SESSION['auchUsersSetings']['email'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Посада</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="posada" placeholder="<?=$_SESSION['auchUsersSetings']['posada'];?>" value="<?=$_SESSION['auchUsersSetings']['posada'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Освіта</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" name="education" placeholder="<?=$_SESSION['auchUsersSetings']['education'];?>" value="<?=$_SESSION['auchUsersSetings']['education'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Адреса</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" name="address" placeholder="<?=$_SESSION['auchUsersSetings']['address'];?>" value="<?=$_SESSION['auchUsersSetings']['address'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Навички</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" name="skills" placeholder="Навички" value="<?=$_SESSION['auchUsersSetings']['skills'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Примітка</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="inputExperience" name="note" placeholder="Примітка"><?=$_SESSION['auchUsersSetings']['note'];?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
                <button type="submit" name="readMySeting" value="readMySeting" class="btn btn-primary">Відредагувати</button>
              </div>
            </div>
          </form>
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->