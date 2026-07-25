<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * Sets the application locale based on:
     * 1. Query parameter: ?lang=ar
     * 2. X-Locale header
     * 3. Accept-Language header (extracts primary language from e.g. "en-US,en;q=0.9")
     * 4. Default app locale (config('app.locale'))
     *
     * Only 'en' and 'ar' are supported. Falls back to default if unsupported.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->query('lang')
            ?? $request->header('X-Locale')
            ?? $request->header('Accept-Language')
            ?? config('app.locale');

        // Extract primary language from Accept-Language format: "en-US,en;q=0.9" → "en"
        if (str_contains($locale, ',')) {
            $locale = explode(',', $locale)[0];
        }
        if (str_contains($locale, '-')) {
            $locale = explode('-', $locale)[0];
        }

        // Validate locale — only 'en' and 'ar' are supported
        $locale = in_array($locale, ['en', 'ar']) ? $locale : config('app.locale');

        app()->setLocale($locale);

        return $next($request);
    }
}
