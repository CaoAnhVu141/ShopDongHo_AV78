<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    $(document).ready(function() {
        let page = 1;

        $('#load-more').click(function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a
            page++;
            $.ajax({
                url: '{{ route("loadmoreproduct") }}',
                type: 'GET',
                data: { page: page },
                success: function(response) {
                    $('#product-list').append(response.html);
                },
                error: function() {
                    alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
                }
            });
        });
    });

