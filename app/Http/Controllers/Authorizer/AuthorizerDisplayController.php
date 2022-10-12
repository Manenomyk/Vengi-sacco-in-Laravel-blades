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
                'emergency_loans.is_approved',
                'emergency_loans.type',
                'emergency_loans.amount_without_interest',
                'emergency_loans.amount_with_interest',
                'emergency_loans.due_date',
                'emergency_loans.created_at'
            )->paginate(10);

       return view('authorizer.emergency');
    }

    public function gen_ledgers(){
       
        $general_ledgers = GeneralLedger::join('users', 'users.id', '=', 'general_ledgers.user_id')
        ->join('account_details', 'account_details.id', '=', 'general_ledgers.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'general_ledgers.is_approved',
            'general_ledgers.type',
            'general_ledgers.amount_without_interest',
            'general_ledgers.amount_with_interest',
            'general_ledgers.due_date',
            'general_ledgers.created_at'
        )->paginate(10);

        return view('clerk.ledger',compact('general_ledgers'));

    }
    public function institutional_shares(){
        $institutional_shares = InstitutionalShare::join('users', 'users.id', '=', 'institutional_shares.user_id')
        ->join('account_details', 'account_details.id', '=', 'institutional_shares.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'institutional_shares.is_approved',
            'institutional_shares.type',
            'institutional_shares.amount_without_interest',
            'institutional_shares.amount_with_interest',
            'institutional_shares.created_at'
        )->paginate(10);

        return view('clerk.inst-shares',compact('institutional_shares'));
    }
    public function normal_shares(){
        $normal_shares = NormalShare::join('users', 'users.id', '=', 'normal_shares.user_id')
        ->join('account_details', 'account_details.id', '=', 'normal_shares.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'normal_shares.is_approved',
            'normal_shares.type',
            'normal_shares.amount_without_interest',
            'normal_shares.amount_with_interest',
            'normal_shares.created_at'
        )->paginate(10);

        return view('clerk.normal-share',compact('normal_shares'));

    }

    public function share_accounts(){
        $share_accounts = ShareAccount::join('users', 'users.id', '=', 'share_accounts.user_id')
        ->join('account_details', 'account_details.id', '=', 'share_accounts.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'share_accounts.is_approved',
            'share_accounts.type',
            'share_accounts.amount_without_interest',
            'share_accounts.amount_with_interest',
            'share_accounts.created_at'
        )->paginate(10);

        return view('clerk.share-account',compact('share_accounts'));
    }

    public function table_banking_loans(){
        $table_banking_loans = TableBankingLoan::join('users', 'users.id', '=', 'table_banking_loans.user_id')
        ->join('account_details', 'account_details.id', '=', 'table_banking_loans.details_id')
        ->select(
            'users.name',
            'users.id_number',
            'account_details.account_type',
            'account_details.interest',
            'account_details.duration',
            'table_banking_loans.is_approved',
            'table_banking_loans.type',
            'table_banking_loans.amount_without_interest',
            'table_banking_loans.amount_with_interest',
            'table_banking_loans.due_date',
            'table_banking_loans.created_at'
        )->paginate(10);

        return view('clerk.table-banking',compact('table_banking_loans'));
    }
}
