<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Customer;

class CustomerController extends Controller
{


    public function getAllCustomers() {

        $customerData = Cache::remember('customer_cache', 600, function() {
            return Customer::all();
        }

        );

        return $customerData;
    }

    public function showAllCustomers() {

        $customerData = $this->getAllCustomers();

        return view('home', compact('customerData'));
    }

    public function saveCustomerDetails (Request $request){
        $request ->validate([
            'custName' => 'required|string|max:45',
            'custAdd' => 'required|string|max:100'
        ]);


        Customer::create([
            'cust_name' => $request -> custName,
            "cust_address" => $request ->custAdd
        ]);

        Cahce::forget('customer_chache');

        return redirect()->route('home');
    }
    public function deleteCustomerDetails($cust_ID){
        //dd($cust_ID);

        $customer = Customer::findOrFail($cust_ID);

        $customer->delete();

        Cahce::forget('customer_chache');
        
        return redirect()->route('home');
    }

    public function ShowCustomerDetails($cust_ID){
        $customerDetails = Customer::findOrFail($cust_ID);

        return view('editCustomer', compact('customerDetails'));

    }
    public function saveEditCustomer(Request $request, $cust_ID){
        $customerDetails = Customer::findOrFail($cust_ID);

        $customerDetails ->cust_name = $request -> input('custName');
        $customerDetails ->cust_address = $request -> input('custAdd');
        $customerDetails ->save();

        return redirect()->route('home');
    }

}