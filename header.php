<?php
session_start();
/*
 * Print a bootstrap alert
 * @param type : 'success' | 'info' | 'warning' | 'danger'
 * @param message : message to display
 */
function notify($type = "info",$message){
    print('
    
    <div class="alert alert-'. $type .' fade in">'
  . $message .
'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
}

function signedin()
    {print('
        <div class="navbar navbar-default navbar-fixed-top" role = "navigation" >
            <div class="container" >
                <div class="navbar-header" >
                    <button type = "button" class="navbar-toggle" data-toggle = "collapse" data-target = ".navbar-collapse" >
                        <span class="sr-only" > Toggle navigation </span >
                        <span class="icon-bar" ></span >
                        <span class="icon-bar" ></span >
                        <span class="icon-bar" ></span >
                    </button >
                    <a class="navbar-brand" href = "../Project/index.html" > Project . php</a >
                </div >
                <div class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav navbar-left" >
                        <li ><a href = "../Project/about.html" > About</a ></li >
                    </ul >
                    <ul class="nav navbar-nav navbar-right" >
                        <li><form class="signout" role="form" action="'. $_SERVER['PHP_SELF'] . '" method="POST">
                            <input type="hidden" name="signout" id="signout" value="signout">
                            <button type="submit" class="btn">Sign out</button>
                        </form></li>
                        <li ><a href = "#save" > Save</a ></li >
                        <li ><a href = "#load" > Load</a ></li >
                        <li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle = "dropdown" > Inventory <b
                                        class="caret" ></b ></a >
                            <ul class="dropdown-menu" >
                                <li class="dropdown-header" > Equipped Items </li >');

                               /* <li > Ragged top </li >
                                <li > Ragged throusers </li >
                                <li class="divider" ></li >
                                <li class="dropdown-header" > Pocket</li >
                                <li > Nothing</li >*/
    print('
                            </ul >
                        </li >
                    </ul >
                </div >
            </div >
        </div >
        </div >');
    }

function unsigned()
    { print('
        <div class="navbar navbar-default navbar-fixed-top unlogged" role="navigation" >
            <div class="container" >
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target= ".navbar-collapse" >
                        <span class="sr-only" > Toggle navigation </span >
                        <span class="icon-bar" ></span >
                        <span class="icon-bar" ></span >
                        <span class="icon-bar" ></span >
                    </button >
                    <a class="navbar-brand" href = "../Project/index.php" > Project . php</a >
                </div >
                <div class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav navbar-left" >
                        <li ><a href="../Project/about.html" > About</a ></li >
                    </ul >
                    <ul class="nav navbar-nav navbar-right" >
                        <li class="active" ><a href="#signup" data-toggle = "modal" > Sign up </a ></li >
                        <li ><a href="#signin" data-toggle="modal" > Sign in </a ></li >

                    </ul >
                </div >
            </div >
        </div >
        </div >


        <div class="modal fade" id="signin" role="dialog" >
            <div class="modal-dialog" >

                <i class="fa fa-cog fa-spin fa-3x fa-fw loginspinner" style="display:none;" ></i >
                <div class="modal-content" >
                    <form class="form-horizontal login" role="form" action="'. $_SERVER['PHP_SELF'] . '" method="POST">
                        <div class="modal-header" >
                            <h4 > Sign in </h4 >
                        </div >
                        <div class="modal-body" >
                            <div class="form-group" >
                                <label for="pseudo" class="col-sm-2 control-label" > Pseudo</label >
                                <div class="col-sm-10" >
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Nickname"
                                           required="required" >
                                </div >
                            </div >
                            <div class="form-group" >
                                <label for="password" class="col-sm-2 control-label" > Password</label >
                                <div class="col-sm-10" >
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="SuperSecretPassword123" required="required" >
                                </div >
                            </div >
                        </div >
                        <div class="modal-footer" >
                            <a class="btn btn-secundary" data-dismiss="modal" > Close</a >
                            <button type="submit" class="btn btn-primary" > Sign in </button >
                        </div >
                    </form >
                </div >
            </div >
        </div >

        <div class="modal fade" id = "signup" role = "dialog" >
            <div class="modal-dialog" >
                <div class="modal-content" >
                    <form class="form-horizontal register" role = "form" action = "javascript:vnsReg()" method = "POST" >
                        <div class="modal-header" >
                            <h4 > Sign up </h4 >
                        </div >
                        <div class="modal-body" >
                            <div class="form-group" >
                                <label for="mail" class="col-sm-3 control-label" > Email</label >
                                <div class="col-sm-9" >
                                    <input type = "email" class="form-control" id = "mail" placeholder = "example@mymail.com"
                                           required = "required" >
                                </div >
                                <div class="alert alert-warning" style = "display: none;" id = "invalidmail" >
        Please enter a valid e - mail address .
                                </div >
                            </div >
                            <div class="form-group" >
                                <label for="pseudo" class="col-sm-3 control-label" > Pseudo</label >
                                <div class="col-sm-9" >
                                    <input type = "text" class="form-control" id = "nick" placeholder = "Nickname"
                                           required = "required" >
                                </div >
                            </div >
                            <div class="form-group" >
                                <label for="pass" class="col-sm-3 control-label" > Password</label >
                                <div class="col-sm-9" >
                                    <input type = "password" class="form-control" id = "pass"
                                           placeholder = "SuperSecretPassword123" required = "required" >
                                </div >
                            </div >
                            <div class="form-group" >
                                <label for="pass2" class="col-sm-3 control-label" > Password again </label >
                                <div class="col-sm-9" >
                                    <input type = "password" class="form-control" id = "pass2"
                                           placeholder = "Input the same password" required = "required" >
                                </div >
                            </div >
                            <div class="alert alert-warning" style = "display: none;" id = "notmatching" >
        Passwords do not match .
                            </div >
                        </div >
                        <div class="modal-footer" >
                            <a class="btn btn-secundary" data-dismiss = "modal" > Close</a >
                            <button type = "submit" class="btn btn-primary" > Register</button >
                        </div >
                    </form >
                </div >
            </div >
        </div >
        <div class="alert alert-success fade in" id="registered" style="display:none;">
            Successfully registered, welcome !
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        <div class="alert alert-danger fade in" id="registrationfailed" style="display:none;">
            An error occured during registration. Please try again.
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        ');

    }



//Actual beginning of the page

if (isset($_SESSION["user"])) {
    if(isset($_POST["signout"])){
        session_destroy();
        session_start();
        unsigned();
        notify('success','Successfully signed out !');
    }else {
        signedin();
    }
}else {
//Extract username and password
    if (isset($_POST["pseudo"]) && isset($_POST["password"])) {
        require_once('db.php');
        $username = $_POST["pseudo"];
        $password = $_POST["password"];
        $ID = validate_user($username, $password);
        if ($ID > 0) {
            $_SESSION["user"] = $username;
            $_SESSION["ID"] = $ID;
            signedin();
            notify('success',"Welcome " . $username);
        } else {
            unsigned();

            notify('danger', "Invalid username or password");
        }
    }else{
        unsigned();
    }
}
?>
<script type="text/javascript">
    function vnsReg() {
        $("div#notmatching").hide();
        $("div#invalidmail").hide();
        // DOM operations with jQuery (Dynamically changing contents of the page)

        // Ajax with jQuery to talk to the server
        // Send some data in JSON format (httpRequest)
        // Wait for the httpResponse (JSON format)
        var p1 = $("#pass").val(); //access the values
        var p2 = $("#pass2").val();
        var nick = $("#nick").val();
        var mail = $("#mail").val();


        if (p1 === p2) {
            //passwords match
            var MailRegex = /^(([^(@| )]+)@([^(@| )]+)(\.)([^(@| )]+))$/;
            if (MailRegex.test(mail)) {
                $('#signup').modal('hide');
                //Mail is conform
                mail = MailRegex.exec(mail);
                mail = mail[1];
                // String to create JSON object
                var text = '{' +
                    '"username":"' + nick + '",' +
                    '"password":"' + p1 + '",' +
                    '"email":"' + mail + '"' +
                '}'; //{"username":"[usrnm]","password":"[pswrd]"}
                //alert(text);
                var jsonData = JSON.parse(text);

                $.post("http://localhost/Project/register.php", JSON.stringify(jsonData),
                    function (data, status) {
                        //alert(data);
                        var jsonData = JSON.parse(data);
                        if(jsonData.status === "valid")
                        {
                            $('#registered').show();
                        }else{
                            $('#registrationfailed').show();
                        }

                    });

            } else {
                $("div#invalidmail").show();
            }

        } else {
            //send an alert to the user
            $("div#notmatching").show();
        }
    }
</script>