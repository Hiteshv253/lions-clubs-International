<?php

namespace App\Http\Middleware;

use Closure;

class MinifyHtml {

      public function handle($request, Closure $next) {
            $response = $next($request);

            // Only minify HTML responses
            if (strpos($response->headers->get('Content-Type'), 'text/html') !== false) {
                  $output = $response->getContent();

                  // Remove whitespace between tags, new lines, tabs
                  $output = preg_replace('/>\s+</', '><', $output);
                  $output = preg_replace('/\s+/', ' ', $output);

                  $response->setContent($output);
            }

            return $response;
      }
}
