$(document).ready(function(){
    $('.btn-delete').click(function(e){ //thuc hien event tren doi tuong class=btn-delete
      var lsp_ma = $(this).data('lsp-ma');
      //debugger;

        Swal.fire({
            title: 'Bạn có chắc xóa mã LSP = '+ lsp_ma,
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
            
            window.location.href="/sephora.com/loaisp/delete.php?lsp_ma="+lsp_ma;

            }
          })
        })
});