<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MuralHelper
 *
 * @author Pedro
 */
App::uses('CakeTime', 'Utility');
App::uses('HtmlHelper', 'View/Helper');

class VisitaHelper extends HtmlHelper {

    public function desenha($recado_mural) {
        foreach ($recado_mural as $recado) {
            if (CakeTime::isToday($recado['Visita']['data'])) {
                $this->draw_note("danger", $recado);
            } else {
                $this->draw_note("warning", $recado);
            }
        }
    }

    public function check_friendly_username_message($username)
    {
        if($username == AuthComponent::user('username'))
        {
            return __('me');
        }
            return $username;
    }
    
    private function draw_note($class, $recado) {
        echo $this->div("alert alert-" . $class, '<button type="button" class="close" data-dismiss="alert">×</button>' .  $this->draw_note_title($recado) . $this->draw_note_content($recado));
    }

    private function draw_note_title($recado) {
        return '<i>' . CakeTime::i18nFormat($recado['Visita']['data'], $this->__getDateTimeFormatView()) . ' ' . $recado['Cliente']['fantasia'] . '</i>  :: ';
    }

    private function draw_note_content($recado) {
        return $this->link($recado['Visita']['detalhes'], array('controller' => 'visitas', 'action' => 'view', $recado['Visita']['id']));
    }
    
}
