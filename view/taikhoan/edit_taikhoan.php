<div>
    <div>
    <div> 
        <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
            <div>
                <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                    } 
                ?>
                <form action="index.php?act=edit_taikhoan" method="POST">
                    <div>
                        Email 
                        <input type="email" name="email" value="<?=$email?>">
                    </div>
                    <div>
                        Tên đăng nhập 
                        <input type="text" name="user" value="<?=$user?>">
                    </div>
                    <div>
                        Mật khẩu 
                        <input type="password" name="pass" value="<?=$pass?>">
                    </div>
                    <div>
                        Địa chỉ 
                        <input type="text" name="address" value="<?=$address?>">
                    </div>
                    <div>
                        Điện thoại
                        <input type="text" name="tel" value="<?=$tel?>">
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="CẬP NHẬT">
                        <input type="reset" value="NHẬP LẠI">
                    </div>
                </form>  
                <h2>
                <?php
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }
                ?> 
                </h2> 
        </div>
    </div>
        
    </div>
    <div class="boxphai">
        <?php include "view/boxright.php";?>
    </div>
</div>