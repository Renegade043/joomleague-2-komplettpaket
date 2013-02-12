<?php defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

class JoomleagueViewTeamInfo extends JLGView
{
	function display( $tpl = null )
	{
		// Get a reference of the page instance in joomla
		$document	= JFactory::getDocument();
		$model		= $this->getModel();
		$config		= $model->getTemplateConfig( $this->getName() );
		$project	= $model->getProject();
		$this->assignRef( 'project', $project );
		$isEditor = $model->hasEditPermission('projectteam.edit');

		if ( isset($this->project->id) )
		{
			$overallconfig = $model->getOverallConfig();
			$this->assignRef( 'overallconfig',  $overallconfig);
			$this->assignRef( 'config', $config );
			$team = $model->getTeamByProject();
			$this->assignRef( 'team',  $team );
			$club = $model->getClub() ;
			$this->assignRef( 'club', $club);
			$seasons = $model->getSeasons( $config );
			$this->assignRef( 'seasons', $seasons );
			$this->assignRef('showediticon', $isEditor);
			$this->assignRef('projectteamid', $model->projectteamid);
            
            if ($this->config['show_history_leagues']==1)
	{
            $this->assignRef( 'leaguerankoverview', $model->getLeagueRankOverview( $this->seasons ) );
			$this->assignRef( 'leaguerankoverviewdetail', $model->getLeagueRankOverviewDetail( $this->seasons ) );
}

		}
			
		$extended = $this->getExtended($team->teamextended, 'team');
		$this->assignRef( 'extended', $extended );
    $this->assign('show_debug_info', JComponentHelper::getParams('com_joomleague')->get('show_debug_info',0) );
		// Set page title
		$pageTitle = JText::_( 'COM_JOOMLEAGUE_TEAMINFO_PAGE_TITLE' );
		if ( isset( $this->team ) )
		{
			$pageTitle .= ': ' . $this->team->tname;
		}
		$document->setTitle( $pageTitle );

		parent::display( $tpl );
	}
}
?>