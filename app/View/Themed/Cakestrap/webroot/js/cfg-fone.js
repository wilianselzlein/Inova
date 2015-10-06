    var options = {onKeyPress: function(cel) {
    	var masks = ['(00) 0000-0000', '(00) 00000-0000'];            
    	mask = (cel.length > 4 && $('.mask-ddd-celular').cleanVal().substr(0,2) === '11') ? masks[1] : masks[0];
    	$('.mask-ddd-celular').mask(mask, this);
    }};
    
    
    $('.mask-ddd-celular').mask("(00) 0000-0000", options);
    
    $('.mask-ddd-fone').mask("(00) 0000-0000");