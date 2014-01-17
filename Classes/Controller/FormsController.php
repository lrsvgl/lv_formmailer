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
     * articlesRepository
     *
     * @var \TYPO3\LvFormmailer\Domain\Repository\ArticlesRepository
     * @inject
     */
    protected $articlesRepository;

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
        // Requests
        $arg = $this->request->getArguments('form');
        $form = $arg['form'];
        $article = $arg['article'];
        $total = $arg['total'];
        $submit = $REQUEST['submit'];
        //var_dump($total);
        // Vars
        $form_id = $this->settings['forms'];
        $forms = $this->formsRepository->findOneByUid($form_id);
        $showform  = 1;

        // Article
        $cat_1 = $this->articlesRepository->findByCat(1);
        $cat_2 = $this->articlesRepository->findByCat(2);
        $cat_3 = $this->articlesRepository->findByCat(3);

        // Mail
        $mail['senderemail'] = $forms->getSenderemail();
        $mail['sendername'] = $forms->getSendername();
        $mail['receiveremail'] = $forms->getReceiveremail();
        $mail['receivername'] = $forms->getReceivername();
        $mail['customeremail'] = $form['email'];
        $mail['customername'] = $form['name'];
        $mail['subject'] = $forms->getSubject();
        $mail['body'] = "";
        

        if ($form['email'] &&  $article) {

            $session = array();
            $session['form'] = $form;
            $this->sessionHandler->writeToSession($session);

            // Mailbody
            $mail['body'] .= '<html><head>
		                 <style type="text/css">' . $this->mailCss() . '</style>
		                </head>
                              <body>';

            // Daten
            $mail['body'] .= '<h2>' . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_lvformmailer_domain_model_forms.data', 'lv_formmailer') . '</h2>';
            $mail['body'] .= '<table>';
            for ($i = 0; $i < count($form); $i++) {
                $marker = array_keys($form);
                $value = array_values($form);
                $mail['body'] .= '<tr>';
                $mail['body'] .= '<td class="col-1"><b>' . ucfirst($marker[$i]) . '</b>: </td>';
                $mail['body'] .= '<td class="col-2">' . $value[$i] . '</td>';
                $mail['body'] .= '</tr>';
            }
            $mail['body'] .= '</table><br><br>';


            // Artikel
            $mail['body'] .= '<h2>' . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_lvformmailer_domain_model_forms.article', 'lv_formmailer') . '</h2>';
            $mail['body'] .= '<table class="order">';
            $mail['body'] .= '<tr><th>Artikel</th><th>Menge</th><th>Preis</th><th>Kosten</th></tr>';

            for ($i = 0; $i < count($article); $i++) {
                for ($j = 0; $j < count($article[$i]); $j++) {
                    if ($article[$i][$j]['amount']>0)  {
                        $mail['body'] .= '<tr>';
                        $mail['body'] .= '<td class="col-1" style="width:310px;"><b>' . $article[$i][$j]['title'] . '</b><br>' . $article[$i][$j]['subtitle'] . '</td>';
                        $mail['body'] .= '<td class="col-2" style="text-align:right; width:80px;">' . $article[$i][$j]['amount'] . '</td>';
                        $mail['body'] .= '<td class="col-3" style="text-align:right; width:80px;">' . $this->makeCurrency($article[$i][$j]['price']) . ' €</td>';
                        $mail['body'] .= '<td class="col-4" style="text-align:right; width:110px;">' . $this->makeCurrency($article[$i][$j]['price']*$article[$i][$j]['amount']) . ' €</td>';
                        $mail['body'] .= '</tr>';           
                    }
                }
            }
            $mail['body'] .= '<tr><td class="sep"><br></td></tr>';
            // Kosten
            $mail['body'] .= '<tr>';
            $mail['body'] .= '<td class="col-1" colspan="3">' . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_lvformmailer_domain_model_forms.netto', 'lv_formmailer') . '</td>';
            $mail['body'] .= '<td class="col-2" style="text-align:right;">' . $this->makeCurrency($total['netto']) . '</td>';
            $mail['body'] .= '</tr>';
            $mail['body'] .= '<tr>';
            $mail['body'] .= '<td class="col-1" colspan="3">' . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_lvformmailer_domain_model_forms.shipping', 'lv_formmailer') . '</td>';
            $mail['body'] .= '<td class="col-2" style="text-align:right;">' . $this->makeCurrency($total['shipping']) . '</td>';
            $mail['body'] .= '</tr>';
            $mail['body'] .= '<tr>';
            $mail['body'] .= '<td class="col-1" colspan="3">' . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_lvformmailer_domain_model_forms.vat', 'lv_formmailer') . '</td>';
            $mail['body'] .= '<td class="col-2" style="text-align:right;">' . $this->makeCurrency($total['vat']) . '</td>';
            $mail['body'] .= '</tr>';
            $mail['body'] .= '<tr>';
            $mail['body'] .= '<td class="col-1" colspan="3"><b>' . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_lvformmailer_domain_model_forms.brutto', 'lv_formmailer') . '</b></td>';
            $mail['body'] .= '<td class="col-2" style="text-align:right;"><b>' . $this->makeCurrency($total['brutto']) . '</b></td>';
            $mail['body'] .= '</tr>';

            $mail['body'] .= '</table>';

            // Kosten

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
                    ->setBcc(array($mail['customeremail'] => $mail['customername']))
                    ->setSubject($mail['subject'])
                    ->setBody($mail['body'], 'text/html');
            $message->send();
            if ($message->isSent()) {
                $this->flashMessageContainer->add(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_lvformmailer_domain_model_forms.success', 'lv_formmailer'));
                //$this->flashMessageContainer->add("Erfolg");
                $showform = 0;
                $this->sessionHandler->cleanUpSession();
            } else {
                $this->flashMessageContainer->add(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_lvformmailer_domain_model_forms.error', 'lv_formmailer'));
                //$this->flashMessageContainer->add("Fehler");
                $showform = 1;
            }
        }

        //var_dump($this->settings);
        //die("showAchtion Forms");
        $this->view->assign('uid', $form_id);
        $this->view->assign('forms', $forms);
        $this->view->assign('showform', $showform);
        $this->view->assign('cat_1', $cat_1);
        $this->view->assign('cat_2', $cat_2);
        $this->view->assign('cat_3', $cat_3);
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

    /**
     * mailCss
     *
     * @return
     */
    public function mailCss() {
        $css = "
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
                            table h2 {
		                border: 0;
		                width: 300px;
                                margin: 0;
                                padding: 0;
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


    public function makeCurrency($num) {
        $pattern = '/\./';
        $replace = ",";
        $html= preg_replace($pattern, $replace, $num);
        return $html;
    }

}
?>