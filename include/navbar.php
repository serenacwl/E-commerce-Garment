
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <?php session_start(); ?>
</head>
<nav class = "navigation-bar" onload="verifySession()">
    <div class = "menu-bar">
        <input id="toggle" type="checkbox">
        <label for="toggle" class="hamburger">
            <div class="top-bun"></div>
            <div class="meat"></div>
            <div class="bottom-bun"></div>
        </label>
        <ul class="menu_box">
            <li><a class="menu__item" href="http://localhost/Assignment/">Home</a> </li>
            <li><a class="menu__item" href="http://localhost/Assignment/about/">About</a></li>
            <li><a class="menu__item" href="http://localhost/Assignment/item/">Items</a></li>
            <li><a class="menu__item" href="http://localhost/Assignment/contact/">Contact</a></li>
        </ul>
    </div>
    <div class = "logo">
        <img src="\Assignment\include\download.jpg" alt="HIHI" width="60px" height="60px">
        <a href="http://localhost/Assignment/">S I M P</a>
    </div>
    <form class="searchBox" id = "searchForm" method = "post" action = "http://localhost/Assignment/search.php"  name = "searchForm">
        <input class="searchInput" type="text" name="query" id="query" placeholder="Search">
        <a class="searchButton" href="#" onClick="submitSearch()"><i class="material-icons">search</i></a>
    </form>
    <div class = "cart">
        <a class="cartButton" href="http://localhost/Assignment/cart"><i class="material-icons">shopping_bag</i></a>
    </div>
    <div class = "user">
        <button id ="user" class="userButton" href="#"><i class="material-icons">account_circle</i></button>
        <ul class = "user_box">
            <li><a class="user__item" href="/Assignment/Login_Register/logout.php">Logout <i class="material-icons">logout</i></a></li>
        </ul>
        <a id = "login" class = "loginButton" href="http://localhost/Assignment/Login_Register"> LOGIN </a>
    </div>
</nav>
<style>
    img{
        width:60px;
        height:60px;
    }
</style>
<script>
    function submitSearch() {
        if (document.getElementById("query").value == "") {
            return false;
        }
        else {
            document.getElementById("searchForm").submit();
        }
    }
    <?php
        if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
            echo "document.getElementById('user').style.display = 'block';";
            echo "document.getElementById('login').style.display = 'none';";
        } else {
            echo "document.getElementById('user').style.display = 'none';";
            echo "document.getElementById('login').style.display = 'block';";
        }
    ?>


</script>
<style>
    img{
        width:60px;
        height:60px;
    }
</style>