$(document).ready(function(){
    $('.btn-delete').click(function(e){ //thuc hien event tren doi tuong class=btn-delete
      var sp_ma = $(this).data('sp-ma');
      //debugger;

        Swal.fire({
            title: 'Bạn có chắc xóa mã SP = '+ sp_ma,
            text: "Bạn sẽ không thể hoàn tác !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa!'
          }).then((result) => {
            if (result.value) {
              Swal.fire(
                'Đã xóa !',
                'Thành công !'
              )
            ///Điều hướng
            window.location.href="/sephora/sanpham/delete.php?sp_ma="+sp_ma;

            }
          })
        })
});