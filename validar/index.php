<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de Inscripción</title>
<link rel="stylesheet" href="style.css" type="text/css" />

<?php
if(isset($error))
{
 ?>
 input:focus
 {
  border:solid red 1px;
 }
 <?php
}
?>

</head>
    
<?php

if(isset($_POST['btn-signup']))
{
 $uname = trim($_POST['uname']);
 $email = trim($_POST['email']);
 $upass = trim($_POST['pass']);
 $mno = trim($_POST['mno']);
 
 if(empty($uname))
 {
  $error = "No ha ingresado Nombre!!";
  $code = 1;
 }
 else if(!ctype_alpha($uname))
 {
  $error = "Debe ingresar solamente letras!!";
  $code = 1;
 }
 else if(empty($email))
 {
  $error = "No ha ingresado Mail!!";
  $code = 2;
 }
 else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error = "Mail ingresado no es válido!";
  $code = 2;
 }
 else if(empty($mno))
 {
  $error = "No ha ingresado número de celular";
  $code = 3;
 }
 else if(!is_numeric($mno))
 {
  $error = "Numbers only !";
  $code = 3;
 }
 else if(strlen($mno)!=10)
 {
  $error = "Debe ingresar 10 dígitos";
  $code = 3;
 }
 else if(empty($upass))
 {
  $error = "Debe ingresar Password";
  $code = 4;
 }
 else if((strlen($upass) < 8 )||(strlen($upass) >= 9 ))
 {
  $error = "Debe ingresar 8 caracteres alfanuméricos";
  $code = 4;
 }
 else
 {
  ?>
        <script>
        alert('Inscripción Validad y Enviada...');
  document.location.href='index.php';
        </script>
        <?php
 }
}
?>    
    
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<?php
if(isset($error))
{
 ?>
    <tr>
    <td id="error"><?php echo $error; ?></td>
    </tr>
    <?php
}
?>
<tr>
<td><input type="text" name="uname" placeholder="Nombre" value="<?php if(isset($uname)){echo $uname;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> /></td>
</tr>
<tr>
<td><input type="text" name="email" placeholder="Mail"  value="<?php if(isset($email)){echo $email;} ?>" <?php if(isset($code) && $code == 2){ echo "autofocus"; }  ?> /></td>
</tr>
<tr>
<td><input type="text" name="mno" placeholder="Celular" value="<?php if(isset($mno)){echo $mno;} ?>" <?php if(isset($code) && $code == 3){ echo "autofocus"; }  ?> /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Password" <?php if(isset($code) && $code == 4){ echo "autofocus"; }  ?> /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Enviar Inscripción</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html