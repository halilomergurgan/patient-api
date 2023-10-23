<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchQuery = $request->query->get('q');

        $arr = [];
        if ($searchQuery) {
            $searchData = Patient::select("name", "id")
                ->where('id_card', 'LIKE', '%' . $request->get('q') . '%')
                ->orWhere('name', 'LIKE', '%' . $request->get('q') . '%')
                ->get();

            foreach ($searchData as $item) {

                if ($item) {
                    $arr[] = ['id' => $item->id, 'text' => '<strong>PATIENT:</strong> ' . $item->name, 'type' => 'patient'];
                }
            }
        }

        return new JsonResponse(['results' => $arr], 200);
    }
}
