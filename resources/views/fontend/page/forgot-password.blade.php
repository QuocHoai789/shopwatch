<!DOCTYPE html>
<html>
<head>
  <title>Quên mật khẩu</title>
</head>
<style type="text/css">
  *{
    margin: 0px;
    padding: 0px;
  }
  .form-forgot{
    margin-top: 100px;
    width: 500px;
    height: 300px;
    margin: auto;
    background-color: red;
  }
   .h2{
    text-align: center;
  }
</style>
<body>
<div class="form-forgot">
  <h2>Quên mật khẩu</h2>
  <form method="post" action="{{route('post-forgot-password')}}" name="">
    @csrf
    <label>Nhập địa chỉ mail của bạn:</label>
    <input type="email" name="email" placeholder="Nhập vào email của bạn" >
    <input type="submit" name="sub-mail" value="Gửi">
  </form>
</div>
</body>
</html>