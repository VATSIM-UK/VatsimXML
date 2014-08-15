<?php namespace Vatsim\Xml;

use \SimpleXMLElement;

class XML {
    private $_urls = [];
    public function __construct($urls){
        $this->_urls = $urls;
    }
    
    public function getData($cid, $url='idstatus'){
        if(!array_key_exists($url, $this->_urls)){
            return array();
        }
        
        // let's load the URL!
        $url = sprintf($this->_urls[$url], $cid);
        $xml = new SimpleXMLElement(file_get_contents($url));
        
        if(!isset($xml->user) OR !isset($xml->user[0])){
            throw new VatsimXMLExpception("Invalid response received: ".$url);
        }
        
        $values = json_decode(json_encode($xml->user), false);
        $values->cid = $values->{"@attributes"}->cid;
        unset($values->{"@attributes"});
        return $values;
    }
}