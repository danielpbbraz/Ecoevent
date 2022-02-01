function abrirMenu() {
    document.getElementById('menu').style.width = '250px';
    document.getElementById('conteudo').style.marginLeft = '250px';
    // document.getElementById('form-evento').style.marginLeft = '250px';
}

function fecharMenu() {
    document.getElementById('menu').style.width = '0px';
    document.getElementById('conteudo').style.marginLeft = '0px';
    document.getElementById('form-evento').style.marginLeft = '0px';
}