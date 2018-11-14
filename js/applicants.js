$('.plan-row').click($event=>{
    var regNumber = $($event.target.parentNode)[0].children[0].innerText;
    window.location = `view-plan.php?reg=${regNumber}`;
})
$('.plan-rows').click($event=>{
    var regNumber = $($event.target.parentNode)[0].children[0].innerText;
    window.location = `view-plans.php?reg=${regNumber}`;
})

var curr = 'unapproved';

function switchTable(table){
    //$('')
    if(table === curr ){
        return;
    }
    console.log(table)
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
