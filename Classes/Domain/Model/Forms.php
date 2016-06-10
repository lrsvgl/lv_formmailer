<?php
namespace TYPO3\LvFormmailer\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 *
 *
 * @package lv_formmailer
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Forms extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * formular name
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $formname;

	/**
	 * sender name
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $senderemail;

	/**
	 * sender name
	 *
	 * @var \string
	 */
	protected $sendername;

	/**
	 * receiver email
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $receiveremail;

	/**
	 * receiver name
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $receivername;

	/**
	 * subject
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $subject;

	/**
	 * versandde
	 *
	 * @var \float
	 * @validate NotEmpty
	 */
	protected $versandde;

	/**
	 * subjectversandeu
	 *
	 * @var \float
	 * @validate NotEmpty
	 */
	protected $versandeu;

	/**
	 * Artikel
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\LvFormmailer\Domain\Model\Articles>
	 * @lazy
	 */
	protected $article;

	/**
	 * subjectversandeu
	 *
	 * @var \float
	 * @validate NotEmpty
	 */
	protected $mwst;

	/**
	 * Returns the formname
	 *
	 * @return \string $formname
	 */
	public function getFormname() {
		return $this->formname;
	}

	/**
	 * Sets the formname
	 *
	 * @param \string $formname
	 * @return void
	 */
	public function setFormname($formname) {
		$this->formname = $formname;
	}

	/**
	 * Returns the senderemail
	 *
	 * @return \string $senderemail
	 */
	public function getSenderemail() {
		return $this->senderemail;
	}

	/**
	 * Sets the senderemail
	 *
	 * @param \string $senderemail
	 * @return void
	 */
	public function setSenderemail($senderemail) {
		$this->senderemail = $senderemail;
	}

	/**
	 * Returns the sendername
	 *
	 * @return \string $sendername
	 */
	public function getSendername() {
		return $this->sendername;
	}

	/**
	 * Sets the sendername
	 *
	 * @param \string $sendername
	 * @return void
	 */
	public function setSendername($sendername) {
		$this->sendername = $sendername;
	}

	/**
	 * Returns the receiveremail
	 *
	 * @return \string $receiveremail
	 */
	public function getReceiveremail() {
		return $this->receiveremail;
	}

	/**
	 * Sets the receiveremail
	 *
	 * @param \string $receiveremail
	 * @return void
	 */
	public function setReceiveremail($receiveremail) {
		$this->receiveremail = $receiveremail;
	}

	/**
	 * Returns the receivername
	 *
	 * @return \string $receivername
	 */
	public function getReceivername() {
		return $this->receivername;
	}

	/**
	 * Sets the receivername
	 *
	 * @param \string $receivername
	 * @return void
	 */
	public function setReceivername($receivername) {
		$this->receivername = $receivername;
	}

	/**
	 * Returns the subject
	 *
	 * @return \string $subject
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Sets the subject
	 *
	 * @param \string $subject
	 * @return void
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * __construct
	 *
	 * @return Forms
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->article = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Articles
	 *
	 * @param \TYPO3\LvFormmailer\Domain\Model\Articles $article
	 * @return void
	 */
	public function addArticle(\TYPO3\LvFormmailer\Domain\Model\Articles $article) {
		$this->article->attach($article);
	}

	/**
	 * Removes a Articles
	 *
	 * @param \TYPO3\LvFormmailer\Domain\Model\Articles $articleToRemove The Articles to be removed
	 * @return void
	 */
	public function removeArticle(\TYPO3\LvFormmailer\Domain\Model\Articles $articleToRemove) {
		$this->article->detach($articleToRemove);
	}

	/**
	 * Returns the article
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\LvFormmailer\Domain\Model\Articles> $article
	 */
	public function getArticle() {
		return $this->article;
	}

	/**
	 * Sets the article
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\LvFormmailer\Domain\Model\Articles> $article
	 * @return void
	 */
	public function setArticle(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $article) {
		$this->article = $article;
	}

	/**
	 * Returns the versandde
	 *
	 * @return \float $versandde
	 */
	public function getVersandde() {
		return $this->versandde;
	}

	/**
	 * Sets the versandde
	 *
	 * @param \float $versandde
	 * @return void
	 */
	public function setVersandde($versandde) {
		$this->versandde = $versandde;
	}

	/**
	 * Returns the versandeu
	 *
	 * @return \float versandeu
	 */
	public function getVersandeu() {
		return $this->versandeu;
	}

	/**
	 * Sets the versandeu
	 *
	 * @param \float $versandeu
	 * @return \float versandeu
	 */
	public function setVersandeu($versandeu) {
		$this->versandeu = $versandeu;
	}

	/**
	 * Returns the mwst
	 *
	 * @return \float $mwst
	 */
	public function getMwst() {
		return $this->mwst;
	}

	/**
	 * Sets the mwst
	 *
	 * @param \float $mwst
	 * @return void
	 */
	public function setMwst($mwst) {
		$this->mwst = $mwst;
	}

}
?>