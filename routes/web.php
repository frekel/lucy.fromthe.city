<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::view('/', 'lucy.home')->name('lucy.home');

Route::get('/fotoalbum', function () {
    $page = max((int) request()->integer('page', 1), 1);
    $perPage = 20;
    $hasFlickrApiKey = filled(config('services.flickr.key'));

    $recentPhotos = Cache::remember('lucy.flickr.photos', now()->addHour(), function () {
        $response = Http::timeout(10)->get('https://www.flickr.com/services/feeds/photos_public.gne', [
            'id' => '158198686@N03',
            'lang' => 'nl-nl',
            'format' => 'json',
            'nojsoncallback' => 1,
        ]);

        if (! $response->successful()) {
            return [];
        }

        return collect($response->json('items', []))
            ->map(function (array $item) {
                return [
                    'title' => trim((string) ($item['title'] ?? '')) ?: 'Foto uit het Lucy-Rhea album',
                    'image' => $item['media']['m'] ?? null,
                    'link' => $item['link'] ?? null,
                ];
            })
            ->filter(fn (array $photo) => filled($photo['image']) && filled($photo['link']))
            ->values()
            ->all();
    });

    $photos = $recentPhotos;
    $totalPages = 1;

    if ($hasFlickrApiKey) {
        try {
            $response = app('flickr')->request('flickr.people.getPublicPhotos', [
                'user_id' => config('services.flickr.user_id', '158198686@N03'),
                'per_page' => $perPage,
                'page' => $page,
                'extras' => 'url_m,url_z,url_q',
            ]);

            if ($response->getStatus() === 'ok') {
                $payload = $response->photos;
                $totalPages = max((int) ($payload['pages'] ?? 1), 1);
                $page = min(max((int) ($payload['page'] ?? 1), 1), $totalPages);

                $photos = collect($payload['photo'] ?? [])
                    ->map(function (array $item) {
                        $image = $item['url_z'] ?? $item['url_m'] ?? $item['url_q'] ?? null;

                        return [
                            'title' => trim((string) ($item['title'] ?? '')) ?: 'Foto uit het Lucy-Rhea album',
                            'image' => $image,
                            'link' => isset($item['id'])
                                ? 'https://www.flickr.com/photos/lucyfromthecity/'.$item['id'].'/'
                                : null,
                        ];
                    })
                    ->filter(fn (array $photo) => filled($photo['image']) && filled($photo['link']))
                    ->values()
                    ->all();
            }
        } catch (\Throwable $exception) {
            Log::warning('Flickr package request failed; falling back to public feed.', [
                'exception' => $exception,
            ]);
            $page = 1;
            $totalPages = 1;
            $photos = $recentPhotos;
        }
    } else {
        $page = 1;
    }

    return view('lucy.pages.fotoalbum', [
        'photos' => $photos,
        'page' => $page,
        'totalPages' => $totalPages,
        'hasFlickrApiKey' => $hasFlickrApiKey,
    ]);
})->name('lucy.pages.fotoalbum');
Route::view('/gewicht-diagram', 'lucy.pages.gewicht-diagram')->name('lucy.pages.gewicht-diagram');
Route::view('/gallery', 'lucy.pages.gallery')->name('lucy.pages.gallery');
Route::view('/contact', 'lucy.pages.contact')->name('lucy.pages.contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('lucy.contact.submit');

Route::view('/2018/07/eerste-week-fotoschoot', 'lucy.posts.eerste-week-fotoschoot')
    ->name('lucy.posts.eerste-week-fotoschoot');
Route::view('/2018/06/fotogallery-bevalling', 'lucy.posts.fotogallery-bevalling')
    ->name('lucy.posts.fotogallery-bevalling');
Route::view('/2018/06/het-is-bijna-zover', 'lucy.posts.het-is-bijna-zover')
    ->name('lucy.posts.het-is-bijna-zover');
Route::view('/2018/06/de-rontgen-foto', 'lucy.posts.de-rontgen-foto')
    ->name('lucy.posts.de-rontgen-foto');
Route::view('/2018/06/werpkist-maken', 'lucy.posts.werpkist-maken')
    ->name('lucy.posts.werpkist-maken');
Route::view('/2018/06/diploma', 'lucy.posts.diploma')->name('lucy.posts.diploma');
Route::view('/2018/05/training', 'lucy.posts.training')->name('lucy.posts.training');
Route::view('/2018/04/dekking', 'lucy.posts.dekking')->name('lucy.posts.dekking');
Route::view('/2018/04/prikken', 'lucy.posts.prikken')->name('lucy.posts.prikken');
Route::view('/2018/04/oogkeuring', 'lucy.posts.oogkeuring')->name('lucy.posts.oogkeuring');
Route::view('/2018/03/loops', 'lucy.posts.loops')->name('lucy.posts.loops');
