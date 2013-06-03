# VirusTotal Public API v2.0 PHP Wrapper
[![Build Status](https://travis-ci.org/jayzeng/virustotal_apiwrapper.png)](https://travis-ci.org/jayzeng/virustotal_apiwrapper)

Project website: (http://jayzeng.github.com/virustotal_apiwrapper/)

##Usage:
- You will need composer (http://getcomposer.org/)
- composer install -v -o

```
<?php
require_once 'Vendors/autoload.php';

$apiKey = 'your_api_key';

$file = new VirusTotal\File($apiKey);
$resp = $file->scan('foo.txt');

var_dump($resp);
?>
```

Sample output
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
See Examples/

##Issues & Development
- Source hosted [GitHub](https://github.com/jayzeng/virustotal_apiwrapper)
- Report issues, questions, feature requests on [GitHub Issues](https://github.com/jayzeng/virustotal_apiwrapper/issues)

##How to release new version?
- RELEASE_VERSION - version number
- RELEASE_MESSAGE - release message

```bash
make release RELEASE_VERSION="0.1" RELEASE_MESSAGE="v0.1 is released"
```

##Author:
[Jay Zeng](https://github.com/jayzeng/), e-mail: [jayzeng@jay-zeng.com](mailto:jayzeng@jay-zeng.com)
