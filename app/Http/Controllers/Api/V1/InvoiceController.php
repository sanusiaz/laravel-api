<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filters\Api\V1\InvoicesFilter;
use App\Http\Resources\Api\V1\InvoiceResource;

use App\Http\Resources\Api\V1\InvoiceCollection;
use App\Http\Requests\Api\V1\StoreInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $filter = new InvoicesFilter();
        $filterItems = $filter->transform($request);

        $includeCustomer = $request->query('includeCustomer');
        $invoices = Invoice::where($filterItems);

        if ( isset($includeCustomer) ) {
            $invoices = $invoices->with('customer');
        }

        return new InvoiceCollection($invoices->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        return new InvoiceResource( Invoice::create($request->all()) );
    }


    public function bulkStore(Request $request) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource( $invoice );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        
    }
}
