<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Exception;
use DB;
use File as FilePackage;
use UxWeb\SweetAlert\SweetAlert;
use ZipArchive;

class FileController extends Controller
{
    public function index(){
        $data = File::all();
        if (count($data) == 0){
            SweetAlert::error('Data tidak ditemukan atau masih kosong','Poor Man!');
            return view('table.table',compact('data'));
        }
        return view('table.table',compact('data'));
    }

    public function proses_input(Request $request){
        $surat_permohonan = $request->file('surat_permohonan');
        $surat_rekomendasi = $request->file('surat_rekomendasi');
        $batas_wilayah = $request->file('batas_wilayah');
        $jumlah_penduduk = $request->file('jml_penduduk');
        $peta_wilayah_distrik = $request->file('peta_wilayah_distrik');
        $peta_wilayah_kampung = $request->file('peta_wil_kampung');
        $foto_kantor = $request->file('foto_kantor');

        try {
            DB::beginTransaction();
            $name_surat_permohonan = date('Y-m-d-his').'-surat-permohonan.'.$surat_permohonan->getClientOriginalExtension();

            $name_surat_rekomendasi = date('Y-m-d-his').'-surat-rekomendasi.'.$surat_rekomendasi->getClientOriginalExtension();

            $name_batas_wilayah = date('Y-m-d-his').'-batas_wilayah.'.$batas_wilayah->getClientOriginalExtension();

            $name_jml_penduduk = date('Y-m-d-his').'-jml-penduduk.'.$jumlah_penduduk->getClientOriginalExtension();

            $name_pw_distrik = date('Y-m-d-his').'-peta-wil-distrik.'.$peta_wilayah_distrik->getClientOriginalExtension();

            $name_wil_kampung = date('Y-m-d-his').'-peta-wil_kampung.'.$peta_wilayah_kampung->getClientOriginalExtension();

            $name_foto_kantor = date('Y-m-d-his').'-foto-kantor.'.$foto_kantor->getClientOriginalExtension();

            File::create([
                's_permohonan' => $s_permohonan = $surat_permohonan->storeAs('file/surat-permohonan',$name_surat_permohonan),
                's_rekomendasi' => $s_rekomendasi = $surat_rekomendasi->storeAs('file/surat-rekomendasi',$name_surat_rekomendasi),
                'bts_wilayah' => $bts_wilayah = $batas_wilayah->storeAs('file/batas-wilayah',$name_batas_wilayah),
                'jml_penduduk' => $jml_penduduk = $jumlah_penduduk->storeAs('file/jml-penduduk',$name_jml_penduduk),
                'pw_distrik' => $pw_distrik = $peta_wilayah_distrik->storeAs('file/peta-wil-distrik',$name_pw_distrik),
                'pw_kampung' => $pw_kampung = $peta_wilayah_kampung->storeAs('file/peta-wil-kampung',$name_wil_kampung),
                'ft_kantor' => $ft_kantor = $foto_kantor->storeAs('file/foto-kantor',$name_foto_kantor)
            ]);
            DB::commit();
            SweetAlert::success('Dokumen Berhasil Ditambahkan Broo','Berhasil!');
            return redirect('/');
        }catch (Exception $e){
            DB::rollBack();
            return redirect('/form')->with(['error' => 'Ooops, error:'.$e->getMessage()]);
        }
    }

    public function download(Request $request, $file_id){
        $data = File::where('file_id',$file_id)->first();

        $file_foto_kantor= storage_path('app/'.$data->ft_kantor);
        $file_surat_permohonan = storage_path('app/'.$data->s_permohonan);
        $file_surat_rekomendasi = storage_path('app/'.$data->s_rekomendasi);
        $file_batas_wilayah = storage_path('app/'.$data->bts_wilayah);
        $file_jml_penduduk = storage_path('app/'.$data->jml_penduduk);
        $file_peta_wilayah_distrik = storage_path('app/'.$data->pw_distrik);
        $file_peta_wilayah_kampung = storage_path('app/'.$data->pw_kampung);

            // Define Dir Folder
            $public_dir=public_path();
            // Zip File Name
            $zipFileName = 'file-compress.zip';
            // Create ZipArchive Obj
            $zip = new ZipArchive;
            if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
                // Add File in ZipArchive
                $zip->addFile($file_foto_kantor,basename($file_foto_kantor));
                $zip->addFile($file_surat_permohonan,basename($file_surat_permohonan));
                $zip->addFile($file_surat_rekomendasi,basename($file_surat_rekomendasi));
                $zip->addFile($file_batas_wilayah,basename($file_batas_wilayah));
                $zip->addFile($file_jml_penduduk,basename($file_jml_penduduk));
                $zip->addFile($file_peta_wilayah_distrik,basename($file_peta_wilayah_distrik));
                $zip->addFile($file_peta_wilayah_kampung,basename($file_peta_wilayah_kampung));
                // Close ZipArchive
                $zip->close();
            }
            // Set Header
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
            $filetopath=$public_dir.'/'.$zipFileName;

        return response()->download($filetopath,$zipFileName,$headers);
    }
}
