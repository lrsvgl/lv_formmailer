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
class Mails extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * sender name
	 *
	 * @var \string
	 */
	protected $sendername;

	/**
	 * sender email
	 *
	 * @var \string
	 */
	protected $senderemail;

	/**
	 * Subject
	 *
	 * @var \string
	 */
	protected $subject;

	/**
	 * Nachricht
	 *
	 * @var \string
	 */
	protected $body;

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
	 * Returns the body
	 *
	 * @return \string $body
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * Sets the body
	 *
	 * @param \string $body
	 * @return void
	 */
	public function setBody($body) {
		$this->body = $body;
	}

}
?>