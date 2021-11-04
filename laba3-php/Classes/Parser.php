<?php

class Parser
{

    public function load()
    {
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $xml = simplexml_load_string(file_get_contents($_FILES['file']['tmp_name']));

        if ($extension == 'gpx') {
            $this->parseFromGpx($xml);
        } elseif ($extension == 'kml') {
            $this->parseFromKml($xml);
        } else {
            die('Select wrong format file');
        }
    }

    private function parseFromGpx($xml)
    {
        $array = [];
        $fileName = 'parsed.kml';

        $i = 0;
        foreach ($xml as $el) {
            $array[$i]['name'] = $el->cmt;
            $array[$i]['description'] = $el->link['href'];
            $array[$i]['Point']['coordinates'] = $el['lat'] . ',' . $el['lon'];
            $i++;
        }
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>' . '<kml/>');
        $folder = $xml->addChild('Folder');
        foreach ($array as $element) {
            $subnode = $folder->addChild('Placemark');
            $this->array_to_kml($element, $subnode);
        }
        $this->download($xml,$fileName);
    }

    private function parseFromKml($xml)
    {
        $array = [];
        $fileName = 'parsed.gpx';

        $i = 0;
        foreach ($xml->Document->Folder->Folder->Placemark as $el) {
            $arr = explode(',', $el->Point->coordinates);
            $array[$i]['wpt']['lat'] = $arr[0];
            $array[$i]['wpt']['lon'] = $arr[1];
            $array[$i]['cmt'] = $el->name->__toString();
            $array[$i]["link"]["href"] = $el->description->__toString();
            $i++;
        }

        $xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?>" . "<gpx/>");

        foreach ($array as $arr) {
            $xml_data = $xml->addChild('wpt');
            foreach ($arr as $key=>$value) {
                $this->array_to_gpx($key,$value, $xml_data);
            }
        }

       $this->download($xml,$fileName);
    }


    function array_to_gpx($key,$data, &$xml_data)
    {
            if (is_array($data)) {
                $node = $key=='wpt' ?$xml_data : $xml_data->addChild($key);
                foreach ($data as $key1=> $val) {
                    $node->addAttribute($key1, $val);
                }
            }else {
                $xml_data->addChild($key, html_entity_decode($data));
            }

    }


    function array_to_kml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $xml = $xml_data->addChild($key);
                $this->array_to_kml($value, $xml);
            } else {
                $xml_data->addChild($key, html_entity_decode($value));
            }
        }
    }

    private function download($xml,$path){
        $domxml = new \DOMDocument('1.0');
        $domxml->preserveWhiteSpace = false;
        $domxml->formatOutput = true;
        $domxml->loadXML($xml->asXML());
        $domxml->save($path);
        //header("Location: $path");

    }
}