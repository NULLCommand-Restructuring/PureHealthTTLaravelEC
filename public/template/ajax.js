$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(code, url) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { code },
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}

$('#upload_img').change(function () {

    let form = new FormData();
    if ($(this)[0].files[0] == null) {
        alert("Vui lòng chọn ảnh để upload!");
        $('#thumb').val('');
        $('#image_show').html('');
        return;
    }
    form.append('imgFile', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/upload-img',
        success: function (results) {
            if (results.error === false) {
                $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
                    '<img alt="Lỗi, vui lòng chọn lại ảnh" class="upload_image_product_purehealthtt" src="' + results.url + '" width="300px" height="300px"></a>');
                $('#thumb').val(results.url);
            } else {
                alert('Upload ảnh xảy ra lỗi, vui lòng kiểm tra lại');
                $('#thumb').val('');
                $('#image_show').html('');
            }
        }
    });
});

function addCart(url) {
    if (confirm('Bạn có muốn thêm sản phẩm này vào giỏ hàng?')) {
        $.ajax({
            type: 'POST',
            datatype: 'JSON',
            url: url,
            success: function (result) {
                alert(result);

                let hash = location.hash;
                location.reload();
                if (hash) {
                    location.hash = hash;
                }
                return;
            }
        });
    }
}

var forms = document.querySelectorAll("form[id^='add-to-cart-form-']");

forms.forEach(function (form) {
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        var formData = new FormData(event.target);
        addCart('/customer/add-carts?code=' + formData.get('code') + '&quantity=' + formData.get('quantity'));
    });
});

function deleteCart(url) {
    if (confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            url: url,
            success: function (result) {
                alert(result);
                location.reload();
                return;
            }
        })
    }
}

$('#submit_assessment').on('click', function (e) {
    if (confirm('Bạn có chắc muốn đăng đánh giá này, đánh giá đã đăng thì không thể xóa hoặc chính sửa! Bạn có muốn tiếp tục đăng?')) {
        var formData = $('#form_post_assessment').serialize();
        $.ajax({
            type: 'POST',
            url: '/customer/post-assessment',
            data: formData,
            success: function (response) {
                if (response.error == 1)
                    alert(response.message)
                else {
                    alert(response.message)
                    location.reload();
                }
                return;
            }
        });
    }
});