<?php
// create a new FireLog instance with argument Token
// unique Token is used for identify application's identity 
include_once 'library/FireLog.php';

// NOTICE1: Fake() function use for demo purpose, you will have your own function 
// for your own application, here just used for showing example.

// assume user Junjie logged into system and start to use application
Fake(userLogin("Junjie"));
// initial
// Ex: company_id = 100 (your application id in our database is 100)
//     paltform_name = "GAE_1"
//     user_id = "1004" user_id (you can put user's name or id here, but on reduplication)
$fire = new FireLog("100", "GAE_1", "1004");
// then we log this login action
$fire->setDocumentId("NONE"); // use NONE with all capitalized for all dummy inputs
$fire->setOperateType("Login");
$fire->sendLog();



// Following is your application action.

// we assume you here is an action for user to open a file
Fake(OpenFile("JunjieFan_9283134"));
// Now we need log the action that user "Junjie" is trying to Open file "JunjieFan_9283134"
$fire->setDocumentId("JunjieFan_9283134");
$fire->setOperateType("open");
$fire->sendLog();


// then we assume this file has been modified and saved
Fake(modified("JunjieFan_9283134"));
// and you want to log this action
$fire->setDocumentId("JunjieFan_9283134");
$fire->setOperateType("saved");
$fire->sendLog();





?>