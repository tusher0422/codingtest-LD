<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortenedUrl;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ShortenUrlController extends Controller
{
    /**
     * Shorten a given original URL.
     */
    public function shortenUrl(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'original_url' => 'required|url|unique:shortened_urls,original_url',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $shortCode = Str::random(6);

        $shortUrl = ShortenedUrl::create([
            'user_id'      => $request->user()->id ?? 0,
            'original_url' => $request->original_url,
            'short_code'   => $shortCode,
        ]);

        return response()->json([
            'message'      => 'Successfully URL shortened!',
            'original_url' => $shortUrl->original_url,
            'short_url'    => url('/api/redirect/' . $shortUrl->short_code),
        ], 201);
    }

    /**
     * Redirect from the short URL to the original URL.
     */
    public function redirect($shortCode)
    {
        $shortenedUrl = ShortenedUrl::where('short_code', $shortCode)->first();

        if (! $shortenedUrl) {
            return response()->json([
                'message' => 'Not found!'], 404);
        }

        return redirect()->away($shortenedUrl->original_url);
    }
}
