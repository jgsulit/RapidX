@php
    session_start();
    $isLogin = false;
    $user_level_id = "";
    if(isset($_SESSION['rapidx_user_level_id'])){
        $isLogin = true;
        $user_level_id = $_SESSION['rapidx_user_level_id']; 
        $user_id =  $_SESSION["rapidx_user_id"];
        // $rapidx_employee_number =  $_SESSION["rapidx_employee_number"];
    }
@endphp

@if($isLogin)
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>RapidX | @yield('title')</title>
    @include('shared.links.cssLinks')
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <style type="text/css">
        .swal-wide{
            width: 300px;
            height: 150px;
            font-size: 10px;
        }    
    </style>

    <input type="hidden" id="txtGlobalUserLevelId" value="{{ $user_level_id }}">
    {{-- <input type="hidden" id="txtGlobalSessionUserLevelId" value=""> --}}
    <input type="hidden" id="txtGlobalUserId" value="{{ $user_id }}"  style="margin-left: 800px;">
    @include('shared.pages.header')

    @include('shared.links.jsLinks')


    @if($user_level_id == 1) 
        @include('shared.pages.navbar')
    @elseif($user_level_id == 2)
        @include('shared.pages.navbar_admin')
    @else
        @include('shared.pages.navbar_user')
    @endif

    @yield('content')

    <!-- Required for all pages -->
    <!-- <form id="logoutForm" method="POST" style="display: none;">
        @csrf
    </form> -->

    @include('shared.pages.footer')


    @yield('js_content')


    <script type="text/javascript">
        $(document).ready(function(){
            $("#aLogout").click(function(event){
                UserLogout();
            });
        });

        function UserLogout(){
            $.ajax({
                url: "user_logout",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(JsonObject){
                    if(JsonObject['result'] == 1){
                        window.location = 'login';
                    }
                    else{
                        alert('Logout Error!');
                    }
                }
            });
        }
    </script>
  </body>
</html>
@else
    <script type="text/javascript">
        window.location = "login";
    </script>
@endauth