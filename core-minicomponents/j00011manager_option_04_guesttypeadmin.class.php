<?php
/**
 * Core file
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 7
 * @package Jomres
 * @copyright    2005-2013 Vince Wooll
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/**
#
 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
#
 * @package Jomres
#
 */
class j00011manager_option_04_guesttypeadmin
    {

    /**
    #
     * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    #
     */
    function j00011manager_option_04_guesttypeadmin( $componentArgs )
        {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
        if ( $MiniComponents->template_touch )
            {
            $this->template_touchable = false;

            return;
            }
        $mrConfig = getPropertySpecificSettings( $property_uid );
        if ( $mrConfig[ 'is_real_estate_listing' ] == 1 ) return;
        $this->cpanelButton = jomres_mainmenu_option( jomresURL( JOMRES_SITEPAGE_URL . "&task=listCustomerTypes" ), 'EditGuestTypes.png', jr_gettext( '_JOMRES_CONFIG_VARIANCES_CUSTOMERTYPES', _JOMRES_CONFIG_VARIANCES_CUSTOMERTYPES, false, false ), null, jr_gettext( "_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_SETTINGS", _JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_SETTINGS, false, false ), false, true );
        }


    // This must be included in every Event/Mini-component
    function getRetVals()
        {
        return $this->cpanelButton;
        }
    }

?>