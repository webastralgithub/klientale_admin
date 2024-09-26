<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Stripe;
class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.membership.index', [
            'memberships' => Membership::latest()->with('category')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.membership.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
       $stripe_plan = $stripe->products->create(['name' =>  $request['name']]);
       $price = $stripe->prices->create([
            'product' =>$stripe_plan->id,
            'unit_amount' => $request['price']*100,
            'recurring' => ['interval' => 'month'],
            'currency' => 'usd',
        ]);
       
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        Membership::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'stripe_price'=> $price->id,
            'category_id' => $request['category'],
            'user_id' => Auth::id(),
            'is_popular' => 0,
        ]);
    
        return redirect()->route('membership.index')
            ->withSuccess('New membership is added successfully.');
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
        $membership = Membership::findOrFail($id);
        $categories = Categories::all(); // Fetch all categories
        return view('admin.membership.edit', compact('membership', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, string $id)
    {
        $membership = Membership::findOrFail($id);
        // Update membership attributes
        $membership->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => (int) $request->input('category'), // Update category_id
        ]);

        // $membership->category_id = $request->input('category_id');
        // $membership->save();
        // dd($membership->category);
        // Retrieve the updated category
        $categories = Categories::all(); 
        return redirect()->back()
            ->with([
                'success' => 'Membership is updated successfully.',
                'membership' => $membership,
                'categories' =>$categories
               
            ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membership = Membership::find($id);
        $membership->delete();
        return redirect()->route('membership.index')
            ->withSuccess('Membership is deleted successfully.');
    }
}
