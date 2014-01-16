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
class ArticlesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * articlesRepository
	 *
	 * @var \TYPO3\LvFormmailer\Domain\Repository\ArticlesRepository
	 * @inject
	 */
	protected $articlesRepository;

	/**
	 * action list
	 *
	 * @return void
	 * @param TYPO3\LvFormmailer\Domain\Model\Articles
	 */
	public function listAction() {
		$articless = $this->articlesRepository->findAll();
		$this->view->assign('articless', $articless);
	}

	/**
	 * action show
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Articles
	 * @return void
	 */
	public function showAction(\TYPO3\LvFormmailer\Domain\Model\Articles $articles) {
		$this->view->assign('articles', $articles);
	}

	/**
	 * action new
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Articles
	 * @dontvalidate $newArticles
	 * @return void
	 */
	public function newAction(\TYPO3\LvFormmailer\Domain\Model\Articles $newArticles = NULL) {
		$this->view->assign('newArticles', $newArticles);
	}

	/**
	 * action create
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Articles
	 * @return void
	 */
	public function createAction(\TYPO3\LvFormmailer\Domain\Model\Articles $newArticles) {
		$this->articlesRepository->add($newArticles);
		$this->flashMessageContainer->add('Your new Articles was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Articles
	 * @return void
	 */
	public function editAction(\TYPO3\LvFormmailer\Domain\Model\Articles $articles) {
		$this->view->assign('articles', $articles);
	}

	/**
	 * action update
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Articles
	 * @return void
	 */
	public function updateAction(\TYPO3\LvFormmailer\Domain\Model\Articles $articles) {
		$this->articlesRepository->update($articles);
		$this->flashMessageContainer->add('Your Articles was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param TYPO3\LvFormmailer\Domain\Model\Articles
	 * @return void
	 */
	public function deleteAction(\TYPO3\LvFormmailer\Domain\Model\Articles $articles) {
		$this->articlesRepository->remove($articles);
		$this->flashMessageContainer->add('Your Articles was removed.');
		$this->redirect('list');
	}

}
?>