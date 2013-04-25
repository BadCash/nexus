<?php
    /**
    * Helpers for the template file.
    */
    $nx->data['header'] = '<h1>Header: Nexus</h1>';
//    $nx->data['main']   = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';
    $nx->data['footer'] = '<p>Footer: &copy; Nexus by Magnus Wikhög</p>';


    /**
    * Print debuginformation from the framework.
    */
    function get_debug() {
      $nx = CNexus::Instance();
      $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($nx->config, true)) . "</pre>";
      $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($nx->data, true)) . "</pre>";
      $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($nx->request, true)) . "</pre>";
      return $html;
    }