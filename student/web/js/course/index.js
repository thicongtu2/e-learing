let csrfToken = $('meta[name=csrf-token]').attr("content");
$('.register_course').click(function () {
    let data = {
        course_id: $(this).data('id'),
        _csrf: csrfToken
    };
    AjaxFactory('/material/create', data, func);
});

let func = function () {

};

