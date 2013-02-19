<?php
/**
* Constants module class file.
*
*
* DO NOT CHANGE THE DEFAULT CONFIGURATION VALUES!
* 
* You may overload the module configuration values in your constants-module
* configuration like so:
* 
* 'modules'=>array(
*     'constants'=>array(
*         'param'=>'value',
*     ),
* ),
*/
class ConstantsModule extends CWebModule
{

    private $debug = false;

	/**
	* @property string the base url to module. Override when module is nested.
	*/
	public $baseUrl = '/constants';
	/**
	* @property string the path to the layout file to use for displaying module.
	*/
	public $layout = 'constants.views.layouts.main';
	/**
	* @property string the path to the application layout file.
	*/
	public $appLayout = 'application.views.layouts.main';

	/**
	* Initializes the  module.
	*/
	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'constants.components.*',
			'constants.components.behaviors.*',
			'constants.components.dataproviders.*',
			'constants.controllers.*',
			'constants.models.*',
		));

		// Set the required components.
        /*
		$this->setComponents(array(
			'innercomponent'=>array(
				'class'=>'InnerComponentClass',
				'innercomponentparam'=>'someinnercomponentvalue',
			)
		));
        */

		// Normally the default controller is ?.
		//$this->defaultController = 'assignment';


		// Set the installer if necessary.
		/*if( $this->install===true )
		{
			$this->setComponents(array(
				'installer'=>array(
					'class'=>'ConstantsInstallerClass',
				),
			));

			// When installing we need to set the default controller to Install.
			$this->defaultController = 'install';
		}*/

	}

	/**
	* Registers the necessary scripts.
	*/
	public function registerScripts()
	{
		// Get the url to the module assets
		$assetsUrl = $this->getAssetsUrl();

		// Register the necessary scripts
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		$cs->registerScriptFile($assetsUrl.'/js/modulefile.js');
		$cs->registerCssFile($assetsUrl.'/css/modulecss.css');

		// Make sure we want to register a style sheet.
		if( $this->cssFile!==false )
		{
			// Default style sheet is used unless one is provided.
			if( $this->cssFile===null )
				$this->cssFile = $assetsUrl.'/css/default.css';
			else
				$this->cssFile = Yii::app()->request->baseUrl.$this->cssFile;

			// Register the style sheet
			$cs->registerCssFile($this->cssFile);
		}
	}

	/**
	* Publishes the module assets path.
	* @return string the base URL that contains all published asset files of Constants.
	*/
	public function getAssetsUrl()
	{
		if( $this->_assetsUrl===null )
		{
			$assetsPath = Yii::getPathOfAlias('constants.assets');

			// We need to republish the assets if debug mode is enabled.
			if( $this->debug===true )
				$this->_assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath, false, -1, true);
			else
				$this->_assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);
		}

		return $this->_assetsUrl;
	}



	/**
	* @return some example the installer component.
	*/
    /*
	public function getInstaller()
	{
		return $this->getComponent('installer');
	}
    */

	/**
	* @return the current version.
	*/
	public function getVersion()
	{
		return '1.0.0';
	}
}
