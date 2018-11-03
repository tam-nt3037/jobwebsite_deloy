$(function () {
    $('[data-toggle="popover"]').popover({
        trigger: 'focus',
        html: true
    });
});

$(function () {
    $('button[name=btnSavedJobs]').on('click', function () {
        let id_candidate = $(this).attr("data-jobs-id-candidate");
        let id_post_news = $(this).attr("data-jobs-id-postnews");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'POST',
            url: '/user/saved_jobs',
            data: {
                id_candidate: id_candidate,
                id_post_news: id_post_news
            },
            success: function () {
                $('button[data-jobs-id-postnews='+id_post_news+']').removeClass('btn-primary').addClass('btn-warning');
                console.log("Saved job successful");
            },
            error: function (data) {
                alert("Error");
                console.log(data);
            }
        });
    });
});


function replaceAll(str, find, replace) {
    return str.replace(new RegExp(find, 'g'), replace);
}

$(function () {
    let result_replace = (window.location.pathname).replace("/search/", '');

    let name_span = replaceAll(result_replace, '%20', ' ');
    $('#name_category_span').html(' '+name_span);
});

