$('.def-row').click($event=>{
    var regNumber = $($event.target.parentNode)[0].children[0].innerText;
    window.location = `defaulters.php?reg=${regNumber}`;
})

$('.plan-row').click($event=>{
    var regNumber = $($event.target.parentNode)[0].children[0].innerText;
    window.location = `view-plan.php?reg=${regNumber}`;
})

var curr = 'unapproved';

function switchTable(table){
    if(table === "defaulters"){
        $(`#notify`).removeClass('d-none');
    }else{
        $(`#notify`).addClass('d-none');
    }
    if(table === curr ){
        return;
    }
     $('#applicants-title').html(`${table} plans`);
    $(`#${curr}`).animateCss('fadeOutDown');
    setTimeout(()=>{
        $(`#${curr}`).addClass('d-none');
        $(`#${curr}`).removeClass('animated');
        $(`#${curr}`).removeClass('fadeOutDown');
        $(`#${table}`).removeClass('d-none');
        $(`#${table}`).animateCss('fadeInDown');
        curr = table;
    },500)
}
var currnt = 'all';

function switchTo(group){
    if(group === currnt ){
        return;
    }
     $('#sendto').html(`${group} plans`);
 
}
