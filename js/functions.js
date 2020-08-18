$(function(){
		var data = new Date();
		var mesAtual = data.getMpnth()+1;
		$('#mes_'+mesAtual).show();

		function hidShow(exibir){
			if(mesAtual > 12){
				mesAtual = 1;

			} else if(mesAtual < 1){
				mesAtual = 12;
			}
			$('.mes').hide();
			$('#me_' + exibir).show();
		}

		$('#vai').on('click', function(e){
			e.preventDefault();
			mesAtual++;
			hideshow();

			return false;

		});

		$('#volta').on('click', function(e){
			e.preventDefault();
			mesAtual--;
			hideshow();

			return false;

		});

		
});
