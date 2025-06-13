<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller {

      public function data(Request $request) {
            $query = Account::query();

            return DataTables::of($query)
                        ->addColumn('is_active', fn($row) => $row->is_active ? 'Active' : 'Inactive')
                        ->addColumn('actions', function ($row) {
                              return view('accounts.actions', compact('row'))->render();
                        })
                        ->rawColumns(['actions']) // actions column contains HTML
                        ->make(true);
      }

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = Account::query();

                  if ($request->has('type') && $request->type != '') {
                        $query->where('type', $request->type);
                  }

                  return DataTables::of($query)
                              ->addColumn('is_active', fn($row) => $row->is_active ? '1' : '0')
                              ->addColumn('actions', function ($row) {
                                    return view('accounts.partials.actions', compact('row'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            return view('accounts.index');
      }

      public function create() {
            return view('accounts.create');
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'code' => 'required|string|max:100|unique:accounts,code',
                      'account_no' => 'required|string|max:100|unique:accounts,account_no',
                      'type' => 'required|in:Asset,Liability,Equity,Income,Expense',
                      'is_active' => 'required|boolean',
            ]);

            Account::create($request->all());
            return redirect()->route('accounts.index')->with('success', 'Account created.');
      }

      public function edit(Account $account) {
            return view('accounts.edit', compact('account'));
      }

      public function update(Request $request, Account $account) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'code' => 'required|unique:accounts,code,' . $account->id,
                      'account_no' => 'required|unique:accounts,code,' . $account->id,
                      'type' => 'required|string',
            ]);

            $account->update($request->all());
            return redirect()->route('accounts.index')->with('success', 'Account updated.');
      }

      public function destroy(Account $account) {
            $account->delete();
            return back()->with('success', 'Account deleted.');
      }
}
