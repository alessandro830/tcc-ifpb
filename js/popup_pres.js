var confMsg004 = document.querySelector('.conf-msg004')
var saveDays004 = document.querySelector('.button_pres')

saveDays004.onclick = function() {
    localStorage.saveBtn004 = 'true'
}

    if(localStorage.saveBtn004 == 'true') {
        confMsg004.querySelector('p').innerText = "Os dados foram enviados com sucesso!"
        confMsg004.showModal()
        localStorage.saveBtn004 = 'false'
    }
confMsg004.querySelector('#ok3').onclick = function() {
    confMsg004.close()
    localStorage.saveBtn004 = 'false'
}