<?php

App::uses('HtmlHelper', 'View/Helper');
App::uses('FormHelper', 'View/Helper');

class CustomHtmlHelper extends HtmlHelper
{

    private $iconIndex = '<i class="fa fa-list-alt"></i>';
    private $iconAdd = '<i class="fa fa-plus-circle"></i>';
    private $iconEdit = '<i class="fa fa-pencil"></i>';
    private $iconDelete = '<i class="fa fa-times"></i>';
    private $iconView = '<i class="fa fa-eye"></i>';


    
    //$this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Cobranca'), array('action' => 'add'));

    //$this->CustomHtml->postLink('<i class="fa fa-times"></i>'.' '.__('Delete')  .' '.__('Webmail'), array('action' => 'delete', $webmail['Webmail']['id']), array('escape' => false),__('Are you sure you want to delete # %s?', $webmail['Webmail']['id']));
    public function linkIndex($label, $options = array(), $optionsHtml = array())
    {        
        if(!empty($label))
            $label = $this->iconIndex.' '.__('List').' '.$label;
        else
            $label = $this->iconIndex;
        $defaults = array('action'=> 'index');
        $options = Set::merge($defaults, $options);
        $defaultsHtml = array('escape' => false);
        $optionsHtml = Set::merge($defaultsHtml, $optionsHtml);

        return parent::link($label, $options, $optionsHtml);
    }

    public function linkAdd($label, $options = array(), $optionsHtml = array())
    {        
        if(!empty($label))
            $label = $this->iconAdd.' '.__('Add').' '.$label;
        else
            $label = $this->iconAdd;
        $defaults = array('action'=> 'add');
        $options = Set::merge($defaults, $options);
        $defaultsHtml = array('escape' => false);
        $optionsHtml = Set::merge($defaultsHtml, $optionsHtml);

        return parent::link($label, $options, $optionsHtml);
    }
    
    public function linkEdit($label, $options = array(), $optionsHtml = array())
    {        
        if(!empty($label))
            $label = $this->iconEdit.' '.__('Edit').' '.$label;
        else
            $label = $this->iconEdit;

        $defaults = array('action'=> 'edit');
        $options = Set::merge($defaults, $options);
        $defaultsHtml = array('escape' => false);
        $optionsHtml = Set::merge($defaultsHtml, $optionsHtml);

        return parent::link($label, $options, $optionsHtml);
    }

    public function linkDelete($label, $options = array(), $optionsHtml = array())
    {        
        if(!empty($label))
            $label = $this->iconDelete.' '.__('Delete').' '.$label;
        else
            $label = $this->iconDelete;
        $defaults = array('action'=> 'delete');
        $options = Set::merge($defaults, $options);
        $defaultsHtml = array('escape' => false);
        $optionsHtml = Set::merge($defaultsHtml, $optionsHtml);

        return $this->Form->postLink($label, $options, $optionsHtml,__('Are you sure you want to delete # %s?', $options['0']));
    }

    public function linkView($label, $options = array(), $optionsHtml = array())
    {        
        if(!empty($label))
            $label = $this->iconView.' '.__('View').' '.$label;
        else
            $label = $this->iconView;
        $defaults = array('action'=> 'view');
        $options = Set::merge($defaults, $options);
        $defaultsHtml = array('escape' => false);
        $optionsHtml = Set::merge($defaultsHtml, $optionsHtml);

        return parent::link($label, $options, $optionsHtml);
    }
}