<?php

namespace TYPO3\LvFormmailer\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \TYPO3\LvFormmailer\Domain\Model\Forms.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Formmailer
 *
 */
class FormsTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\LvFormmailer\Domain\Model\Forms
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\LvFormmailer\Domain\Model\Forms();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getFormnameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFormnameForStringSetsFormname() { 
		$this->fixture->setFormname('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFormname()
		);
	}
	
	/**
	 * @test
	 */
	public function getSenderemailReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSenderemailForStringSetsSenderemail() { 
		$this->fixture->setSenderemail('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSenderemail()
		);
	}
	
	/**
	 * @test
	 */
	public function getSendernameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSendernameForStringSetsSendername() { 
		$this->fixture->setSendername('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSendername()
		);
	}
	
	/**
	 * @test
	 */
	public function getReceiveremailReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setReceiveremailForStringSetsReceiveremail() { 
		$this->fixture->setReceiveremail('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getReceiveremail()
		);
	}
	
	/**
	 * @test
	 */
	public function getReceivernameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setReceivernameForStringSetsReceivername() { 
		$this->fixture->setReceivername('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getReceivername()
		);
	}
	
	/**
	 * @test
	 */
	public function getSubjectReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSubjectForStringSetsSubject() { 
		$this->fixture->setSubject('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSubject()
		);
	}
	
}
?>