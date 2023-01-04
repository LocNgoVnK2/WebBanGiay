<style>
    div.categorydiv {
        list-style: none;
        margin-top: 40px;
        padding: 24px;
        text-align: center;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        background: #f97f51;
    }
    a.category {
        transition: 0.5s;
        color: #ffffff;
        font-size: 20px;
        text-decoration: none;
        padding: 10px 10px;
        margin: auto;
    }
    a.category:hover {
        color: darkblue ;
        font-size: 25px;
    }
</style>
<div class="container-fluid" style="min-height: 100%;">
    <div class="row">
        <div class="col-md-9 offset-md-1">
            <div class="row">
                <div class="col-md-2 loaisanpham" style="border-right: 2px solid black;">
                    <h2 style="border: 4px solid black; border-radius:10%; margin:auto; width:175px; ">Hãng giày</h2>
                    <div class="categorydiv">
                        <?php


                        include_once "CauHinh.php";
                        $sql = "select * from loai";
                        $danhsach = $connect->query($sql);
                        if (!$danhsach) {
                            die("Không thể kết nối SQL :" . $connect->connect_error);
                            exit();
                        }
                        while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) {

                            if (isset($_SESSION['dataUser']) == false) {
                                echo "
                                <a class=\"category\"href=\"TrangChu.PHP?Category_id=" . $row["MaLoai"] . "\"><li>" . $row["TenLoai"] . "</li></a>
                                ";
                            } else {
                                if ($_SESSION['dataUser']['QuanTriVien'] == 1) {
                                    echo "
                                    <a class=\"category\" href=\"TrangChuAdmin.PHP?Category_id=" . $row["MaLoai"] . "\"><li>" . $row["TenLoai"] . "</li></a>
                                    ";
                                } else if ($_SESSION['dataUser']['QuanTriVien'] == 0) {
                                    echo "
                                    <a  class=\"category\"href=\"TrangChuUsers.PHP?Category_id=" . $row["MaLoai"] . "\"><li>" . $row["TenLoai"] . "</li></a>
                                    ";
                                }
                            }

                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">

                        <?php
                        if (isset($_GET["Category_id"]) && $_GET["Category_id"] > 0 && $_GET["Category_id"] < 5) 
                            $sql = "select * from sanpham where MaLoai=" . $_GET["Category_id"];
                            
                        else if (isset($_GET["search"])) {
                            $search = addslashes($_GET['search']);
                            $sql = "select * from sanpham where TenSP like '%$search%'";
                            
                        } 
                        else 
                            $sql = "select * from sanpham";
                            
                        $danhsach = $connect->query($sql);
                        include 'LoadGiay.php';   
                        $connect->close();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="footer"
    style="height: 50px; background-color: #f97f51; text-align: center; padding: 20px; display: table; width: 100%; color: white">
    <p>Địa chỉ: 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang</p>
</div>