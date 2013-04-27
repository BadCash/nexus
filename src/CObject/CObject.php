<?php
    /**
    * Holding a instance of CLydia to enable use of $this in subclasses.
    *
    * @package NexusCore
    */
    class CObject {

       public $config;
       public $request;
       public $data;

       /**
        * Constructor
        */
       protected function __construct() {
			$nx = CNexus::Instance();
			$this->config   = &$nx->config;
			$this->request  = &$nx->request;
			$this->data     = &$nx->data;
      }

    }