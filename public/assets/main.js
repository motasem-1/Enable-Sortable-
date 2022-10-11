$(document).ready(function (){


    $("[name='filter_by_category']").on('change', function () {
        var catgeory_id = $(this).val();

        if (catgeory_id) {
            window.open('' + window.location.pathname + "?filter=" + catgeory_id, '_self');
        } else {
            window.open('' + window.location.pathname + '', '_self');

        }
    })
})


    // on click sort button
    $(document).on('click','#sort_btn', function () {

        var id = window.location.href.split("/").pop().split("filter=")[1];

        // check if category id exist in url
        if (id) {

            // send csrf token with post ajax request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var list = [];
            $('#sortable li').each(function(i) {
                if ($(this).attr('rel') != undefined) {
                    list.push({
                        'role': i + 1,
                        'claim_id': $(this).data('claim')
                    });
                }
            });

            $.ajax({
                url: "sort/" + id,
                type: "POST",
                cache: false,
                data: {
                    'data': JSON.stringify(list),
                    'product_id': id
                },
                beforeSend: function () {
                    $(".loaderspiner").removeClass('d-none');
                },
                success: function (response) {
                    alert('data have been saved successfully')
                    setTimeout(function () {
                        $(".loaderspiner").addClass('d-none');
                    }, 500);
                },error:function (){
                    setTimeout(function () {
                        $(".loaderspiner").addClass('d-none');
                    }, 500);
                }
            });
        } else {
            alert('No Data Found')
        }

    });








