# AWS SDK for PHP Sample Project

A simple PHP application illustrating usage of the AWS SDK for PHP.

## Requirements

A `composer.json` file declaring the dependency on the AWS SDK is provided. To
install Composer and the SDK, run:
    
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install

## Basic Configuration

You need to set your AWS security credentials before the sample is able to
connect to AWS. The SDK will automatically pick up credentials in environment
variables:

    export AWS_ACCESS_KEY_ID="your-aws-access-key-id"
    export AWS_SECRET_KEY="your-aws-secret-access-key"

See the [Security Credentials](http://aws.amazon.com/security-credentials) page
for more information on getting your keys and the [AWS SDK for PHP documentation](http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/configuration.html)
covers a number of other ways to set credentials.

## Running the S3 sample

This sample application connects to Amazon's [Simple Storage Service (S3)](http://aws.amazon.com/s3),
creates a bucket, and uploads a file to that bucket. The sample code will
generate a bucket name and a file for you, so all you need to do is run the
code:

    php -f s3_sample.php

The S3 documentation has a good overview of the [restrictions for bucket names](http://docs.aws.amazon.com/AmazonS3/latest/dev/BucketRestrictions.html)
for when you start making your own buckets.

## License

This sample application is distributed under the
[Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0).

```no-highlight
Copyright 2013. Amazon Web Services, Inc. All Rights Reserved.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```
