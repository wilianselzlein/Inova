/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $('.datepickerStart').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });
    
    $('.datepickerEnd').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });
});

