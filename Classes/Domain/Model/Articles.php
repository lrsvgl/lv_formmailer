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
class Articles extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Name
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Untertitel
	 *
	 * @var \string
	 */
	protected $subtitle;

	/**
	 * Beschreibung
	 *
	 * @var \string
	 */
	protected $description;

	/**
	 * Preis
	 *
	 * @var \float
	 */
	protected $price;

	/**
	 * Bild
	 *
	 * @var \string
	 */
	protected $image;

	/**
	 * Kategorie
	 *
	 * @var \integer
	 */
	protected $cat;

	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the subtitle
	 *
	 * @return \string $subtitle
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Sets the subtitle
	 *
	 * @param \string $subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * Returns the description
	 *
	 * @return \string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param \string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the image
	 *
	 * @return \string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the cat
	 *
	 * @return \integer $cat
	 */
	public function getCat() {
		return $this->cat;
	}

	/**
	 * Sets the cat
	 *
	 * @param \integer $cat
	 * @return void
	 */
	public function setCat($cat) {
		$this->cat = $cat;
	}

	/**
	 * Returns the price
	 *
	 * @return \float price
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * Sets the price
	 *
	 * @param \float $price
	 * @return \float price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

}
?>