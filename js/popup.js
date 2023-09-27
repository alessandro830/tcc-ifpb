// inicio do JS para o pop-up de marcar o almoço

// Pegando as tags HTML por ID e Class
var confMsg = document.querySelector('.conf-msg')
var saveDays = document.querySelector('.button_save')
var btnYes = document.querySelector('#sim')
var btnNo = document.querySelector('#nao')

saveDays.onclick = function() {
    localStorage.saveBtn = 'true'
}

window.onload = function () {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var selectedDays = [];

    var ind = 0
    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            selectedDays.push(checkbox.id)
            ind = ind + 1
        }
    })

    // Mensagens para caso tenha algum checkbox marcado ou não

    if (localStorage.saveBtn == 'true' && ind > 0){
        confMsg.querySelector('p').innerText = "Deseja marcar os seguintes dias: " + selectedDays.join(', ') + "?"
        confMsg.showModal()
        localStorage.saveBtn = 'false'
    }else if (localStorage.saveBtn == 'true' && ind <= 0){
        confMsg.querySelector('p').innerText = "Deseja desmarcar os dias?"
        confMsg.showModal()
        localStorage.saveBtn = 'false'
    }
};

// Mensagens quando é selecionado sim ou não

btnYes.onclick = function () {
    confMsg.querySelector('p').innerText = "Confirmado."
    confMsg.querySelector('#sim').style.display = "none"
    confMsg.querySelector('#nao').style.display = "none"
    confMsg.querySelector('#ok').style.visibility = "visible"
    localStorage.saveBtn = 'false'
}

btnNo.onclick = function () {
    confMsg.querySelector('p').innerText = "Cancelado."
    confMsg.querySelector('#sim').style.display = "none"
    confMsg.querySelector('#nao').style.display = "none"
    confMsg.querySelector('#ok').style.visibility = "visible"
    localStorage.saveBtn = 'false'
}

confMsg.querySelector('#ok').onclick = function () {
confMsg.close()
localStorage.saveBtn = 'false'
}

// Fim do JS para o pop-up de marcar o almoço

// Inicio do JS para o pop-up do comentário

document.addEventListener('DOMContentLoaded', function () {
    var confMsg002 = document.querySelector('#conf-msg002');
    var saveDays002 = document.querySelector('.button_comment');

    saveDays002.onclick = function() {
        localStorage.saveBtn002 = 'true';
    };

    if (localStorage.saveBtn002 == 'true') {
        confMsg002.querySelector('p').innerText = "Comentário enviado com sucesso!";
        confMsg002.showModal();
        localStorage.saveBtn002 = 'false';
    }
});
