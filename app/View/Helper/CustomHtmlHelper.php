<?php

App::uses('HtmlHelper', 'View/Helper');
App::uses('FormHelper', 'View/Helper');

class CustomHtmlHelper extends HtmlHelper
{

    private $iconIndex = '<i class="fa fa-list-alt"></i>';
    private $iconAdd = '<i class="fa fa-plus-circle"></i>';
    private $iconEdit = '<i class="fa fa-pencil"></i>';
    private $iconDelete = '<i class="fa fa-times"></i>';


    
    //$this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cobranca'), array('action' => 'add'));

    //$this->CustomHtml->postLink('<i class="fa fa-times"></i>'.' '.__('Delete')  .' '.__('Webmail'), array('action' => 'delete', $webmail['Webmail']['id']), array('escape' => false),__('Are you sure you want to delete # %s?', $webmail['Webmail']['id']));
    public function linkIndex($label, $options = array())
    {        
        $label = $this->iconIndex.' '.__('List').' '.$label;
        $defaults = array('action'=> 'index');
        $options = Set::merge($defaults, $options);

        return parent::link($label, $options, array('escape' => false));
    }

    public function linkAdd($label, $options = array())
    {        
        $label = $this->iconAdd.' '.__('Add').' '.$label;
        $defaults = array('action'=> 'add');
        $options = Set::merge($defaults, $options);

        return parent::link($label, $options, array('escape' => false));
    }
    
    public function linkEdit($label, $options = array())
    {        
        $label = $this->iconEdit.' '.__('Edit').' '.$label;
        $defaults = array('action'=> 'edit');
        $options = Set::merge($defaults, $options);

        return parent::link($label, $options, array('escape' => false));
    }

    public function linkDelete($label, $options = array())
    {        
        $label = $this->iconDelete.' '.__('Delete').' '.$label;
        $defaults = array('action'=> 'delete');
        $options = Set::merge($defaults, $options);
        //debug($options);
        return $this->Form->postLink($label, $options, array('escape' => false),__('Are you sure you want to delete # %s?', $options['0']));
    }
}