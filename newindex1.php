<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('src/facebook.php');
$site_url	= "http://localhost/prachara/welcome.html";
  $config = array(
    'appId' => '654907034584861',
    'secret' => '2238773467441202bf14872739a8ad21',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );
$flag=0;
$msg="I bet You will share this video after watching..

A ghost in white dress found in the woods of virginia. Several psyched around the world after watching this video.

**WARNING***

* Not suggested for heart patients
* Not adviced to watch alone
* Not for kids under 14
* Not suggested to watch after 10PM";


$link="https://www.youtube.com/watch?v=rjnkvQQaZ1A" ;
$i=0;
$totalgroup=0;

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>
<html>
  <head></head>
  <body>

  <?php
  
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
			  echo "In try <br />" ;
			  $groups            = $facebook->api('/'.$user_id.'/groups');
			 		 
				echo "After API CALL <br />" ;
			  echo "array length".count($groups)."<br />";
			  
			  foreach($groups as $group){
			  if ($flag==0){
				  foreach($group as $cur){
				  //echo $cur['name']."=".$cur['id']."<br />";
				  $idarray[$i++]=$cur['id'];
				  //echo $idarray[$i-1]."<br />";
				  }
				  $flag=1;
				}
				
				}
				$i=0;
				for ($j=0; $j<10; $j++){	
				echo $id=$idarray[$i++];
				$ret_obj = $facebook->api('/$id/feed', 'POST',
											array(
											  'link' => $link,
											  'message' => $msg
										 ));
										 
				echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';
}
				// Give the user a logout link 
				echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl( array(
                       'scope' => 'publish_actions,user_groups',
					   'redirect_uri'	=> $site_url
                       )); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, so print a link for the user to login
      // To post to a user's wall, we need publish_actions permission
      // We'll use the current URL as the redirect_uri, so we don't
      // need to specify it here.
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions' ) );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    } 

  ?>      

  </body> 
</html> 