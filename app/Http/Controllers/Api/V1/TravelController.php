<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TravelResource;
use App\Http\Resources\V1\TravelCollection;
use App\Filters\V1\TravelFilter;
use App\Http\Requests\V1\StoreTravelRequest;


class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new TravelFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]

        // $includeInvoices = request()->query('includeInvoices');

        $travel = Travel::where($filterItems);

        // if ($includeInvoices) {
        //     $customers = $customers->with('invoices');
        // }

        return $travel->paginate()->appends($request->query());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTravelRequest $request)
    {
        return new TravelResource(Travel::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Travel $travel)
    {

        return $travel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(TravelResource $request, Travel $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travel $customer)
    {
        //
    }
}
