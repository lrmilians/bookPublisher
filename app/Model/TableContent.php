<?php
App::uses('AppModel', 'Model');
/**
 * TableContent Model
 *
 * @property Book $Book
 */
class TableContent extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'content';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Book' => array(
			'className' => 'Book',
			'foreignKey' => 'book_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
