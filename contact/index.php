<!DOCTYPE HTML>
<html lang="">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Untitled Document</title>
      <link rel="stylesheet" type="text/css" href="../mystyles/navbar.css">
      <link rel="stylesheet" type="text/css" href="../mystyles/footer.css">
      <link rel="stylesheet" type="text/css" href="../mystyles/contact.css">
    </head>
    <body>
        <header>
            <?php include '../include/navbar.php'; ?>
        </header>
        <section>
            <div class="contact_container">
                <h1 class ="contact_header"> Contact Page </h1>
                <form id = 'myForm' action="post-message.php" method="post">

                    <label class = "contact_label" for = "name"> Name: </label>
                    <input class = "contact_input" type="text" id = "name" name="name" value =""><br>
                    <div id = "err_name" class = "red"> </div><br>

                    <label class = "contact_label" for = "gender">Gender:</label>
                    <select id = "gender" name = "gender" value ="">
                        <option value = "start">Select</option>
                        <option value = "Male">Male</option>
                        <option value = "Female">Female</option>
                    </select>
                    <br><div id = 'err_gender'> </div> <br>

                    <label class = "contact_label" for = "email">Email Address : </label>
                    <input class = "contact_input" type="text" id="email" name="email" value=""><br>
                    <div id = "err_email"> </div> <br>

                    <label class = "contact_label" for = "phone">Phone No. : </label>
                    <input class = "contact_input" type="text" id ="phone" name="phone" value=""><br>
                    <div id = "err_phone"> </div> <br>

                    <label class = "contact_label" for ="enquirytype"> Type of Enquiry: </label>
                    <select id = "enquirytype" name = "enquirytype" value = "">
                        <option value = "start">Select</option>
                        <option value = "General Enquiry">General Enquiry</option>
                        <option value = "Complaints">Complaints</option>
                        <option value = "Suggestions" > Suggestions </option>
                    </select>
                    <br><div id = 'err_enquirytype'> </div> <br>

                    <label class = "contact_label" for ="message">Message:</label> <br>
                    <textarea id = "message" name="message" rows="10" cols="30" value=""></textarea> <br>
                    <div id = 'err_message'> </div> <br>

                    <div class = "button_container">
                        <button class = "end_button" type = "button" onclick='check();'>Send</button>
                        <button class = "end_button" type = "reset">Reset</button>
                    </div>
                </form>
            </div>
        </section>
        <footer>
            <?php include '../include/footer.php'; ?>
        </footer>
    </body>
    <script>
      function check() {
        name = document.getElementById('name').value;
        gender = document.getElementById('gender').value;
        email = document.getElementById('email').value;
        phone = document.getElementById('phone').value;
        enquirytype = document.getElementById('enquirytype').value;
        message = document.getElementById('message').value;

        document.getElementById('err_name').innerHTML="";
        document.getElementById('err_gender').innerHTML="";
        document.getElementById('err_email').innerHTML="";
        document.getElementById('err_phone').innerHTML="";
        document.getElementById('err_enquirytype').innerHTML="";
        document.getElementById('err_message').innerHTML="";
        var a = ValidateEmail(email);


        if (name.length === 0)
        {
          document.getElementById('err_name').innerHTML="Enter your name";
          document.getElementById("err_name").style.color = "red";
        }

        else if (gender.length === 0 || gender === "start")
        {
          document.getElementById('err_gender').innerHTML="Select your gender";
          document.getElementById("err_gender").style.color = "red";
        }

        else if (email.length === 0)
        {
          document.getElementById('err_email').innerHTML="Enter your email";
          document.getElementById("err_email").style.color = "red";
        }

        else if (a === false)
        {
          document.getElementById('err_email').innerHTML="Enter a valid email e.g. example@gmail.com";
          document.getElementById("err_email").style.color = "red";
        }

        else if (phone.length === 0)
        {
          document.getElementById('err_phone').innerHTML="Enter your phone number";
          document.getElementById("err_phone").style.color = "red";
        }

        else if (enquirytype.length === 0 || enquirytype === "start")
        {
          document.getElementById('err_enquirytype').innerHTML="Select the type of enquiry";
          document.getElementById("err_enquirytype").style.color = "red";
        }

        else if (message.length === 0)
        {
          document.getElementById('err_message').innerHTML="Enter enquiry message";
          document.getElementById("err_message").style.color = "red";
        }
        else
        {
          document.getElementById('myForm').submit();
        }
      }
      function ValidateEmail(mail) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return !!mail.match(mailformat);
      }
    </script>
</html>