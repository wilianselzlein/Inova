/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $('.datepickerStart').datepicker({
        format: 'dd/mm/yyyy'
    });
    
    $('.datepickerEnd').datepicker({
        format: 'dd/mm/yyyy'
    });

    $('.datetimepickerStart').datetimepicker({
    	format: 'dd/mm/yyyy hh:ii'
	});
	$('.datetimepickerEnd').datetimepicker({
    	format: 'dd/mm/yyyy hh:ii'
	});
});

