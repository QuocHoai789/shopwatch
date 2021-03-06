<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" type="text/javascript"></script>
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
            text-decoration: none;
            font-family: montserrat;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background-image: linear-gradient(120deg, #3498db, #8e44ad);
        }

        .login-form {
            width: 360px;
            background: #f1f1f1;
            height: 580px;
            padding: 80px 40px;
            border-radius: 10px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .login-form h1 {

            text-align: center;
            margin-bottom: 60px;
        }

        .txtb {
            border-bottom: 2px solid #adadad;
            position: relative;
            margin: 30px 0;
        }

        .txtb input {
            font-size: 15px;
            color: #333;
            border: none;
            width: 100%;
            outline: none;
            background: none;
            padding: 0 5px;
            height: 40px;

        }

        .txtb span::before {
            content: attr(data-placehoder);
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            z-index: -1;
            transition: .5s;
        }

        .txtb span ::after {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            background: linear-gradient(120deg, #3498db, #8e44ad);
            transition: .5s;

        }

        .focus+span::before {
            top: -5px;
        }

        .focus+span::after {
            width: 100%;
        }

        .logbtn {
            display: block;
            width: 100%;
            height: 50px;
            border: none;
            background: linear-gradient(120deg, #3498db, #8e44ad, #3498db);
            background-size: 200%;
            color: #fff;
            outline: none;
            cursor: pointer;
            transition: .5s;
        }

        .logbtn:hover {
            background-position: right;
        }

        .mk {

            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .bottom-text {
            margin-top: 50px;
            text-align: center;
            font-size: 15px;
        }


    </style>
</head>

<body>
    <div class="login">
        <div class="wrap">
            <div class="col_1_of_login span_1_of_login">
                <div class="login-title">

                    <div id="loginbox" class="loginbox">
                        <form action="{{ route('post-user-login') }}" method="post" name="login"
                            class="login-form">
                            <h1 class="title">Đăng nhập</h1>
                            @csrf
                            @if(count($errors)>0 )
                                <div>
                                    <strong style="color: red">{{ $errors->first() }}</strong>
                                </div>
                            @elseif(session()->has('notification'))
                                <div>
                                    <strong style="color: red">Sai thông tin đăng nhập</strong>
                                </div>
                            @endif
                            <div class="txtb">
                                <input type="email" name="email">
                                <span data-placehoder="Email"></span>
                            </div>
                            <div class="txtb">
                                <input type="password" name="password">
                                <span data-placehoder="Mật khẩu"></span>
                            </div>
                    
                            <input type="submit" class="logbtn" name="login" value="Đăng nhập">
                            <div style=" margin-top: 15px; height: 100px">
                               <span style="margin-left: 73px;margin-top: 10px; font-size: 18px"> Hoặc đăng nhập với</span>
                               <div style="background-color: pink;margin-top: 10px">
                                 <div style="width:50px;height:50px;ma ;margin-left: 55px ; float: left ">
                                   <a href="">  <i class="fa fa-facebook-square" style="font-size:48px;color:blue"></i></a>
                                 </div>
                                 <div style="width:50px;height:50px;margin-left: 20px;float: left; ">
                                   <a href="">  <i class="fa fa-google-plus-circle" style="font-size:48px;color:red"></i></a>
                                 </div>

                                 <div style="width:50px;height:50px;margin-left: 20px;float: left; ">
                                     <a href=""><i class="fa fa-twitter" style="font-size:48px;color:blue"></i></a>
                                 </div>
                                
                             </div>
                            </div>
                           <div >
                               <a href="{{route('forgot-password')}}"><span style=" float: right;font-size: 16px; font-weight: italic">Bạn quên mật khẩu ?</span></a>
                           </div>
                            <div class="bottom-text">
                                Chưa có tài khoản? <a href="{{ route('user-sign-up') }}">Đăng ký</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <script type="text/javascript">
        $(".txtb input").on("focus", function () {
            $(this).addClass("focus");
        });

        $(".txtb input").on("blur", function () {
            if ($(this).val() == "")
                $(this).removeClass("focus");
        });
        
    </script>
</body>

</html>
