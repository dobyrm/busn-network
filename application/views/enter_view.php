<div class="login-box">
      <div class="login-logo">
        <a href="#">ПВНЗ "Буковинський університет"</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Увійдіть на сайт , щоб почати сеанс</p>
        <p style="color:red;text-align:center;font-weight:bold;"><?=$data;?></p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="login" class="form-control" placeholder="E-mail">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback auchPass">
            <input type="password" name="pass" class="form-control" placeholder="Пароль">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <!--<label>
                  <input type="checkbox"> Пам'ятай мене
                </label>-->
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="enter" value="enter" class="btn btn-primary btn-block btn-flat auchOk">Увійти</button>
              <button type="submit" class="btn btn-primary btn-block btn-flat auchRememberPass">Відновити</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!--<a href="#" class="remembPassAuch">Я забув свій пароль</a>-->
        <a href="#" class="OkPassAuch">Увійти</a><br>
        <!--<a href="register.html" class="text-center">Реєстрація нового користувача</a>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->