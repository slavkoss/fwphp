<?php
// J:\awww\apl\dev1\utl\ddns_whatismyip.php
// proxy_intermediate_buffer_server_request_hdr is modified
// returns first forwarded IP match it finds
// forwarded IP is of who started request
function forwarded_ip() {
  $keys = array(
    'HTTP_X_FORWARDED_FOR', 
    'HTTP_X_FORWARDED', 
    'HTTP_FORWARDED_FOR', 
    'HTTP_FORWARDED',
    'HTTP_CLIENT_IP', 
    'HTTP_X_CLUSTER_CLIENT_IP', 
  );
  
  foreach($keys as $key) {
    if(isset($_SERVER[$key])) {
      $ip_array = explode(',', $_SERVER[$key]);
      foreach($ip_array as $ip) {
        $ip = trim($ip);
        if(validate_ip($ip)) {
          return $ip;          
        }
      }
    }
  }
  return '';
}

function validate_ip($ip) {
  if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
    return false;
  } else {
    return true;
  }
}





$remote_ip = $_SERVER['REMOTE_ADDR'];
$forwarded_ip = forwarded_ip();
  
?>


<span style="font-weight: bold;"></span><br>
<h2>22222 What Is My IP?</h2>


      
      
<p>The request came from:<br>
        <strong><?php echo $remote_ip; ?></strong>
      </p>


      
      <?php if($forwarded_ip != '') { ?>
      
<p>The request was forwarded for:<br>
        <strong><?php echo $forwarded_ip; ?></strong>
      </p>


      <?php } 
      
      
exec("del wip_web_servera.txt");
exec("J:\CURL\wget.exe -qO - http://www.icanhazip.com > wip_web_servera.txt");
if (file_exists("wip_web_servera.txt")) {
  $wip_web_servera=trim(file_get_contents("wip_web_servera.txt"));
   echo '<h2>'."My home web server IP : $wip_web_servera".'</h2>'; 
   
}
?>  

or<br>
<a href="http://www.canyouseeme.org/" target="_blank">http://www.canyouseeme.org/</a><br>
<br>
<a href="https://www.whatismyip.com/" target="_blank">https://www.whatismyip.com/</a><br>
<br>
<a href="http://www.portchecktool.com/" target="_blank">http://www.portchecktool.com/</a><br>
<br>
<a href="http://www.yougetsignal.com/tools/open-ports/" target="_blank">http://www.yougetsignal.com/tools/open-ports/</a>&nbsp;
<br>
<a href="https://bestvpn.org/whats-my-ip/" target="_blank"><br>
https://bestvpn.org/whats-my-ip/</a><br>
<br>
<a href="https://www.dynu.com/networktools/portcheck" target="_blank">https://www.dynu.com/networktools/portcheck</a><br><br>
<br>





<h2>33333 Send my IP to DDNS provider</h2>
DDNS client<br>
<br>or<br> (asks username and password) :
<br>
<a href="https://freedns.afraid.org/nic/update?hostname=phporacle.mooo.com&myip=<?=$wip_web_servera?>" target="_blank">https://freedns.afraid.org/nic/update?hostname=phporacle.mooo.com&myip=<?=$wip_web_servera?></a>

<br>or<br>
<a href="http://USERNAME:PASSWORD@freedns.afraid.org/nic/update?hostname=phporacle.mooo.com&amp;myip=<?=$wip_web_servera?>" target="_blank">http://USERNAME:PASSWORD@freedns.afraid.org/nic/update?hostname=phporacle.mooo.com&amp;myip=<?=$wip_web_servera?></a>



