<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookabableAvaliabilityRequest;
use App\Models\Bookable;
use Illuminate\Http\Request;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Bookable $bookable, BookabableAvaliabilityRequest $request)
    {
        dd($request->getAcceptableContentTypes());
        $data = $request->validated();
        $data = $request->safe()->only(['from', 'to']);
        extract($data);

        return $bookable->availableFor($to,$from)
            ? response()->json([]) 
            : response()->json([], 404);
    }
}
