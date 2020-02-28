// variable declaration
let selectedInterest = [];

// functions
$(".adding_interest").click(function(){
    let getInterest = $(".inserted_interest").val();
    let showAddedInterest = `<li style="background: rgb(115, 143, 147); color: rgb(255, 255, 255)">${getInterest}</li>`;
    $(".interestContainer__lists").append(showAddedInterest);
    selectedInterest.push(getInterest);
})

$(".interestContainer__lists li").click(function(){
    $(this).css("background","#738f93");
    $(this).css("color","#fff");
    selectedInterest.push($(this).text());
})