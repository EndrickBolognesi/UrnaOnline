$(function(){
    $("#pesquisa").keyup(function(){
        var pesquisa = $(this).val();
        if(pesquisa != ''){
            var dados = {
                palavra : pesquisa
            }
            $.post('processa/proc_pesq_candidatos.php', dados, function(retorna) {
                $(".resultado").html(retorna);
            });
        }
    });
});