<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filters\Api\V1\CustomersFilter;
use App\Http\Resources\Api\V1\CustomerResource;

use App\Http\Resources\Api\V1\CustomerCollection;

use  App\Http\Requests\Api\V1\StoreCustomerRequest;
use App\Http\Requests\Api\V1\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new CustomersFilter();
        $filterItems = $filter->transform($request);

        $includeInvoices = $request->query('includeInvoices');
        $customers = Customer::where($filterItems);

        if ( isset($includeInvoices) ) {
            $customers = $customers->with('invoices');
        }

        return new CustomerCollection($customers->paginate()->appends($request->query()));            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource( Customer::create($request->all()) );
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        if ( $customer ) {

            $includeInvoices = request()->query('includeInvoices');
    
            if ( $includeInvoices ) {
                return new CustomerResource( $customer->loadMissing('invoices') );
            }
            return new CustomerResource ( $customer );
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update( $request->all());
        return new CustomerResource( $customer  );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if ( $customer->delete() ) {
            return response([
                "message" => 'Customer Record Has been Deleted Successfully'
            ], 202);
        }
    }
}
