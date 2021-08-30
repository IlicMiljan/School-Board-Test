<?php

    function ArrayToXML($Data, &$XML ) {
        foreach( $Data as $Key => $Value ) {
            if( is_array($Value) ) {
                if( is_numeric($Key) ){
                    $Key = 'Item-'.$Key;
                }
                $SubNode = $XML->addChild($Key);
                ArrayToXML($Value, $SubNode);
            } else {
                $XML->addChild("$Key", htmlspecialchars("$Value"));
            }
        }
    }