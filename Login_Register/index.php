<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="../mystyles/navbar.css">
    <link rel="stylesheet" type="text/css" href="../mystyles/footer.css">
    <link rel="stylesheet" type="text/css" href="../mystyles/login.css">
</head>
<body>
    <header style="z-index: 5">
        <?php include '../include/navbar.php'; ?>
    </header>
    <section>
        <div class="container">
            <input type="checkbox" id="check">
            <div class="login form">
                <h1>Login</h1>
                <form action="login.php" method="post" id="signInForm">
                    <?php //email input?>
                    <input type="text" id="email" name="email" placeholder="Enter your email" required>
                    <?php //password input?>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <input type="button" onClick='this.form.submit();' class="button" value="Login">
                </form>
                <div class="signup">
                    <span class="signup">Don't have an account?
                        <label for="check">Register</label>
                    </span>
                </div>
            </div>
            <div class="registration form">
                <h1>Signup</h1>
                <form action="signUp.php" method="post" id="regForm">
                    <?php //username input?>
                    <input type="text" id="username" name="username" placeholder="Enter your username">
                    <div id="err_username"></div>
                    <?php //email input?>
                    <input type="text" id="email" name="email" placeholder="Enter your email">
                    <div id="err_email"></div>
                    <?php //password input?>
                    <input type="password" id="password" name="password" placeholder="Create a password">
                    <div id="err_password"></div>
                    <?php //confirm password?>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
                    <div id="err_confirm_password"></div>
                    <input type="button" class="button" onClick="this.form.submit()" value="Signup">
                </form>
                <div class="signup">
                    <span class="signup">Already have an account?
                     <label for="check">Login</label>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <footer style="z-index: 5">
        <?php include '../include/footer.php'; ?>
    </footer>
    <script>
        function ValidateEmail(mail) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return !!mail.match(mailformat);
      }

        function checkReg() {
            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            var a = ValidateEmail(email);
            if (username == "") {
                alert("Please enter your username");
            } else if (email == "") {
                alert("Please enter your email");
            } else if (password == "") {
                alert("Please enter your password");
            } else if (confirm_password == "") {
                alert("Please confirm your password");
            } else if (password === confirm_password) {
                alert("Passwords do not match");
            } else if (a === false) {
                alert("Please enter a valid email e.g. example@gmail.com");
            } else {
                document.getElementById('regForm').submit();
            }
        }
    </script>
</body>

