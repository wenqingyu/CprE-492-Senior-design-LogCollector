# CprE-492-Senior-design-LogCollector
CprE 492 Log Collector Library

Version 1.2
Debug version

How to use:
1. Download zip or check out in PHP environment path, for example: /var/www/yourProject/

2. then Include the FireLog.php into the file you want to use fireLog
ex: include_once '/var/www/yourProject/LogCollector/library/FileLog.php';

3. Now FireLog is available in this file, to generate a FileLog and send to log server you need:
   - Create a FileLog instance, with $company_id, $platform_name, $user_id
          Ex: company_id = 10000
              paltform_name = "GAE_1"
              user_id = junjie's user_id (you can put user's name or id here, but on reduplication)
      $fireLog = new FireLog("10000", "Platform_EC2_1", "1");
       
  - Set document name
      $fireLog->setDocumentId("JunjieFan_9283134");

  - Set operate type
      $fireLog->setOperateType("Modify");

  - Send log
      $fireLog->sendLog();
      
  For detail, you can check demo.php and applicationDemo.php file    


Notice: Remember, always check user's auth, you cannot take any action on files unless you already know who is currently in page, so do FileLog. Because you cannot generate a log without user's id.


  
 
