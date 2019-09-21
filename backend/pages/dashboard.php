<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');
// 2. Chuẩn bị câu truy vấn $sql
$sqlSoLuongSanPham = "select count(*) as SoLuong from `sanpham`";

$sqlSoLuongKH = "select count(*) as SoLuongKH from `khachhang`";

$sqlSoLuongDH = "select count(*) as SoLuongDH from `dondathang`";

$sqlSoLuongGY = "select count(*) as SoLuongGY from `gopy`";
// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
$result = mysqli_query($conn, $sqlSoLuongSanPham);
$resultKH = mysqli_query($conn, $sqlSoLuongKH);
$resultDH = mysqli_query($conn, $sqlSoLuongDH);
$resultGY = mysqli_query($conn, $sqlSoLuongGY);


// 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
// Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
$dataSoLuongSanPham = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $dataSoLuongSanPham[] = array(
        'SoLuong' => $row['SoLuong']
    );
}

$dataSoLuongKH = [];
while($row = mysqli_fetch_array($resultKH, MYSQLI_ASSOC))
{
    $dataSoLuongKH[] = array(
        'SoLuongKH' => $row['SoLuongKH']
    );
}
$dataSoLuongDH = [];
while($row = mysqli_fetch_array($resultDH, MYSQLI_ASSOC))
{
    $dataSoLuongDH[] = array(
        'SoLuongDH' => $row['SoLuongDH']
    );
}
$dataSoLuongGY = [];
while($row = mysqli_fetch_array($resultGY, MYSQLI_ASSOC))
{
    $dataSoLuongGY[] = array(
        'SoLuongGY' => $row['SoLuongGY']
    );
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary mb-2">
                <div class="card-body pb-0">
                    <div class="text-value" id="baocaoSanPham_SoLuong">
                        <h1><?= $dataSoLuongSanPham[0]['SoLuong'] ?></h1>
                    </div>
                    <div>Tổng số mặt hàng</div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ liệu</button>
        </div> <!-- Tổng số mặt hàng -->

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-danger mb-2">
                <div class="card-body pb-0">
                    <div class="text-value" id="baocaoKH_SoLuong">
                        <h1><?= $dataSoLuongKH[0]['SoLuongKH'] ?></h1>
                    </div>
                    <div>Tổng Khách hàng</div>
                </div>
            </div>
            <button class="btn btn-danger btn-sm form-control" id="refreshBaoCaoKH">Refresh dữ liệu</button>
        </div> <!-- Tổng số KHACH hàng -->

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-warning mb-2">
                <div class="card-body pb-0">
                    <div class="text-value" id="baocaoDH_SoLuong">
                        <h1><?= $dataSoLuongDH[0]['SoLuongDH'] ?></h1>
                    </div>
                    <div>Tổng số Đơn hàng</div>
                </div>
            </div>
            <button class="btn btn-warning btn-sm form-control" id="refreshBaoCaoDH">Refresh dữ liệu</button>
        </div> <!-- Tổng số DON hàng -->

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-info mb-2">
                <div class="card-body pb-0">
                    <div class="text-value" id="baocaoGY_SoLuong">
                        <h1><?= $dataSoLuongGY[0]['SoLuongGY'] ?></h1>
                    </div>
                    <div>Tổng số Góp ý</div>
                </div>
            </div>
            <button class="btn btn-info btn-sm form-control" id="refreshBaoCaoGY">Refresh dữ liệu</button>
        </div> <!-- Tổng số DON hàng -->
    </div><!-- row -->
<br>

    <div class="row">
        <!-- Biểu đồ thống kê loại sản phẩm -->
        <div class="col-sm-6 col-lg-6">
            <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
            <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
        </div><!-- col -->

        <div class="col-sm-6 col-lg-6">
            <canvas id="chartOfobjChartThongKeTopSPBanChay"></canvas>
            <button class="btn btn-outline-success btn-sm form-control" id="refreshThongKeTopSPBanChay">Refresh dữ liệu</button>
        </div><!-- col -->
    </div><!-- row -->

    <div class="row">
        <!-- Biểu đồ thống kê doanh thu -->
        <div class="col-sm-12 col-lg-12">
            <canvas id="chartOfobjChartThongKeDoanhThu"></canvas>
            <button class="btn btn-warning btn-sm form-control" id="refreshThongKeDoanhThu">Refresh dữ liệu</button>
        </div><!-- col -->

    </div><!-- row -->
</div>