var confMsg003 = document.querySelector('.conf-msg003')
var saveDays003 = document.querySelector('.button_just')

saveDays003.onclick = function() {
    localStorage.saveBtn003 = 'true'
}

    if(localStorage.saveBtn003 == 'true') {
        confMsg003.querySelector('p').innerText = "Justificativa enviada com sucesso!"
        confMsg003.showModal()
        localStorage.saveBtn003 = 'false'
    }
confMsg003.querySelector('#ok1').onclick = function() {
    confMsg003.close()
    localStorage.saveBtn003 = 'false'
}