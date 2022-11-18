<?php 
namespace app;

use app\RestClient;
use app\Config;

class GitHubClient extends RestClient {
  private $client;
  public $headers = [];
  private $organization;
  private $gitHubUrl;

  public function __construct(){
    //load configs...
    Config::load();

    $this->headers = [
      'Content-Type'=>'application/json',
      'Authorization'=>'token ' . GITHUB_TOKEN
    ];
    $this->organization = GITHUB_ORGANIZATION;
    $this->gitHubUrl = GITHUB_URL;
    $this->client = new RestClient(['headers'=>$this->headers]);

  }

  public function getAllLabels(){
    $strUrl = $this->gitHubUrl . 'repos/' . $this->organization . '/'.GITHUB_REPOSITORY.'/labels';
    return json_decode($this->client->get($strUrl)->response, true);
  }

  public function getAllIssues($options=[]){
    /*
      filter => 'string'
      state => 'open(default)|closed|all'
      labels -> 
    */
    $strUrl = $this->gitHubUrl . 'repos/' . $this->organization . '/'.GITHUB_REPOSITORY.'/issues';
    if(!empty($options)){
      $strUrl .= '?'.implode('&', $options);
    }
    return json_decode($this->client->get($strUrl)->response, true);
  }
}