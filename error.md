Build ready to start ▶️
>> Cloning github.com/asen123321/affiliate.git commit sha 14384a70f10d9c9dc320166ab9de390597a4d65d into /builder/workspace
Initialized empty Git repository in /builder/workspace/.git/
From https://github.com/asen123321/affiliate
* branch            14384a70f10d9c9dc320166ab9de390597a4d65d -> FETCH_HEAD
  HEAD is now at 14384a7 Your changes
  Starting Docker daemon...
  Waiting for the Docker daemon to start...
  done
  Timer: Analyzer started at 2025-12-19T14:43:38Z
  Image with name "registry01.prod.koyeb.com/k-97abc145-d4ad-452b-a34c-5b6b103cfb1b/e2ee1bf8-cf94-40d6-9ed2-bc1f17f0b208" not found
  Timer: Analyzer ran for 498.052352ms and ended at 2025-12-19T14:43:38Z
  Timer: Detector started at 2025-12-19T14:43:47Z
  1 of 2 buildpacks participating
  heroku/php 0.0.0
  Timer: Detector ran for 152.356466ms and ended at 2025-12-19T14:43:47Z
  Timer: Restorer started at 2025-12-19T14:44:22Z
  Layer cache not found
  Timer: Restorer ran for 335.755796ms and ended at 2025-12-19T14:44:22Z
  Timer: Builder started at 2025-12-19T14:44:23Z
  -----> CNB Shim: Running bin/compile
  -----> Bootstrapping...[0m
  -----> Preparing platform package installation...[0m
  -----> Installing platform packages...[0m
  - php (8.4.12)
  - apache (2.4.65)
  - composer (2.8.11)
  - nginx (1.28.0)
  -----> Installing dependencies...[0m
  [1;33m !     [0m
  [1;33m !     WARNING: [0m[1;33mComposer vendor dir found in project![0m
  [1;33m !     [0m
  [1;33m !     Your Git repository contains Composer's 'vendor' directory.[0m
  [1;33m !     [0m
  [1;33m !     This directory should not be under version control; only your[0m
  [1;33m !     'composer.json' and 'composer.lock' files need to be added, as[0m
  [1;33m !     Composer will handle installation of dependencies on deploy.[0m
  [1;33m !     [0m
  [1;33m !     To suppress this notice, first remove the folder from the index[0m
  [1;33m !     by running 'git rm -r --cached vendor/'.[0m
  [1;33m !     Next, edit your project's '.gitignore' file and add the folder[0m
  [1;33m !     '/vendor/' to the list, then commit the changes.[0m
  [1;33m !     [0m
  [1;33m !     For more info, refer to the Composer FAQ: http://bit.ly/1rlCSZU[0m
  [1;33m !     [0m
  Installing dependencies from lock file[0m
  Verifying lock file contents can be installed on current platform.[0m
  Package operations: 0 installs, 0 updates, 30 removals[0m
  - Removing theseer/tokenizer (2.0.1)[0m
  - Removing symfony/web-profiler-bundle (v7.4.0)[0m
  - Removing symfony/maker-bundle (v1.65.1)[0m
  - Removing symfony/debug-bundle (v7.4.0)[0m
  - Removing staabm/side-effects-detector (1.0.5)[0m
  - Removing sebastian/version (6.0.0)[0m
  - Removing sebastian/type (6.0.3)[0m
  - Removing sebastian/recursion-context (7.0.1)[0m
  - Removing sebastian/object-reflector (5.0.0)[0m
  - Removing sebastian/object-enumerator (7.0.0)[0m
  - Removing sebastian/lines-of-code (4.0.0)[0m
  - Removing sebastian/global-state (8.0.2)[0m
  - Removing sebastian/exporter (7.0.2)[0m
  - Removing sebastian/environment (8.0.3)[0m
  - Removing sebastian/diff (7.0.0)[0m
  - Removing sebastian/complexity (5.0.0)[0m
  - Removing sebastian/comparator (7.1.3)[0m
  - Removing sebastian/cli-parser (4.2.0)[0m
  - Removing phpunit/phpunit (12.5.2)[0m
  - Removing phpunit/php-timer (8.0.0)[0m
  - Removing phpunit/php-text-template (5.0.0)[0m
  - Removing phpunit/php-invoker (6.0.0)[0m
  - Removing phpunit/php-file-iterator (6.0.0)[0m
  - Removing phpunit/php-code-coverage (12.5.1)[0m
  - Removing phar-io/version (3.2.1)[0m
  - Removing phar-io/manifest (2.0.4)[0m
  - Removing nikic/php-parser (v5.7.0)[0m
  - Removing myclabs/deep-copy (1.13.4)[0m
  - Removing doctrine/doctrine-fixtures-bundle (4.3.1)[0m
  - Removing doctrine/data-fixtures (2.2.0)[0m
  Generating optimized autoload files[0m
  89 packages you are using are looking for funding.[0m
  Use the `composer fund` command to find out more![0m
  [0m
  Run composer recipes at any time to see the status of your Symfony recipes.[0m
  [0m
  Executing script assets:install public [KO][0m
  [KO][0m
  Script assets:install %PUBLIC_DIR% returned with error code 1[0m
  !!  [0m
  !!  In InvalidPlatformVersion.php line 21:[0m
  !!                                                                                 [0m
  !!    Invalid platform version "" specified. The platform version has to be speci  [0m
  !!    fied in the format: "<major_version>.<minor_version>.<patch_version>".       [0m
  !!                                                                                 [0m
  !!  [0m
  !!  2025-12-19T14:44:59+00:00 [info] User Deprecated: Please install the "intl" PHP extension for best performance.[0m
  !!  [0m
  Script @auto-scripts was called via post-install-cmd[0m
  [1;31m !     [0m
  [1;31m !     ERROR: [0m[1;31mDependency installation failed![0m
  [1;31m !     [0m
  [1;31m !     The 'composer install' process failed with an error. The cause[0m
  [1;31m !     may be the download or installation of packages, or a pre- or[0m
  [1;31m !     post-install hook (e.g. a 'post-install-cmd' item in 'scripts')[0m
  [1;31m !     in your 'composer.json'.[0m
  [1;31m !     [0m
  [1;31m !     Typical error cases are out-of-date or missing parts of code,[0m
  [1;31m !     timeouts when making external connections, or memory limits.[0m
  [1;31m !     [0m
  [1;31m !     Check the above error output closely to determine the cause of[0m
  [1;31m !     the problem, ensure the code you're pushing is functioning[0m
  [1;31m !     properly, and that all local changes are committed correctly.[0m
  [1;31m !     [0m
  [1;31m !     For more information on builds for PHP on Heroku, refer to[0m
  [1;31m !     https://devcenter.heroku.com/articles/php-support[0m
  [1;31m !     [0m
  [1;31m !     [1;33mREMINDER:[1;31m the following [1;33mwarnings[1;31m were emitted during the build;[0m
  [1;31m !     check the details above, as they may be related to this error:[0m
  [1;31m !     - [1;33mComposer vendor dir found in project![0m[0m
  [1;31m !     [0m
  Timer: Builder ran for 36.375321642s and ended at 2025-12-19T14:44:59Z
  [31;1mERROR: [0mfailed to build: exit status 1
  Build failed ❌
