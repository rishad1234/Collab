// variable declaration
let window_height = $(window).height();
let window_width = $(window).width();
let contentOfEditor; // stores the value of the editor(in html)
let editor_height = 500;

// initializing the editor with specific height;
$('.content').richText({
    height: editor_height
});

// after clikc on submit button following function takes the value from editor and stores in variable
$(".getValEditor").click(function () {
    // $('.content').val('<div>Hello 123</div>').trigger('change');
    contentOfEditor = $('.content').val();
    console.log(contentOfEditor);
});