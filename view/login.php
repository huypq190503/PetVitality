<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./view/user/CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Font-awesome/css/all.min.css">
    <link rel="stylesheet" href="./view/user/CSS/Dang_nhap.css">
    <script src="../JS/dangKy - dangNhap.js"></script>
</head>
<style>
        .error {
      color: red;
      font-weight: bold;
    }

    .success {
      color: green;
      font-weight: bold;
    }
</style>

<body>
    <!-- Header -->
    <!-- <div class="frame--header--container">
        <iframe src="Header.html" frameborder="0" class="frame--header" scrolling="no"></iframe>
    </div> -->


    <!-- Nội dung đăng nhập -->
    <div class="dangnhap--container col-12">
    <div>
    <h2 class="thongbao" id="thongbao" style=" color: red; ;font-size: 1vw;" > 
    <?php
        if(isset($thongbao)&& ($thongbao)!=""){
            echo $thongbao;
        }


    ?>
    </div>
        <div class="dangnhap--title">ĐĂNG NHẬP</div>
        <div>Nếu bạn có tài khoản, xin vui lòng đăng nhập.</div>

        <form action="index.php?act=login" method="POST" class="col-12">
            <div class="dangnhap--sdt">
                <label for="sdt" class="col-12">Email <span>*</span></label>
                <input type="text" placeholder="Email" id="sdt" name="email" class="col-12 input">
            </div>

            <div class="dangnhap--matkhau">
                <label for="mk" class="col-12">Mật khẩu <span>*</span></label>
                <input type="password" placeholder="Mật khẩu" id="mk" name="pass" class="col-12 input">
            </div>
            <div class="btn--dangnhap center">
                <input type="submit" name="login" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-primary" onclick="checkLogin()" value="Đăng nhập">
            </div>
            <div class="dangnhap--dangky">
                Bạn chưa có tài khoản?
               <a href="index.php?act=sign_up">Đăng ký tại đây</a> 
            </div>
            </div>
        </form>
    <!-- Footer -->
    <!-- <script>
    function checkLogin() {
  var checkemail = "<?php $checkemail ?>";
  

  if (checkemail == true) {
   alert ("Đăng nhập thành công!");
  } else {
   alert ("Email hoặc mật khẩu sai!");
  }
}

</script> -->
</body>

<!-- Modal -->
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div> -->

</html>