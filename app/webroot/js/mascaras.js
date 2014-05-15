/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $(".select-documento").change(function() {
        if ($(this).val() === '2')
            $('.mask-cpf-cnpj').mask("99.999.999/9999-99");
        else
            $('.mask-cpf-cnpj').mask("999.999.999-99");
    });

   

    var options = {onKeyPress: function(cel) {
            var masks = ['(00) 0000-0000', '(00) 00000-0000'];            
            mask = (cel.length > 4 && $('.mask-ddd-celular').cleanVal().substr(0,2) === '11') ? masks[1] : masks[0];
            $('.mask-ddd-celular').mask(mask, this);
        }};
    
    
    $('.mask-ddd-celular').mask("(00) 0000-0000", options);

    $('.mask-cpf-cnpj').mask("999.999.999-99");
    $('.mask-ddd-fone').mask("(00) 0000-0000");
    $('.mask-cep').mask("00000-000");

});



