<?php

    /**
    * Main class for Nexus, holds everything.
    *
    * @package NexusCore
    */
    class CNexus implements ISingleton {

		private static $instance = null;

		/**
		* Singleton pattern. Get the instance of the latest created object or create a new one.
		* @return CNexus The instance of this class.
		*/
		public static function Instance() {
			if(self::$instance == null) {
			 self::$instance = new CNexus();
			}
			
			return self::$instance;
		}


		/**
		* Constructor
		*/
		protected function __construct() {
			self::$instance = &$this;
		
			// include the site specific config.php and create a ref to $nx to be used by config.php
			$nx = &$this;
			require(NEXUS_SITE_PATH.'/config.php');

			// Init
			$this->data = array('title' 		=> '',
								'stylesheet'	=> '',
								'header'		=> '',
								'main' 			=> '',
								'footer'		=> '' );
			
			// Create and initialize request object
			$this->request = new CRequest();
			$this->request->Init( $this->config['base_url'] );
			
		}

		
		
		
		/**
		* Frontcontroller, check url and route to controllers.
		*/
		public function FrontControllerRoute() {
			$this->data['debug']  = "REQUEST_URI - {$_SERVER['REQUEST_URI']}\n";
			$this->data['debug'] .= "SCRIPT_NAME - {$_SERVER['SCRIPT_NAME']}\n";

			// Shortcuts
			$controller = $this->request->controller;
			$method     = $this->request->method;
			$arguments  = $this->request->arguments;

			
			// Remove - and _ from method name
            $method = str_replace(array('_', '-'), '', $method);

			
		// Check if there is a callable method in the controller class, if then call it
			// Is the controller enabled in config.php?
			$controllerExists    = isset($this->config['controllers'][$controller]);
			$controllerEnabled    = false;
			$className             = false;
			$classExists           = false;

			if($controllerExists) {
			  $controllerEnabled    = ($this->config['controllers'][$controller]['enabled'] == true);
			  $className               = $this->config['controllers'][$controller]['class'];
			  $classExists           = class_exists($className);
			}
			
			// Check if controller has a callable method in the controller class, if then call it
			if($controllerExists && $controllerEnabled && $classExists) {
			  $rc = new ReflectionClass($className);
			  if($rc->implementsInterface('IController')) {
				if($rc->hasMethod($method)) {
				  $controllerObj = $rc->newInstance();
				  $methodObj = $rc->getMethod($method);
				  $methodObj->invokeArgs($controllerObj, $arguments);
				} 
				else {
				  die("404. " . get_class() . ' error: Controller does not contain method.');
				}
			  } 
			  else {
				die('404. ' . get_class() . ' error: Controller does not implement interface IController.');
			  }
			}
			else {
			  die('404. Controller class either doesn\'t exist <strong>or is not declared and enabled in config.php</strong>.');
			}
		}
		
		
		
		
		
		/**
		* ThemeEngineRender, renders the reply of the request.
		*/
		public function ThemeEngineRender() {
			// Get the paths and settings for the theme
			$themeName    = $this->config['theme']['name'];
			$themePath    = NEXUS_INSTALL_PATH . "/themes/{$themeName}";
			$themeUrl      = $this->request->base_url . "themes/{$themeName}";

			// Add stylesheet path to the $nx->data array
			$this->data['stylesheet'] = "{$themeUrl}/style.css";

			// Include the global functions.php and the functions.php that are part of the theme
			$nx = &$this;
			$functionsPath = "{$themePath}/functions.php";
			if(is_file($functionsPath)) {
			  include $functionsPath;
			}

			// Extract $nx->data to own variables and handover to the template file
			extract($this->data);     
			include("{$themePath}/default.tpl.php");
		}
	}
	
	
	