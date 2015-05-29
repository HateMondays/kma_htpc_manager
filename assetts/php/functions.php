<?php

  $config_path= "var/htpc-credentials/config.ini"; //Path to config.ini - Recomended location is outside webroot
  $config = parse_ini_file($config_path, true);  //Tells site to parse the config.ini for info contained
  
  $plex_server_ip = $config['network']['plex_server_ip']; //Stores Plex Server IP under $plex_server_ip
  $plex_username = $config['credentials']['plex_username']; //Stores Plex Username under $plex_username - If Using Home must be admin account
  $plex_password = $config['credentials']['plex_password']; //Stores Plex Password under $plex_password - If Using Home must be admin account
  
  
  	// Set the path for the Plex Token
  $plexTokenCache = '../misc/plex_token.txt';
  // Check to see if the plex token exists and is younger than one week
  // if not grab it and write it to our caches folder
  if (file_exists($plexTokenCache) && (filemtime($plexTokenCache) > (time() - 60 * 60 * 24 * 7))) {
  	$plexToken = file_get_contents("../misc/plex_token.txt");
  } else {
  	file_put_contents($plexTokenCache, getPlexToken());
  	$plexToken = file_get_contents("../misc/plex_token.txt");
  }
  
?>
