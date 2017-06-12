<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cash;

class CashController extends Controller
{
    public function index()
    {
      $cashs = cash::paginate(10);


      return view('cash.index', compact('cashs') );
    }

    public function store(Request $request)
    {
      cash::create([
              'method' => $request->method,
              'fromBank'   => $request->fromBank,
              'fromAccountNumber' => $request->fromAccountNumber,
              'fromAccountName' => $request->fromAccountName,
              'amount' => $request->amount,
              'transferDate' => $request->transferDate,
              'transferTime' => $request->transferTime,
              'toBank' => $request->toBank,
              'toAccountNumber' => $request->toAccountNumber,
              'toAccountName' => $request->toAccountName,
              'transferStatus' => $request->transferStatus,
              'user_id' => auth()->user() ->id
      ]);
        return redirect('/');
    }

public function edit($id)
    {
        $cash = cash::find($id);
        return view('cash.edit', compact('cash'));
    }

public function update(Request $request, $id)
    {
        $cash = cash::find($id);
        $cash->update([
          'method' => $request->method,
          'fromBank'   => $request->fromBank,
          'fromAccountNumber' => $request->fromAccountNumber,
          'fromAccountName' => $request->fromAccountName,
          'amount' => $request->amount,
          'transferDate' => $request->transferDate,
          'transferTime' => $request->transferTime,
          'toBank' => $request->toBank,
          'toAccountNumber' => $request->toAccountNumber,
          'toAccountName' => $request->toAccountName,
          'transferStatus' => $request->transferStatus,
          'user_id' => auth()->user() ->id
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
      $cash = cash::find($id);
      $cash->delete();

      return redirect('/');
    }


}
