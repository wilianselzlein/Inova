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
        if (isset($chamado['Chamado']['User']['emailsup']))
          array_push($emails, $chamado['Chamado']['User']['emailsup']);
        if (isset($chamado['Chamado']['Cliente']['email']))
          array_push($emails, $chamado['Chamado']['Cliente']['email']);
        if (isset($chamado['Chamado']['Cliente']['emailalt']))
          array_push($emails, $chamado['Chamado']['Cliente']['emailalt']);
                
        $Email = new CakeEmail('smtp');
        $Email->to($emails);
        $Email->subject('Chamado Inovatech');
        
        $Email->send('
Chamado aberto pelo usuário: ' . $chamado['Chamado']['User']['username'] . '
Data: ' . Date('Y/m/d H:i') . '
Chamado: ' .  $chamado['Chamado']['descricao'] . '
Prioridade: ' .  $chamado['Chamado']['Prioridade']['nome'] . '
Chamado designado ao analista: ' . $chamado['Chamado']['User']['username'] . '
Email de contato do analista: ' . $chamado['Chamado']['User']['email'] . '
Email de contato direção/reclamações: ' . $chamado['Chamado']['User']['emailsup'] . '

No caso de não receber uma posição de seu chamado em até 24hs (dia útil) favor entrar em contato com o nosso suporte. 
Inovatech Soluções Tecnológicas (54)3211-6250
            
Email automático, apenas leitura, favor não responder no mesmo.');
    }


    public function afterSave($created, $options = Array()) {
        parent::afterSave($options);

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
