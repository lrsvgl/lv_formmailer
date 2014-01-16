<?php

namespace TYPO3\LvFormmailer\Controller;

/* * *************************************************************
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
 * ************************************************************* */

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
     * sessionHandler
     *
     * @var \TYPO3\LvFormmailer\Domain\Session\SessionHandler
     * @inject
     */
    protected $sessionHandler;

    /**
     * action show
     *
     * @param TYPO3\LvFormmailer\Domain\Model\Forms
     * @return void
     */
    public function showAction() {

        $form_id = $this->settings['forms'];
        $forms = $this->formsRepository->findOneByUid($form_id);

        // Mail
        $mail['senderemail'] = $forms->getSenderemail();
        $mail['sendername'] = $forms->getSendername();
        $mail['receiveremail'] = $forms->getReceiveremail();
        $mail['receivername'] = $forms->getReceivername();
        $mail['subject'] = $forms->getSubject();
        $mail['body'] = "";

        //var_dump($mail);
        $form = $this->request->getArguments('form');
        $form = $form['form'];

        if ($form) {
            

            $session = array();
            $session['form'] = $form;
            $this->sessionHandler->writeToSession($session);

            // Mailbody
            $mail['body'] .= '<html><head>
                                <style type="text/css">'.$this->mailCss().'</style>
                              </head>';
            $mail['body'] .= '<table>';
            //$mail['body'] .= '<tr><th>A</th><th>B</th></tr>';
            $mail['body'] .= '<h2>Ihre Daten</h2>';
            for ($i = 0; $i < count($form); $i++) {
                $marker = array_keys($form);
                $value = array_values($form);
                $mail['body'] .= '<tr>';
                $mail['body'] .= '<td class="col-1">'.ucfirst($marker[$i]).'</td>';
                $mail['body'] .= '<td class="col-2">'.$value[$i].'</td>';
                $mail['body'] .= '</tr>';
            }
            $mail['body'] .= '</table>';
            $mail['body'] .= '</body></html>';

            // Marker fuellen
            for ($i = 0; $i < count($form); $i++) {
                $marker = array_keys($form);
                $value = array_values($form);
                $this->view->assign($marker[$i], $value[$i]);
            }

            // ok
            $send = 1;

            //var_dump($this->sessionHandler->restoreFromSession('form'));   
        }

        if ($send == 1) {
            $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
            $message->setFrom(array($mail['senderemail'] => $mail['sendername']))
                    ->setTo(array($mail['receiveremail'] => $mail['receivername']))
                    ->setSubject($mail['subject'])
                    ->setBody($mail['body'],'text/html');
            $message->send();
            if ($message->isSent()) {
                $this->flashMessageContainer->add('Mail erfolgreich versandt');
            } else {
                $this->flashMessageContainer->add('Die Mail wurde nicht versandt.');
            }
        }


        //var_dump($this->settings);
        //die("showAchtion Forms");
        $this->view->assign('uid', $form_id);
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
    
    public function mailCss() {
        $css ="
            body {
                font-family: Arial, sans serif;
                font-size: 13px;
                color: #000;
            }
            h1 {
                font-size: 16px;
                font-weight: bold;
            }
            h2 {
                font-size: 14px;
                font-weight: bold;
            }
            table {
                border: 0;
                width: 300px;
            }
            table th {
                font-weight: bold;
                text-align: center;
                background: #f5f5f5;
            }
            table td {
                padding: 0 5px 5px 0;
            }

            ";
        
        
        return $css;
    }

}

?>