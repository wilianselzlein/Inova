/**
 * Created with PeterX ResourcesJS.
 * User: pedruino
 * Date: 2014-09-22
 * Time: 02:26 PM
 * To change this template use Tools | Templates.
 */
var datepickerOptions = {
   format: "dd/mm/yyyy",
   todayBtn: "linked",
   language: "pt-BR",
   calendarWeeks: true,
   autoclose: true,
   todayHighlight: true
};

$(function() {   
   var handler = function() {
      $(this).datepicker(datepickerOptions);
   }
   $('#dynamic-content').on('focus', '.datepicker-start', handler);
   $('#dynamic-content').on('focus', '.datepicker-end', handler);
});

$('.datepicker-start').datepicker(datepickerOptions);
$('.datepicker-end').datepicker(datepickerOptions);