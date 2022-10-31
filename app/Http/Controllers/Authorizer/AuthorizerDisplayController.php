<?php

namespace App\Http\Controllers\Authorizer;

use App\Models\NormalShare;
use App\Models\ShareAccount;
use Illuminate\Http\Request;
use App\Models\EmergencyLoan;
use App\Models\GeneralLedger;
use App\Models\TableBankingLoan;
use App\Models\InstitutionalShare;
use App\Http\Controllers\Controller;

class AuthorizerDisplayController extends Controller
{
    public function emergency()
    {
        $emergency_loans = EmergencyLoan::join('users', 'users.id', '=', 'emergency_loans.user_id')
            ->join('account_details', 'account_details.id', '=', 'emergency_loans.details_id')
            ->select(
                'users.name',
                'users.id_number',
                'account_details.account_type',
                'account_details.interest',
                'account_details.duration',
                'emergency_loans.id',
                'emergency_loans.is_approved',
                'emergency_loans.type',
                'emergency_loans.amount_without_interest',
                'emergency_loans.amount_with_interest',
                'emergency_loans.due_date',
                'emergency_loans.created_at'
            )->paginate(10);

       return view('authorizer.emergency',compact('emergency_loans'));
    }

    public function ledgers(){
       
        $general_ledgers = GeneralLedger::paginate(6);

        return view('authorizer.ledger',compact('general_ledgers'));

    }
    public function institutional(){
        $institutional_shares = InstitutionalShare::join('users', 'users.id', '=', 'institutional_shares.user_id')
        ->join('account_details', 'account_details.id', '=', 'institutional_shares.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'institutional_shares.id',
            'institutional_shares.is_approved',
            'institutional_shares.type',
            'institutional_shares.amount_without_interest',
            'institutional_shares.amount_with_interest',
            'institutional_shares.created_at'
        )->paginate(10);

        return view('authorizer.inst-shares',compact('institutional_shares'));
    }
    public function normal(){
        $normal_shares = NormalShare::join('users', 'users.id', '=', 'normal_shares.user_id')
        ->join('account_details', 'account_details.id', '=', 'normal_shares.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'normal_shares.id',
            'normal_shares.is_approved',
            'normal_shares.type',
            'normal_shares.amount_without_interest',
            'normal_shares.amount_with_interest',
            'normal_shares.created_at'
        )->paginate(10);

        return view('authorizer.normal-share',compact('normal_shares'));

    }

    public function share(){
        $share_accounts = ShareAccount::join('users', 'users.id', '=', 'share_accounts.user_id')
        ->join('account_details', 'account_details.id', '=', 'share_accounts.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'share_accounts.id',
            'share_accounts.is_approved',
            'share_accounts.type',
            'share_accounts.amount_without_interest',
            'share_accounts.amount_with_interest',
            'share_accounts.created_at'
        )->paginate(10);

        return view('authorizer.share-account',compact('share_accounts'));
    }

    public function table(){
        $table_banking_loans = TableBankingLoan::join('users', 'users.id', '=', 'table_banking_loans.user_id')
        ->join('account_details', 'account_details.id', '=', 'table_banking_loans.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'table_banking_loans.id',
            'table_banking_loans.is_approved',
            'table_banking_loans.type',
            'table_banking_loans.amount_without_interest',
            'table_banking_loans.amount_with_interest',
            'table_banking_loans.due_date',
            'table_banking_loans.created_at'
        )->paginate(10);

        return view('authorizer.table-banking',compact('table_banking_loans'));
    }
}
