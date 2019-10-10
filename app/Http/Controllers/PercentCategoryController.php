<?php

namespace App\Http\Controllers;

use App\Category;
use App\Opinions;
use Illuminate\Http\Request;

class PercentCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->toArray();
        return view('category', compact('categories'));
    }

    public function rankingGojek(Request $request){
    	$bulan = 10;
    	$tahun = 2018;

    	if($request->has('bulan')) {
            $bulan = $request->get('bulan');
        }
        if($request->has('tahun')) {
            $tahun = $request->get('tahun');
        }

    	$miu = 0.5;
    	$aplikasi_gojek[0]= Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_gojek[1] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_gojek[2] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_gojek[3] = $aplikasi_gojek[0] + $aplikasi_gojek[1] + $aplikasi_gojek[2];

        $aplikasi_gojek[4] = ($aplikasi_gojek[0]/$aplikasi_gojek[1])-($aplikasi_gojek[2]/$aplikasi_gojek[3]*$miu);


        $harga_gojek[0] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_gojek[1] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_gojek[2] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_gojek[3] = $harga_gojek[0] + $harga_gojek[1] + $harga_gojek[2];
        $harga_gojek[4] = ($harga_gojek[0]/$harga_gojek[1])-($harga_gojek[2]/$harga_gojek[3]*$miu);

        $driver_gojek[0] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_gojek[1] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_gojek[2] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_gojek[3] = $driver_gojek[0] + $driver_gojek[1] + $driver_gojek[2];
        $driver_gojek[4] = ($driver_gojek[0]/$driver_gojek[1])-($driver_gojek[2]/$driver_gojek[3]*$miu);


        $penumpang_gojek[0] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_gojek[1] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_gojek[2] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','1')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_gojek[3] = $penumpang_gojek[0] + $penumpang_gojek[1] + $penumpang_gojek[2];
        $penumpang_gojek[4] = ($penumpang_gojek[0]/$penumpang_gojek[1])-($penumpang_gojek[2]/$penumpang_gojek[3]*$miu);


        $perusahaan_gojek[0] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_gojek[1] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_gojek[2] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_gojek[3] = $perusahaan_gojek[0] + $perusahaan_gojek[1] + $perusahaan_gojek[2];
        $perusahaan_gojek[4] = ($perusahaan_gojek[0]/$perusahaan_gojek[1])-($perusahaan_gojek[2]/$perusahaan_gojek[3]*$miu);

        $nilai = [
        	[
        		'kategori' => 'Aplikasi',
        		'positif' => $aplikasi_gojek[0],
        		'negatif' => $aplikasi_gojek[1],
        		'netral' => $aplikasi_gojek[2],
        		'ranking' => $aplikasi_gojek[4]
        	],
        	[
        		'kategori' => 'Harga',
        		'positif' => $harga_gojek[0],
        		'negatif' => $harga_gojek[1],
        		'netral' => $harga_gojek[2],
        		'ranking' => $harga_gojek[4]
        	],
        	[
        		'kategori' => 'Driver',
        		'positif' => $driver_gojek[0],
        		'negatif' => $driver_gojek[1],
        		'netral' => $driver_gojek[2],
        		'ranking' => $driver_gojek[4]
        	],
        	[
        		'kategori' => 'Penumpang',
        		'positif' => $penumpang_gojek[0],
        		'negatif' => $penumpang_gojek[1],
        		'netral' => $penumpang_gojek[2],
        		'ranking' => $penumpang_gojek[4]
        	],
        	[
        		'kategori' => 'Perusahaan',
        		'positif' => $perusahaan_gojek[0],
        		'negatif' => $perusahaan_gojek[1],
        		'netral' => $perusahaan_gojek[2],
        		'ranking' => $perusahaan_gojek[4]
        	]        	       
        ];

        $ranks = $this->array_sort($nilai, 'ranking', SORT_DESC);
        return view ('rankgojek' )->withRanks ( $ranks );

    }

    public function rankingGrab(Request $request){
    	$miu = 0.5;
    	$bulan = 10;
    	$tahun = 2018;

    	if($request->has('bulan')) {
            $bulan = $request->get('bulan');
        }
        if($request->has('tahun')) {
            $tahun = $request->get('tahun');
        }
    
    	$aplikasi_grab[0]= Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_grab[1] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_grab[2] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_grab[3] = $aplikasi_grab[0] + $aplikasi_grab[1] + $aplikasi_grab[2];

        $aplikasi_grab[4] = ($aplikasi_grab[0]/$aplikasi_grab[1])-($aplikasi_grab[2]/$aplikasi_grab[3]*$miu);


        $harga_grab[0] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_grab[1] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_grab[2] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_grab[3] = $harga_grab[0] + $harga_grab[1] + $harga_grab[2];
        $harga_grab[4] = ($harga_grab[0]/$harga_grab[1])-($harga_grab[2]/$harga_grab[3]*$miu);

        $driver_grab[0] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_grab[1] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_grab[2] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_grab[3] = $driver_grab[0] + $driver_grab[1] + $driver_grab[2];
        $driver_grab[4] = ($driver_grab[0]/$driver_grab[1])-($driver_grab[2]/$driver_grab[3]*$miu);


        $penumpang_grab[0] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_grab[1] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_grab[2] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','2')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_grab[3] = $penumpang_grab[0] + $penumpang_grab[1] + $penumpang_grab[2];
        $penumpang_grab[4] = ($penumpang_grab[0]/$penumpang_grab[1])-($penumpang_grab[2]/$penumpang_grab[3]*$miu);


        $perusahaan_grab[0] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_grab[1] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_grab[2] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_grab[3] = $perusahaan_grab[0] + $perusahaan_grab[1] + $perusahaan_grab[2];
        $perusahaan_grab[4] = ($perusahaan_grab[0]/$perusahaan_grab[1])-($perusahaan_grab[2]/$perusahaan_grab[3]*$miu);

        $nilai = [
        	[
        		'kategori' => 'Aplikasi',
        		'positif' => $aplikasi_grab[0],
        		'negatif' => $aplikasi_grab[1],
        		'netral' => $aplikasi_grab[2],
        		'ranking' => $aplikasi_grab[4]
        	],
        	[
        		'kategori' => 'Harga',
        		'positif' => $harga_grab[0],
        		'negatif' => $harga_grab[1],
        		'netral' => $harga_grab[2],
        		'ranking' => $harga_grab[4]
        	],
        	[
        		'kategori' => 'Driver',
        		'positif' => $driver_grab[0],
        		'negatif' => $driver_grab[1],
        		'netral' => $driver_grab[2],
        		'ranking' => $driver_grab[4]
        	],
        	[
        		'kategori' => 'Penumpang',
        		'positif' => $penumpang_grab[0],
        		'negatif' => $penumpang_grab[1],
        		'netral' => $penumpang_grab[2],
        		'ranking' => $penumpang_grab[4]
        	],
        	[
        		'kategori' => 'Perusahaan',
        		'positif' => $perusahaan_grab[0],
        		'negatif' => $perusahaan_grab[1],
        		'netral' => $perusahaan_grab[2],
        		'ranking' => $perusahaan_grab[4]
        	]        	       
        ];

        $ranks = $this->array_sort($nilai, 'ranking', SORT_DESC);
        return view ('rankgrab' )->withRanks ( $ranks );

    }

    public function RankingCategory(Request $request){
        $bulan = 10;
        $tahun = 2018;

        if($request->has('bulan')) {
            $bulan = $request->get('bulan');
        }
        if($request->has('tahun')) {
            $tahun = $request->get('tahun');
        }

        //  Start Getting Data about GOJEK  Category //
        $aplikasi_gojek[0]= Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_gojek[1] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_gojek[2] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($aplikasi_gojek[2] == 0){
            $aplikasi_gojek[3] = 0;
            $aplikasi_gojek[4] = 0;
        }else{
            $aplikasi_gojek[3] = round($aplikasi_gojek[0]/$aplikasi_gojek[2],2);
            $aplikasi_gojek[4] = round($aplikasi_gojek[1]/$aplikasi_gojek[2],2);
        }
        

        $harga_gojek[0] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_gojek[1] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_gojek[2] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($harga_gojek[2] == 0){
            $harga_gojek[3] = 0;
            $harga_gojek[4] = 0;
        }else{
            $harga_gojek[3] = round($harga_gojek[0]/$harga_gojek[2],2);
            $harga_gojek[4] = round($harga_gojek[1]/$harga_gojek[2],2);
        }
       

        $driver_gojek[0] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_gojek[1] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_gojek[2] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($driver_gojek[2] == 0){
            $driver_gojek[3] = 0;
            $driver_gojek[4] = 0;
        }else{
            $driver_gojek[3] = round($driver_gojek[0]/$driver_gojek[2],2);
            $driver_gojek[4] = round($driver_gojek[1]/$driver_gojek[2],2);
        }


        $penumpang_gojek[0] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_gojek[1] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_gojek[2] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($penumpang_gojek[2] == 0){
            $penumpang_gojek[3] = 0;
            $penumpang_gojek[4] = 0;
        }else{
            $penumpang_gojek[3] = round($penumpang_gojek[0]/$penumpang_gojek[2],2);
            $penumpang_gojek[4] = round($penumpang_gojek[1]/$penumpang_gojek[2],2);
        }
        

        $perusahaan_gojek[0] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_gojek[1] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_gojek[2] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
       
        if($perusahaan_gojek[2] == 0){
            $perusahaan_gojek[3] = 0;
            $perusahaan_gojek[4] = 0;
        }else{
            $perusahaan_gojek[3] = round($perusahaan_gojek[0]/$perusahaan_gojek[2],2);
            $perusahaan_gojek[4] = round($perusahaan_gojek[1]/$perusahaan_gojek[2],2);
        }
        //  END Getting Data about GOJEK  Category //


        //  Start Getting Data about GRAB  Category //

        $aplikasi_grab[0]= Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_grab[1]= Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $aplikasi_grab[2] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($aplikasi_grab[2] == 0){
            $aplikasi_grab[3] = 0;
            $aplikasi_grab[4] = 0;
        }else{
            $aplikasi_grab[3] = round($aplikasi_grab[0]/$aplikasi_grab[2],2);
            $aplikasi_grab[4] = round($aplikasi_grab[1]/$aplikasi_grab[2],2);
        }


        $harga_grab[0] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_grab[1] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $harga_grab[2] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($harga_grab[2] == 0){
            $harga_grab[3] = 0;
            $harga_grab[4] = 0;
        }else{
            $harga_grab[3] = round($harga_grab[0]/$harga_grab[2],2);
            $harga_grab[4] = round($harga_grab[1]/$harga_grab[2],2);
        }


        $driver_grab[0] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_grab[1] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $driver_grab[2] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($driver_grab[2] == 0){
            $driver_grab[3] = 0;
            $driver_grab[4] = 0;
        }else{
            $driver_grab[3] = round($driver_grab[0]/$driver_grab[2],2);
            $driver_grab[4] = round($driver_grab[1]/$driver_grab[2],2);
        }


        $penumpang_grab[0] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_grab[1] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $penumpang_grab[2] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','2')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($penumpang_grab[2] == 0){
            $penumpang_grab[3] = 0;
            $penumpang_grab[4] = 0;
        }else{
            $penumpang_grab[3] = round($penumpang_grab[0]/$penumpang_grab[2],2);
            $penumpang_grab[4] = round($penumpang_grab[1]/$penumpang_grab[2],2);
        }


        $perusahaan_grab[0] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_grab[1] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $perusahaan_grab[2] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        if($perusahaan_grab[2] == 0){
            $perusahaan_grab[3] = 0;
            $perusahaan_grab[4] = 0;
        }else{
            $perusahaan_grab[3] = round($perusahaan_grab[0]/$perusahaan_grab[2],2);
            $perusahaan_grab[4] = round($perusahaan_grab[1]/$perusahaan_grab[2],2);
        }
        //END Getting Data From Grab //


        $gojekArrayPos = [];
        $grabArrayPos = [];
        $gojekArrayNeg = [];
        $grabArrayNeg = [];
        array_push($gojekArrayPos, $aplikasi_gojek[3],$harga_gojek[3],$driver_gojek[3],$penumpang_gojek[3],$perusahaan_gojek[3]);
        array_push($grabArrayPos, $aplikasi_grab[3],$harga_grab[3],$driver_grab[3],$penumpang_grab[3],$perusahaan_grab[3]);
        array_push($gojekArrayNeg, $aplikasi_gojek[4],$harga_gojek[4],$driver_gojek[4],$penumpang_gojek[4],$perusahaan_gojek[4]);
        array_push($grabArrayNeg, $aplikasi_grab[4],$harga_grab[4],$driver_grab[4],$penumpang_grab[4],$perusahaan_grab[4]);

        $dataArray1 = []; //Array for Gojek Data Positif
        array_push($dataArray1, $gojekArrayPos);
        $dataArray2 = []; //Array for Grab Data Positif
        array_push($dataArray2, $grabArrayPos);
        $dataArray3 = []; //Array for Gojek Data Negatif
        array_push($dataArray3, $gojekArrayNeg);
        $dataArray4 = []; //Array for Grab Data Negatif
        array_push($dataArray4, $grabArrayNeg);


        $chartArray[0]["chart"] = array (
                "type" => "column" 
        );
        $chartArray[0]["credits"] = array (
                "enabled" => false 
        );
        $chartArray[0]["xAxis"] = array (
                "categories" => array () 
        );
        $categoryArray = array (
                'Aplikasi',
                'Harga',
                'Driver',
                'Penumpang',
                'Perusahaan'  
        );
        $chartArray[0]["xAxis"] = array (
                "categories" => $categoryArray 
        );
        $chartArray[0]["yAxis"] = array (
                "title" => array (
                        "text" => "Jumlah" 
                ) 
        );

        $chartArray[1] = $chartArray[0];
        $chartArray[0]["title"] = array (
                "text" => "Persentase Kategori Sentimen Positif" 
        );
        $chartArray[0]["tooltip"] = array (
                "valueSuffix" => " % data berlabel positif pada kategori ini" 
        );
        $chartArray[1]["title"] = array (
                "text" => "Persentase Kategori Sentimen Negatif" 
        );
        $chartArray[1]["tooltip"] = array (
                "valueSuffix" => " % data berlabel negatif pada kategori ini" 
        );
        for($i = 0; $i < count ( $dataArray1 ); $i ++)
            $chartArray[0]["series"] [] = array (
                    "data" => $dataArray1 [$i],
                    "name" => "Gojek" 
        );
        for($i = 0; $i < count ( $dataArray2 ); $i ++)
            $chartArray[0]["series"] [] = array (
                    "data" => $dataArray2 [$i],
                     "name" => "Grab" 
        );
        for($i = 0; $i < count ( $dataArray3 ); $i ++)
            $chartArray[1]["series"] [] = array (
                    "data" => $dataArray3 [$i],
                    "name" => "Gojek" 
        );
        for($i = 0; $i < count ( $dataArray4 ); $i ++)
            $chartArray[1]["series"] [] = array (
                    "data" => $dataArray4 [$i],
                     "name" => "Grab" 
        );
        return view ('rankingcat' )->withChartarray( $chartArray );
    }


    function array_sort($array, $on, $order=SORT_ASC)
	{
	    $new_array = array();
	    $sortable_array = array();

	    if (count($array) > 0) {
	        foreach ($array as $k => $v) {
	            if (is_array($v)) {
	                foreach ($v as $k2 => $v2) {
	                    if ($k2 == $on) {
	                        $sortable_array[$k] = $v2;
	                    }
	                }
	            } else {
	                $sortable_array[$k] = $v;
	            }
	        }

	        switch ($order) {
	            case SORT_ASC:
	                asort($sortable_array);
	            break;
	            case SORT_DESC:
	                arsort($sortable_array);
	            break;
	        }

	        foreach ($sortable_array as $k => $v) {
	            $new_array[$k] = $array[$k];
	        }
	    }

	    return $new_array;
	}
}