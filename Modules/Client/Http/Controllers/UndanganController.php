<?php

namespace Modules\Client\Http\Controllers;

use App\Models\Sesi;
use App\Models\Tamu;
use App\Models\Client;
use App\Models\Undangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Http;

class UndanganController extends Controller
{
    public function undangan_chart()
    {
        $data = Undangan::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as total'))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();
                return response()->json($data);
    }

    public function undangan_code($kode)
    {
        $data_client = Client::where('kode', $kode)->firstorfail();
        $id_client = $data_client->id_client;
        $data = new Undangan();
        $undangan = $data->undangan_client($id_client);
        $code = $kode;
        $client = $data_client->kode;

        return view('client::dashboard-client', compact('undangan', 'client', 'code', 'data_client'));
    }

    public function list_tamu($client, $code)
    {
        $data = Sesi::where('kode', $code)->first();
        $id_undangan = $data->id_undangan;
        $id_sesi = $data->sesi;
        $sesi = $data->sesi;
        $result = Tamu::where('id_undangan', $id_undangan)
                        ->where('id_sesi', $sesi)
                        ->get();
        $client = $client;
        $code = $code;
        $data_tamu = new Tamu();
        $total_tamu = $data_tamu->total_tamu($id_undangan, $id_sesi);
        $total_hadir = $data_tamu->undangan_hadir($id_undangan, $id_sesi);
        $total_baca = $data_tamu->undangan_dibaca($id_undangan, $id_sesi);

        return view('client::tamu-undangan', compact(
            'result',
            'client',
            'code',
            'total_tamu',
            'total_hadir',
            'total_baca',
            'id_undangan',
            'id_sesi'
        ));
    }

    public function kirim_undangan(Request $request, $client, $code)
    {
        $tamus = $request->input('tamu');
        $data = Sesi::where('kode', $code)->first();
        $id_undangan = $data->id_undangan;
        $id_sesi = $data->id_sesi;
        $sesi = $data->sesi;
        $undangan = Undangan::where('id_undangan', $id_undangan)->first();
        $id_client = (string) $undangan->id_client;

        $tamus = Tamu::whereIn('id_tamu', $tamus)->get();

        $bulk_message = [];

        foreach ($tamus as $tamu) {
            $no_hp = $tamu->no_hp;

            if (substr($no_hp, 0, 1) == '0') {
                $no_hp = substr($no_hp, 1);
            }

            if (substr($no_hp, 0, 2) != '62') {
                $no_hp = '62' . $no_hp;
            }

            if (strlen($no_hp) < 11) {
                continue;
            }

            $situs = env('APP_URL');
            $nama_pertama_mempelai_pria = explode(' ', $undangan->nama_mempelai_pria)[0];
            $nama_pertama_mempelai_wanita = explode(' ', $undangan->nama_mempelai_wanita)[0];

            $message ="*Undangan The Wedding of $nama_pertama_mempelai_pria & $nama_pertama_mempelai_wanita*\n\n" .
                "Assalamu'alaikum Wr. Wb\n" .
                "Kepada Yth. Bapak/Ibu/Saudara(i) $tamu->nama_tamu\n\n" .
                "Tanpa mengurangi rasa hormat, kami mohon doa dan restu Bapak/Ibu/Saudara(i) pada acara The Wedding Of kami\n\n" .
                "$undangan->nama_mempelai_pria\n" .
                "    &\n" .
                "$undangan->nama_mempelai_wanita\n\n" .
                "Detail acara The Wedding Of dapat diakses melalui: {$situs}/undangan/unique/{$tamu->kode}/\n\n" .
                "Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara(i) dapat hadir serta memberikan doa dan restu untuk mengiringi niat tulus kami, sehingga acara The Wedding Of kami senantiasa dalam ridho & rahmat Allah SWT. Aamiin Yaa Rabbal Aalamin.\n" .
                "Terimakasih,\n\n" .
                "Wassalamu'alaikum Wr. Wb\n" .
                "Salam,\n" .
                "$nama_pertama_mempelai_pria & $nama_pertama_mempelai_wanita";

            $bulk_message[] = [
                'to' => $no_hp,
                'text' => $message
            ];
        }

        Http::post(env('WHATSAPP_URL', 'http://localhost:5001') . '/send-bulk-message', [
            'session' => $id_client,
            'data' => $bulk_message
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Undangan berhasil dikirim',
        ]);
    }

    // print table as pdf
    // column: no, nama, alamat
    public function buku_tamu($client, $code)
    {
        $data = Sesi::where('kode', $code)->first();
        $id_undangan = $data->id_undangan;
        $id_sesi = $data->sesi;
        $sesi = $data->sesi;
        $undangan = Undangan::where('id_undangan', $id_undangan)->first();
        $result = Tamu::where('id_undangan', $id_undangan)
                        ->where('id_sesi', $sesi)
                        ->orderBy('nama_tamu', 'asc')
                        ->get();
        $sesi = DB::table('sesi')
            ->where('id_undangan', '=', $id_undangan)
            ->where('sesi', '=', $id_sesi)
            ->pluck('waktu')
            ->firstOrFail();
        $tanggal_resepsi = Carbon::parse($sesi)->format('d F, Y');
        $jam_resepsi =  Carbon::parse($sesi)->format('H:i');
        $client = $client;
        $code = $code;

        $logo = base64_encode(file_get_contents(public_path('FreeDash-lite-master/src') . '/assets/images/logo.png'));

        $pdf = Pdf::loadView('client::buku-tamu', compact(
            'undangan',
            'result',
            'client',
            'code',
            'sesi',
            'tanggal_resepsi',
            'jam_resepsi',
            'id_undangan',
            'id_sesi',
            'logo'
        ));

        return $pdf->stream("buku-tamu-$sesi.pdf");
    }
}
