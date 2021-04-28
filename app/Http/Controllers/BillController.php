<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillPerson;
use App\Models\BillItems;
use Illuminate\Support\Facades\DB;
use Validator;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uk)
    {
        $bills = DB::table('bills')
                ->where('organization_id', '=', $uk)
                ->get();

        return view('pages.bills.index')
                ->with('page_title', 'Hóa đơn')
                ->with('bills', $bills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bills.create')->with('page_title', 'Tạo hóa đơn');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'createdBy' => 'required',
            'type' => 'required',
            'senderInfo' => 'required',
            'receiverInfo' => 'required',
            'items' => 'present|array'
        ]);

        if($validator->fails()){
            $messages = $validator->messages();
            return response()->json(['error' => $messages], 403);
        }


        $sender = new BillPerson();
        $sender->type = 'SENDER';
        $sender->name = $request->input('senderInfo')['name'];
        $sender->email = $request->input('senderInfo')['sender_email'];
        $sender->organization = $request->input('senderInfo')['sender_org'];
        $sender->phone = $request->input('senderInfo')['sender_phone'];
        $sender->save();

        $receiver = new BillPerson();
        $receiver->type = 'RECEIVER';
        $receiver->name = $request->input('receiverInfo')['name'];
        $receiver->email = $request->input('receiverInfo')['receiver_email'];
        $receiver->organization = $request->input('receiverInfo')['receiver_org'];
        $receiver->phone = $request->input('receiverInfo')['receiver_phone'];
        $receiver->save();

        $bill = new Bill();

        $bill->type = $request->input('type');
        $bill->description = $request->input('description');
        $bill->created_by = $request->input('createdBy');
        $bill->tax = $request->input('tax');
        $bill->amount = $request->input('amount');
        $bill->organization_id = $request->input('organization_id');
        $bill->sender = $sender->id;
        $bill->receiver = $receiver->id;
        $bill->total = $request->input('total');

        $bill->save();

        $items = $request->input('items');
        foreach ($items as $item) {
            $new_item = new BillItems;
            $new_item->bill_id = $bill->id;
            $new_item->name = $item['name'];
            $new_item->unit_price = $item['unit_price'];
            $new_item->quantity = $item['quantity'];
            $new_item->short_desc = $item['short_desc'];
            $new_item->total = $item['total'];
            $new_item->save();
        }

        $back_to = "/organizations/".$request->input('organization_id')."/bills";

        return response()->json(["back_to" => $back_to]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.bills.single')->with('page_title', 'Chi tiết hóa đơn');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.bills.update')->with('page_title', 'Sửa hóa đơn');
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
    public function destroy($id)
    {
        //
    }
}
