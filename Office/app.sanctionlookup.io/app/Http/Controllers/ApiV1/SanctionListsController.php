<?php

declare(strict_types=1);

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiV1\SanctionListCollection;
use App\Models\SanctionList;
use Illuminate\Http\JsonResponse;

class SanctionListsController extends Controller
{
    public function index(): JsonResponse
    {
        $sanctionLists = SanctionList::query()
            ->orderBy('title')->whereRaw('is_enabled')->select([
                'sanction_lists.code',
                'sanction_lists.title',
                'sanction_lists.description',
                'sanction_lists.publisher',
                'sanction_lists.publisher_last_updated_at',
                'sanction_lists.updated_at',
            ])->selectRaw('COALESCE(sanction_list_counts.number_of_entities, 0) as number_of_entities')
            ->selectRaw('COALESCE(sanction_list_counts.number_of_names, 0) as number_of_names')->join('sanction_list_counts', 'sanction_lists.id', '=', 'sanction_list_counts.sanction_list_id', 'left')->get();

        return response()->json(new SanctionListCollection($sanctionLists));
    }
}
