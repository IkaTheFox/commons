
<?php 
  session_start();
  if(isset($_SESSION["user"])){
    print('
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Project.html</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
              <li><a href="about.html">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#signout">Sign out</a></li>
                <li><a href="#save">Save</a></li>
                <li><a href="#load">Load</a></li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Worn Items</li>
                        <li> Ragged top</li>
                        <li> Ragged throusers</li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Pocket</li>
                        <li>Nothing</li>
                    </ul>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>



    ');
  }else{


print('<div class="navbar navbar-default navbar-fixed-top unlogged" role="navigation">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Project.html</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="about.html">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#signup" data-toggle="modal">Sign up</a></li>
            <li><a href="#signin" data-toggle="modal">Sign in</a></li>

        </ul>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="signin" role="dialog">
  <div class="modal-dialog">

    <i class="fa fa-cog fa-spin fa-3x fa-fw loginspinner" style="display:none;"></i>
    <div class="modal-content">
        <form class="form-horizontal login" role="form" action="javascript:login()" method="POST">
          <div class="modal-header">
            <h4>Sign in</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="pseudo" placeholder="Nickname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" placeholder="SuperSecretPassword123" required="required">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-secundary" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="signup" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal register" role="form" action="javascript:vnsReg()" method="POST">
          <div class="modal-header">
            <h4>Sign up</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="mail" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="mail" placeholder="example@mymail.com" required="required">
                </div>
                <div class="alert alert-warning" style="display: none;" id="invalidmail">
                  Please enter a valid e-mail address.
                </div>
              </div>
              <div class="form-group">
                <label for="pseudo" class="col-sm-3 control-label">Pseudo</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nick" placeholder="Nickname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="pass" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="pass" placeholder="SuperSecretPassword123" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="pass2" class="col-sm-3 control-label">Password again</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="pass2" placeholder="Input the same password" required="required">
                </div>
              </div>
              <div class="alert alert-warning" style="display: none;" id="notmatching">
                  Passwords do not match.
                </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-secundary" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </form>
    </div>
  </div>
</div>');
  }
 ?>

 <script type="text/javascript">
  function vnsReg()
  {
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


    if(p1 === p2){
      //passwords match
      var MailRegex = /^(([^(@| )]+)@([^(@| )]+)(\.)([^(@| )]+))$/;
      if(MailRegex.test(mail)){
        //Mail is conform
        mail = MailRegex.exec(mail);
        mail = mail[1];
        // String to create JSON object
      var text =  '{' +
               '"username":"' + username + '",' + 
               '"password":"' + password + '",' +
               '"email":"' + mail + '"'
            '}'; //{"username":"[usrnm]","password":"[pswrd]"}
        //alert(text);
      var jsonData = JSON.parse(text);

      $.post("http://localhost/Project/register.php", JSON.stringify(jsonData),
        function(data, status){
          var jsonData = JSON.parse(data);
          $("header").html(jsonData.message);
        });//The function is only executed when
      alert(jsonData.username);

      }else{
        $("div#invalidmail").show(); 
      }

    }else{
      //send an alert to the user
      $("div#notmatching").show();
    }

  }
</script>