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
        <li><a href="settings">Налаштування</a></li>
        <? if($_SESSION['auchUsersSetings']['position'] == 4 OR $_SESSION['auchUsersSetings']['position'] == 3) { ?>
        <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
        <? } ?>
        <li class="pull-right"><a href="?exit"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="settings">
          <p class="SettingsView">Редагування користувача</p>
          <?php
            foreach($data as $row)
            {
          ?>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Логін</label>
                <input type="text" class="form-control" name="login" value="<?=$row['login']?>" placeholder="Логін">
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
                <input type="text" class="form-control" name="name" value="<?=$row['name']?>" placeholder="Ім'я">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Посада</label>
                <input type="text" class="form-control" name="posada" value="<?=$row['posada']?>" placeholder="Посада">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Факультет</label>
                <select class="form-control" name="serFac">
                  <option value="<?=$row['serFac']?>"><?=$row['serFac']?></option>
                  <option value="Економічний">Економічний</option>
                  <option value="Юридичний">Юридичний</option>
                  <option value="КСіТ">КСіТ</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Кафедра</label>
                <select class="form-control" name="serKaf">
                  <option value="<?=$row['serKaf']?>"><?=$row['serKaf']?></option>
                  <option value="Економіки і підприємництва">Економіки і підприємництва</option>
                  <option value="Фінансів">Фінансів</option>
                  <option value="Обліку і аудиту">Обліку і аудиту</option>
                  <option></option>
                  <option value="Цивільно-правових дисциплін">Цивільно-правових дисциплін</option>
                  <option value="Кримінально-правових дисциплін">Кримінально-правових дисциплін</option>
                  <option value="Професійних та спеціальних правових дисциплін">Професійних та спеціальних правових дисциплін</option>
                  <option></option>
                  <option value="Філологічних та суспільних дисциплін">Філологічних та суспільних дисциплін</option>
                  <option value="Комп'ютерних систем і технологій">Комп'ютерних систем і технологій</option>
                  <option value="Автоматизованих систем управління">Автоматизованих систем управління</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Позиція</label>
                <select class="form-control" name="position">
                  <?php
                    if($row['position'] == 1)
                      echo '<option value="1">Викладач</option>';
                    elseif($row['position'] == 2)
                      echo '<option value="2">Студент</option>';
                    elseif($row['position'] == 3)
                      echo '<option value="3">Декан</option>';
                    elseif($row['position'] == 4)
                      echo '<option value="4">Адміністратор</option>';
                    else
                      echo '<option>Виберіть позицію користувача на сайті</option>';
                  ?>
                  <option value="3">Декан</option>
                  <option value="1">Викладач</option>
                  <option value="2">Студент</option>
                  <option></option>
                  <option value="4">Адміністратор</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
              <button type="submit" name="dellAdmformUser" value="dellAdmformUser" class="btn btn-danger">Видалити</button>
                <button type="submit" name="editAdmformUser" value="editAdmformUser" class="btn btn-primary">Редагувати</button>
              </div>
            </div>
          </form>
          <?
            }
          ?>
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
