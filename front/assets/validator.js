$(document).ready(function() {
    $('#telefone').mask('(00)00000-0000')
});

$("#submit-cliente").on("click", function() {
    var nome = $("#nome").val();
    var telefone = $("#telefone").val();
    var idade = $("#idade").val();
    if (nome == undefined || nome == null || nome.trim() == '') {
        alert("Nome é obrigatório!");
    }
    if (telefone == undefined || telefone == null || telefone.trim() == '') {
        alert("Telefone é obrigatório!");
    }
    if (idade == undefined || idade == null || idade.trim() == '') {
        alert("Idade é obrigatório!");
    }
});

$("#submit-venda").on("click", function() {
    var cliente = $("#cliente").val();
    var telefone = $("#telefone").val();
    var recarga = $("#recarga").val();
    if (cliente == undefined || cliente == null || cliente.trim() == '') {
        alert("Cliente é obrigatório!");
    }
    if (telefone == undefined || telefone == null || telefone.trim() == '') {
        alert("Telefone é obrigatório!");
    }
    if (recarga == undefined || recarga == null || recarga.trim() == '') {
        alert("Recarga é obrigatório!");
    }
});