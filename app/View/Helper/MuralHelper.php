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

class MuralHelper extends HtmlHelper {

    public function desenha($recado_mural) {
        foreach ($recado_mural as $recado) {
            if (CakeTime::isToday($recado['Mural']['data'])) {
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
        echo $this->div("alert alert-" . $class, $this->draw_note_title($recado) . $this->draw_note_content($recado));
    }

    private function draw_note_title($recado) {
        return '<i>' . __('MessageFrom') . ' ' . $recado['UserFrom']['username'] . ', ' . CakeTime::i18nFormat($recado['Mural']['data'], $this->__getDateTimeFormatView()) . '</i>  :: ';
    }

    private function draw_note_content($recado) {
        return $this->link($recado['Mural']['recado'], array('controller' => 'murals', 'action' => 'view', $recado['Mural']['id']));
    }
    
}
