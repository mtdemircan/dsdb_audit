<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;


class dsdbController {

     function listInfos(){


        
        $json= runCommand('cat /var/log/dsdb_json_audit.log | grep -m1 \'"operation": "Delete"\'');
        
        $obj = json_decode($json);
        $data = [];
        $data[] = [
            "userSid" => $obj->dsdbChange->userSid,
            "dn" => $obj->dsdbChange->dn,
            "transactionId" => $obj->dsdbChange->transactionId
        ];
        
        
        return view('table', [
            "value" => $data,
            "title" => ["userSid","dn","transactionId"],
            "display" => ["userSid","dn","transactionId"],    
        ]);
    

    }
}