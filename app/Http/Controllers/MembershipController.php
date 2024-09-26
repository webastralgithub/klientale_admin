<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ShareMail;
use App\Models\Categories;
use App\Models\PreferenceCategory;
use Mail;
use Auth;
use DB;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('frontend.membership', compact('memberships'));
    }
    public function indexApi()
    {
        $memberships = Membership::all();
        $categories =  Categories::all();
        $final = [];
        foreach ($categories as $category) {
            $final[$category->name] = [];

            foreach ($memberships as $membership) {
                if ($category->id == $membership->category_id) {

                    $final[$category->name][] = $membership;
                }
            }
        }

        return response()->json(["status"=>true ,"memberships"=>$final]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        if ($user->is_subscribed == 1) {
            return redirect()->back()->withError('You have already subscribed!');
        } else {
            $user->update([
                'is_subscribed' => 1,
                'membership_id' => $request->membership_id
            ]);
        }
        return redirect()->back()->withSuccess('Subscribed successfully!');
    }
    // public function list_subscribe_user(Request $request, $email)
    // {
    //     $perPage = $request->query('perPage', 20);
    //     $page = $request->query('page', 1);
    //     $search = $request->query('search', '');
       
    
    //     $catQuery = PreferenceCategory::select('preference_categories.category', 'categories.id')
    //         ->leftJoin('categories', 'categories.name', '=', 'preference_categories.category')
    //         ->where('preference_categories.email', $email);
    
    //     if (!empty($search)) {
    //         $catQuery->where('preference_categories.category', 'LIKE', "%{$search}%");
    //     }

    //     $categories = $catQuery->get();
    
    //     $userQuery = User::select('users.*', 'categories.name as category_name', 'memberships.name as membership_name')
    //         ->leftJoin('user_with_categories', 'user_with_categories.user_id', '=', 'users.id')
    //         ->leftJoin('categories', 'user_with_categories.category_id', '=', 'categories.id')
    //         ->leftJoin('memberships', 'memberships.id', '=', 'users.membership_id')
    //         ->where('users.is_subscribed', 1);
    
    //     if (!empty($search)) {
    //         $userQuery->where(function ($q) use ($search) {
    //             $q->where('users.name', 'LIKE', "%{$search}%")
    //                 ->orWhere('users.email', 'LIKE', "%{$search}%")
    //                 ->orWhere('categories.name', 'LIKE', "%{$search}%");
    //         });
    //     }
    
    
    //     $totalUsers = $userQuery->count();
    //     $skip = ($page - 1) * $perPage;
    //     $users = $userQuery->skip($skip)->take($perPage)->get();
    //     $totalPages = ceil($totalUsers / $perPage);
    
    //     return response()->json([
    //         'users' => $users,
    //         'categories' => $categories,
    //         'totalPages' => $totalPages,
    //         'currentPage' => $page,
    //         'perPage' => $perPage
    //     ]);
    // }

    public function list_subscribe_users(Request $request, $email)
    {
        $perPage = $request->query('perPage', 20);
        $page = $request->query('page', 1);
        $search = $request->query('search', '');
        $categoriesData = $request->query('categories', '');
    
        $user_pref_cat = !empty($categoriesData) ? explode(',', $categoriesData) : [];

        $catQuery = PreferenceCategory::select('preference_categories.category', 'categories.id')
            ->leftJoin('categories', 'categories.name', '=', 'preference_categories.category')
            ->where('preference_categories.email', $email);

//        if (!empty($search)) {
//            $catQuery->where('preference_categories.category', 'LIKE', "%{$search}%");
//        }
//
//        if (!empty($user_pref_cat)) {
//            $catQuery->whereIn('categories.id', $user_pref_cat);
//        }




        $categories = $catQuery->get();
    
        $userQuery = User::select('users.*')
            ->where('users.is_subscribed', 1);
    
        if (!empty($search)) {
            $userQuery->where(function ($q) use ($search) {
                $q->where('users.name', 'LIKE', "%{$search}%")
                    ->orWhere('users.email', 'LIKE', "%{$search}%");
//                    ->orWhere('users.profession_id', 'LIKE', "%{$search}%");
            });
        }
    
        if (!empty($user_pref_cat)) {
            $userQuery->whereIn('users.profession_id', $user_pref_cat);
        }

        $totalUsers = $userQuery->count();
        $skip = ($page - 1) * $perPage;
        $users = $userQuery->skip($skip)->take($perPage)->get();
        foreach ($users as $user){

            $user->profession =  DB::connection('insurance_mysql')->table('profession')->where('id',$user->profession_id)->value('name');

        }

        $totalPages = ceil($totalUsers / $perPage);
    
        return response()->json([
            'users' => $users,
            'categories' => $categories,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'perPage' => $perPage
        ]);
    }
    
    public function share(Request $request)
    {
        $sendTo = User::where('id', $request->sendTo)->first();
        $selectedContacts = User::whereIn('id', $request->selectedContacts)->get();

        if ($sendTo) {
            Mail::send('mail.share_referral', ['sendTo' => $sendTo, 'selectedContacts' => $selectedContacts], function ($m) use ($sendTo) {
                $m->to($sendTo->email)
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject(__('Share Referral'));
            });
            $message = 'Email sent successfully';
            $recipient = $sendTo;
        } else {

            $adminEmail = User::where('roleId', 1)->pluck('email')->first();
            Mail::send('mail.share_referral', ['selectedContacts' => $selectedContacts], function ($m) use ($adminEmail) {
                $m->to($adminEmail)
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject(__('Share Referral'));
            });
            $message = 'Email sent to admin';
            $recipient = 'Admin';
        }

        $sentMail = new ShareMail();
        $sentMail->sender_id = $request->email;
        $sentMail->reciver_id = ($request->type == 2) ? implode(',', $request->selectedContacts) : $request->sendTo;
        $sentMail->referrer_id = ($request->type == 2) ? $request->sendTo : implode(',', $request->selectedContacts);
        $sentMail->type = $request->type;
        $sentMail->save();

        return response()->json(['message' => $message, 'recipient' => $recipient, 'selectedContacts' => $selectedContacts], 200);
    }

    public function categoryList()
    {
        return Categories::all();
    }

    public function createPreferenceCategory(Request $request)
    {
        PreferenceCategory::where('email', $request->email)->delete();

        $categories = [];

        foreach ($request->category as $category) {
            $cat = PreferenceCategory::create([
                'email' => $request->email,
                'category' => $category['label'],
            ]);

            $categories[] = $cat;
        }

        return $categories;
    }

    public function klientale_contact_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'Klientale contact deleted successfully.', 'contact' => $user], 200);
    }

}
