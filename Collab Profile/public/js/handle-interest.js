// variable declaration
var selectedInterest = [];

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

$(".newInterestCard").hover(function(){
    $(this).css("opacity","0.9")
},function(){
    $(this).css("opacity","1.0")
})


$(".newInterestChildWrappers li").click(function(){
    
    $(this).css("background","white")
    $(this).css("color","black")
    var each_data = $(this).text()
    selectedInterest.push(each_data)

    // console.log($(this).text())

})

$(".send_my_interest").click(function(e){
    console.log(selectedInterest)
    
    // this block of code must be modified
    // user_id must be dynamic for a successful request

    var selectedInterests = `
        {
            "user_id": 4,
            "data": ${JSON.stringify(selectedInterest)}
        }    
    `
    // end of  block
    
    console.log(selectedInterests)
    $.ajax({
        url: "/api/interest/post",
        method: "POST",
        data: selectedInterests,
        dataType: "json",
        success: function(){
          console.log("Success")
        }
    });
    // e.preventDefault()
})
