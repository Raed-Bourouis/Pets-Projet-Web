<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Dashboard</title>
    <script src="https://kit.fontawesome.com/faa6c9467e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/formsstyle.css">
</head>

<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const userItem = button.closest('.user');
                userItem.remove();
            });
        });
    });
</script>

<?php
require('./dash.php');
?>

<body>
             <!-- Header -->
             <header>
                <nav>
                    <div>
                        <img id="logo" src="../assets/logoweblight.png" alt="Logo">
                    </div>
                    <div id="nav-list">
                        <ul>
                            <li><a href="home.html">Home</a></li>
                            <li><a href="AboutUs.html">About Us</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropbtn">Services&nbsp;<i class="fa-solid fa-caret-down"></i></a>
                                <div class="dropdown-content">
                                  <a href="adopt-user.html">Adopt a Pet</a>
                                  <a href="Surrender.html">Surrender a Pet</a>
                                  <a href="Volunteerpage1.html">Volunteer</a>
                                </div></li>
                            <li><a href="market.html">Marketplace</a></li>
                            <li><a href="cart.html"><i class="fas fa-cart-plus"></i> Cart</a></li>
                            <li><a href="sign-in.html">Sign In</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- End of Header -->

    <div class="container">
        <h1>Forms Dashboard</h1>
        <!-- Statistics -->
            <?php echo formsStats(); ?>
            <!-- <div class="stat-item">
                <i class="fa-brands fa-wpforms"></i>
                <div class="stat-text">
                    <p>Active Forms</p>
                    <strong>2</strong>
                </div>
            </div> -->


        </div>
        <!-- End of Statistics -->
        <!-- forms Dashboard -->
        <?php echo fillFormsDash(); ?>
        <!-- <table id="formdash" class="pure-table-horizontal">
            <tr class="dashelement">
                <th>Form Name</th>
                <th>Views</th>
                <th>Submissions</th>
                <th>Actions</th>
            </tr>
            <tr class="dashelement">
                <td>Weekly Volunteer Form </td>
                <td>0</td>
                <td>0</td>
                <td class="btncontain"><button type="button" class="formaction">View</button><button class="formaction">Edit</button><button class="formaction">View submissions</button><button class="formaction">Export submissions</button></td>
            </tr>
            <tr class="dashelement">
                <td>Veterinary Volunteer Form </td>
                <td>0</td>
                <td>0</td>
                <td class="btncontain"><button class="formaction">View</button><button class="formaction">Edit</button><button class="formaction">View submissions</button><button class="formaction">Export submissions</button></td>
            </tr>
            <tr class="dashelement">
                <td>Adoption Form</td>
                <td>0</td>
                <td>0</td>
                <td class="btncontain"><button class="formaction">View</button><button class="formaction">Edit</button><button class="formaction">View submissions</button><button class="formaction">Export submissions</button></td>
            </tr>
            <tr class="dashelement">
                <td>Surrender Form</td>
                <td>0</td>
                <td>0</td>
                <td class="btncontain"><button class="formaction">View</button><button class="formaction">Edit</button><button class="formaction">View submissions</button><button class="formaction">Export submissions</button></td>
            </tr>


        </table> -->
    </div>
          <!-- Footer -->
      <footer>
        <div>
            <img id="logo" src="../assets/logoweblight.png" alt="Logo">
        </div>
        <div>
            <p style="font-weight: bold;">Addresses:</p>
            <p><a href="https://www.google.com/maps/place/Denden,+Manouba" style="color:white; text-decoration:none"><i class="fa-solid fa-location-pin"></i>&nbsp;Denden, Manouba</a></p>
            <p><a href="https://www.google.com/maps/place/Av.+Moncef+Bey,+Tunis" style="color:white; text-decoration:none"><i class="fa-solid fa-location-pin"></i>&nbsp;Moncef Bey, Tunis</a></p>
        </div>
        <div>
            <p style="font-weight: bold;"> Contact Us</p>
            <p ><a href="mailto:pets@gmail.com" style="color:white; text-decoration:none" ><i class="fa-regular fa-envelope"></i>&nbsp;Email: pets@gmail.com</a></p>
            <p><i class="fa-solid fa-phone"></i>&nbsp;Tel: +216 12 898 757</p>
            <p><i class="fa-solid fa-fax"></i>&nbsp;Fax: +216 62 69 26</p>
            <p>RIB: 156549855955558598</p>
        </div>
    </footer>
<!-- End of Footer -->
</body>

</html>