<?php
$con = mysqli_connect('localhost', 'root', '', 'grow01');

$username = $_POST['username'];
$password = $_POST['password'];

$select = "SELECT * FROM users WHERE username = '$username' AND passwd = '$password'";
$query = mysqli_query($con, $select) or die (mysqli_error($con));
mysqli_close($con);
$query = mysqli_fetch_array($query);

$first_name = $query[3];
$surname = $query[4];
$gender = $query[5];
$birthday = date($query[6]);
$sdate = $query[7];
list ($b_year, $b_month, $b_day) = split('-', $birthday);

if($first_name == '' || $first_name == NULL){
  echo "<script>window.location.href='index.html';alert('Usuário ou Senha está incorreto')</script>";
}else{

  if(intval(date("Y"))>intval($b_year)){
    if(intval(date("m"))>intval($b_month)){
      $age = intval(date("Y")) - intval($b_year);
    }else{
      if(intval(date("d"))<intval($b_day)){
        $age = intval(date("Y"))-intval($_year)-1;
      }else{
        $age = intval(date("Y")) - intval($b_year);
      }
    }
  }else{
    $age = 'Indeterminada';
  }




  if($gender=='male'){
    $gender = 'Masculino';
  }else{
    $gender = 'Feminino';
  }
  echo "
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset='utf-8'>
      <title>KingSPACE - ClientArea</title>
      <link rel='stylesheet' href='css/master.css'>
      <link rel='stylesheet' href='css/normalize.css'>
      <link rel='stylesheet' href='css/forms.css'>
      <link rel='shorcut icon' type='img/x-icon' href='images/icons/crown.png'>
    </head>
    <body>

    <nav id='menu'>
      <div id='area'>
        <div id='logo'>
          <img src='images/icons/crown.png' class='img-logo'>
          <h1 class='title-logo'>KingSPACE</h1>
        </div>
        <div id='menu-links'>
          <ul type='none'>
            <li> <a href='index.html'>Sair</a> </li>
            <li> <a href='index.html'>Conteúdo</a> </li>
            <li> <a href='index.html'>Sobre Nós</a> </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class='layer-fixed'></div>

    <div class='layer'>
      <div>
          <h1>Informações da Conta</h1>
      </div>

      <table>
        <tr>
          <th>Nome</th>
          <td>$first_name</td>
        </tr>
        <tr>
          <th>Sobrenome</th>
          <td>$surname</td>
        </tr>
        <tr>
          <th>Sexo</th>
          <td>$gender</td>
        </tr>
        <tr>
          <th>Idade</th>
          <td>$age</td>
        </tr>
        <tr>
          <th>Membro Desde</th>
          <td>$sdate</td>
      </table></div>

    <div class='layer' id='back_moonlight01'>
    </div>
    </body>
  </html>
  ";

}


 ?>
