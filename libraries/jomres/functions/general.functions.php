<?php
/**
 * Core file
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 4
* @package Jomres
* @copyright	2005-2009 Vince Wooll

Jomres is distributed as a mix of two licenses (excepting other files in the libraries folder, which are independantly licensed). 

The first, proprietary license, refers to Jomres as a package. You cannot share it, period. You can see the full license here http://www.jomres.net/license.html. There are some exceptions, and these files are independantly licensed (see the /jomres/libraries/phptools folder for example)
The files in the /jomres/core-minicomponents,  /jomres/libraries/jomres/cms_specific and the /jomres/templates folders, whilst copyright Vince Wooll, are licensed differently to allow those users who wish, to develop and distribute their own third party plugins for Jomres. Those files are licensed under the MIT license, which allows third party vendors to modify them to suit their own requirements and if so desired, distribute them for free or cost. 

################################################################
This file is subject to the Jomres proprietary license, please do not distribute it. For licencing information, please visit 
http://www.jomres.net/index.php?option=com_content&task=view&id=214&Itemid=86 and http://www.jomres.net/license.html
################################################################
*/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to '.__FILE__.' is not allowed.' );
// ################################################################


function homeButton()
	{
	global $indexphp,$jomresConfig_live_site;
	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$image = JOMRESPATH_BASE."/images/jomresimages/small/Home.png";
	$link = $jomresConfig_live_site."/administrator/".$indexphp."?option=com_jomcompjrportal";
	$jrtb .= $jrtbar->customToolbarItem('',$link,"Home",false,"",$image);
	$jrtb .= $jrtbar->endTable();
	return $jrtb;
	}

function makeJsGraphOutput($graphLabels,$graphValues,$type="hBar",$legend,$div='divGraph')
	{
	$graphParams='
	<script language="JavaScript"> <!--
	createGraph("'.$graphLabels.'","'.$graphValues.'","'.$type.'","'.$legend.'","'.$div.'")
	//--> </script>
	';
	return $graphParams;
	}

function getMonthName($monthNo)
	{
	$monthNo=intval($monthNo);
	return constant ('_JRPORTAL_MONTHS_LONG_'.$monthNo);
	}

function makeImageValid($imageName="")
	{
	$image = str_replace('+' , '%20' , $imageName);
	$image = str_replace('%2F' , '/' , $image);
	return $image;
	}
?>