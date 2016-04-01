    $(document).ready(function() {
        $('.btnFiltros').on('click', function() {
            $('.filtros').slideToggle();
            $(this).find('.glyphicon').toggleClass('glyphicon-minus');
            $(this).find('.glyphicon').toggleClass('glyphicon-plus');
            $(this).find('.texto').text() == 'Ocultar' ? $(this).find('.texto').text('Mostrar') : $(this).find('.texto').text('Ocultar');
        });

        $('.btnExcluir').on('click', function() {
        	return confirm('Tem certeza que deseja excluir este item?');
        });

        $(document).on( 'scroll', function(){
            if ($(window).scrollTop() > 100) {
                $('.btnTopo').fadeIn();
            } else {
                $('.btnTopo').fadeOut();
            }
        });     

        $('.btnTopo').on('click', function(e) {
            e.preventDefault();
            $('body,html').animate({scrollTop:0},600);
        });

        $('.datepicker').datepicker({ 

            dateFormat: 'dd/mm/yy',
            altFormat: 'yyyy-mm-dd',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    });