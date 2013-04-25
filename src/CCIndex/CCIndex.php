<?php
    /**
    * Standard controller layout.
    *
    * @package NexusCore
    */
    class CCIndex implements IController {

       /**
        * Implementing interface IController. All controllers must have an index action.
        */
       public function Index() {   
          global $nx;
          $nx->data['title'] = "The Index method of CCIndex";
       }

       public function Test() {   
          global $nx;
          $nx->data['title'] = "The Test method of CCIndex";
       }
    } 