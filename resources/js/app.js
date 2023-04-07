import * as bootstrap from 'bootstrap';

let main = document.getElementById('main');
let modal = new bootstrap.Modal(document.getElementById('modal'));
let confirmed = false;

main.addEventListener('click', function (event) {
    if (confirmed === false && event.target.id == 'deleteform') {
        event.preventDefault();
        let form = event.target.parentElement;
        if (event.target.id === 'deleteform') {
            modal.show();
            let confirmButton = document.getElementById('confirm')
            confirmButton.addEventListener('click', function (event) {
                confirmed = true;
                form.submit();
                modal.hide();
            })
        }
    }
})