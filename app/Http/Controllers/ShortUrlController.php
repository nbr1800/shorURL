<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'original_url'  => 'required|url',
            'short_code'    => 'required'
        ]);

        //$shortCode = Str::random(6);
        $shortUrl = ShortUrl::create([
            'original_url' => $request->original_url,
            'short_code' => $request->short_code
        ]);

        return response()->json([
            'short_url' => url($request->short_code)
        ]);
    }

    public function redirect($shortCode)
    {
        $shortUrl = ShortUrl::where('short_code', $shortCode)->firstOrFail();
        return redirect($shortUrl->original_url);
    }
}
