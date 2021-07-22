<?php 
header("Content-Type: text/plain");
require('./TTXLog.php');
$xlog = new XLog();
echo "\n =========================\n";
echo "\nDecoding: \n";
$decodeBinary=file_get_contents("./xlog-data.bin");// decode from binary file from actual tiktok app's xlog request
echo bin2hex($decodeBinary); // printing binary to hex 
$decrypted = $xlog->decode($decodeBinary);
echo "\n =========================\n";
echo "\nDecrypted Data:\n" . $decrypted . "\n";
echo "\n =========================\n";
echo "\n =========================\n";
$toEncode='{"extra":"install","grilock":"eyJvcyI6IkFuZHJvaWQiLCJ2ZXJzaW9uIjoiMS4wLjMiLCJ0b2tlbl9pZCI6IiIsImNvZGUiOjUwMn0=","dpod":{"pod":""},"p1":"6909390148258694661","p2":"","ait":1610412531,"uit":786,"pkg":"com.zhiliaoapp.musically","vc":2019080210,"fp":"OPPO/A37m/A37:5.1/LMY47I/1449641681:user/release-keys","mdi_if":{"mid":"13973018e5e7504d5a254ab8da9f580642e410ab","ts":1524480551542},"wifisid":" espu ","wifimac":"50:78:b3:d7:3f:40","wifip":"192.168.10.123","vpn":0,"aplist":[],"route":{"iip":"192.168.10.123","gip":"192.168.10.1","ghw":"50:78:b3:d7:3f:40","type":"wlan0"},"location":"","hw":{"brand":"OPPO","model":"OPPO A37m","board":"full_oppo6750_15127","device":"A37","product":"A37m","bt":"unknown","pfbd":"mt6750","display":"720*1280","dpi":320,"bat":2630,"cpu":{"core":8,"hw":"MT6750","max":"1508000","min":"156000","ft":"fp asimd aes pmull sha1 sha2 crc32"},"mem":{"ram":"1871998976","rom":"12774944768","sd":"12722515968"}},"id":{"i":22,"r":"5.1","imei":"","imsi":"","adid":"cdb2ea9877018d61","adid_ex":"cdb2ea9877018d61","mac":"44:04:44:5f:4a:97","serial":"8DPZAUUK99999999"},"emulator":{"sig":0,"cb":10,"cid":0,"br":"ERROR","file":[ ],"prop":[ ],"ghw":0},"env":{"ver":"0.6.05.22","tag":"Fx2","pkg":"com.zhiliaoapp.musically","tz":"GMT+08:00","ml":"en_","uid":10189,"mc":0,"arch":2,"e_arch":255,"v_bnd":8,"su": 1,"sp":"/system/xbin/su","magisk":0,"ro.secure_s":"1","ro.debuggable_s":"0","rebuild":0,"jd":0,"dbg":0,"tid":0,"hph":"192.168.10.113","hpp":"8999","envrion":["CLASSPATH=/system/framework/XposedBridge.jar"],"xposed":1,"frida":0,"cydia":0,"jexp": 0,"click":"","acb":-1,"hook":[],"jvh":[],"fish":{},"vapp":"","vmos":0},"extension":{"notify":1,"sign":"194326E82C84A639A52E5C023116F12A","inst":"android.app.Instrumentation","AMN":"","dump":0,"bytes64":""},"paradox":{"cpu":0,"rup":0,"add":0,"thd":-1},"custom_info":{},"fch":"0291800574"}'; // sample json data
echo "\nEncoding: \n";
echo $toEncode;
$encrypted = $xlog->encode($toEncode); // gets the binary data which can be used with CURL post body
echo "\nEncrypted Data:\n" . bin2hex($encrypted) . "\n"; // printing hex string for binary 
