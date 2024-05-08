<?php
try {
  $db = new PDO(
    'mysql:host=localhost;dbname=pets;charset=utf8',
    'root',
    ''
  );
} catch (Exception $e) {
  die('Error : ' . $e->getMessage());
}

$total_users_query = $db->query("SELECT count(*) as count from users");
$total_users = $total_users_query->fetch(PDO::FETCH_ASSOC)['count'];

$admin_users_query = $db->query("SELECT count(*) as count from users where role=1");
$admin_users = $admin_users_query->fetch(PDO::FETCH_ASSOC)['count'];

$regular_users_query = $db->query("SELECT count(*) as count from users where role=2");
$regular_users = $regular_users_query->fetch(PDO::FETCH_ASSOC)['count'];

$vol_form_query = $db->query("SELECT count(*) as count from volunteersforms");
$vol_form = $vol_form_query->fetch(PDO::FETCH_ASSOC)['count'];

$vet_form_query = $db->query("SELECT count(*) as count from vetforms");
$vet_form = $vet_form_query->fetch(PDO::FETCH_ASSOC)['count'];

$surrender_query = $db->query("SELECT count(*) as count from surrender");
$surrender_count = $surrender_query->fetch(PDO::FETCH_ASSOC)['count'];

$adopt_query = $db->query("SELECT count(*) as count from adopt");
$adopt_count = $adopt_query->fetch(PDO::FETCH_ASSOC)['count'];

$users=$db->query("SELECT * FROM users");


$v1 = $db->query('SELECT * FROM volunteersforms');
$v2 = $db->query('SELECT * FROM vetforms');
$v3 = $db->query('SELECT * FROM adopt');
$v4 = $db->query('SELECT * FROM surrender');


function usersStats(){
    global $total_users, $admin_users, $regular_users;
    return "
    <div class='container'>
      <h1>User Dashboard</h1>
      <!-- Statistics -->
      <div class='statistics'>
        <div class='stat-item'>
          <i class='fas fa-users'></i>
          <div class='stat-text'>
            <p>Total Users</p>
            <strong>$total_users</strong>
          </div>
        </div>
        <div class='stat-item'>
          <i class='fas fa-user-shield'></i>
          <div class='stat-text'>
            <p>Admins</p>
            <strong>$admin_users</strong>
          </div>
        </div>
        <div class='stat-item'>
          <i class='fas fa-user'></i>
          <div class='stat-text'>
            <p>Regular Users</p>
            <strong>$regular_users</strong>
          </div>
        </div>
      </div>
    </div>";
}

function formsStats(){
    global $vet_form,$vol_form,$adopt_count,$surrender_count;
    $sum=$vet_form+$vol_form+$adopt_count+$surrender_count;
    return "
    <div class='statistics'>
    <div class='stat-item'>
        <i class='fa-regular fa-envelope'></i>
        <div class='stat-text'>
            <p>Submissions</p>
            <strong>$sum</strong>
        </div>
    </div>
    ";
}

function fillUsersDash($id,$name, $email,$role, $datenaiss){
    $rolee= $role==1 ? 'Admin':'User';
    $aux3=$_SERVER['PHP_SELF'];
    $action="$aux3";
    $aux="form method='post' action='$action'";
    $delete= $role==2 ? "<".$aux."><button name='deletebutton' value='$id' class='btn delete-btn'><i class='fas fa-trash-alt'></i> Delete</button></form>":'';
    return"
    <li class='user' data-user-id='1'>
    <div class='user-details'>
      <h3>$name</h3>
      <p>Email: $email</p>
      <p>Role: $rolee</p>
      <p class='user-join-date'>Birthdate: $datenaiss</p>
    </div>
    <div class='user-options'>
      $delete
    </div>
  </li>
    ";
    
}


function fillFormsDash(){
    global $vet_form,$vol_form,$adopt_count,$surrender_count;
    return "
    <table id='formdash' class='pure-table-horizontal'>
            <tr class='dashelement'>
                <th>Form Name</th>
                <th>Submissions</th>
                <th>Actions</th>
            </tr>
            <tr class='dashelement'>
                <td>Weekly Volunteer Form </td>
                <td>$vol_form</td>
                <td class='btncontain'><button onclick=redirection('./Volunteerpage2.php') type='button' class='formaction'>View</button><button onclick=redirection('./view1.php') class='formaction'>View submissions</button></td>
            </tr>
            <tr class='dashelement'>
                <td>Veterinary Volunteer Form </td>
                <td>$vet_form</td>
                <td class='btncontain'><button onclick=redirection('./Volunteerpage3.php')  type='button' class='formaction'>View</button><button onclick=redirection('./view2.php') class='formaction'>View submissions</button></td>
            </tr>
            <tr class='dashelement'>
                <td>Adoption Form</td>
                <td>$adopt_count</td>
                <td class='btncontain'><button onclick=redirection('./adoption-app1.php')  type='button' class='formaction'>View</button><button onclick=redirection('./view3.php') class='formaction'>View submissions</button></td>
            </tr>
            <tr class='dashelement'>
                <td>Surrender Form</td>
                <td>$surrender_count</td>
                <td class='btncontain'><button onclick=redirection('./Surrender.html')  type='button' class='formaction'>View</button><button onclick=redirection('./view4.php') class='formaction'>View submissions</button></td>
            </tr>


        </table>";
}


function view1(){
  global $v1;
  while(($entree = $v1->fetch())){
    echo "<div>";
    foreach($entree as $key => $value){
      if(is_numeric($key)) {continue;}
      echo "<p class='key' style='display:inline; color:red'>$key : </p>$value<br>";
  }
    echo "</div><hr>";

    }

}


function view2(){
  global $v2;
  while(($entree = $v2->fetch())){
    echo "<div>";
    foreach($entree as $key => $value){
      if(is_numeric($key)) {continue;}
      echo "<p class='key' style='display:inline; color:red'>$key : </p>$value<br>";
  }
    echo "</div><hr>";

    }

}

function view3(){
  global $v3;
  while(($entree = $v3->fetch())){
    echo "<div>";
    foreach($entree as $key => $value){
      if(is_numeric($key)) {continue;}
      echo "<p class='key' style='display:inline; color:red'>$key : </p>$value<br>";
  }
    echo "</div><hr>";

    }

}

function view4(){
  global $v4;
  while(($entree = $v4->fetch())){
    echo "<div>";
    foreach($entree as $key => $value){
      if(is_numeric($key)) {continue;}
      echo "<p class='key' style='display:inline; color:red'>$key : </p>$value<br>";
  }
    echo "</div><hr>";

    }

}



