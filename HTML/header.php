<?php
function getHeader()
{
    return '
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
                                </div>
                            </li>
                            <li><a href="market.html">Marketplace</a></li>
                            <li><a href="cart.html"><i class="fas fa-cart-plus"></i> Cart</a></li>
                            <li><a href="sign-in.html">Sign In</a></li>
                        </ul>
                    </div>
                </nav>
            </header>';
}

function getFooter()
{
    return '
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
            ';
}
?>