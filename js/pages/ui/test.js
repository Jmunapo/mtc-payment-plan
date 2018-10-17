async function confirmSave(phone) {
    //https://sweetalert.js.org/guides/
    return swal({
        title: "Confirm",
        closeOnClickOutside: false,
        closeOnEsc: false,
        text: "Nothing found yet, would you like us to place you on a waiting list",
        icon: "warning",
        buttons: ["Delete", "Save"],
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("Your information is saved, you will get updates via SMS on " + phone, {
                icon: "success",
            });
            revertForm();
            return true;
        } else {
            swal("Your information will be deleted shortly");
            revertForm();
            return false;
        }
    });
}

function validate(arr) {
    var fields = ['City', 'Name', 'Phone', 'Rooms'].concat(arr);
    var check = true;
    fields.forEach(f => {
        var field = $(`#input${f}`);
        if (field.val() === '') {
            addKeyUp(field);
            check = false;
            $(field).addClass('error-box');
        }
    })
    return check;
}

function setError(el) {
    $(el).addClass('error-box');
    addKeyUp(el);
}

function addKeyUp(ele) {
    $(ele).on('focus', e => {
        $(ele).removeClass('error-box');
    })
}

async function modalClosed(phone) {
    //https://sweetalert.js.org/guides/
    return swal({
            title: "Confirm cancel",
            text: "You did not select any, would you like to be on the waiting list ?",
            icon: "warning",
            buttons: ["No", "Yes"],
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Your information is saved, you will get updates via SMS on " + phone, {
                    icon: "success",
                });
                revertForm();
                return true;
            } else {
                swal("Your information will be deleted shortly");
                revertForm();
                return false;
            }
        });
}