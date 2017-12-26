<?php
$con = mysqli_connect('localhost', 'root', '', 'grow01');

$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$date = date("Y-m-d");

$login = "SELECT username FROM users WHERE username = '$username'";
$login_query = mysqli_query($con, $login);
$login_query = mysqli_fetch_array($login_query);
if ($login_query == '' || $login_query == NULL) {
  $insert = "INSERT INTO users (username, passwd, first_name,
  surname, gender, birthday, sdate) VALUES ('$username',
     '$password', '$first_name', '$surname', '$gender', '$birthday', '$date')";
  $insert_query = mysqli_query($con, $insert) or die (mysqli_error($con));
  echo "<script>alert('Cadastro realizado com sucesso');window.location.href='index.html';</script>";
}else{
  echo "<script>alert('Este Nome de Usuário já está sendo usado');window.location.href='cadastro.html'</script>";
}
 ?>
