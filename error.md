Build ready to start ▶️
>> Cloning github.com/asen123321/affiliate.git commit sha c55c837e49090e23c42d32889e34f467a7ae77ed into /builder/workspace
Initialized empty Git repository in /builder/workspace/.git/
From https://github.com/asen123321/affiliate
* branch            c55c837e49090e23c42d32889e34f467a7ae77ed -> FETCH_HEAD
  HEAD is now at c55c837 Switch to Docker deployment instead of buildpacks
  Starting Docker daemon...
  Waiting for the Docker daemon to start...
  done
  Timer: Analyzer started at 2025-12-19T10:15:48Z
  Image with name "registry01.prod.koyeb.com/k-97abc145-d4ad-452b-a34c-5b6b103cfb1b/071fcd09-e28d-47c5-8e1d-239811e58e4f" not found
  Timer: Analyzer ran for 1.489786917s and ended at 2025-12-19T10:15:50Z
  Timer: Detector started at 2025-12-19T10:15:51Z
  1 of 2 buildpacks participating
  heroku/php 0.0.0
  Timer: Detector ran for 41.469987ms and ended at 2025-12-19T10:15:51Z
  Timer: Restorer started at 2025-12-19T10:15:52Z
  Layer cache not found
  Timer: Restorer ran for 632.925634ms and ended at 2025-12-19T10:15:53Z
  Timer: Builder started at 2025-12-19T10:15:53Z
  -----> CNB Shim: Running bin/compile
  -----> Bootstrapping...[0m
  [1;33m !     [0m
  [1;33m !     WARNING: [0m[1;33mYour 'composer.lock' is out of date![0m
  [1;33m !     [0m
  [1;33m !     The 'composer.lock' file in your project is not up to date with[0m
  [1;33m !     the main 'composer.json' file. This may result in installation[0m
  [1;33m !     of incorrect packages or package versions.[0m
  [1;33m !     [0m
  [1;33m !     The lock file is required in order to guarantee reliable and[0m
  [1;33m !     reproducible installation of dependencies across systems and[0m
  [1;33m !     deploys. It must always be kept in sync with 'composer.json'.[0m
  [1;33m !     [0m
  [1;33m !     Whenever you change 'composer.json', ensure that you perform[0m
  [1;33m !     the following steps locally on your computer:[0m
  [1;33m !     1) run 'composer update'[0m
  [1;33m !     2) add all changes using 'git add composer.json composer.lock'[0m
  [1;33m !     3) commit using 'git commit'[0m
  [1;33m !     [0m
  [1;33m !     Ensure that you updated the lock file correctly, and that you[0m
  [1;33m !     ran 'git add' on both files, before deploying again.[0m
  [1;33m !     [0m
  [1;33m !     Please remember to always keep your 'composer.lock' updated in[0m
  [1;33m !     lockstep with 'composer.json' to avoid common problems related[0m
  [1;33m !     to dependencies during collaboration and deployment.[0m
  [1;33m !     [0m
  [1;33m !     Please refer to the Composer documentation for further details:[0m
  [1;33m !     https://getcomposer.org/doc/[0m
  [1;33m !     https://getcomposer.org/doc/01-basic-usage.md[0m
  [1;33m !     [0m
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
  Warning: The lock file is not up to date with the latest changes in composer.json. You may be getting outdated dependencies. It is recommended that you run `composer update` or `composer update <package name>`.[0m
  Nothing to install, update or remove[0m
  Generating optimized autoload files[0m
  89 packages you are using are looking for funding.[0m
  Use the `composer fund` command to find out more![0m
  [0m
  Run composer recipes at any time to see the status of your Symfony recipes.[0m
  [0m
  Executing script cache:clear [KO][0m
  [KO][0m
  Script cache:clear returned with error code 255[0m
  !!  PHP Fatal error:  Uncaught Symfony\Component\Dotenv\Exception\PathException: Unable to read the "/workspace/.env" environment file. in /workspace/vendor/symfony/dotenv/Dotenv.php:552[0m
  !!  Stack trace:[0m
  !!  #0 /workspace/vendor/symfony/dotenv/Dotenv.php(106): Symfony\Component\Dotenv\Dotenv->doLoad()[0m
  !!  #1 /workspace/vendor/symfony/dotenv/Dotenv.php(150): Symfony\Component\Dotenv\Dotenv->loadEnv()[0m
  !!  #2 /workspace/vendor/symfony/runtime/SymfonyRuntime.php(130): Symfony\Component\Dotenv\Dotenv->bootEnv()[0m
  !!  #3 /workspace/vendor/autoload_runtime.php(19): Symfony\Component\Runtime\SymfonyRuntime->__construct()[0m
  !!  #4 /workspace/bin/console(15): require_once('...')[0m
  !!  #5 {main}[0m
  !!    thrown in /workspace/vendor/symfony/dotenv/Dotenv.php on line 552[0m
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
  [1;31m !     - [1;33mYour 'composer.lock' is out of date![0m[0m
  [1;31m !     - [1;33mComposer vendor dir found in project![0m[0m
  [1;31m !     [0m
  Timer: Builder ran for 10.213563281s and ended at 2025-12-19T10:16:03Z
  [31;1mERROR: [0mfailed to build: exit status 1
  Build failed ❌
