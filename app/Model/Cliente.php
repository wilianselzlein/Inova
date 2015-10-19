<?php

App::uses('AppModel', 'Model');

/**
 * Cliente Model
 *
 * @property Cidade $Cidade
 * @property Sistema $Sistema
 * @property Subgrupo $Subgrupo
 * @property User $User
 * @property Unidade $Unidade
 * @property Chamado $Chamado
 */
class Cliente extends AppModel {
 var $actsAs = array('NumberFormat');
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
   public $displayField = 'fantasia';

   public $dateFields = array('dtvenda','dtinstalacao' );

   //public $monetaryFields = array('valorvenda', 'mensalidade');

   public $virtualFields = array(
    'fantasiarazaosocial' => "CONCAT(Cliente.fantasia, ' -- [', Cliente.razaosocial, '] ')"
    );
   /**
     * Validation rules
     *
     * @var array
     */
   public $validate = array(
    'fantasia' => array(
     'notEmpty' => array(
      'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
     ),
    'razaosocial' => array(
     'notEmpty' => array(
      'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
     ),
    'cpfcnpj' => array(
     'notEmpty' => array(
      'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
     ),
    'cidade_id' => array(
     'numeric' => array(
      'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
     ),
    'subgrupo_id' => array(
     'numeric' => array(
      'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
     ),
      //'dtvenda' => array(
      //    'date' => array(
      //       'rule' => array('date'),
      //'message' => 'Your custom message here',
      //'allowEmpty' => false,
      //'required' => false,
      //'last' => false, // Stop validation after this rule
      //'on' => 'create', // Limit validation to 'create' or 'update' operations
      //      ),
      //  ),
    'endereco' => array(
     'notEmpty' => array(
      'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => true
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
     ),
    'numero' => array(
     'notEmpty' => array(
      'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
     ),
    'bairro' => array(
     'notEmpty' => array(
      'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
     ), 
      /*'dtinstalacao' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'contato' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'caixas' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'retaguardas' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'prioridade' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'mensalidade' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'valorvenda' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'estrutura' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
), */
'user_id' => array(
 'numeric' => array(
  'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
  ),
      ),/*
        'telefone' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
), */
'unidade_id' => array(
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
    'Cidade' => array(
     'className' => 'Cidade',
     'foreignKey' => 'cidade_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    'Sistema' => array(
     'className' => 'Sistema',
     'foreignKey' => 'sistema_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    'Subgrupo' => array(
     'className' => 'Subgrupo',
     'foreignKey' => 'subgrupo_id',
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
    'Unidade' => array(
     'className' => 'Unidade',
     'foreignKey' => 'unidade_id',
     'conditions' => '',
     'fields' => '',
     'order' => ''
     ),
    'Contador' => array(
     'className' => 'Contador',
     'foreignKey' => 'contador_id',
         'conditions' => '', //Contador.prospect = "C"
         'fields' => '',
         'order' => ''
         )
    );

   /**
     * hasMany associations
     *
     * @var array
     */
   public $hasMany = array(
    'Chamado' => array(
     'className' => 'Chamado',
     'foreignKey' => 'cliente_id',
     'dependent' => false,
     'conditions' => '',
     'fields' => '',
     'order' => 'id desc',
     'limit' => '',
     'offset' => '',
     'exclusive' => '',
     'finderQuery' => '',
     'counterQuery' => ''
     ),
    'Cobranca' => array(
     'className' => 'Cobranca',
     'foreignKey' => 'cliente_id',
     'dependent' => false,
     'conditions' => '',
     'fields' => '',
     'order' => 'id desc',
     'limit' => '',
     'offset' => '',
     'exclusive' => '',
     'finderQuery' => '',
     'counterQuery' => ''
     ),
    'Domain' => array(
     'className' => 'Domain',
     'foreignKey' => 'customer_id',
     'dependent' => false,
     'conditions' => '',
     'fields' => '',
     'order' => '',
     'limit' => '',
     'offset' => '',
     'exclusive' => '',
     'finderQuery' => '',
     'counterQuery' => ''
     ),
    'SocialMedia' => array(
     'className' => 'SocialMedia',
     'foreignKey' => 'customer_id',
     'dependent' => false,
     'conditions' => '',
     'fields' => '',
     'order' => '',
     'limit' => '',
     'offset' => '',
     'exclusive' => '',
     'finderQuery' => '',
     'counterQuery' => ''
     ),
    );

   /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
   public $hasAndBelongsToMany = array(
    'Modulo' => array(
     'className' => 'Modulo',
     'joinTable' => 'clientes_modulos',
     'foreignKey' => 'cliente_id',
     'associationForeignKey' => 'modulo_id',
     'unique' => 'keepExisting',
     'conditions' => '',
     'fields' => '',
     'order' => '',
     'limit' => '',
     'offset' => '',
     'finderQuery' => '',
     )
    );

   public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['telefone'])) {
      $this->data[$this->alias]['telefone'] = preg_replace("/[^0-9]/","",$this->data[$this->alias]['telefone']);
    }
    if (isset($this->data[$this->alias]['telefone2'])) {
      $this->data[$this->alias]['telefone2'] = preg_replace("/[^0-9]/","",$this->data[$this->alias]['telefone2']);
    }
    if (isset($this->data[$this->alias]['celular'])) {
      $this->data[$this->alias]['celular'] = preg_replace("/[^0-9]/","",$this->data[$this->alias]['celular']);
    }
    return true;
  }

  public function afterFind($results, $primary = false){
    foreach ($results as $key => $val) {
      if (isset($val['Cliente']['telefone'])) {
        $results[$key]['Cliente']['telefone'] = $this->phoneFormatAfterFind($val['Cliente']['telefone']);
      }
      if (isset($val['Cliente']['telefone2'])) {
        $results[$key]['Cliente']['telefone2'] = $this->phoneFormatAfterFind($val['Cliente']['telefone2']);
      }
      if (isset($val['Cliente']['celular'])) {
        $results[$key]['Cliente']['celular'] = $this->phoneFormatAfterFind($val['Cliente']['celular']);
      }
    }
    return $results;
  }

  public function phoneFormatAfterFind($phoneNumber) {
    return preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phoneNumber);
  }


}
