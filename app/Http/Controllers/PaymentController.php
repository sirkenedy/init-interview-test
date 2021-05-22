<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use Illuminate\Support\Facades\Redirect;
use App\Entry;
use Illuminate\Support\Facades\DB;
use App\Events\EntryProcessed;
use App\Transaction;

class PaymentController extends Controller
{
    public function redirectToGateway()
    {
        
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return redirect('/entries')->with(['success'=> 'Payment successful. Summary of your order has been received and a copy has been sent to your Mail']);
        }        
    }

    public function handleGatewayCallback()
    {
        try{
            
            //db transaction 
            DB::beginTransaction();
            $paymentDetails = Paystack::getPaymentData();
            // dd($paymentDetails);
            //update entry status
            $data = $paymentDetails['data'];
            $entry = Entry::where('id', $data['metadata']['entry_id'])->with(['orders', 'user'])->first();
            $entry->update(['status' => 1]);
            

            //update transaction table
            $entry->transactions()->save(new Transaction(['amount_paid'=> $data['amount'], 'reference_no'=>$data['reference'], 'status'=> $data['status'] == "success" ? "1" : "0"]));

            //dispatch event to dispatch email to admin and user

            event(new EntryProcessed($entry));
            
            DB::commit();
            // return $entry;
            return redirect('/entries')->with(['success'=> 'Payment successful. Summary of your order has been received and a copy has been sent to your Mail']);
        }catch(\Exception $e) {
            
            return redirect('/entries')->with(['success'=> $e->getMessage()]);
        }  
    }
}
