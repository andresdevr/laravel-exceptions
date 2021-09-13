<?php

namespace Andresdevr\LaravelExceptions\Repositories;

use Andresdevr\LaravelExceptions\Interfaces\ExceptionsInterface;
use Andresdevr\LaravelExceptions\Models\Exception;
use Illuminate\Http\Request;

class ExceptionRepository implements ExceptionsInterface
{
    /**
     * The index method
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    public function index(Request $request)
    {
        return Exception::withCount('solutions')
                        ->when($request->input('filters'), function($query, $filters) {
                            return $query->when($filters['search'], function($query, $search) {
                                return $query->where(function($query) use($search) {
                                    $query->where('id', 'LIKE', "%$search%")
                                            ->orWhere('message', 'LIKE', "%$search%")
                                            ->orWhere('file', 'LIKE', "%$search%")
                                            ->orWhere('code', $search)
                                            ->orWhere('line', $search);
                                });
                            })
                            ->when($filters['start_date'], function($query, $startDate) {
                                return $query->whereDate('created_at', '>=', $startDate);
                            })
                            ->when($filters['end_date'], function($query, $endDate) {
                                return $query->whereDate('created_at', '<=', $endDate);
                            });
                        })
                        ->when($request->input('order_by'), function($query, $orderBy) use($request) {
                            return $query->orderBy($orderBy, $request->input('sort'));
                        })
                        ->paginate($request->input('perPage'));
    }
}