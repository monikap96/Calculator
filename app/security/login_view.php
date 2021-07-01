<!doctype html>
<html  xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" />
    </head>
    <body>
        <div style="margin: auto;
                width: 500px;
                padding: 50px;
                vertical-align: middle";>
            <form class="pure-form pure-form-stacked" action='<?php echo (_APP_ROOT); ?>/app/security/login.php' method="post">
                <label for="username-or-email">Username or Email</label>
                <input type="text" id="login" name="login" value="<?php out($form['login']);?>"/>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" />
                <input type="submit" class="pure-button pure-button-primary" value="Sign in"/>
            </form>
            <hr>
            <a href="/app/security/registration_view.php">
                If you don't have an account <b><u>Create an account</u></b>
            </a>
            
            <?php
                if(isset($messages)){
                    if(count($messages)>0){
                        echo "<ol style='padding: 10px 10px 10px 50px; border-radius: 5px; background-color: #ff5555; width:250px;'>";
                        foreach ($messages as $key => $message) {
                            echo "<li>".$message."</li>";
                        }
                        echo "</ol>";
                    }
                }

            ?>
        </div>
    </body>
</html>