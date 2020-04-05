## Baun - modern  markdown CMS for PHP
Lightweight - 3,2 MB Simfony & Twig ?, extensible - difficult with all its external classes - is this why there is no updates since 2015 year ?
I think it is good for learning PHP, but there are much better free flat file DB CMSs.

Inspired by author's last CMS [Pico](http://picocms.org), Baun has been desgined 2015 year from the ground up as a **modern PHP application** whilst retaining the same features that made Pico so popular:

1. **Simple** - creating and maintaining a website as simple as editing text files
1. **Fast** - Designed with performance in mind, and no database
1. **Flat** - "flat file" CMS, meaning you can completely forget about MySQL
1. **Markdown** - Edit your website in eg Notepad++ using simple Markdown formatting, or in SimpleMDE markdown editor
   This two we do not need :
         * **Twig** - Baun uses the Twig templating engine, for powerful and flexible templates (**1.2 MB**)
         * **Simfony** - (**2 MB**)

1. **Open Source** - Baun is completely free and open source, released under the MIT license


Documentation : [Baun website](http://bauncms.com).
Framework for Baun is kept in separate repo. Check out the [Framework](https://github.com/BaunCMS/Framework) if you want to contribute to the core.
Baun was created by [Gilbert Pellegrom](http://gilbert.pellegrom.me) from
[Dev7studios](http://dev7studios.com). Released under the MIT license.



### Baun mkd flat file db php framework Changelog

** v1.3.2 - 18th March 2015 - 1.0.0  4th March 2015**
* [New] Added `{{ theme_url }}` template variable
* [Changed] Allow **access to `posts` in pages**
* [Fixed] Added **404 header**
* [Fixed] "Missing events provider" Windows bug
* [New] Added `/cache` folder
* [New] Added **CLI** and `publish:config` and `publish:assets` commands
* [New] Added **auto-installer**
* [New] Added **events**
* [New] Added **Blog RSS plugin**
* [New] Added `{{ base_url }}` template variable
* [Changed] Split up config files
* [New] Added **blogging functionality**
* [Changed] Improved error messages
* [New] Moved Baun src **into Framework repo**
* Initial release



### MIT License (MIT)

Copyright (c) 2015 BaunCMS

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
