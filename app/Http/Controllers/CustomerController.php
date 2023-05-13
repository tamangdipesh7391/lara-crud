<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        $customerData = [
            "customers" => $customers,
        ];
        return view("index", $customerData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "username" => "required|string|min:3|max:255",
            "address" => "required|string|min:3|max:255",
        ], [
            "username.required" => "Username required xa",
        ]);

        $validatedData = $request->all();
        $customer = new Customer();
        $customer->username = $validatedData["username"];
        $customer->address = $validatedData["address"];
        $customer->save();
        return redirect()->route("customers.index")->with("success", "Customer created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::where("id", $id)->firstOrFail();
        $customerData = [
            "customer" => $customer,
        ];
        return view("edit", $customerData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "username" => "required|string|min:3|max:255",
            "address" => "required|string|min:3|max:255",
        ]);

        $validatedData = $request->all();
        $customer = Customer::where("id", $id)->firstOrFail();
        $customer->username = $validatedData["username"];
        $customer->address = $validatedData["address"];
        $customer->save();
        return redirect()->route("customers.index")->with("success", "Customer updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::where("id", $id)->firstOrFail();
        $customer->delete();
        return redirect()->back()->with("success", "Customer deleted successfully");
    }
}
