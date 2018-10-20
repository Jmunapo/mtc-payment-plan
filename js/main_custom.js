$('.signout-btn').click(()=>{
    $.get("./account/logout.php");
    window.location.reload()
})