<div id="vue-login">
  <nav class="navbar navbar-expand navbar-dark bg">
    <a class="navbar-brand" href="login.php">
      <h2>Cashier App</h2>
    </a>
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="login">Login</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="regist">Registrasi</a>
      </li>
    </ul>

  </nav>

  <form id="form-container" method="post" action="<?= BASEURL?>public/login/validate">
    <div class="form-group">
      <div id="form-title">
        <h1 class="form-title"><?= $data['title']?></h1>
      </div>
      <td class="row">
        <div class="col-md-4">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user-o" aria-hidden="true"></i>
              </div>
              <input type="text" class="form-control" onmouseover="this.focus();" placeholder="Username" name="username" required>
            </div>
          </div>
        </div>
      </td>
      <td class="row">
        <div class="col-md-4">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <span class="fa fa-id-card" aria-hidden="true"></span>
              </div>
              <p style=""></p>
              <input type="password" class="form-control" onmouseover="this.focus();" placeholder="Password" name="password" required>
            </div>
          </div>
        </div>
      </td>
      <button type="submit" class="btn" name="submit">{{button_text}}</button>
  </form>
</div>