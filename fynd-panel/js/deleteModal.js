$(document).ready(function(){
$(".image-delete-btn").on("click", function (e) {
    var elem = e.target;
    var url = '';
    if($(elem).hasClass("image-delete-btn")){
        url = $(elem).attr("data-url");
    }

    if ($(elem).hasClass("fa-trash")) {
        url = $(elem).parent().attr("data-url");
    }

    $(".image-delete-btn-action").attr("href", url);
});
});