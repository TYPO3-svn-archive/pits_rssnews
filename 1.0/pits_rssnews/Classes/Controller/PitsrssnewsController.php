<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Arun Chandran <arun.c@pitsolutions.com>, PIT Solutions Pvt Ltd.
 *  
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
 * @package pits_rssnews
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */

class Tx_PitsRssnews_Controller_PitsrssnewsController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * pitsrssnewsRepository
	 *
	 * @var Tx_PitsRssnews_Domain_Repository_PitsrssnewsRepository
	 */

	protected $pitsrssnewsRepository;

	/**
	 * injectPitsrssnewsRepository
	 *
	 * @param Tx_PitsRssnews_Domain_Repository_PitsrssnewsRepository $pitsrssnewsRepository
	 * @return void
	 */
	public function injectPitsrssnewsRepository(Tx_PitsRssnews_Domain_Repository_PitsrssnewsRepository $pitsrssnewsRepository) {
		$this->pitsrssnewsRepository = $pitsrssnewsRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$pitsrssnewss = $this->pitsrssnewsRepository->findAll();
		$this->view->assign('pitsrssnewss', $pitsrssnewss);
		
		//	Fetch flexform content
		$array = $this->settings ['flexform'];
		$invalidurl = 0;
		//	Fetch contents from the external url
		$feedUrl = ($array['url']) ? $array['url'] : $this->settings['feedURL'];
		if (!empty($feedUrl)) {
		$rss_feed = file_get_contents($feedUrl);
		$enc = mb_detect_encoding($rss_feed);
		$data = mb_convert_encoding($rss_feed, 'UTF-8', $enc);
		
		//	Generate simple xml array from the fetched page content.
		$xml = new SimpleXmlElement($data, LIBXML_NOCDATA);
		$xml_new = $this->simplexml2array($xml);

		//	Passing the values to the template file
		$int_head = ($array['feedheader']) ? intval($array['feedheader']) : $this->settings['rssfeedHead'];
		$this-> view-> assign('feedhead',$int_head);
		$title = $xml_new['channel']['title'];
		$this-> view-> assign('rss_head',$title);
		$cnt_news = ($array['count']) ? intval($array['count']-1) : $this->settings['newsCount']-1;
		$this-> view-> assign('cnt',$cnt_news);
		$int_divider = ($array['contentdiv']) ? intval($array["contentdiv"]) : $this->settings['newsDivider'];
		$this-> view-> assign('hbar',$int_divider);
		$int_desc = ($array['crop_desc']) ? intval($array['crop_desc']) : $this->settings['cropDesc'];
		$this-> view-> assign('desc',$int_desc);
		$int_title = ($array['crop_title']) ? intval($array['crop_title']) : $this->settings['cropTitle'];
		$this-> view-> assign('croptitle',$int_title);
		$autoplay = ($array['autoplay']) ? $array['autoplay'] : $this->settings['autoplay'];
		$this-> view-> assign('autoplay',$autoplay);
		$this-> view-> assign('includeJSlib',$this->settings['includeJSlib']);
		$this-> view-> assign('main_head',$xml_new['channel']); 
		$this-> view-> assign('xml_array',$xml_new['channel']['item']); 
		} else {
			$invalidurl = 1;
			$locallangURL = Tx_Extbase_Utility_Localization::translate('invalid_url', $this->request->getControllerExtensionName(), $arguments=NULL);
			$this->flashMessageContainer->add($locallangURL);
			$this-> view-> assign('validurl',$invalidurl);
		}
		
	}
	//	Function for parsing XML array
	public function simplexml2array($xml) {
		if (get_class($xml) == 'SimpleXMLElement') {
			$attributes = $xml->attributes();
			foreach($attributes as $k=>$v) {
				if ($v) $a[$k] = (string) $v;
			}
			$x = $xml;
			$xml = get_object_vars($xml);
		}
		if (is_array($xml)) {
			if (count($xml) == 0) return (string) $x; // for CDATA
			foreach($xml as $key=>$value) {
				$r[$key] = $this->simplexml2array($value);
			}
			if (isset($a)) $r['@attributes'] = $a;    // Attributes
			return $r;
		}
		return (string) $xml;
	}
}
?>