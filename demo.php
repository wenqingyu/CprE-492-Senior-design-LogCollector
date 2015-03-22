<?php
// create a new FireLog instance with argument Token
// unique Token is used for identify application's identity 
include_once 'library/FireLog.php';

// STEP 1: Initialize $company_id, $platform_name, $user_id
// Create a fireLog instance
// Ex: company_id = 10000
//     paltform_name = "GAE_1"
//     user_id = junjie's user_id (you can put user's name or id here, but on reduplication)
$fire = new FireLog("10000", "Platform_EC2_1", "1");

// STEP 2: set document name
$fire->setDocumentId("JunjieFan_9283134");

// STEP 3: set operate type
$fire->setOperateType("Modify");

// STEP 4: send log
$fire->sendLog();





?>