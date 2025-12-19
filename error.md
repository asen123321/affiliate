ttempted to load class "DebugBundle" from namespace "Symfony\Bundle\DebugBundle".
Did you forget a "use" statement for another namespace?
Symfony\Component\ErrorHandler\Error\
ClassNotFoundError
in /var/www/html/vendor/symfony/framework-bundle/Kernel/MicroKernelTrait.php (line 157)
in /var/www/html/vendor/symfony/http-kernel/Kernel.php -> registerBundles (line 356)
in /var/www/html/vendor/symfony/http-kernel/Kernel.php -> initializeBundles (line 761)
in /var/www/html/vendor/symfony/http-kernel/Kernel.php -> preBoot (line 172)
in /var/www/html/vendor/symfony/runtime/Runner/Symfony/HttpKernelRunner.php -> handle (line 35)
in /var/www/html/vendor/autoload_runtime.php -> run (line 32)
require_once('/var/www/html/vendor/autoload_runtime.php')
in /var/www/html/public/index.php (line 5)
