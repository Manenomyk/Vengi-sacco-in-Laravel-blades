<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Share;
use App\Models\NormalShare;
use App\Models\ShareAccount;
use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Models\EmergencyLoan;
use App\Models\GeneralLedger;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TableBankingLoan;
use App\Models\InstitutionalShare;

class PdfController extends Controller
{
    public function pdf_account_types()
    {
        $account_type = AccountDetail::all();

        $pdf = PDF::loadView('pdf.account-type', array("account_type" => $account_type));
 
        return $pdf->download('vengi-sacco-account-types.pdf');
    }

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
            )->get();

        $pdf = PDF::loadView('pdf.emergency', array("emergency_loans" => $emergency_loans));

        return $pdf->download('vengi-sacco-emergency.pdf');
    }

    public function table()
    {
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
            )->get();


        $pdf = PDF::loadView('pdf.table', array("table_banking_loans" => $table_banking_loans));

        return $pdf->download('vengi-sacco-table.pdf');
    }

    public function shares()
    {
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
            )->get();

        $pdf = PDF::loadView('pdf.share', array("share_accounts" => $share_accounts));

        return $pdf->download('vengi-sacco-shares.pdf');
    }

    public function normal()
    {
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
            )->get();


        $pdf = PDF::loadView('pdf.normal', array("normal_shares" => $normal_shares));

        return $pdf->download('vengi-sacco-normal.pdf');
    }

    public function inst()
    {
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
            )->get();

        $pdf = PDF::loadView('pdf.inst', array("institutional_shares" => $institutional_shares));

        return $pdf->download('vengi-sacco-inst.pdf');
    }

    public function member()
    {
        $member = User::where('role', 3)->where('is_approved', 1)->get();
        $pdf = PDF::loadView('pdf.member', array("member" => $member));

        return $pdf->download('vengi-sacco-members.pdf');
    }

    public function trial()
    {
        $emergency=EmergencyLoan::where('is_approved',1)->sum('amount_without_interest');
        $normal=NormalShare::where('is_approved',1)->sum('amount_without_interest');
        $table=TableBankingLoan::where('is_approved',1)->sum('amount_without_interest');

        $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
        $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');

        $general_ledgers = GeneralLedger::all();
        $positive = GeneralLedger::where('amount','>=',0)->sum('amount');
        $negative = GeneralLedger::where('amount','<',0)->sum('amount');
       
        $loans_sum=$emergency+$normal+$table;
        $shares_sum=$inst_share+$share;

        $final_assets=($loans_sum*-1)+$positive;
        $final_liability=$shares_sum+($negative*-1);

        $pdf = PDF::loadView('pdf.trial', compact('emergency', 'normal' , "table" , "inst_share", "share", "general_ledgers","final_assets","final_liability"));

        return $pdf->download('vengi-sacco-members.pdf');
    }
    public function generated()
    {
        $emergency = EmergencyLoan::where('is_approved', 1)->sum('amount_without_interest');
        $normal = NormalShare::where('is_approved', 1)->sum('amount_without_interest');
        $table = TableBankingLoan::where('is_approved', 1)->sum('amount_without_interest');

        $inst_share = InstitutionalShare::where('is_approved', 1)->sum('amount_without_interest');
        $share = ShareAccount::where('is_approved', 1)->sum('amount_without_interest');

        $general_ledgers = GeneralLedger::all();

        $loans_sum = $emergency + $normal + $table;
        $shares_sum = $inst_share + $share;

        $pdf = PDF::loadView('pdf.trial', array("emergency"=> $emergency, "normal" => $normal, "table" => $table, "inst_share" => $inst_share, "share" => $share, "general_ledgers"=>$general_ledgers,"loans_sum"=>$loans_sum,"shares_sum"=>$shares_sum));

        return $pdf->download('vengi-sacco-members.pdf');
    }
}
