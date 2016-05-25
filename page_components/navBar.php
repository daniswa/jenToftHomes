



<div class="visible-md visible-lg hidden-xs hidden-sm">
    <div class='sideBar'>
        <ul class="listBox">
            <li class="listBox"><a class="navElement" href='index.php'>Home</a></li><br>
            <!--<li class="listBox"><a class="navElement" href='listings.php'>Listings</a></li><br>-->
            <li class="listBox"><a class="navElement" href='home_value.php'>Home Value</a></li><br>
            <li class="listBox"><a class="navElement" href='home_search.php'>Home Search</a></li><br>
            <li class="listBox"><a class="navElement" href='about.php'>About</a></li><br>
            <!--<li class="listBox"><a class="navElement" href='services.php'>Services</a></li><br>-->
            <li class="listBox"><a class="navElement" href='reviews.php'>Reviews</a></li><br>
            <li class="listBox"><a class="navElement" href='contact_us.php'>Contact Us</a></li><br>
        </ul>
        <?php include 'blog.php'; ?>
    </div>
</div>

<div id="navBarMobile">
    <div class="container">
    <div class="row">
        <div class="hidden-md hidden-lg visible-xs col-xs-12 visible-sm col-sm-12">
            <div class="col-xs-4 col-sm-4">
                <div class="dropdown">
                    <button class="btn btn-primary btn-xs btn-group-justified dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        HOME
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li class="mobile"><a href='index.php'>Home</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4">
                <div class="dropdown">
                    <button class="btn btn-primary btn-xs btn-group-justified dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        TOOLS
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li class="mobile"><a href='home_search.php'>Home Search</a></li>
                        <li class="mobile"><a href='home_value.php'>Home Value</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4">
                <div class="dropdown">
                    <button class="btn btn-primary btn-xs btn-group-justified dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ABOUT
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li class="mobile"><a href='about.php'>About</a></li>
                        <li class="mobile"><a href='reviews.php'>Reviews</a></li>
                        <li class="mobile"><a href='contact_us.php'>Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>