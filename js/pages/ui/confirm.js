$(function () {
    $('.js-sweetalert button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'basic') {
            showBasicMessage();
        }
       
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
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
       
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
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
