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
Executing script cache:clear [KO][0m
[KO][0m
Script cache:clear returned with error code 255[0m
!!  Symfony\Component\ErrorHandler\Error\ClassNotFoundError {#92[0m
!!    #message: """[0m
!!      Attempted to load class "DebugBundle" from namespace "Symfony\Bundle\DebugBundle".\n[0m
!!      Did you forget a "use" statement for another namespace?[0m
!!      """[0m
!!    #code: 0[0m
!!    #file: "./vendor/symfony/framework-bundle/Kernel/MicroKernelTrait.php"[0m
!!    #line: 157[0m
!!    trace: {[0m
!!      ./vendor/symfony/framework-bundle/Kernel/MicroKernelTrait.php:157 { …}[0m
!!      ./vendor/symfony/http-kernel/Kernel.php:356 { …}[0m
!!      ./vendor/symfony/http-kernel/Kernel.php:761 { …}[0m
!!      ./vendor/symfony/http-kernel/Kernel.php:122 { …}[0m
!!      ./vendor/symfony/framework-bundle/Console/Application.php:195 { …}[0m
!!      ./vendor/symfony/framework-bundle/Console/Application.php:69 { …}[0m
!!      ./vendor/symfony/console/Application.php:195 { …}[0m
!!      ./vendor/symfony/runtime/Runner/Symfony/ConsoleApplicationRunner.php:49 { …}[0m
!!      ./vendor/autoload_runtime.php:32 { …}[0m
!!      ./bin/console:15 {[0m
!!        › [0m
!!        › require_once dirname(__DIR__).'/vendor/autoload_runtime.php';[0m
!!        › [0m
!!        arguments: {[0m
!!          "/workspace/vendor/autoload_runtime.php"[0m
!!        }[0m
!!      }[0m
!!    }[0m
!!  }[0m
!!  2025-12-19T14:13:19+00:00 [critical] Uncaught Error: Class "Symfony\Bundle\DebugBundle\DebugBundle" not found[0m
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
Timer: Builder ran for 10.782107508s and ended at 2025-12-19T14:13:19Z
[31;1mERROR: [0mfailed to build: exit status 1
Build failed ❌
