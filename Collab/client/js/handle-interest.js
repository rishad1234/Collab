// variable declaration
let selectedInterest = [];

// functions
$(".interestContainer__lists li").click(function(){
    $(this).css("background","#738f93");
    $(this).css("color","#fff");
    selectedInterest.push($(this).text());
})

