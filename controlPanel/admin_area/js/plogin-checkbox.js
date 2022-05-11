(function($){
	$.fn.mychk = function(){
		
		return this.each(function(){
			
			$(this).click(function(){
				if(this.checked)
				{
					$(this).after("<img class='mychk' src='img/chk.png' />")
					$('.mychk').click(function(){
						$(this).prev('input').attr('checked' , false).show()
						$(this).remove()
					})
					$(this).hide()
				}
			})
		})
		
		
	}


}(jQuery))
