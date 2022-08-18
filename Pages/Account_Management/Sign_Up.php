


<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>דף הרשמה</title>

    <link rel="stylesheet" href="../../CSS/style.css">
    
    

</head>
<body>

    <header>
        <menu>
            <nav>
                <button dir="rtl"> <a href="../../index.php">דף הבית</a></button><br>
                <button dir="rtl"> <a href="./Sign_In.php">התחברות</a></button><br>
            </nav>
        </menu>
        
    </header>

    <br>
    <br>
    
    <div>
        <article>
            <main>
                <fieldset>
                    <legend dir="rtl">הרשמה:</legend>
    
                    <form method="POST">
    
                        <p dir="rtl"> שדות שמסומנים ב-(*) הם חובה. </p>
                
                        <p>
                            <label for="SU_First_Name" dir="rtl">(*) שם פרטי:</label>
                            <input type="text" id="SU_First_Name" name="first_name" class="floatLabel" dir="rtl" required>
                        </p>
                        
                        &nbsp;&nbsp;&nbsp;
                
                        <p>
                            <label for="SU_Last_Name" dir="rtl">(*) שם משפחה: </label>
                            <input type="text" id="SU_Last_Name" name="last_name" class="floatLabel" dir="rtl" required>
                        </p> 
                
                
                        <p>
                            <label for="SU_Username" dir="rtl">(*) שם משתמש: </label>
                            <input type="email" id="SU_Username" name="email" placeholder="כתובת דואר אלקטרוני" class="floatLabel" dir="rtl" required> &nbsp;
                        </p>
                 
                        <p>
                            <div dir="rtl">הסיסמה חייבת להיות בעלת 8 תווים לפחות.</div>
                            
                        </p>

                        <br>
                        <br>

                        <p>
                            
                            <label for="SU_Password" dir="rtl">(*) סיסמה: &nbsp;</label>
                            <input type="password" id="SU_Password" name="password" minlength="8" class="floatLabel" dir="rtl" required>
                        </p>
                
                        <p id="pass_paragraph">
                            <label for="SU_Password_Repeat" dir="rtl">(*) אימות סיסמה: &nbsp;</label>
                            <input type="password" id="SU_Password_Repeat" minlength="8" class="floatLabel" dir="rtl" required><br><br>
                            <div style="color: red;" id="pass_not_match"></div>
                        </p>
                
                        <p>
                            <button type="submit" id="submit" dir="rtl">הרשמה</button>
                        </p>
                
                    </form> 
                </fieldset>
            </main>
        </article>
    </div>

    <div>
        <footer>

        </footer>
    </div>
    
</body>

<script type="text/javascript" src="../../JS/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            let user = $('#SU_Username').val();
            let password = $('#SU_Password').val();
            let repass = $('#SU_Password_Repeat').val();
            let first_name = $('#SU_First_Name').val();
            let last_name = $('#SU_Last_Name').val();
            // console.log(user, password, first_name, last_name);
            if ((user != "" && first_name != "" && last_name != "" && password == repass && password != "" && repass != "") && password.length>=8) {
                // console.log("if in");
                $.ajax({
                    url: "../../PHP/saveAccount.php",
                    type: "POST",
                    cache: false,
                    data:{"username": user, "password": password, "first_name": first_name, "last_name": last_name},
                    success: function(data) {
                        // console.log(data);
                        if (data == "Success") {
                            alert("Registration Was a " + data);
                            window.location.href ="Sign_In.php";
                        }
                        else {
                            alert("Registration Has " + data);
                        }
                    }

                });
            }
            else {
                alert("Please fill all the required fields.")
                
            }
        });

    });

    $(document).ready(function() {
        $("#Verification_Button").click(function() {
            let user = $('#SU_Username').val();
            // console.log(user);
            if (user != "") {
                // console.log("if in");
                $.ajax({
                    url: "../PHP/verify_account.php",
                    type: "POST",
                    cache: false,
                    data: {"username": user},
                    success: function(data) {
                        // console.log(data);
                        if (data == "You can use that usernname") {
                            alert(data);
                        } else {
                            alert(data);
                        }
                    }
                }

                );
            }
            else {
                alert("User cannot be empty.")
            }
        });
    });

    </script>

</html>