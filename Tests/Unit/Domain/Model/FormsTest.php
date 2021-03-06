<?php

namespace TYPO3\LvFormmailer\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 
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
	
	/**
	 * @test
	 */
	public function getVersanddeReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getVersandde()
		);
	}

	/**
	 * @test
	 */
	public function setVersanddeForFloatSetsVersandde() { 
		$this->fixture->setVersandde(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getVersandde()
		);
	}
	
	/**
	 * @test
	 */
	public function getVersandeuReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getVersandeu()
		);
	}

	/**
	 * @test
	 */
	public function setVersandeuForFloatSetsVersandeu() { 
		$this->fixture->setVersandeu(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getVersandeu()
		);
	}
	
	/**
	 * @test
	 */
	public function getMwstReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getMwst()
		);
	}

	/**
	 * @test
	 */
	public function setMwstForFloatSetsMwst() { 
		$this->fixture->setMwst(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getMwst()
		);
	}
	
	/**
	 * @test
	 */
	public function getArticleReturnsInitialValueForArticles() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getArticle()
		);
	}

	/**
	 * @test
	 */
	public function setArticleForObjectStorageContainingArticlesSetsArticle() { 
		$article = new \TYPO3\LvFormmailer\Domain\Model\Articles();
		$objectStorageHoldingExactlyOneArticle = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneArticle->attach($article);
		$this->fixture->setArticle($objectStorageHoldingExactlyOneArticle);

		$this->assertSame(
			$objectStorageHoldingExactlyOneArticle,
			$this->fixture->getArticle()
		);
	}
	
	/**
	 * @test
	 */
	public function addArticleToObjectStorageHoldingArticle() {
		$article = new \TYPO3\LvFormmailer\Domain\Model\Articles();
		$objectStorageHoldingExactlyOneArticle = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneArticle->attach($article);
		$this->fixture->addArticle($article);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneArticle,
			$this->fixture->getArticle()
		);
	}

	/**
	 * @test
	 */
	public function removeArticleFromObjectStorageHoldingArticle() {
		$article = new \TYPO3\LvFormmailer\Domain\Model\Articles();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($article);
		$localObjectStorage->detach($article);
		$this->fixture->addArticle($article);
		$this->fixture->removeArticle($article);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getArticle()
		);
	}
	
}
?>