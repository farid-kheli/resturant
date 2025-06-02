namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...existing code...

    protected $middleware = [
        // ...existing middleware...
        \App\Http\Middleware\Handle404::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            // ...existing middleware...
            \App\Http\Middleware\Handle404::class,
        ],

        'api' => [
            // ...existing middleware...
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\Handle404::class,
        ],
    ];

    // ...existing code...
}
