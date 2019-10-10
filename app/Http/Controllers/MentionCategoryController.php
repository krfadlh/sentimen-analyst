<?php
namespace App\Http\Controllers;
use App\Opinions;
use Illuminate\Http\Request;

class MentionCategoryController extends Controller {
    public function categoryChart(Request $request) {
        $category = 'all';

        if($request->has('category')) {
            $category = $request->get('category');
        }

        if($category == 'all'){
            return redirect('/allcategory-chart');
        }

        $categori = [];
        $dataArray = [];
        // dd($category);
    
        if( $category=="aplikasi"){
            $tahun_a=2018;
            $i_a=1;
            $aplikasi_gojek= [];
            $aplikasi_grab = [];
            $categori[0] = "aplikasi gojek";
            $categori[1] = "aplikasi grab";
            for($bulan=0;$bulan<9;$bulan++){
                if($bulan+10>12){
                    $tahun_a=2019;
                    $bum[$i_a] = str_pad($i_a,2,'0',STR_PAD_LEFT);
                    $aplikasi_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')
                                ->whereMonth('create_at', $bum[$i_a])->whereYear('create_at',$tahun_a)
                                ->get ()->count();
                    $aplikasi_grab[$bulan] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')
                                ->whereMonth('create_at', $bum[$i_a])->whereYear('create_at',$tahun_a)
                                ->get ()->count();
                                $i_a++;
                }else{
                    $aplikasi_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_a)
                                ->get ()->count();
                    $aplikasi_grab[$bulan] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_a)
                                ->get ()->count();
                }
                    
            }
        array_push ( $dataArray, $aplikasi_gojek, $aplikasi_grab);
        }

        if ($category=="harga") {
            $tahun_h = 2018;
            $i_h=1;
            $harga_gojek= [];
            $harga_grab = [];
            $categori[2] = "harga gojek";
            $categori[3] = "harga grab";
            for($bulan=0;$bulan<9;$bulan++){
                if($bulan+10>12){
                    $tahun_h=2019;
                    $bum[$i_h] = str_pad($i_h,2,'0',STR_PAD_LEFT);
                    $harga_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')
                                ->whereMonth('create_at', $bum[$i_h])->whereYear('create_at',$tahun_h)
                                ->get ()->count();
                    $harga_grab[$bulan] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')
                                ->whereMonth('create_at', $bum[$i_h])->whereYear('create_at',$tahun_h)
                                ->get ()->count();
                                $i_h++;
                }else{
                    $harga_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_h)
                                ->get ()->count();
                    $harga_grab[$bulan] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_h)
                                ->get ()->count();
                }
                    
            }
        array_push ( $dataArray, $harga_gojek, $harga_grab);
        }

        if ($category=="driver") {
            $tahun_d = 2018;
            $i_d=1;
            $driver_gojek= [];
            $driver_grab = [];
            $categori[4] = "driver gojek";
            $categori[5] = "driver grab";
            for($bulan=0;$bulan<9;$bulan++){
                if($bulan+10>12){
                    $tahun_d=2019;
                    $bum[$i_d] = str_pad($i_d,2,'0',STR_PAD_LEFT);
                    $driver_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')
                                ->whereMonth('create_at', $bum[$i_d])->whereYear('create_at',$tahun_d)
                                ->get ()->count();
                    $driver_grab[$bulan] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')
                                ->whereMonth('create_at', $bum[$i_d])->whereYear('create_at',$tahun_d)
                                ->get ()->count();
                                $i_d++;
                }else{
                    $driver_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_d)
                                ->get ()->count();
                    $driver_grab[$bulan] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_d)
                                ->get ()->count();
                }
                    
            }
        array_push ( $dataArray, $driver_gojek, $driver_grab);
        }

        if ($category=="penumpang") {
            $tahun_cust = 2018;
            $i_cust=1;
            $penumpang_gojek= [];
            $penumpang_grab = [];
            $categori[6] = "penumpang gojek";
            $categori[7] = "penumpang grab";
            for($bulan=0;$bulan<9;$bulan++){
                if($bulan+10>12){
                    $tahun_cust=2019;
                    $bum[$i_cust] = str_pad($i_cust,2,'0',STR_PAD_LEFT);
                    $penumpang_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','1')
                                ->whereMonth('create_at', $bum[$i_cust])->whereYear('create_at',$tahun_cust)
                                ->get ()->count();
                    $penumpang_grab[$bulan] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','2')
                                ->whereMonth('create_at', $bum[$i_cust])->whereYear('create_at',$tahun_cust)
                                ->get ()->count();
                                $i_cust++;
                }else{
                    $penumpang_gojek[$bulan] = Opinions::select('*')->where('cat_result','penumpang')->where('id_object','1')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_cust)
                                ->get ()->count();
                    $penumpang_grab[$bulan] = Opinions::select('*')->where('cat_result','penumpang')->where('id_object','2')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_cust)
                                ->get ()->count();
                }
                    
            }
        array_push ( $dataArray, $penumpang_gojek, $penumpang_grab);
        }

        if ($category=="perusahaan") {
            $tahun_comp = 2018;
            $i_comp=1;
            $perusahaan_gojek= [];
            $perusahaan_grab = [];
            $categori[8] = "perusahaan gojek";
            $categori[9] = "perusahaan grab";
            for($bulan=0;$bulan<9;$bulan++){
                if($bulan+10>12){
                    $tahun_comp=2019;
                    $bum[$i_comp] = str_pad($i_comp,2,'0',STR_PAD_LEFT);
                    $perusahaan_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')
                                ->whereMonth('create_at', $bum[$i_comp])->whereYear('create_at',$tahun_comp)
                                ->get ()->count();
                    $perusahaan_grab[$bulan] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')
                                ->whereMonth('create_at', $bum[$i_comp])->whereYear('create_at',$tahun_comp)
                                ->get ()->count();
                                $i_comp++;
                }else{
                    $perusahaan_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_comp)
                                ->get ()->count();
                    $perusahaan_grab[$bulan] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_comp)
                                ->get ()->count();
                }
                    
            }
        array_push ( $dataArray, $perusahaan_gojek, $perusahaan_grab);
        }

        $label[0] = "Gojek" ;
        $label[1] = "Grab";

        $chartArray ["chart"] = array (
                "type" => "spline" 
        );
        $chartArray ["title"] = array (
                "text" => "Jumlah Mention per Kategori" 
        );
        $chartArray ["credits"] = array (
                "enabled" => false 
        );
        $chartArray ["xAxis"] = array (
                "categories" => array () 
        );
        $chartArray ["tooltip"] = array (
                "valueSuffix" => " Mention Tentang Kategori Ini" 
        );
        
        $categoryArray = array (
                'Oktober 2018',
                'November 2018',
                'Desember 2018',
                'Januari 2019',
                'Februari 2019',
                'Maret 2019',
                'April 2019',
                'Mei 2019'   
        );
        
        for($i = 0; $i < count ( $dataArray ); $i ++)
            $chartArray ["series"] [] = array (
                    "data" => $dataArray [$i], 
                    "name" => $label[$i]
        );
        $chartArray ["xAxis"] = array (
                "categories" => $categoryArray 
        );
        $chartArray ["yAxis"] = array (
                "title" => array (
                        "text" => "Jumlah" 
                ) 
        );
        return view ('categorychart' )->withChartarray ( $chartArray );
    }
    public function allCategory(){
        $label[0] = "Aplikasi";
        $label[1] = "Harga";
        $label[2] = "Driver";
        $label[3] = "Penumpang";
        $label[4] = "Perusahaan";
        $gojekArray = [];
        $grabArray = [];
    
        $tahun_a=2018;
        $i_a=1;
        $aplikasi_gojek= [];
        $aplikasi_grab = [];
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_a=2019;
                $bum[$i_a] = str_pad($i_a,2,'0',STR_PAD_LEFT);
                $aplikasi_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')
                            ->whereMonth('create_at', $bum[$i_a])->whereYear('create_at',$tahun_a)
                            ->get ()->count();
                $aplikasi_grab[$bulan] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')
                            ->whereMonth('create_at', $bum[$i_a])->whereYear('create_at',$tahun_a)
                            ->get ()->count();
                            $i_a++;
            }else{
                $aplikasi_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','1')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_a)
                            ->get ()->count();
                $aplikasi_grab[$bulan] = Opinions::select('*')->where('cat_result', 'aplikasi')->where('id_object','2')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_a)
                            ->get ()->count();
            }
                
        }

        $tahun_h = 2018;
        $i_h=1;
        $harga_gojek= [];
        $harga_grab = [];
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_h=2019;
                $bum[$i_h] = str_pad($i_h,2,'0',STR_PAD_LEFT);
                $harga_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')
                            ->whereMonth('create_at', $bum[$i_h])->whereYear('create_at',$tahun_h)
                            ->get ()->count();
                $harga_grab[$bulan] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')
                            ->whereMonth('create_at', $bum[$i_h])->whereYear('create_at',$tahun_h)
                            ->get ()->count();
                            $i_h++;
            }else{
                $harga_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','1')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_h)
                            ->get ()->count();
                $harga_grab[$bulan] = Opinions::select('*')->where('cat_result', 'harga')->where('id_object','2')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_h)
                            ->get ()->count();
            }
                
        }
       
        $tahun_d = 2018;
        $i_d=1;
        $driver_gojek= [];
        $driver_grab = [];
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_d=2019;
                $bum[$i_d] = str_pad($i_d,2,'0',STR_PAD_LEFT);
                $driver_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')
                            ->whereMonth('create_at', $bum[$i_d])->whereYear('create_at',$tahun_d)
                            ->get ()->count();
                $driver_grab[$bulan] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')
                            ->whereMonth('create_at', $bum[$i_d])->whereYear('create_at',$tahun_d)
                            ->get ()->count();
                            $i_d++;
            }else{
                $driver_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','1')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_d)
                            ->get ()->count();
                $driver_grab[$bulan] = Opinions::select('*')->where('cat_result', 'driver')->where('id_object','2')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_d)
                            ->get ()->count();
            }

        
        }

        $tahun_cust = 2018;
        $i_cust=1;
        $penumpang_gojek= [];
        $penumpang_grab = [];
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_cust=2019;
                $bum[$i_cust] = str_pad($i_cust,2,'0',STR_PAD_LEFT);
                $penumpang_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','1')
                            ->whereMonth('create_at', $bum[$i_cust])->whereYear('create_at',$tahun_cust)
                            ->get ()->count();
                $penumpang_grab[$bulan] = Opinions::select('*')->where('cat_result', 'penumpang')->where('id_object','2')
                            ->whereMonth('create_at', $bum[$i_cust])->whereYear('create_at',$tahun_cust)
                            ->get ()->count();
                            $i_cust++;
            }else{
                $penumpang_gojek[$bulan] = Opinions::select('*')->where('cat_result','penumpang')->where('id_object','1')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_cust)
                            ->get ()->count();
                $penumpang_grab[$bulan] = Opinions::select('*')->where('cat_result','penumpang')->where('id_object','2')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_cust)
                            ->get ()->count();
            }
                
        }

        $tahun_comp = 2018;
        $i_comp=1;
        $perusahaan_gojek= [];
        $perusahaan_grab = [];
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_comp=2019;
                $bum[$i_comp] = str_pad($i_comp,2,'0',STR_PAD_LEFT);
                $perusahaan_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')
                            ->whereMonth('create_at', $bum[$i_comp])->whereYear('create_at',$tahun_comp)
                            ->get ()->count();
                $perusahaan_grab[$bulan] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')
                            ->whereMonth('create_at', $bum[$i_comp])->whereYear('create_at',$tahun_comp)
                            ->get ()->count();
                            $i_comp++;
            }else{
                $perusahaan_gojek[$bulan] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','1')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_comp)
                            ->get ()->count();
                $perusahaan_grab[$bulan] = Opinions::select('*')->where('cat_result', 'perusahaan')->where('id_object','2')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_comp)
                            ->get ()->count();
            }
                
        }

        array_push ($gojekArray, $aplikasi_gojek, $harga_gojek, $driver_gojek, $penumpang_gojek, $perusahaan_gojek);
        
        array_push($grabArray, $aplikasi_grab, $harga_grab, $driver_grab, $penumpang_grab, $perusahaan_grab);


        $chartArray[0]["chart"] = array (
                "type" => "spline" 
        );
        $chartArray[0]["credits"] = array (
                "enabled" => false 
        );
        $chartArray[0]["xAxis"] = array (
                "categories" => array () 
        );
        $chartArray[0]["tooltip"] = array (
                "valueSuffix" => "Data" 
        );
        
        $categoryArray = array (
                'Oktober 2018',
                'November 2018',
                'Desember 2018',
                'Januari 2019',
                'Februari 2019',
                'Maret 2019',
                'April 2019',
                'Mei 2019'   
        );
        $chartArray[0]["xAxis"] = array (
                "categories" => $categoryArray 
        );
        $chartArray[0] ["yAxis"] = array (
                "title" => array (
                        "text" => "Jumlah" 
                ) 
        );
        $chartArray[1] = $chartArray[0];
        $chartArray[0]["title"] = array (
                "text" => "Grafik Gojek per Kategori" 
        );
        $chartArray[1]["title"] = array (
                "text" => "Grafik Grab per Kategori" 
        );
        for($i = 0; $i < count ( $gojekArray ); $i ++)
            $chartArray[0]["series"] [] = array (
                    "name" => $label[$i],
                    "data" => $gojekArray[$i] 
        );
        for($i = 0; $i < count ( $grabArray ); $i ++)
            $chartArray[1]["series"] [] = array (
                    "name" => $label[$i],
                    "data" => $grabArray[$i] 
        );
        // dd($chartArray);
        return view ('allcatchart' )->withChartarray ( $chartArray );

    }
}