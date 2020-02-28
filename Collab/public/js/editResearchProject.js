$(".submit-after-edit").css("display", "none");
let editor_height = $(window).height() - $(".navbar").height();


$('.content').richText({
    height: editor_height
});
$(".richText").css("display", "none");
$(".richText").css("margin-top", "1rem");

$(".edit_article").click(function () {

    // taking the inside html of " researchTemplate__holder " 
    let getInsideHTML = $(".researchTemplate__holder").html();
    // display none to researchTemplate__holder
    $(".researchTemplate__holder").css("display", "none");
    $(".richText").css("display", "block");
    $('.content').val(getInsideHTML).trigger('change');
    // edit button off
    $(this).css("display", "none");
    // submit after edit button on
    $(".submit-after-edit").css("display", "block");

});

$(".submit-after-edit").click(function () {

    // gettinht the html after edit from editor
    let getAfterEdit = $(".content").val();
    $(".researchTemplate__holder").html(getAfterEdit);

    $(".richText").css("display", "none");

    $(".researchTemplate__holder").css("display", "block");
    $(".edit_article").css("display", "inline-block");

    // submit after edit button off
    $(".submit-after-edit").css("display", "none");
});