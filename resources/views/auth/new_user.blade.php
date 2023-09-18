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
    <title>RapidX | New User</title>
    
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
                    <h1>RapidX</h1>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Change Password</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" id="formChangePassword" method="get" novalidate>
                        @csrf
                        <!-- <span style="float: right; color: red;" id="spanErrorUsername"></span> -->
                        <br>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" name="username" id="txtChgPassUsername" placeholder="Your Username" required>
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <!-- <span style="float: right; color: red;" id="spanErrorPassword"></span> -->
                        <br>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" name="password" id="txtChgPassGivenPass" placeholder="Enter Given Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" name="new_password" id="txtChgPassNewPass" placeholder="Enter New Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" name="confirm_password" id="txtChgPassConfPass" placeholder="Confirm Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <button type="submit" id="btnChangePassword" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2" id="iLoginIcon"></i> <span id="spanChangePassText">Change Password</span></button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0"><a href="/RapidX/" class="card-link">Login</a></p>
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
        $(document).ready(function(){
            $("#formChangePassword").submit(function(event){
                event.preventDefault();
                ChangePassword();
            });
        });

        function ChangePassword(){
            $.ajax({
                url: 'change_password',
                method: 'post',
                dataType: 'json',
                data: $("#formChangePassword").serialize(),
                beforeSend: function(){
                    $("#btnChangePassword").attr('disabled', 'disabled');
                    $("#spanChangePassText").text('Changing Password...');
                },
                success: function(JsonObject){
                    // alert(JSON.stringify(JsonObject));
                    $("#btnChangePassword").removeAttr('disabled');
                    $("#spanChangePassText").text('Change Password');

                    if(JsonObject['result'] == 1){
                        $("#spanErrorUsername").text('');
                        $("#spanErrorPassword").text('');
                        window.location = "/RapidX/";
                        // alert('OK');
                    }
                    else{
                        if(JsonObject['error']['username'] != undefined){
                            $("#txtChgPassUsername").addClass('border-danger');
                            $("#txtChgPassUsername").attr('title', JsonObject['error']['username']);
                        }
                        else{
                            $("#txtChgPassUsername").removeClass('border-danger');
                            $("#txtChgPassUsername").attr('title', '');
                        }

                        if(JsonObject['error']['password'] != undefined){
                            $("#txtChgPassGivenPass").addClass('border-danger');
                            $("#txtChgPassGivenPass").attr('title', JsonObject['error']['password']);
                        }
                        else{
                            $("#txtChgPassGivenPass").removeClass('border-danger');
                            $("#txtChgPassGivenPass").attr('title', '');
                        }

                        if(JsonObject['error']['new_password'] != undefined){
                            $("#txtChgPassNewPass").addClass('border-danger');
                            $("#txtChgPassNewPass").attr('title', JsonObject['error']['new_password']);
                        }
                        else{
                            $("#txtChgPassNewPass").removeClass('border-danger');
                            $("#txtChgPassNewPass").attr('title', '');
                        }

                        if(JsonObject['error']['confirm_password'] != undefined){
                            $("#txtChgPassConfPass").addClass('border-danger');
                            $("#txtChgPassConfPass").attr('title', JsonObject['error']['confirm_password']);
                        }
                        else{
                            $("#txtChgPassConfPass").removeClass('border-danger');
                            $("#txtChgPassConfPass").attr('title', '');
                        }

                        if(JsonObject['error']['username'] == undefined && JsonObject['error']['password'] == undefined && JsonObject['error']['new_password'] == undefined && JsonObject['error']['confirm_password'] == undefined) {

                            $("#txtChgPassGivenPass").addClass('border-danger');
                            $("#txtChgPassGivenPass").attr('title', 'Given password must match with username.');
                        }
                    }
                }
            });
        }
    </script>
  </body>
</html>
@endauth
