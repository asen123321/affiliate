                      U
usersymfony
Create service
Overview
Services
Sandboxes
Preview
Domains
Secrets
Volumes
Preview
Activity
Team
Settings

Needy
Hobby Plan
Free
Get the full experience
Upgrade to the Starter pay-as-you-go plan to access the full Koyeb experience
Upgrade
Docs and resources
Partial system outage
closed-kellsie/affiliate
affiliate

Web service
closed-kellsie-usersymfony-c839c76e.koyeb.app/
Redeploy
Koyeb CLI
Service degraded
The latest deployment 3085ddba did not complete successfully. The service continues to operate with the active deployment 8b27fa07.
See deployment
Overview
Metrics
Console
Settings
Active deployment
The deployment currently running your service
Healthy
8b27fa07
44m ago
asen123321
SpeedUp site
Active deployment
History
22
Error
3085ddba
2m ago
asen123321
Fix: Remove huge logs and vendor folder from git
Error
5771c618
5m ago
asen123321
SpeedUp site
Error
8880a053
13m ago
Triggered because service has been updated or redeployed
Error
813d893b
18m ago
Triggered because service has been updated or redeployed
Error
d959781b
21m ago
asen123321
Update debug_api.php
Error
ec7aeb2e
23m ago
asen123321
SpeedUp site
Error
bbc9ced0
39m ago
asen123321
Update .env
Stopped
767e2a11
5h ago
Triggered because service has been updated or redeployed
Stopped
397703cd
6h ago
asen123321
Optimize Dockerfile for Koyeb deployment
Load more

View active deployment
View latest deployment
5771c618

Error
5m ago

SpeedUp site
An error occurred while building your application
Why it happened?
Different reasons can result in a build failure. The most common ones are:

The language or package manager used by your application is not supported
Your application is missing required dependencies
An invalid configuration results in an error during the build process
How to solve the problem?
First, make sure that your application builds properly on your machine. Build logs also provide useful information to help you identify and resolve the root cause. Read our troubleshooting documentation to view and resolve common errors.

Check the build logs for more details.

Overview
Web service
Public URL
closed-kellsie-usersymfony-c839c76e.koyeb.app/
(forwarded to port 8000)

Repository
asen123321/affiliate
Branch
main
Commit
ed93c200
Builder type
Dockerfile
Privileged
False
Instance
Free
Upgrade
Scaling
0 of 1 running
Configure
Regions

Frankfurt
Configure
Environment
6 variables
Configure
Volumes
0 volumes attached
Configure
View more
Build
Failed
Clone repository
Repository cloned
4s
Start Docker
Docker daemon started successfully
6s
Build
We couldn't build the runnable container. Check the logs for more information. Docker build failed with exit code 1
66s
Deployment
Not started




Logs

#16 2.447   - Installing symfony/options-resolver (v7.4.0): Extracting archive
#16 2.447   - Installing symfony/form (v7.4.1): Extracting archive
#16 2.447   - Installing masterminds/html5 (2.10.0): Extracting archive
#16 2.447   - Installing league/uri (7.7.0): Extracting archive
#16 2.447   - Installing symfony/html-sanitizer (v7.4.0): Extracting archive
#16 2.447   - Installing symfony/intl (v7.4.0): Extracting archive
#16 2.448   - Installing symfony/polyfill-intl-idn (v1.33.0): Extracting archive
#16 2.448   - Installing symfony/mime (v7.4.0): Extracting archive
#16 2.448   - Installing egulias/email-validator (4.0.4): Extracting archive
#16 2.448   - Installing symfony/mailer (v7.4.0): Extracting archive
#16 2.448   - Installing monolog/monolog (3.9.0): Extracting archive
#16 2.448   - Installing symfony/monolog-bridge (v7.4.0): Extracting archive
#16 2.448   - Installing symfony/monolog-bundle (v4.0.1): Extracting archive
#16 2.448   - Installing symfony/notifier (v7.4.0): Extracting archive
#16 2.448   - Installing symfony/process (v7.4.0): Extracting archive
#16 2.449   - Installing symfony/dom-crawler (v7.4.1): Extracting archive
#16 2.449   - Installing symfony/browser-kit (v7.4.0): Extracting archive
#16 2.449   - Installing php-webdriver/webdriver (1.15.2): Extracting archive
#16 2.449   - Installing symfony/panther (v2.3.0): Extracting archive
#16 2.449   - Installing symfony/password-hasher (v7.4.0): Extracting archive
#16 2.449   - Installing symfony/security-core (v7.4.0): Extracting archive
#16 2.449   - Installing symfony/security-http (v7.4.1): Extracting archive
#16 2.449   - Installing symfony/security-csrf (v7.4.0): Extracting archive
#16 2.449   - Installing symfony/security-bundle (v7.4.0): Extracting archive
#16 2.449   - Installing symfony/serializer (v7.4.2): Extracting archive
#16 2.450   - Installing symfony/translation-contracts (v3.6.1): Extracting archive
#16 2.450   - Installing symfony/translation (v7.4.0): Extracting archive
#16 2.450   - Installing twig/twig (v3.22.1): Extracting archive
#16 2.450   - Installing symfony/twig-bridge (v7.4.1): Extracting archive
#16 2.450   - Installing symfony/stimulus-bundle (v2.31.0): Extracting archive
#16 2.450   - Installing symfony/ux-turbo (v2.31.0): Extracting archive
#16 2.450   - Installing symfony/validator (v7.4.2): Extracting archive
#16 2.450   - Installing psr/link (2.0.1): Extracting archive
#16 2.450   - Installing symfony/web-link (v7.4.0): Extracting archive
#16 2.451   - Installing symfony/yaml (v7.4.1): Extracting archive
#16 2.451   - Installing symfony/twig-bundle (v7.4.0): Extracting archive
#16 2.451   - Installing twig/extra-bundle (v3.22.1): Extracting archive
#16 2.454    0/107 [>---------------------------]   0%
#16 2.569   60/107 [===============>------------]  56%
#16 2.677   93/107 [========================>---]  86%
#16 2.728  107/107 [============================] 100%
#16 2.997 Generating optimized autoload files
#16 3.994 89 packages you are using are looking for funding.
#16 3.994 Use the `composer fund` command to find out more!
#16 3.994
#16 3.994 Run composer recipes at any time to see the status of your Symfony recipes.
#16 3.994
#16 4.151 Cache directory does not exist (cache-vcs-dir):
#16 4.151 Cache directory does not exist (cache-repo-dir):
#16 4.151 Clearing cache (cache-files-dir): /root/.composer/cache/files
#16 4.179 Clearing cache (cache-dir): /root/.composer/cache
#16 4.181 All caches cleared.
#16 DONE 4.5s
#17 [stage-0  9/17] COPY . .
#17 DONE 0.1s
#18 [stage-0 10/17] RUN mkdir -p     var/cache/prod     var/log     var/share     public/assets     && chown -R www-data:www-data var public/assets     && chmod -R 775 var
#18 DONE 0.1s
#19 [stage-0 11/17] RUN composer dump-autoload --optimize --no-dev --classmap-authoritative
#19 0.177 Generating optimized autoload files (authoritative)
#19 1.152 Generated optimized autoload files (authoritative) containing 5504 classes
#19 DONE 4.4s
#20 [stage-0 12/17] RUN APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:clear --env=prod --no-debug     && APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:warmup --env=prod --no-debug     && chown -R www-data:www-data var/cache
#20 0.105
#20 0.105 Fatal error: Uncaught Symfony\Component\Dotenv\Exception\PathException: Unable to read the "/var/www/html/.env" environment file. in /var/www/html/vendor/symfony/dotenv/Dotenv.php:552
#20 0.105 Stack trace:
#20 0.105 #0 /var/www/html/vendor/symfony/dotenv/Dotenv.php(106): Symfony\Component\Dotenv\Dotenv->doLoad(false, Array)
#20 0.105 #1 /var/www/html/vendor/symfony/dotenv/Dotenv.php(150): Symfony\Component\Dotenv\Dotenv->loadEnv('/var/www/html/....', 'APP_ENV', 'dev', Array, false)
#20 0.105 #2 /var/www/html/vendor/symfony/runtime/SymfonyRuntime.php(130): Symfony\Component\Dotenv\Dotenv->bootEnv('/var/www/html/....', 'dev', Array, false)
#20 0.105 #3 /var/www/html/vendor/autoload_runtime.php(19): Symfony\Component\Runtime\SymfonyRuntime->__construct(Array)
#20 0.105 #4 /var/www/html/bin/console(15): require_once('/var/www/html/v...')
#20 0.105 #5 {main}
#20 0.105   thrown in /var/www/html/vendor/symfony/dotenv/Dotenv.php on line 552
#20 ERROR: process "/bin/sh -c APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:clear --env=prod --no-debug     && APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:warmup --env=prod --no-debug     && chown -R www-data:www-data var/cache" did not complete successfully: exit code: 255
------
> [stage-0 12/17] RUN APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:clear --env=prod --no-debug     && APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:warmup --env=prod --no-debug     && chown -R www-data:www-data var/cache:
0.105
0.105 Fatal error: Uncaught Symfony\Component\Dotenv\Exception\PathException: Unable to read the "/var/www/html/.env" environment file. in /var/www/html/vendor/symfony/dotenv/Dotenv.php:552
0.105 Stack trace:
0.105 #0 /var/www/html/vendor/symfony/dotenv/Dotenv.php(106): Symfony\Component\Dotenv\Dotenv->doLoad(false, Array)
0.105 #1 /var/www/html/vendor/symfony/dotenv/Dotenv.php(150): Symfony\Component\Dotenv\Dotenv->loadEnv('/var/www/html/....', 'APP_ENV', 'dev', Array, false)
0.105 #2 /var/www/html/vendor/symfony/runtime/SymfonyRuntime.php(130): Symfony\Component\Dotenv\Dotenv->bootEnv('/var/www/html/....', 'dev', Array, false)
0.105 #3 /var/www/html/vendor/autoload_runtime.php(19): Symfony\Component\Runtime\SymfonyRuntime->__construct(Array)
0.105 #4 /var/www/html/bin/console(15): require_once('/var/www/html/v...')
0.105 #5 {main}
0.105   thrown in /var/www/html/vendor/symfony/dotenv/Dotenv.php on line 552
------
Dockerfile:75
--------------------
74 |     # Warm up Symfony cache for production with dummy secret
75 | >>> RUN APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:clear --env=prod --no-debug \
76 | >>>     && APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:warmup --env=prod --no-debug \
77 | >>>     && chown -R www-data:www-data var/cache
78 |
--------------------
error: failed to solve: process "/bin/sh -c APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:clear --env=prod --no-debug     && APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:warmup --env=prod --no-debug     && chown -R www-data:www-data var/cache" did not complete successfully: exit code: 255
Build failed ❌
Download
Copy

