<?php
  /**
   * This class helps creating simple AJAX application
   * 
   * @author Rochak Chauhan
   */
  class Ajax{
    
    /**
     * Constructor function
     */
    function __construct($htmlObjectId) {
      //print '<script src="ajax.js" type="text/javascript"></script>';
      //print "<script type=\"text/javascript\" language=\"JavaScript\"> createRequestObject('$htmlObjectId');</script>";
    }
    
    /**
     * This fucntion calls the remote file with certain parameters
     *
     * @param string $remoteFileName (filename with extension)
     * @param [array $parameterNames] (names of all the parameters to be sent)
     * @param [array $parameterValues] (corresponding values of the parameters)
     * 
     * @return void
     */
    function sendRequest( $remoteFileName
        , $parameterNames = array(), $parameterValues = array()) 
    {
      
      if (count($parameterNames) == count($parameterValues)) {
        $parameterNames  = implode(',', $parameterNames);
        $parameterValues = implode(',', $parameterValues);
                    
        print "<script type=\"text/javascript\" language=\"JavaScript\"> sendReq('$remoteFileName', '$parameterNames', '$parameterValues');</script>";
      }
      else{      
        die("'Parameter Names' and 'Parameters Values' do NOT match.");
      }
    }
    
    /**
     * This function returns the response as simple string/xml
     * @package [$asXml] boolean
     * 
     * @return string
     */
    function getResponse($asXml = false) {
      if ($asXml) {
      
        return "<script type=\"text/javascript\" language=\"JavaScript\"> document.write(responseXml);</script>";  
      }
      else {
        return "<script type=\"text/javascript\" language=\"JavaScript\"> alert(responseText);document.write(responseText);</script>";
      }
    }
        
  }
?>