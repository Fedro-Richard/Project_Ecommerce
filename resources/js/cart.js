$(document).ready(function() {
    
    // Fungsi Update Quantity
    $(".cart-action-qty").click(function (e) {
        e.preventDefault();
        
        let button = $(this);
        let parent = button.closest(".cart-item");
        let id = parent.data("id");
        let qtyElement = parent.find(".qty-val");
        let currentQty = parseInt(qtyElement.text());
        let action = button.data("action"); // 'plus' or 'minus'

        if(action === "plus") {
            currentQty++;
        } else if(action === "minus" && currentQty > 1) {
            currentQty--;
        } else {
            return; // Jangan lakukan apa-apa jika minus ditekan saat qty 1
        }

        $.ajax({
            url: "/update-cart", // Pastikan route ini sesuai di web.php
            method: "PATCH",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                quantity: currentQty
            },
            success: function (response) {
                // Update UI tanpa reload
                qtyElement.text(currentQty);
                parent.find(".item-total-price").text('$' + response.itemSubtotal);
                $("#cart-subtotal").text('$' + response.total);
            }
        });
    });

    // Fungsi Remove Item
    $(".btn-remove").click(function (e) {
        e.preventDefault();
        
        let button = $(this);
        let parent = button.closest(".cart-item");
        let id = parent.data("id");

        if(confirm("Hapus item ini dari keranjang?")) {
            $.ajax({
                url: "/remove-from-cart",
                method: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id
                },
                success: function (response) {
                    parent.fadeOut(300, function() { $(this).remove(); });
                    $("#cart-subtotal").text('$' + response.total);
                    
                    // Jika total 0, reload agar muncul pesan kosong
                    if(response.total === "0.00") {
                        window.location.reload();
                    }
                }
            });
        }
    });
});