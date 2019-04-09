
var pagina=1;
var qtde=7;
var tela;
$(document).ready(function () {
    var url_atual = window.location.href;

    if (url_atual.substr(url_atual.length - 8) =="produtos"){
        tela=2;
    }else if (url_atual.substr(url_atual.length - 10) =="categorias"){
        tela=1;
    }else{
        tela=3;
    }
    console.log( tela);
    listar(pagina, qtde, "", tela);
});

$('#btnFiltro').click(function(){
    if($('#divfiltro').is(':visible')){
        $("#divfiltro").hide();
        listar(pagina, qtde, "", tela);
    }else{
        $("#divfiltro").show();
    }
});

$('#btnBuscar').click(function(){
    var texto = $('#texto').val();
    var filtro;
    if (tela==1){
        filtro="nome";
    }else{
        var filtro = $("#filtro option:selected").val();
    }
    console.log ("WHERE "+filtro+" LIKE '" + texto + "%'");
    listar(pagina, qtde, "WHERE "+filtro+" LIKE '" + texto + "%'", tela);
});

function listar(pagina, qtdepag, query, tela){
    var dados = {
        pagina : pagina,
        qtde: qtde,
        tela:tela,
        query:query
    }
    $.post('listar.php', dados, function(retorna){
        //Subtitui o valor no seletor id="conteudo"
        $("#conteudo").html(retorna);
    });
}