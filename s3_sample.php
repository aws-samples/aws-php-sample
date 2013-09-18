<?php
/*
 * Copyright 2013. Amazon Web Services, Inc. All Rights Reserved.
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
**/

// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Common\Aws;

// Instantiate the S3 client with your AWS credentials and desired AWS region
$aws = Aws::factory();
$client = $aws->get('s3');

// Generate a unique bucket name
$bucket = 'php-sdk-sample-' . uniqid();

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

// Get the object
echo "Downloading that same object:\n";
$result = $client->getObject(array(
    'Bucket' => $bucket,
    'Key' => $key
));

echo "\n---BEGIN---\n";
echo $result['Body'];
echo "\n---END---\n\n";

// And now, delete it.
printf("Deleting object with key %s\n", $key);
$result = $client->deleteObject(array(
    'Bucket' => $bucket,
    'Key' => $key
));

// And delete the bucket, too.
printf("Deleting bucket %s\n", $bucket);
$result = $client->deleteBucket(array(
    'Bucket' => $bucket
));
