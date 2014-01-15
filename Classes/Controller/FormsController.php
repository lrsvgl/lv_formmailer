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
class FormsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * formsRepository
	 *
	 * @var \TYPO3\LvFormmailer\Domain\Repository\FormsRepository
	 * @inject
	 */
	protected $formsRepository;

	/**
	 * action show
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Forms
	 * @return void
	 */
	public function showAction() {
            
                $form_id = $this->settings['forms'];
                
                //var_dump($this->settings);
                //die("showAchtion Forms");
                
                $forms = $this->formsRepository->findOneByUid($form_id);
		$this->view->assign('forms', $forms);
	}

	/**
	 * action list
	 *
	 * @return void
	 * @param TYPO3\LvFormmailer\Domain\Model\Forms
	 */
	public function listAction() {
		$formss = $this->formsRepository->findAll();
		$this->view->assign('forms', $forms);
	}

	/**
	 * action new
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Forms
	 * @dontvalidate $newForms
	 * @return void
	 */
	public function newAction(\TYPO3\LvFormmailer\Domain\Model\Forms $newForms = NULL) {
		$this->view->assign('newForms', $newForms);
	}

	/**
	 * action create
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Forms
	 * @return void
	 */
	public function createAction(\TYPO3\LvFormmailer\Domain\Model\Forms $newForms) {
		$this->formsRepository->add($newForms);
		$this->flashMessageContainer->add('Your new Forms was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Forms
	 * @return void
	 */
	public function editAction(\TYPO3\LvFormmailer\Domain\Model\Forms $forms) {
		$this->view->assign('forms', $forms);
	}

	/**
	 * action update
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Forms
	 * @return void
	 */
	public function updateAction(\TYPO3\LvFormmailer\Domain\Model\Forms $forms) {
		$this->formsRepository->update($forms);
		$this->flashMessageContainer->add('Your Forms was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Forms
	 * @return void
	 */
	public function deleteAction(\TYPO3\LvFormmailer\Domain\Model\Forms $forms) {
		$this->formsRepository->remove($forms);
		$this->flashMessageContainer->add('Your Forms was removed.');
		$this->redirect('list');
	}

}
?>