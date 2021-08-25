<?php

    namespace App\Http\Controllers\Api\Veterinaries;

    use App\Http\Controllers\Controller;
    use App\Http\Resources\VeterinaryResource;
    use App\Models\Veterinaries\Veterinary;
    use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

    class UserVeterinaryController extends Controller
    {
        public function __invoke () : AnonymousResourceCollection
        {
            return VeterinaryResource::collection(
                Veterinary::query()
                          ->where('user_id', auth()->id())
                          ->with([
                              'user:id',
                              'location.state',
                          ])
                          ->orderBy('created_at', 'DESC')
                          ->orderBy('updated_at', 'DESC')
                          ->get()
            );
        }
    }
