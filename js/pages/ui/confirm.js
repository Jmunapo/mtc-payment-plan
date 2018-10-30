$(function () {
    $('.js-sweetalert button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'basic') {
            showBasicMessage();
        }
       
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'prompt2') {
            showPromptMessage2();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
        }
        else if (type === 'success') {
            showSuccessMessage();
        }
        else if (type === 'with-custom-icon') {
            showWithCustomIconMessage();
        }
    });
});
$(function () {
    $('.js-sweetalert a').on('click', function () {
        var type = $(this).data('type');
        if (type === 'basic') {
            showBasicMessage();
        }
         else if (type === 'autoclose-timer') {
            showAutoCloseTimerMessage();
        }
       
        else if (type === 'prompt2') {
            showPromptMessage2();
        }
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
        }
        else if (type === 'success') {
            showSuccessMessage();
        }
        else if (type === 'with-custom-icon') {
            showWithCustomIconMessage();
        }
    });
});


function showAutoCloseTimerMessage() {
    swal({
        title: "MTC PLAN",
        text: "You will be redirected in 2 seconds.",
        animation: "slide-from-top",
        timer: 2000,
        showConfirmButton: false,
       
    });
    
   
}

function showPromptMessage() {
    swal({
        title: "MTC PLAN",
        text: "Please type a reason for disapproval:",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "type a reson here"
    }, function (inputValue) {
       
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("please type a reason"); return false
        }
        var obj = {phone_number}
        console.log(obj);
        $.post('../php/action/disapprove.php?text=fvcff', {inputValue ,phone_number}, (res)=>{
        console.log(res);
        });
        swal("Disapproved", "Message send: ", "success");
    });
}
function showSuccessMessage() {
    
    swal("Good job!", "You clicked the button!", "success");
}

function showAjaxLoaderMessage() {
    swal({
        title: "MTC PLAN",
        text: "Please Confirm Approval",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    }, function (a) {
        if(!a) return;
        var obj = {phone_number}
        console.log(obj);
       $.post('../php/action/send_text.php?text=fvcff', {phone_number}, (src)=>{
        console.log(src);
       });

        
        setTimeout(function () {
            swal("Application Approved", "confirmation send", "success");
        }, 2000);
    });
}
function showWithCustomIconMessage() {
    var obj = {phone_number}
        console.log(obj);
        $.post('../php/action/send_text2.php?text=fvcff', {phone_number}, (src)=>{
            console.log(src);
           });
    swal({
        title: "MTC PLAN",
        text:`Automatic SMS send to ${phone_number}`,
        imageUrl: "../images/download.png"
    });
}
function showPromptMessage2() {
    swal({
        title: "MTC PLAN",
        text: "Please type the message to be send:",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "type the message here"
    }, function (inputValue) {
       
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("please type your message"); return false
        }
        var obj = {phone_number}
        console.log(obj);
        $.post('../php/action/disapprove.php?text=fvcff', {inputValue ,phone_number}, (res)=>{
        console.log(res);
        });
        swal("Succefull", "Message send: ", "success");
    });
}
