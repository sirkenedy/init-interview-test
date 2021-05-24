<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Order;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Traits\Shipment;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('session.check');
    }

    use Shipment;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $user = User::where('email', $request->session()->get('user_key'))->with(['entries' => function ($q)  {
            $q->where('status', 0)->orderBy('created_at', 'desc')->with('orders');
        }])->first();
        return View('forwarder.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Entry(['name' => Str::random(5), 'status'=> 0]);
        $user_email = $request->session()->get('user_key');
        $user = User::where('email', $user_email)->firstOrFail();
        $entry = $user->entries()->save($data);
        return redirect('/entries/'.$entry->id)->with(['success'=> 'Entries created succesfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show($entry)
    {
          $entry = Entry::where('id', $entry)->with(['orders' => function ($q)  {
            $q->orderBy('created_at', 'desc');
        }])->firstOrFail();

        if ($entry->status == 0) {
            return view('forwarder.show', compact('entry'));
        }
        return redirect('/entries')->with(['error'=> "Order has been paid for"]);
    }

    public function addOrder(OrderStoreRequest $request, $entry_id)
    {
        $data = new Order($this->calcTotaltCost($request->validated()));
        $entry = Entry::where('id', $entry_id)->first();
        $order = $entry->orders()->save($data);
        return redirect('/entries/'.$entry_id)->with(['success'=> 'New order added to entries successfully']);
    }

    public function checkoutOrder(Request $request)
    {
        $id =  request()->input('entry_id');
        $entry = Entry::where('id', $id)->with(['user','orders' => function ($q)  {
            $q->orderBy('created_at', 'desc');
        }])->first();
        return view('forwarder.checkout', compact('entry'));
    }

    public function viewTransaction(Request $request, $email)
    {
         $user = User::where('email', $email)->with(['entries' => function ($q)  {
            $q->where('status', 1)->orderBy('created_at', 'desc');
        }])->first();
        
        return view('forwarder.successful_order', compact('user'));

    }
}
