 $kullaniciadi = $_GET['username'];
$url='https://steamidfinder.com/lookup/'.$kullaniciadi.'/';

$veri = file_get_contents($url);
 
preg_match('@<br>steamID&nbsp;<code>(.*?)</code>@si',$veri,$steamID);
preg_match('@<br>steamID3 <code>(.*?)</code>@si',$veri,$steamID3);
preg_match('@<br>steamID64 <code>(.*?)</code>@si',$veri,$steamID64);
preg_match('@<br>customURL <code><a href="(.*?)" target="_blank">@si',$veri,$customURL);
preg_match('@<br>profile <code><a href="(.*?)" target="_blanl">@si',$veri,$profile);
preg_match('@<br>profile state <code>(.*?)</code>@si',$veri,$profilestate);
preg_match('@<br>profile created <code>(.*?)</code>@si',$veri,$profilecreated);
preg_match('@<br>name <code>(.*?)</code>@si',$veri,$name);
preg_match('@<br>real name <code>(.*?)</code>@si',$veri,$realname);
preg_match('@<br>location <code>(.*?)</code>@si',$veri,$location);
preg_match('@<img class="img-rounded avatar" src="(.*?)" alt="" />@si',$veri,$picture);
header('content-type:text/html;charset=utf-8');

  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://steamidfinder.com/lookup/'.$kullaniciadi.'/');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            'refresh='.$steamID64[1].'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

echo $steamID.'<br>';
echo $steamID3.'<br>';
echo $steamID64.'<br>';
echo $customURL.'<br>';
echo $profile.'<br>';
echo $profilestate.'<br>';
echo $profilecreated.'<br>';
echo $name.'<br>';
echo $realname.'<br>';
echo $location.'<br>';
echo $picture.'<br>';
