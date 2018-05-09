<h1>Авторизация</h1>
<?if ($params["user"] === false){?>
  <p><?=$params["msg"]?></p>
  <form action="/auth/" method="post">
    <input type="text" name="login" value="" placeholder="Login" />
    <br/>
    <input type="password" name="password" value="" placeholder="Password" />
    <br/>
    <input type="submit" name="submit_auth" value="Submit" />
  </form>
<?} else {?>
  <p><?=$params["msg"]?></p>
  <?
  echo "<pre>";
  var_dump($params);
  echo "</pre>";
  ?>
<?}?>