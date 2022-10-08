<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Share;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    // public function view_pdf_shares()
    // {
    //     $share=Share::join('users','users.id','=','shares.user_id')
    //     ->select('shares.shares_amount','shares.id','shares.user_id','shares.is_approved','shares.share_type_id','users.name')
    //     ->get();

    //     $pdf=PDF::loadView('pdf.all-shares',array("share"=>$share));

    //     return $pdf->stream();
    // }

    // public function download_pdf_shares()
    // {
    //     $share=Share::join('users','users.id','=','shares.user_id')
    //     ->select('shares.shares_amount','shares.id','shares.user_id','shares.is_approved','shares.share_type_id','users.name')
    //     ->get();

    //     $pdf=PDF::loadView('pdf.all-shares',array("share"=>$share));

    //     return $pdf->download('vengi-sacco-shares.pdf');
    // }

    // public function view_pdf_members()
    // {
    //     $member=User::where('role',3)->get();
    //     $pdf=PDF::loadView('pdf.all-members',array("member"=>$member));
    //     return $pdf->stream();
    // }

    // public function download_pdf_members()
    // {
    //     $member=User::where('role',3)->get();
    //     $pdf=PDF::loadView('pdf.all-members',array("member"=>$member));
    //     return $pdf->download('vengi-sacco-members.pdf');
    // }

    // public function view_pdf_loans()
    // {
    //     $loan=Loan::join('users','users.id','=','loans.user_id')
    //     ->select('loans.loan_amount','loans.id','loans.due_date','loans.is_approved','loans.user_id','loans.loans_type_id','users.name')
    //     ->get();
    //     $pdf=PDF::loadView('pdf.all-loans',array("loan"=>$loan));
    //     return $pdf->stream();
    // }

    // public function download_pdf_loans()
    // {
    //     $loan=Loan::join('users','users.id','=','loans.user_id')
    //     ->select('loans.loan_amount','loans.id','loans.due_date','loans.is_approved','loans.user_id','loans.loans_type_id','users.name')
    //     ->get();
    //     $pdf=PDF::loadView('pdf.all-loans',array("loan"=>$loan));
    //     return $pdf->download('vengi-sacco-loans.pdf');
    // }

}
