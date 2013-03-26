<?php
/**
 * @copyright	Copyright (C) 2005-2013 JoomLeague.net. All rights reserved.
 * @license		GNU/GPL,see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License,and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');



// Include dependancy of the main controllerform class
jimport('joomla.application.component.controllerform');

/**
 * Joomleague Component Club Controller
 *
 * @package	JoomLeague
 * @since	0.1
 */
class JoomleagueControllerEditProjectteam extends JControllerForm
{



public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true))
        {
                return parent::getModel($name, $prefix, array('ignore_request' => false));
        }

/*        
	function load()
	{
		$cid = JRequest::getInt( 'cid', 0 );

		$club = & JTable::getInstance( 'Club', 'Table' );
		$club->load( $cid );
		$club->checkout( $user->id );

		$this->display();
	}
*/

    function display()
	{
		/*
        switch($this->getTask())
		{
			case 'add'     :
				{
					JRequest::setVar('hidemainmenu',0);
					JRequest::setVar('layout','form');
					JRequest::setVar('view','club');
					JRequest::setVar('edit',false);

					// Checkout the club
					$model=$this->getModel('club');
					$model->checkout();
				} break;
			case 'edit'    :
				{
					JRequest::setVar('hidemainmenu',0);
					JRequest::setVar('layout','form');
					JRequest::setVar('view','club');
					JRequest::setVar('edit',true);

					// Checkout the club
					$model=$this->getModel('club');
					$model->checkout();
				} break;
		}
		parent::display();
        */
	}

	function save()
	{
		$mainframe = JFactory::getApplication();
    // Check for request forgeries
		JRequest::checkToken() or die('COM_JOOMLEAGUE_GLOBAL_INVALID_TOKEN');
		$msg='';
		
        
        $this->setRedirect('index.php?option=com_joomleague&close='.JRequest::getString('close', 0).'&tmpl=component&view=editprojectteam&pid='.$post['id'],$msg,$type);
        
	}

	

	

	
	
	
	
}
?>