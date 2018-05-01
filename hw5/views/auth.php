<h1>Авторизация</h1>
<form action="/auth/" method="post">
  <input type="text" name="login" value="" placeholder="Login" />
  <br/>
  <input type="password" name="password" value="" placeholder="Password" />
  <br/>
  <input type="submit" name="submit_auth" value="Submit" />
</form>
<?
echo "<pre>";
var_dump($params);
echo "</pre>";
?>