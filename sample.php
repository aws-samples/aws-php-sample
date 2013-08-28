<?php
// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';

use Aws\S3\S3Client;

// Instantiate the S3 client with your AWS credentials and desired AWS region
$client = S3Client::factory('config.php');

// Generate a unique bucket name
$bucket = 'php-sdk-sample' . uniqid();

// Create the bucket
$result = $client->createBucket(array(
            'Bucket' => $bucket
            ));

// Wait until the bucket is created
$client->waitUntil('BucketExists', array('Bucket' => $bucket));

// Create an object in the bucket
$result = $client->putObject(array(
            'Bucket' => $bucket,
            'Key' => 'hello_world.txt',
            'Body' => "Hello World!"
            ));

?>
