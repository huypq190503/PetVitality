
<div  class="col-12" >
        <h1>DANH SÁCH THỐNG KÊ</h1>   
        <br>      
            <table class="table table-bordered border-primary">
                <tr>     
                    <th>MÃ DANH MỤC</th>
                    <th>TÊN DANH MỤC</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>            
                </tr>
                <?php
                    foreach($listthongke as $thongke){
                        extract($thongke);
                        echo '<tr>
                                <td>'.$madm.'</td>
                                <td>'.$tendm.'</td>
                                <td>'.$countsp.'</td>
                                <td>'.$maxprice.'</td>
                                <td>'.$minprice.'</td>
                                <td>'.$avgprice.'</td>
                            <tr>';
                        }
                ?>  
            </table>
        <div>
        <a href="?act=bieudo" class="btn btn-success">Biểu đồ</a>
        </div>
</div>
