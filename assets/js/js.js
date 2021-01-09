$(function () {	
	//Menu mobile	
	$('.mobmenu').click (function(){
	$('.menu').slideToggle();
	$(this).toggleClass('active');
		return false;
	});	
	
	$('.filtro').click (function(){
			$('.mostraFiltro').slideToggle();
			$(this).toggleClass('active');
				return false;
	});

    // DATATABLES
    $('#dataTable').DataTable({
        responsive: true,
        "pageLength": 25,
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });

    // MASK
    var cellMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    cellOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(cellMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.mascara-celular').mask(cellMaskBehavior, cellOptions);
    $('.mascara-fone').mask('(00) 0000-0000');
    $(".mascara-data").mask('00/00/0000');
    $(".mascara-datetime").mask('00/00/0000 00:00');
    $(".mascara-mes").mask('00/0000', {reverse: true});
    $(".mascara-cpf").mask('000.000.000-00', {reverse: true});
    $(".mascara-cnpj").mask('00.000.000/0000-00', {reverse: true});
    $(".mascara-cep").mask('00000-000', {reverse: true});
    $(".mascara-dinheiro").mask('R$ 000.000.000.000.000,00', {reverse: true, placeholder: "R$ 0,00"});

    // SEARCH ZIPCODE
    $('.busca_cep').blur(function () {
        function limpar() {
            $(".rua").val("");
            $(".bairro").val("");
            $(".cidade").val("");
            $(".estado").val("");
        }

        var zip_code = $(this).val().replace(/\D/g, '');
        var validate_zip_code = /^[0-9]{8}$/;

        if (zip_code != "" && validate_zip_code.test(zip_code)) {
            $(".rua").val("");
            $(".bairro").val("");
            $(".cidade").val("");
            $(".estado").val("");

            $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/?callback=?", function (data) {
                if (!("erro" in data)) {
                    $(".rua").val(data.logradouro);
                    $(".bairro").val(data.bairro);
                    $(".cidade").val(data.localidade);
                    $(".estado").val(data.uf);
                } else {
                    limpar();
                    alert("CEP não encontrado.");
                }
            });
        }else {
            limpar();
            alert("Formato de CEP inválido.");
        }
    });

});

