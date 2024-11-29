<?php
define('GOOGLE_CLIENT_ROOT', dirname(__FILE__) . '/');
require(GOOGLE_CLIENT_ROOT . 'google/vendor/autoload.php');
class Gutils{
    private $client;
    private  $auth2service;
    private $calendarService;
    public function __construct(){
        $this->client = new Google_Client();
    }
    public function getClientInstance(){
        return $this->client;
    }
    public function getOauth2Service($client){
            $this->auth2service=new Google_Service_Oauth2($client); 
            return $this->auth2service;
    }
    public function getCalenderService($client){
        $this->calendarService = new Google_Service_Calendar($client);
        return $this->calendarService;
    }
    public function createEvent($event){
        $e = new Google_Service_Calendar_Event($event);
        return $this->calendarService->events->insert('primary',$e,[ 'conferenceDataVersion' => 1 ]);
    }
    public function getTimeZone(){
        return $this->calendarService->userSettings->timezone->get();
    }
    



}














?>