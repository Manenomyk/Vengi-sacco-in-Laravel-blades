<?php

namespace App\Http\Controllers;

use App\Models\Share;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function view_pdf()
    {
        $share=Share::join('users','users.id','=','shares.user_id')
        ->select('shares.shares_amount','shares.id','shares.user_id','shares.is_approved','shares.share_type_id','users.name')
        ->get();

        $pdf=PDF::loadView('pdf.all-shares',array("share"=>$share));

        return $pdf->stream();
    }

    public function download_pdf()
    {
        $share=Share::join('users','users.id','=','shares.user_id')
        ->select('shares.shares_amount','shares.id','shares.user_id','shares.is_approved','shares.share_type_id','users.name')
        ->get();

        $pdf=PDF::loadView('pdf.all-shares',array("share"=>$share));

        return $pdf->download('vengi-sacco-shares.pdf');
    }

}
