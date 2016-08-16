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
        <li class="active"><a href="timeline">Лінія</a></li>
        <li><a href="im">Повідомлення</a></li>
        <li><a href="friends">Користувачі</a></li>
        <li><a href="settings">Налаштування</a></li>
        <li class="pull-right"><a href="?exit"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="timeline">
        <form class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <textarea class="form-control" id="inputExperience" placeholder="Новий Запис" rows="10" style="resize: none">В 12.00 з'явитись всім деканам в 202 кабінет. Для розгляду матеріалів по конференції</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
            	<!--<label class="control-label">Дата публікації</label>
              	<input class="form-control" type="date" name="created">-->
                <input type="text" class="form-control" placeholder="Дата публікації" name="created" id="datepickerFrom">
            </div>
            <div class="col-sm-6">
            	<!--<label class="control-label">Дата закінчення публікації</label>
              	<input class="form-control" type="date" name="created">-->
                <input type="text" class="form-control" placeholder="Дата закінчення публікації" name="created" id="datepickerTo">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <select class="form-control">
              	<option>Оголошення публікується</option>
              	<option>Всім</option>
              	<option>Ректорату</option>
              	<option>Деканату</option>
              	<option>Викладачам</option>
              	<option>Студентам</option>
              </select>
            </div>
            <div class="col-sm-3">
              <select class="form-control">
                <option>Оголошення викладачам</option>
                <option>КСІТ</option>
                <option>Економічого</option>
                <option>Юридичного</option>
              </select>
            </div>
            <div class="col-sm-3">
              <select class="form-control">
                <option>Оголошення студентам</option>
                <option>КСІТ</option>
                <option>Економічого</option>
                <option>Юридичного</option>
              </select>
            </div>
          </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10" style="text-align:right;">
                <button type="submit" class="btn btn-primary">Публікувати</button>
              </div>
            </div>
          </form>
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->