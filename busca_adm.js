$(function(){
    $("#pesquisa").keyup(function(){
        var pesquisa = $(this).val();
        if(pesquisa != ''){
            var dados = {
                palavra : pesquisa
            }
            $.post('processa/proc_pesq_candidatos_adm.php', dados, function(retorna) {
                $(".resultado_adm").html(retorna);
            });
        }
    });
});