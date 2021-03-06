<?php

App::uses('AppModel', 'Model');

/**
 * Historico Model
 *
 * @property Chamado $Chamado
 * @property User $User
 * @property Checklist $Checklist
 * @property Servico $Servico
 */
class Historico extends AppModel {

    /**
     * Use database config
     *
     * @var string
     */
    public $useDbConfig = 'inova';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'descricao';

    /**
     * Validation rules
     *
     * @var array
     */
    public $datetimeFields = array('datainicial', 'datafinal');

    private function SendEmail() {
        $chamado = $this->find('first', 
                array('conditions' => array(
                    $this->alias . '.' . $this->primaryKey => $this->data[$this->alias]['id']),
                    'recursive' => 2,
                )
            );
        
        $emails = array('samuel@inovatechinfo.com.br');
        if ((isset($chamado['Chamado']['User']['email'])) && ($chamado['Chamado']['User']['email'] != ''))
          array_push($emails, $chamado['Chamado']['User']['email']);
        if ((isset($chamado['Chamado']['User']['emailsup'])) && ($chamado['Chamado']['User']['emailsup'] != ''))
          array_push($emails, $chamado['Chamado']['User']['emailsup']);
        if ((isset($chamado['Chamado']['Cliente']['email'])) && ($chamado['Chamado']['Cliente']['email'] != ''))
          array_push($emails, $chamado['Chamado']['Cliente']['email']);
        if ((isset($chamado['Chamado']['Cliente']['emailalt'])) && ($chamado['Chamado']['Cliente']['emailalt'] != ''))
          array_push($emails, $chamado['Chamado']['Cliente']['emailalt']);
                
        $Email = new CakeEmail('smtp');
        $Email->emailFormat('html');
        $Email->to($emails);
        $Email->subject('Chamado Inovatech');
        
        $Email->send(
            'Chamado do cliente: <b><br>' . 
            $chamado['Chamado']['Cliente']['fantasia'] . '</b><br>' .
            '<br>' .
            'Chamado aberto pelo usuário: ' . $chamado['Chamado']['User']['username'] . '<br>' .
            'Data: ' . Date('Y/m/d H:i') . '<br>' .
            '--------------------------------------------<br>' .
            'Chamado: ' .  $chamado['Chamado']['descricao'] . '<br>' . 
            '<b>Contato: ' .  $chamado['Chamado']['contato'] . '</b><br>' . 
            '--------------------------------------------<br>' .
            'Adição de Histórico: ' .  $this->data[$this->alias]['descricao'] . '<br>' .
            '--------------------------------------------<br>' .
            'Prioridade: ' .  $chamado['Chamado']['Prioridade']['nome'] . '<br>' .
            '<b>Chamado designado ao analista: ' . $chamado['Chamado']['User']['username'] . '</b><br>' . 
            'Email de contato do analista: ' . $chamado['Chamado']['User']['email'] . '<br>' .
            'Email de contato direção/reclamações: ' . $chamado['Chamado']['User']['emailsup'] . '<br>' .
            '<br>'.
            'No caso de não receber uma posição de seu chamado em até 24hs (dia útil) favor entrar em contato com o nosso suporte. <br>' .
            'Inovatech Soluções Tecnológicas (54)3211-6250<br>' .
            '<br>' .
            'Email automático, apenas leitura, favor não responder no mesmo.<br>');
    }


    public function afterSave($created, $options = Array()) {
        parent::afterSave($options);

        if ($this->ValorParametro(2) == 'S')
          $this->SendEmail();
    }

    public $validate = array(
        'chamado_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        /*
          'datainicial' => array(
          'datetime' => array(
          'rule' => array('datetime'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
          ),
          'datafinal' => array(
          'datetime' => array(
          'rule' => array('datetime'),
          //'message' => 'Your custom message here',
          //'allowEmpty' => false,
          //'required' => false,
          //'last' => false, // Stop validation after this rule
          //'on' => 'create', // Limit validation to 'create' or 'update' operations
          ),
          ),
         * 
         */
        'descricao' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'checklist_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Chamado' => array(
            'className' => 'Chamado',
            'foreignKey' => 'chamado_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Checklist' => array(
            'className' => 'Checklist',
            'foreignKey' => 'checklist_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Servico' => array(
            'className' => 'Servico',
            'joinTable' => 'historicos_servicos',
            'foreignKey' => 'historico_id',
            'associationForeignKey' => 'servico_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );
}
