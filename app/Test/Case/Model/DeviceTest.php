<?php
App::uses('Device', 'Model');

/**
 * Device Test Case
 *
 */
class DeviceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.device',
		'app.user',
		'app.book_mark',
		'app.call',
		'app.contact',
		'app.location',
		'app.media',
		'app.messenger_recife',
		'app.messenger_send'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Device = ClassRegistry::init('Device');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Device);

		parent::tearDown();
	}

}
