<?php 

// This file is generated by Composer
require_once './vendor/autoload.php';

use app\GitHubClient;

$objGitHubClient = new GitHubClient();

//list of the issues from repository...
$options = ['state=closed'];
echo "<pre>";
print_r($objGitHubClient->getAllIssues($options));
die;

?>