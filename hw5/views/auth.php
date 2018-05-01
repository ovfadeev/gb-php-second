<h1>Авторизация</h1>
<?if ($params["result"] === false){?>
  <form action="/auth/" method="post">
    <input type="text" name="login" value="" placeholder="Login" />
    <br/>
    <input type="password" name="password" value="" placeholder="Password" />
    <br/>
    <input type="submit" name="submit_auth" value="Submit" />
  </form>
<?} else {?>
  <?
  echo "<pre>";
  var_dump($params);
  echo "</pre>";
  ?>
<?}?>