@php
    session_start();
    $isLogin = false;
    if(isset($_SESSION['rapidx_user_id'])){
        $isLogin = true;
    }
@endphp

@if($isLogin)
    <script type="text/javascript">
        window.location = "{{ route('dashboard') }}";
    </script>
@else
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>RapidX | Login</title>
    
    @include('shared.links.cssLinks')
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <!-- <div class="p-1"><img src="../../app-assets/images/logo/robust-logo-dark.png" alt="branding logo"></div> -->
                    <!-- <h1>RapidX</h1> -->
                    <center>
                        <img src="{{ asset('public/images/RAPIDX LOGO.PNG') }}" style="max-width: 250px;">
                    </center>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with RapidX</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" id="formLogin" method="get" novalidate>
                        <span style="float: right; color: red;" id="spanErrorUsername"></span>
                        <br>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" name="username" id="user-name" placeholder="Your Username" required>
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <span style="float: right; color: red;" id="spanErrorPassword"></span>
                        <br>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" name="password" id="user-password" placeholder="Enter Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <!-- <fieldset>
                                    <input type="checkbox" id="remember-me" class="chk-remember" name="remember">
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset> -->
                            </div>
                            <!-- <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div> -->
                        </fieldset>
                        <button type="submit" id="btnLogin" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2" id="iLoginIcon"></i> <span id="spanLoginText">Login</span></button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <!-- <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p> -->
                    <!-- <p class="float-sm-right text-xs-center m-0">New to QADS? <a href="register-simple.html" class="card-link">Sign Up</a></p> -->
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    @include('shared.links.jsLinks')

    <script type="text/javascript">
    // $(document).on('keydown',function(e){
    // 	if ($("#user-password").is(":focus")) {
    // 	  setTimeout(function() {
    // 	  	$("#user-password").val('');
    // 	  }, 200);
    // 	}
    // });
        $(document).ready(function(){
            $("#formLogin").submit(function(event){
                event.preventDefault();
                SignIn();
            });
        });

        function SignIn(){
            $.ajax({
                url: 'sign_in',
                method: 'get',
                dataType: 'json',
                data: $("#formLogin").serialize(),
                beforeSend: function(){
                    $("#btnLogin").attr('disabled', 'disabled');
                    $("#spanLoginText").text('Logging in...');
                },
                success: function(JsonObject){
                    $("#btnLogin").removeAttr('disabled');
                    $("#spanLoginText").text('Login');

                    if(JsonObject['result'] == 1){
                        $("#spanErrorUsername").text('');
                        $("#spanErrorPassword").text('');
                        window.location = "{{ route('dashboard') }}";
                        // alert(JSON.stringify(JsonObject));
                    }
                    else if(JsonObject['result'] == 2) {
                        window.location = "new_user";
                    }
                    else{
                        if(JsonObject['error']['username'] != undefined){
                            $("#spanErrorUsername").text(JsonObject['error']['username']);
                        }
                        else{
                            $("#spanErrorUsername").text('');
                        }

                        if(JsonObject['error']['password'] != undefined){
                            $("#spanErrorPassword").text(JsonObject['error']['password']);
                        }
                        else{
                            $("#spanErrorPassword").text('');
                        }

                        if(JsonObject['error']['username'] == undefined && JsonObject['error']['password'] == undefined){
                            $("#spanErrorUsername").text(JsonObject['error']);
                        }
                    }
                }
            });
        }
    </script>
  </body>
</html>
@endauth