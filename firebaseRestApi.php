<?php
/**
 * Created by PhpStorm.
 * User: Amr Sameh
 * Date: 7/27/2017
 * Time: 12:24 AM
 */

/*
 * ========================================================================================================
 * =                                # Before Include #                                                    =
 * =                                                                                                      =
 * =     set $path  which is the path for the target data                                                 =
 * =     set $data  which is the data to sed (if exist)                                                   =
 * =     set $action  depending on the action execute on the FireBse data :                               =
 * =             1 - read  : read data                                                                    =
 * =             2 - write : add new child or overwrite                                                   =
 * =             3 - push  : append on the target                                                         =
 * =             4 - update : edit the data :D                                                            =
 * =             5 - delete : yes u got it :)                                                             =
 * =     the Response data Stored in $response                                                            =
 * ========================================================================================================
 */



//fell free to add your configuration
define("JsonExtension",".json");
$fireBaseUrl = "https://newme-69855.firebaseio.com/";
$path=$fireBaseUrl.$path.JsonExtension;
if (isset($data))
$json = json_encode( $data );
$curl = curl_init();
curl_setopt( $curl, CURLOPT_URL, $path );

switch ($action) {

    case 'read':
    break;
        case 'write';
             curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PUT" );
             curl_setopt( $curl, CURLOPT_POSTFIELDS, $json );

        break;
        case 'push';
            curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "POST" );
            curl_setopt( $curl, CURLOPT_POSTFIELDS, $json );

            break;
        case 'update';
            curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PATCH" );
            curl_setopt( $curl, CURLOPT_POSTFIELDS, $json );

        break;
        case 'delete';
            curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "DELETE" );

        break;

}


curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec( $curl );
curl_close( $curl );
