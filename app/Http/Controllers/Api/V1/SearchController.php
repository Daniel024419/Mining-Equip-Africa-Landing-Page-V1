<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|min:2|max:100',
            'filters' => 'sometimes|array',
            'filters.category' => 'sometimes|string',
            'filters.condition' => 'sometimes|string',
            'filters.min_year' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'filters.max_year' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'filters.min_price' => 'sometimes|numeric|min:0',
            'filters.max_price' => 'sometimes|numeric|min:0',
        ]);

        try {
            $query = $request->input('query');
            $filters = $request->input('filters', []);

            // Start building the query
            $results = Equipment::query()
                ->where(function($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%")
                      ->orWhere('category', 'like', "%{$query}%");
                });

            // Apply filters if they exist
            if (!empty($filters)) {
                if (isset($filters['category'])) {
                    $results->where('category', $filters['category']);
                }

                if (isset($filters['condition'])) {
                    $results->where('condition', $filters['condition']);
                }

                if (isset($filters['min_year']) && isset($filters['max_year'])) {
                    $results->whereBetween('year', [$filters['min_year'], $filters['max_year']]);
                } elseif (isset($filters['min_year'])) {
                    $results->where('year', '>=', $filters['min_year']);
                } elseif (isset($filters['max_year'])) {
                    $results->where('year', '<=', $filters['max_year']);
                }

                if (isset($filters['min_price']) && isset($filters['max_price'])) {
                    $results->whereBetween('price', [$filters['min_price'], $filters['max_price']]);
                } elseif (isset($filters['min_price'])) {
                    $results->where('price', '>=', $filters['min_price']);
                } elseif (isset($filters['max_price'])) {
                    $results->where('price', '<=', $filters['max_price']);
                }
            }

            // Get paginated results (you can remove pagination if not needed)
            $results = $results->paginate(10);

            return response()->json([
                'success' => true,
                'message' => 'Search completed successfully',
                'results' => $results->items(),
                'pagination' => [
                    'total' => $results->total(),
                    'current_page' => $results->currentPage(),
                    'per_page' => $results->perPage(),
                    'last_page' => $results->lastPage(),
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during search',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
