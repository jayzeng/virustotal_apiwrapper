# Virus Total Public API v2.0 PHP Wrapper
[![Total Downloads](https://poser.pugx.org/jayzeng/virustotalapi/downloads.png)](https://packagist.org/packages/jayzeng/virustotalapi)
[![Latest Stable Version](https://poser.pugx.org/jayzeng/virustotalapi/v/stable.png)](https://packagist.org/packages/jayzeng/virustotalapi)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jayzeng/virustotal_apiwrapper/badges/quality-score.png?s=46248d98379ddfeb153958114f71d5ea80a47cf9)](https://scrutinizer-ci.com/g/jayzeng/virustotal_apiwrapper/)
[![Build Status](https://travis-ci.org/jayzeng/virustotal_apiwrapper.png)](https://travis-ci.org/jayzeng/virustotal_apiwrapper)


Project website: (http://jayzeng.github.io/virustotal_apiwrapper/)

This is a PHP SDK to interact with Virus Total Public API v2.0, please see https://www.virustotal.com/en/documentation/public-api for details

## I want to show you my appreciation!
If you find the project useful and would love show your appreciation, awesome!

[![Support via Gittip](https://rawgithub.com/twolfson/gittip-badge/0.2.0/dist/gittip.png)](https://www.gittip.com/jayzeng/)

##Usage:
- You will need composer (http://getcomposer.org/)
- composer search virustotalapi or visit the package info on packagist (https://packagist.org/packages/jayzeng/virustotalapi)

Include the following in your composer.json:
```json
{
  "require": {
    "jayzeng/virustotalapi": "dev-master"
  }
}
```

```
composer update -v -o
```

## Quick start:
```
<?php
require_once 'Vendors/autoload.php';

$apiKey = 'your_api_key';

$file = new VirusTotal\File($apiKey);
$resp = $file->scan('foo.txt');

var_dump($resp);
?>
```

Sample output:
```
[jayzeng] ~/Projects/virustotal_apiwrapper/Example] (master)>  php file.php |more
array(8) {
  ["scan_id"]=>
  string(75) "1afc739de16163a80380326ce05e1e69edfc99b7a931329ab127b5099377f076-1370244536"
  ["sha1"]=>
  string(40) "da9ed61e1bfa981c545acad4136e8a05f0602e45"
  ["resource"]=>
  string(64) "1afc739de16163a80380326ce05e1e69edfc99b7a931329ab127b5099377f076"
  ["response_code"]=>
  int(1)
  ["sha256"]=>
  string(64) "1afc739de16163a80380326ce05e1e69edfc99b7a931329ab127b5099377f076"
  ["permalink"]=>
  string(117) "https://www.virustotal.com/file/1afc739de16163a80380326ce05e1e69edfc99b7a931329ab127b5099377f076/analysis/1370244536/"
  ["md5"]=>
  string(32) "b2f301b40a5fb752b19ae0e5c7f679b4"
  ["verbose_msg"]=>
  string(64) "Scan request successfully queued, come back later for the report"
}
```

##Example:
Still feeling confusing? See Examples/ (https://github.com/jayzeng/virustotal_apiwrapper/tree/master/Examples)

I also hack up a demo application, source code is available at https://github.com/jayzeng/virustotal_demoapp

##How to run tests?
```bash
phpunit --configuration Tests/Conf/phpunit.xml Tests
```

Or
```
Vendors/bin/phpunit --configuration Tests/Conf/phpunit.xml Tests
```

##Issues & Development
- Source code is hosted on [GitHub](https://github.com/jayzeng/virustotal_apiwrapper)
- Report issues, questions, or request features on [GitHub Issues](https://github.com/jayzeng/virustotal_apiwrapper/issues)

##How to release new version?
- RELEASE_VERSION - version number
- RELEASE_MESSAGE - release message

```bash
make release RELEASE_VERSION="0.1" RELEASE_MESSAGE="v0.1 is released"
```

##How to contribute?
Awesome! Please follow these steps:
- Create an issue [GitHub Issues](https://github.com/jayzeng/virustotal_apiwrapper/issues) to explain what you intended to do
- Fork the repository into your GitHub account
- Create a new branch (preferably with a descriptive name that ties to the issue number e.g: feature/issue1_add_urlendpoint)
- Add/Refactor tests
- Run tests locally (Please reference [How to run tests](https://github.com/jayzeng/virustotal_apiwrapper/#how-to-run-tests)) and make sure they all pass locally
- Send in a pull request
- Pass tests & travis build


##Author:
[Jay Zeng](https://github.com/jayzeng/), e-mail: [jayzeng@jay-zeng.com](mailto:jayzeng@jay-zeng.com)
