<?php

App::uses('AppModel', 'Model');

/**
 * Arquivo Model
 *
 * @property User $User
 */
class Arquivo extends AppModel {

    /**
     * Use database config
     *
     * @var string
     */
    public $useDbConfig = 'inova';

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'arquivos';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'caminho';
    
    
    public $datetimeFields = array('datahora');
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        //'data' => array(
         //   'datetime' => array(
                //'rule' => array('datetime'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
     //       //'on' => 'create', // Limit validation to 'create' or 'update' operations
     //       ),
      //  ),
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
        'cliente_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'caminho' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );   

    public function beforeSave($options = array())
    {
        if(!empty($this->data['Arquivo']['arq']['name'])) {       
            $this->data['Arquivo']['caminho'] = WWW_ROOT.'arqs'.DS . $this->upload($this->data['Arquivo']['arq']);
            $this->data['Arquivo']['nome'] = $this->data['Arquivo']['arq']['name'];
            $this->data['Arquivo']['tipo'] = $this->data['Arquivo']['arq']['type'];
            $this->data['Arquivo']['tamanho'] = $this->data['Arquivo']['arq']['size'];
        } else {
            unset($this->data['Arquivo']['caminho']);
        }
    }

    /**
     * Organiza o upload.
     * @access public
     * @param Array $imagem
     * @param String $data
    */ 
    public function upload($imagem = array(), $dir = 'arqs')
    {
        $dir = WWW_ROOT.$dir.DS;
 
        if(($imagem['error']!=0) and ($imagem['size']==0)) {
                throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
        }

        $this->checa_dir($dir);

        $imagem = $this->checa_nome($imagem, $dir);

        $this->move_arquivos($imagem, $dir);
        
        return $imagem['name'];
    }

	/**
	 * Verifica se o diretório existe, se não ele cria.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function checa_dir($dir)
	{
		App::uses('Folder', 'Utility');
		$folder = new Folder();
		if (!is_dir($dir)){
			$folder->create($dir);
		}
	}

	/**
	 * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	 * @return nome da imagem
	*/ 
	public function checa_nome($imagem, $dir)
	{
		$imagem_info = pathinfo($dir.$imagem['name']);
		$imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
		$conta = 2;
		while (file_exists($dir.$imagem_nome)) {
			$imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
			$imagem_nome .= '.'.$imagem_info['extension'];
			$conta++;
		}
		$imagem['name'] = $imagem_nome;
		return $imagem;
	}

	/**
	 * Trata o nome removendo espaços, acentos e caracteres em maiúsculo.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function trata_nome($imagem_nome)
	{
		$imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
		return $imagem_nome;
	}

	/**
	 * Move o arquivo para a pasta de destino.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function move_arquivos($imagem, $dir)
	{
		App::uses('File', 'Utility');
		$arquivo = new File($imagem['tmp_name']);
                $arquivo->copy($dir.$imagem['name']);
                //debug($dir.$imagem['name']); die;
		$arquivo->close();
	}


}
