<?php

date_default_timezone_set('America/Sao_Paulo');


require_once 'vendor/autoload.php';

use HackThisSite\BullScheduler\Queue;

$channel = 'growp-invite-info';

$dateTime = new DateTime();

//die();

$job = array(
    'code' => 'DKKTlRsaCE7JCNZ5e1Jh3G',
    'size' => 0,
    'reference_id' => '5519981746006-1628216032'
);


$config = array(
    'customJobId' => str_replace('-','', $job['reference_id']),
    'jobId' => str_replace('-','', $job['reference_id']),
    'delay' => 0,
    'removeOnComplete' => true
);

try{

    \Predis\Autoloader::register();

    $client = new \Predis\Client(array(
        "scheme" => "tcp",
        "host" => "173.212.215.175",
        "port" => "6379",
        "password" => "cris297358297358@R"
    ));

    $queue = new Queue($channel, $client);

    $job_id = $queue->add($job, $config);
    print_r('job id ' . $job_id);
}catch(Exception $e){
    print_r($e->getMessage());
    print_r($e->getCode());
    
}