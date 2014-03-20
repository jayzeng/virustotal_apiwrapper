# Makefile for php project setup

AUTHOR        = Jay Zeng <jayzeng@jay-zeng.com>
PHPUNITCONFIG = Tests/Conf/phpunit.xml
RELEASE_VERSION = 0.1
RELEASE_MESSAGE = new version

define license
MIT License (MIT)

Copyright (c) $(shell date +%Y), $(AUTHOR)

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
endef
export license

init:
	composer update -v -o
	@echo "$$license" > LICENSE

test:
	./Vendors/bin/phpunit --configuration $(PHPUNITCONFIG)

release:
	@git tag -a "$$RELEASE_VERSION" -m "$$RELEASE_MESSAGE"
	git describe --tags
	git push --tags --force
