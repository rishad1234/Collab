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

})

$(".send_my_interest").click(function(e){
    console.log(selectedInterest)
    if(selectedInterest.length == 0){
        alert("Please Select an Interest");
        location.reload();
        return false;
    }else{
        var usr_id = $(".get_usr_id").text()
        var selectedInterests = `
            {
                "user_id": ${usr_id},
                "data": ${JSON.stringify(selectedInterest)}
            }    
         `
        $.ajax({
            url: "/api/interest/post",
            method: "POST",
            data: selectedInterests,
            dataType: "json",
            success: function(){
            console.log("Success")
            }
        });
    }
    
})

let user_id = $(".get_usr_id").text();

$(document).ready(function() {
    var usr_id = $(".get_usr_id").text()
    $.ajax({
        url: "/api/interest/get/"+usr_id,
        method: "GET",
        success: function(data){
            manipulateData(data);
        }
    });
});

var got_interest_arr=[];

function manipulateData(data){
    json_object = JSON.parse(data);
    
    json_object[0].forEach(element => {
        var itm = element['interest'];
        got_interest_arr.push(itm);
    });
    $(".newInterestChildWrappers li").each(function(i){
        for(var i = 0 ; i < got_interest_arr.length ;i++){
            if($(this).text() == got_interest_arr[i]){
                $(this).css("background-color","white");
                $(this).css("color","black");
                $(this).css("pointer-events","none");
            }
        }
    });
}



