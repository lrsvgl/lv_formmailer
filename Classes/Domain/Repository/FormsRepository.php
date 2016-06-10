<?php
namespace TYPO3\LvFormmailer\Domain\Repository;

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
class FormsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * createMails
	 *
	 * @param $mail
	 * @param $settings
	 * @array $data
	 * @array $settings
	 * @return
	 */
	public function createMail($mail, $settings) {
		
		        $table = 'tx_lvformmailer_domain_model_mails';
		        //$pid = 64;
                        //
		        $pid = $settings['defaultPid'];
		        //$table = $settings['tableMail'];
		        $date = time();
		        
		        //var_dump($mail);
		        //die("repo");

		        # Direkt in der Extension: 
		        $GLOBALS['TYPO3_DB']->debugOutput = 1;
		
		        # Best Practise:
		        # Will man auch funktionierende Querys ausgeben lassen, so kann man dies mit folgender Zeile erreichen:
		
		        # Direkt in der Extension: 
		        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1;
		
		        # Die Ausgabe des SQL-Statements erfolgt dann mit Hilfe von
		
		        echo $GLOBALS['TYPO3_DB']->debug_lastBuiltQuery;
		                // Daten einlesen
		        $GLOBALS['TYPO3_DB']->exec_INSERTquery(
		                $table, array(
		                    'pid' => $pid,
		                    'sendername' => $mail['customername'],
		                    'senderemail' => $mail['customeremail'],
		                    'subject' => $mail['subject'],
		                    'body' => strip_tags($mail['body'], '<table><td><tr><h1><h2><a><p><br><b><i><u>'),
		                    'crdate' =>  $date,
		                    'tstamp' =>  $date,
		                )
		        );
		        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($GLOBALS['TYPO3_DB']);
	}

}
?>