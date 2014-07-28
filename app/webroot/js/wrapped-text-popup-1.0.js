/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function($) {
    $("div[for^='wrapped-text-']")
            .mouseenter(function() {
                id = '#' + this.getAttribute('for');
                $div = $(document.createElement('div'));
                $div.text($(id).attr('value'));
                $div.addClass("popup");
                $div.bPopup({
                    transition: 'fadeIn',
                    modal: false,
                    escClose: true,
                    appendTo: this,
                    transitionClose: 'fadeOut',
                    position: 'auto',
                    speed: '250'
                });
            })

            .mouseleave(function() {

                $(this).parent().find('.popup').remove();
            });
});