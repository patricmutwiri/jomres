<?php
/**
 * Mini-component core file
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 4
* @package Jomres
* @subpackage mini-components
* @copyright	2005-2009 Vince Wooll

Jomres is distributed as a mix of two licenses (excepting other files in the libraries folder, which are independantly licensed). 

The first, proprietary license, refers to Jomres as a package. You cannot share it, period. You can see the full license here http://www.jomres.net/license.html. There are some exceptions, and these files are independantly licensed (see the /jomres/libraries/phptools folder for example)
The files in the /jomres/core-minicomponents,  /jomres/libraries/jomres/cms_specific and the /jomres/templates folders, whilst copyright Vince Wooll, are licensed differently to allow those users who wish, to develop and distribute their own third party plugins for Jomres. Those files are licensed under the MIT license, which allows third party vendors to modify them to suit their own requirements and if so desired, distribute them for free or cost. 

################################################################
This file is subject to The MIT License. For licencing information, please visit 
http://www.jomres.net/index.php?option=com_content&task=view&id=214&Itemid=86 and http://www.jomres.net/license.html
################################################################
*/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to '.__FILE__.' is not allowed.' );
// ################################################################

class j16000add_adhoc_item_to_bill
	{
	function j16000add_adhoc_item_to_bill()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $htmlFuncs,$indexphp;
		$step=intval(jomresGetParam($_POST,"step",1));
		$output=array();

		switch ($step)
			{
			case "2": // Now we can choose the property and put in the value of the item

				$userid=jomresGetParam($_POST,"userid",0);
				$propertyFunctions=new jrportal_property_functions();
				$userFunctions=new jrportal_user_functions();
				$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1"/>';
				$manager=$userFunctions->getJoomlaUserDetailsForJoomlaId($userid);
				$output['USERNAME']=$manager['username'];
				$output['PROPERTY_DROPDOWN']=$propertyFunctions->makePropertyDropdownForManagerId(array($userid));
				$output['JOS_ID']=$userid;
				$output['PROPERTY']=_JRPORTAL_ADD_ADHOC_ITEM_CHOOSEPROPERTY;
				$output['VALUE']=_JRPORTAL_ADD_ADHOC_ITEM_VALUE;
				$output['DESCRIPTION']=_JRPORTAL_ADD_ADHOC_ITEM_DESCRIPTION;

				$jrtbar = new jomres_toolbar();
				$jrtb  = $jrtbar->startTable();
				$image = $jrtbar->makeImageValid("/jomres/images/jomresimages/small/Save.png");
				$link = JOMRES_SITEPAGE_URL_ADMIN;
				$jrtb .= $jrtbar->customToolbarItem('saveCrate',$link,$text="Next",$submitOnClick=true,$submitTask="add_adhoc_item_to_bill",$image);
				$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN,_JRPORTAL_CANCEL);
				$jrtb .= $jrtbar->endTable();
				$output['JOMRESTOOLBAR']=$jrtb;

				$output['JOMRES_SITEPAGE_URL_ADMIN']=JOMRES_SITEPAGE_URL_ADMIN;
				
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
				$tmpl->readTemplatesFromInput( 'adhocitem_step2.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->displayParsedTemplate();

			break;
			case "3":
				if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
				$property_uid			=jomresGetParam($_POST,"property_uid",0);
				$jos_id					=jomresGetParam($_POST,"jos_id",0);
				$nett					=jomresGetParam($_POST,"nett",0.00);
				$billing_description	=jomresGetParam($_POST,"description","");
				$username				=jomresGetParam($_POST,"username",0);
				$property_name=getPropertyName($property_uid);
				if ($nett > 0.00)
					{
					$componentArgs=array(
						'property_uid'=>$property_uid,
						'jos_id'=>$jos_id,
						'nett'=>$nett,
						'billing_description'=>$billing_description,
						'username'=>$username,
						'property_name'=>$property_name
						);
					$MiniComponents->specificEvent('16000','additemtobill',$componentArgs); // Custom task
					}
				else
					echo _JRPORTAL_ADD_ADHOC_ITEM_NOVALUE;
			break;
			default:  // First let's get the manager's id
				$userFunctions=new jrportal_user_functions();
				$output['MANAGER_DROPDOWN']=$userFunctions->makeManagersDropdown();
				$output['MANAGER']=_JRPORTAL_ADD_ADHOC_ITEM_CHOOSEMANAGER;
				$jrtbar = new jomres_toolbar();
				$jrtb  = $jrtbar->startTable();
				$image = $jrtbar->makeImageValid("/jomres/images/next.png");
				$link = JOMRES_SITEPAGE_URL_ADMIN;
				$jrtb .= $jrtbar->customToolbarItem('save',$link,$text="Next",$submitOnClick=true,$submitTask="add_adhoc_item_to_bill",$image);
				$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN,_JRPORTAL_CANCEL);
				$jrtb .= $jrtbar->endTable();
				$output['JOMRESTOOLBAR']=$jrtb;

				$output['JOMRES_SITEPAGE_URL_ADMIN']=JOMRES_SITEPAGE_URL_ADMIN;
				
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
				$tmpl->readTemplatesFromInput( 'adhocitem_step1.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->displayParsedTemplate();
			break;
			}
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}