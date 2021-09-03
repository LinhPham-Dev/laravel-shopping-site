<script src="{{ asset('asset-frontend') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('asset-frontend') }}/vendor/parallax/parallax.min.js"></script>
<script
    src="{{ asset('asset-frontend') }}/vendor/{{ asset('asset-frontend') }}/imagesloaded/{{ asset('asset-frontend') }}/imagesloaded.pkgd.min.js">
</script>
<script src="{{ asset('asset-frontend') }}/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>
<script src="{{ asset('asset-frontend') }}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('asset-frontend') }}/vendor/owl-carousel/owl.carousel.min.js"></script>
<!-- Main JS File -->
<script src="{{ asset('asset-frontend') }}/js/main.min.js"></script>

<script>
    function addItemToOrder(id, color_id, size_id) {

        event.preventDefault();

        const url = `/cart/add`;

        const _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: url,
            data: {id: id, color: color_id, size: size_id, _token: _token},
            success: function (res) {
               alert(res.message);
               window.location.reload();
            },
            error: function(res) {
               console.log(res);
            }
        });

    }
</script>
