<?php
App::uses('BookMark', 'Model');

/**
 * BookMark Test Case
 *
 */
class BookMarkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.book_mark',
		'app.device'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BookMark = ClassRegistry::init('BookMark');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BookMark);

		parent::tearDown();
	}

}
