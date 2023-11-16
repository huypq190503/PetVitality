<div>
    <div>
    <div>   
        <div class="boxtitle">QUÊN MẠT KHẨU</div>
            <div>
                <form action="index.php?act=quenmk" method="POST">
                    <div>
                        Email
                        <input type="email" name="email">
                    </div>
                    
                    <div>
                        <input type="submit" name="gui" value="GỬI">
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
</div>