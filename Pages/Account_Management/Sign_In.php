


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>דף התחברות</title>

    <link rel="stylesheet" href="../../CSS/style.css">
    


</head>

<body>
    <br>

    <header>
        <menu type="toolbar">
            <nav>
                <button dir="rtl"> <a href="../../index.php">דף הבית</a></button><br>
                <button dir="rtl"> <a href="./Sign_Up.php">הרשמה</a></button><br>
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

                    <p>
                        <label for="SI-username" dir="rtl">שם משתמש: </label>
                        <input type="text" id="SI-username" name="username" placeholder="כתובת הדואר האלקטרוני" dir="rtl">
                    </p>

                    <p>
                        <label for="SI-password" dir="rtl">סיסמה: </label>
                        <input type="password" id="SI-password" name="password" placeholder="סיסמה" dir="rtl">
                        <a href="./Sign_Up.php" dir="rtl" style="text-align: right;size: 30em;">לא רשום?</a>
                    </p>

                    <p>
                        <button type="submit" id="Login" dir="rtl">התחברות</button>
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
        $('#Login').click(function() {
            let username = $('#SI-username').val();
            let password = $('#SI-password').val();
            console.log(username, password);
            if(username != "" && password != "") {
                console.log("if in");
                $.ajax({
                    url: "../../PHP/signInCheck.php",
                    type: "POST",
                    cache: false,
                    data: {"username": username, "password": password},
                    success: function(data) {
                        console.log(data);
                        if (data == "Success") {
                            alert("Wait for the browser to automatically redirect you..")
                            window.location.href = '../../index.php';
                        }
                        else {
                            alert("Username Or Password " + data)
                        }
                    }
                });
            }
            else {
                alert("Username and Password cannot be empty.")
            }
        });

    });

</script>

</html>