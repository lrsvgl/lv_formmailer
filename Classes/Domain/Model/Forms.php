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

}
?>