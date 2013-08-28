<?php
// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Common\Aws;

// Instantiate the S3 client with your AWS credentials and desired AWS region
$aws = Aws::factory('./config.php');
$client = $aws->get('s3');

// Generate a unique bucket name
$bucket = 'php-sdk-sample' . uniqid();

// Create the bucket
printf("Creating bucket named %s\n", $bucket);
$result = $client->createBucket(array(
            'Bucket' => $bucket
            ));

// Wait until the bucket is created
$client->waitUntil('BucketExists', array('Bucket' => $bucket));

// Create an object in the bucket
$key = 'hello_world.txt';

printf("Creating a new object with key %s\n", $key);
$result = $client->putObject(array(
            'Bucket' => $bucket,
            'Key' => $key,
            'Body' => "Hello World!"
            ));

?>
