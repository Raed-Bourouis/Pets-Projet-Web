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
                <td class='btncontain'><button type='button' class='formaction'>View</button><button class='formaction'>Edit</button><button class='formaction'>View submissions</button><button class='formaction'>Export submissions</button></td>
            </tr>
            <tr class='dashelement'>
                <td>Veterinary Volunteer Form </td>
                <td>$vet_form</td>
                <td class='btncontain'><button class='formaction'>View</button><button class='formaction'>Edit</button><button class='formaction'>View submissions</button><button class='formaction'>Export submissions</button></td>
            </tr>
            <tr class='dashelement'>
                <td>Adoption Form</td>
                <td>$adopt_count</td>
                <td class='btncontain'><button class='formaction'>View</button><button class='formaction'>Edit</button><button class='formaction'>View submissions</button><button class='formaction'>Export submissions</button></td>
            </tr>
            <tr class='dashelement'>
                <td>Surrender Form</td>
                <td>$surrender_count</td>
                <td class='btncontain'><button class='formaction'>View</button><button class='formaction'>Edit</button><button class='formaction'>View submissions</button><button class='formaction'>Export submissions</button></td>
            </tr>


        </table>";
}



