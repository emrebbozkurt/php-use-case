$(document).ready(function () {
    $('.add-cart').on('click', function (e) {
        e.preventDefault();
        const id = $(this).attr("data-id");
        $.ajax({
            url: "/cart",
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
});
