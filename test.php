<?php 
{
	"Version": "2012-10-17",
	"Statement": [
	{
		"Sid": "Stmt1427497452000",
		"Effect": "Allow",
		"Resource": [
		"arn:aws:s3:::"
		],
		"Action": [
		"s3:ListAllMyBuckets"
		]
	},
	{
		"Effect": "Allow",
		"Resource": [
		"arn:aws:s3:::<bucketName>"
		],
		"Action": [
		"s3:ListBucket"
		]
	},
	{
		"Effect": "Allow",
		"Resource": [
		"arn:aws:s3:::<bucketName>/"
		],
		"Action": [
		"s3:PutObject"
		]
	}
	]
}
?>