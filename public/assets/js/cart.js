$(document).ready(function () {
    $('.delete-prod-cart').on('click', function (e) {
        e.preventDefault();
        const id = $(this).attr("data-id");
        $.ajax({
            url: "/cart/delete",
            type: "POST",
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')},
            data: {id: id},
            success: function (res) {
                window.location.reload();
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $('.destroy-cart').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/cart/destroy",
            type: "POST",
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')},
            success: function (res) {
                window.location.reload();
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $('.quantity').on('change', function (e) {
        e.preventDefault();
        const id = $(this).attr("data-id");
        const qty = $(this).val();
        $.ajax({
            url: "/cart/update",
            type: "POST",
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')},
            data: {id: id, qty: qty},
            success: function (res) {
                window.location.reload();
            },
            error: function (err) {
                console.log(err);
            }
        });
    })
});
