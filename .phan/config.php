<?php
/*
	Run check via Docker-Installes Phan:

	# function defined in shell
	phan() {
		docker run -v $PWD:/mnt/src --rm -u "1000:1000" phanphp/phan:latest $@; return $?;
	} 

	# start in document root of project
	$ phan -o report.txt 
*/
return [
	'target_php_version' => '8.0',
	'exclude_file_list' => [
		'system/php/share.php',
		'system/php/view.php',
		'system/php/list.php'
	],
	'--file_list' => [ # run only before excluded files
		'system/php/share.php',
		'system/php/view.php',
		'system/php/list.php',
		'system/php/json.php',
		'system/php/func.php'
	],
	'autoload_internal_extension_signatures' => [
		'zip' => '.phan/zip.phan_php'
	],
	'directory_list' => [
		'build',
		'install',
		'system'
	],
	'backward_compatibility_checks' => true,
	'plugins' => [
		'AlwaysReturnPlugin',
		'DollarDollarPlugin',
		'DuplicateArrayKeyPlugin',
		'DuplicateExpressionPlugin',
		'PregRegexCheckerPlugin',
		'PrintfCheckerPlugin',
		'SleepCheckerPlugin',
		'UnreachableCodePlugin',
		'UseReturnValuePlugin',
		'EmptyStatementListPlugin',
		'LoopVariableReusePlugin',
	],
	'suppress_issue_types' => [
		'PhanTypeArraySuspiciousNullable',
		'PhanTypeMismatchDimAssignment',
		'PhanTypeMismatchDimFetchNullable'
	]
];