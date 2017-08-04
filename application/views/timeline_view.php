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
        <li class="active"><a href="timeline">Лінія</a></li>
        <li><a href="im">Повідомлення</a></li>
        <li><a href="friends">Користувачі</a></li>
        <li><a href="settings">Налаштування</a></li>
        <? if($_SESSION['auchUsersSetings']['position'] == 4 OR $_SESSION['auchUsersSetings']['position'] == 3) { ?>
        <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
        <? } ?>
        <li class="pull-right"><a href="?exit"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="timeline">
        <form action="" method="post" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
            <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Оголошення</label>
              <textarea class="form-control" name="OgoText"  id="inputExperience" placeholder="Оголошення користувачам" rows="10" style="resize: none">В 12.00 з'явитись всім деканам в 202 кабінет. Для розгляду матеріалів по конференції</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
            	<label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Дата публікації</label>
              	<!--<input class="form-control" type="date" name="created">
                <input type="text" class="form-control" placeholder="Дата публікації" name="created" id="datepickerFrom">-->
                <input type="text" class="form-control" placeholder="Дата публікації" name="createdFrom" id="datetimepicker1">
            </div>
            <div class="col-sm-6">
            	<label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Дата відміни публікації</label>
              	<!--<input class="form-control" type="date" name="created">
                <input type="text" class="form-control" placeholder="Дата відміни публікації" name="created" id="datepickerTo">-->
                <input type="text" class="form-control" placeholder="Дата відміни публікації" name="createdTo" id="datetimepicker2">
            </div>
          </div>
          <!--<div class="form-group">
            <div class="col-sm-6">
            <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Оголошення публікується</label>
              <select class="form-control">
              	<option>Всім</option>
              	<option>Ректорату</option>
              	<option>Деканату</option>
              	<option>Викладачам</option>
              	<option>Студентам</option>
              </select>
            </div>
            <div class="col-sm-3">
            <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Оголошення викладачам</label>
              <select class="form-control">
                <option>КСІТ</option>
                <option>Економічого</option>
                <option>Юридичного</option>
              </select>
            </div>
            <div class="col-sm-3">
            <label class="control-label" style="padding:7px;color:#555;background-color:#eee;">Оголошення студентам</label>
              <select class="form-control">
                <option>КСІТ</option>
                <option>Економічого</option>
                <option>Юридичного</option>
              </select>
            </div>
          </div>-->
          <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-12">
                      <form action="" method="post" name="form" onsubmit="return false;">
                        <input type='text' name='search' class="form-control" value='' id="search" placeholder="Ім'я або Прізвище">
                      <!--</form>-->
                    </div>
                 </div>
            </div>
          <div class="ui-widget ui-helper-clearfix">
            <div class="col-md-6">
<!--<div id="searchBottomAjax" class="btn btn-success">Клікніть щоб вибрати користувачів</div><br /><br />-->
              <div id="resSearch">Почніть вводити запит</div>
            </div>
            <div class="col-md-6">
            <div id="trash" class="ui-widget-content ui-state-default">
              <h4 class="ui-widget-header"><span class="ui-icon ui-icon-trash">Кому публікувати</span> Кому публікувати</h4>
            </div>
            </div>
            </div>
            </div>

            <div class="form-group">
            <br />
              <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
                <button type="submit" name="okOgoloshenya" value="okOgoloshenya" class="btn btn-primary">Публікувати</button>
              </div>
            </div>
          </form>
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->