// Vẽ biểu đổ Thống kê Loại sản phẩm sử dụng ChartJS
var $objChartThongKeLoaiSanPham;
var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext("2d");

var $objChartThongKeTopSPBanChay;
var $chartOfobjChartThongKeTopSPBanChay = document.getElementById("chartOfobjChartThongKeTopSPBanChay").getContext("2d");

var $objChartThongKeDoanhThu;
var $chartOfobjChartThongKeDoanhThu = document.getElementById("chartOfobjChartThongKeDoanhThu").getContext("2d");

$(document).ready(function() {
    // Vẽ biểu đồ Loại sản phẩm
    $.ajax({
        url: '/sephora/backends/ajax/baocao-thongkeloaisanpham-ajax.php',
        type: "GET",
        success: function (response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function () {
                myLabels.push((this.TenLoaiSanPham));
                myData.push(this.SoLuong);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
                $objChartThongKeLoaiSanPham.destroy();
            }
            $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
                // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                type: "bar",
                data: {
                    labels: myLabels,
                    datasets: [{
                        data: myData,
                        borderColor: "#9ad0f5",
                        backgroundColor: "#9ad0f5",
                        borderWidth: 1
                    }]
                },
                // Cấu hình dành cho biểu đồ của ChartJS
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Thống kê Loại sản phẩm"
                    },
                    responsive: true
                }
            });
        },
        error:function(res) {
            alert('Lỗi khi vẽ biểu đồ')
        }
    });

    $.ajax({
        url: '/sephora/backends/ajax/baocao-thongketop3spbanchaynhat-ajax.php',
        type: "GET",
        success: function (response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function () {
                myLabels.push((this.TenSanPham));
                myData.push(this.SoLuong);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeTopSPBanChay !== "undefined") {
                $objChartThongKeTopSPBanChay.destroy();
            }
            $objChartThongKeTopSPBanChay = new Chart($chartOfobjChartThongKeTopSPBanChay, {
                // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                type: "horizontalBar",
                data: {
                    labels: myLabels,
                    datasets: [{
                        data: myData,
                        borderColor: "#3eb52f",
                        backgroundColor: "#3eb52f",
                        borderWidth: 1
                    }]
                },
                // Cấu hình dành cho biểu đồ của ChartJS
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Thống kê sản phẩm bán chạy nhất"
                    },
                    responsive: true
                }
            });
        },
        error:function(res) {
            alert('Lỗi khi vẽ biểu đồ')
        }
    });

    // Vẽ biểu đồ doanh thu
    $.ajax({
        url: '/sephora/backends/ajax/baocao-thongkedoanhthu-ajax.php',
        type: "GET",
        success: function (response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function () {
                myLabels.push((this.NgayTao));
                myData.push(this.DoanhThu);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeDoanhThu !== "undefined") {
                $objChartThongKeDoanhThu.destroy();
            }
            $objChartThongKeDoanhThu = new Chart($chartOfobjChartThongKeDoanhThu, {
                // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                type: "line",
                data: {
                    labels: myLabels,
                    datasets: [{
                        data: myData,
                        borderColor: "#edcc11",
                        backgroundColor: "#edcc11",
                        borderWidth: 1
                    }]
                },
                // Cấu hình dành cho biểu đồ của ChartJS
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Thống kê doanh thu"
                    },
                    responsive: true
                }
            });
        },
        error:function(res) {
            alert('Lỗi khi vẽ biểu đồ')
        }
    });
});