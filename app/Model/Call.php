<?php
App::uses('AppModel', 'Model');
/**
 * Call Model
 *
 * @property Device $Device
 */
class Call extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'device_id' => array(
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

}
