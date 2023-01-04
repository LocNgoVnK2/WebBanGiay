<style>
.line{
    margin: auto;
  width: 100%;
  background: linear-gradient(135deg, yellow 0%,red 100%);
  height: 5px;
}
img.card-img-top{
    padding: 15px;
    height: 180px;
    width: 100%;
    background: linear-gradient(to top, #ffffff 0%, #ff9933 100%);
}
</style>


<?php


function mysubstr($str,$limit){
    if(strlen($str)<=$limit) return $str;
    return mb_substr($str,0,$limit-3,'UTF-8').'...';
}


 if (!$danhsach) {
    die("Không thể kết nối SQL :" . $connect->connect_error);
    exit();
}
while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) {
    echo "
    <div class=\"col-md-3\" style=\"margin-bottom: 20px;\">
    <a href=\"XuLyChonSP.php?id=". $row["id"] ."\" style=\"text-decoration: none; color: black;\">
        <div class=\"card\">
                <img class=\"card-img-top\" src=\"" . $row["HinhAnh"] . "\" alt=\"ảnh lỗi\" >
                <div class=\"card-body\" style=\"background-color: #f9f9f9;\">
                    <h6 class=\"card-title\" style=\"font-weight: Bold;\">" . mysubstr($row["TenSP"],20) . "</h6>
                    <div class =\"line\"></div>   
                    <p style=\"font-size: 20px; font-weight: 700;\">" . $row["DonGia"] . " VND</p>
                
                </div>
                </div>
                </a>
                </div>
    ";
}
?>