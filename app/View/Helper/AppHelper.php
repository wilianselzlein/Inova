<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */


class AppHelper extends Helper {
    var $helpers = array('Html', 'Form', 'Text');
    //private $dateTimeFormatView = "%A,%e de %B de %Y, %H:%M";
    private $dateTimeFormatView = "%d/%m/%Y %H:%M";

    /**
     * Esta função retorna uma data escrita da seguinte maneira:
     * Exemplo: Terça-feira, 17 de Abril de 2007
     * @author Leandro Vieira Pinho [http://leandro.w3invent.com.br]
     * @param string $strDate data a ser analizada; por exemplo: 2007-04-17 15:10:59
     * @return string
     */
    public function formata_data_extenso($strDate) {
        // Array com os dia da semana em português;
        $arrDaysOfWeek = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
        // Array com os meses do ano em português;
        $arrMonthsOfYear = array(1 => 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        // Descobre o dia da semana
        $intDayOfWeek = date('w', strtotime($strDate));
        // Descobre o dia do mês
        $intDayOfMonth = date('d', strtotime($strDate));
        // Descobre o mês
        $intMonthOfYear = date('n', strtotime($strDate));
        // Descobre o ano
        $intYear = date('Y', strtotime($strDate));
        // Formato a ser retornado
        return $arrDaysOfWeek[$intDayOfWeek] . ', ' . $intDayOfMonth . ' de ' . $arrMonthsOfYear[$intMonthOfYear] . ' de ' . $intYear;
    }

    public function __getDateTimeFormatView() {
        return $this->dateTimeFormatView;
    }
    
    /**
     * Encurta o conteúdo de um campo e joga o conteúdo completo em uma popup, 
     * renderizada pelo evento mouseenter ( hover) 
     * @param type $component_id o identificador que será usado para popup gerada
     * @param type $value o conteúdo que será inserido na popup
     * @return type dois components, uma <div> com o conteúdo comprimido e um <input type='hidden'> com o conteúdo completo
     */
    public function wrapText($component_id, $value){        
        $custom_id = 'wrapped-text-'.$component_id;
        $hidden = $this->Form->hidden($custom_id, array('value' => $value));        
        $span= $this->Html->div('div-to-pop', $this->Text->truncate(h($value), 30, array('ellipsis' => '...', 'exact' => false)), array('for' =>$custom_id ));
        
        return $hidden.$span;
    }

    

}
