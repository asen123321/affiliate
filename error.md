Build
We couldn't build the runnable container. Check the logs for more information. The "build" step of buildpacks failed with exit code 51
1s
Export docker image
Logs

!     
!     A Python app on Heroku must have either a 'requirements.txt',
!     'Pipfile.lock', 'poetry.lock' or 'uv.lock' package manager file
!     in the root directory of its source code.
!     
!     Currently the root directory of your app contains:
!     
!     AFFILIATE_LINK_FIX.md
!     alleop.md
!     assets/
!     bin/
!     compose.override.yaml
!     compose.override.yaml:Zone.Identifier
!     composer.json
!     composer.json:Zone.Identifier
!     composer.lock
!     composer.lock:Zone.Identifier
!     compose.yaml
!     compose.yaml:Zone.Identifier
!     config/
!     debug_api.php
!     debug_api.php:Zone.Identifier
!     debug_fd.html
!     debug_final.php
!     debug_final.php:Zone.Identifier
!     debug_keys.php
!     debug_keys.php:Zone.Identifier
!     default.conf
!     default.conf:Zone.Identifier
!     Dockerfile
!     Dockerfile:Zone.Identifier
!     drivers/
!     .editorconfig
!     .editorconfig:Zone.Identifier
!     .env.dev
!     env.local
!     .env.test
!     .env.test:Zone.Identifier
!     error.md
!     fashion.md
!     FINAL_SOLUTION.md
!     FINAL_SOLUTION.md:Zone.Identifier
!     .git/
!     .gitignore
!     .gitignore:Zone.Identifier
!     importmap.php
!     importmap.php:Zone.Identifier
!     KOYEB_DEPLOYMENT.md
!     .koyeb.yml
!     migrations/
!     phpunit.dist.xml
!     phpunit.dist.xml:Zone.Identifier
!     Procfile
!     public/
!     QUICK_GUIDE.md
!     read.md
!     README_FIXES.md
!     README_FIXES.md:Zone.Identifier
!     runtime.txt
!     SCRAPER_GUIDE.md
!     security.md
!     SEO_FEATURES.md
!     src/
!     symfony.lock
!     symfony.lock:Zone.Identifier
!     templates/
!     test_affiliate_link.php
!     test_affiliate_link.php:Zone.Identifier
!     test_credentials.php
!     test_credentials.php:Zone.Identifier
!     test.php
!     test.php:Zone.Identifier
!     tests/
!     translations/
!     var/
!     vendor/
!     
!     If your app already has a package manager file, check that it:
!     
!     1. Is in the top level directory (not a subdirectory).
!     2. Has the correct spelling (the filenames are case-sensitive).
!     3. Isn't listed in '.gitignore' or '.slugignore'.
!     4. Has been added to the Git repository using 'git add --all'
!        and then committed using 'git commit'.
!     
!     Otherwise, add a package manager file to your app. If your app has
!     no dependencies, then create an empty 'requirements.txt' file.
!     
!     If you aren't sure which package manager to use, we recommend
!     trying uv, since it supports lockfiles, is extremely fast, and
!     is actively maintained by a full-time team:
!     https://docs.astral.sh/uv/
!     
!     For help with using Python on Heroku, see:
!     https://devcenter.heroku.com/articles/getting-started-with-python
!     https://devcenter.heroku.com/articles/python-support
Timer: Builder ran for 65.626549ms and ended at 2025-12-19T09:55:34Z
ERROR: failed to build: exit status 1
Build failed ❌
