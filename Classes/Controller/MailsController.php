<?php
namespace TYPO3\LvFormmailer\Controller;

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
class MailsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * mailsRepository
	 *
	 * @var \TYPO3\LvFormmailer\Domain\Repository\MailsRepository
	 * @inject
	 */
	protected $mailsRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$mailss = $this->mailsRepository->findAll();
		$this->view->assign('mailss', $mailss);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\LvFormmailer\Domain\Model\Mails $mails
	 * @return void
	 */
	public function showAction(\TYPO3\LvFormmailer\Domain\Model\Mails $mails) {
		$this->view->assign('mails', $mails);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\LvFormmailer\Domain\Model\Mails $newMails
	 * @dontvalidate $newMails
	 * @return void
	 */
	public function newAction(\TYPO3\LvFormmailer\Domain\Model\Mails $newMails = NULL) {
		$this->view->assign('newMails', $newMails);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\LvFormmailer\Domain\Model\Mails $newMails
	 * @return void
	 */
	public function createAction(\TYPO3\LvFormmailer\Domain\Model\Mails $newMails) {
		$this->mailsRepository->add($newMails);
		$this->flashMessageContainer->add('Your new Mails was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\LvFormmailer\Domain\Model\Mails $mails
	 * @return void
	 */
	public function editAction(\TYPO3\LvFormmailer\Domain\Model\Mails $mails) {
		$this->view->assign('mails', $mails);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\LvFormmailer\Domain\Model\Mails $mails
	 * @return void
	 */
	public function updateAction(\TYPO3\LvFormmailer\Domain\Model\Mails $mails) {
		$this->mailsRepository->update($mails);
		$this->flashMessageContainer->add('Your Mails was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\LvFormmailer\Domain\Model\Mails $mails
	 * @return void
	 */
	public function deleteAction(\TYPO3\LvFormmailer\Domain\Model\Mails $mails) {
		$this->mailsRepository->remove($mails);
		$this->flashMessageContainer->add('Your Mails was removed.');
		$this->redirect('list');
	}

}
?>