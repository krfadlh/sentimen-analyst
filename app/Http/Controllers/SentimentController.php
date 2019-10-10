<?php
namespace App\Http\Controllers;
use App\Opinions;
use Illuminate\Http\Request;

class SentimentController extends Controller {
     public function PosSentimentChart() {
        $objek[0] = "Gojek";
        $objek[1] = "Grab";
        $gojek = [];
        $grab = [];
        $total_gojek = [];
        $total_grab = [];
        $temp_gojek = [];
        $temp_grab = [];


        $tahun_gojek = 2018;
        $i_gojek=1;
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_gojek=2019;
                $bum[$i_gojek] = str_pad($i_gojek,2,'0',STR_PAD_LEFT);
                $temp_gojek[$bulan] = Opinions::select('*')->where('id_object', '1')->where('sentiment','1')
                                ->whereMonth('create_at', $bum[$i_gojek])->whereYear('create_at',$tahun_gojek)
                                ->get ()->count();
                $total_gojek[$bulan] = Opinions::select('*')->where('id_object', '1')
                        ->whereMonth('create_at', $bum[$i_gojek])->whereYear('create_at',$tahun_gojek)
                        ->get ()->count();
                        $i_gojek++;

            }else{
                $temp_gojek[$bulan] = Opinions::select('*')->where('id_object', '1')->where('sentiment','1')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_gojek)
                                ->get ()->count();
                $total_gojek[$bulan] = Opinions::select('*')->where('id_object','1')
                        ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_gojek)
                        ->get ()->count();
                
            }

            if($total_gojek[$bulan] == 0){
                $gojek[$bulan] = 0;
            }else{
                $gojek[$bulan] = round($temp_gojek[$bulan] / $total_gojek[$bulan],2);
            }    
        }

        $tahun_grab = 2018;
        $i_grab=1;
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_grab=2019;
                $bum[$i_grab] = str_pad($i_grab,2,'0',STR_PAD_LEFT);
                $temp_grab[$bulan] = Opinions::select('*')->where('id_object', '2')->where('sentiment','1')
                                ->whereMonth('create_at', $bum[$i_grab])->whereYear('create_at',$tahun_grab)
                                ->get ()->count();
                $total_grab[$bulan] = Opinions::select('*')->where('id_object', '2')
                                ->whereMonth('create_at', $bum[$i_grab])->whereYear('create_at',$tahun_grab)
                                ->get ()->count();
                                $i_grab++;
            }else{
                $temp_grab[$bulan] = Opinions::select('*')->where('id_object', '2')->where('sentiment','1')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_grab)
                            ->get ()->count();
                $total_grab[$bulan] = Opinions::select('*')->where('id_object', '2')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_grab)
                            ->get ()->count();
               
            }
            
            if($total_grab[$bulan] == 0){
                $grab[$bulan] = 0;
            }else{
                $grab[$bulan] = round($temp_grab[$bulan] / $total_grab[$bulan],2);
            }   

        }

        $chartArray ["chart"] = array (
                "type" => "spline" 
        );
        $chartArray ["title"] = array (
                "text" => "Persentase Sentimen Positif" 
        );
        $chartArray ["credits"] = array (
                "enabled" => false 
        );
        $chartArray ["xAxis"] = array (
                "categories" => array () 
        );
        $chartArray ["tooltip"] = array (
                "valueSuffix" => " % Data adalah Sentimen Positif" 
        );
        
        $categoryArray = array (
                'Oktober 2018',
                'November 2018',
                'Desember 2018',
                'Januari 2019',
                'Februari 2019',
                'Maret 2019', 
                'April 2019',
                'Mei 2019',      
        );


        $dataArray = [ ];
        array_push ( $dataArray, $gojek, $grab );

        for($i = 0; $i < count ( $dataArray ); $i ++)
            $chartArray ["series"] [] = array (
                    "name" => $objek[$i],
                    "data" => $dataArray [$i] 
        );
        $chartArray ["xAxis"] = array (
                "categories" => $categoryArray 
        );
        $chartArray ["yAxis"] = array (
                "title" => array (
                        "text" => "Jumlah" 
                ) 
        );
        return view ('poschart' )->withChartarray( $chartArray );
    }
    public function NegSentimentChart() {
        $objek[0] = "Gojek";
        $objek[1] = "Grab";
        $gojek = [];
        $grab = [];

        $total_gojek = [];
        $total_grab = [];
        $temp_gojek = [];
        $temp_grab = [];


        $tahun_gojek = 2018;
        $i_gojek=1;
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_gojek=2019;
                $bum[$i_gojek] = str_pad($i_gojek,2,'0',STR_PAD_LEFT);
                $temp_gojek[$bulan] = Opinions::select('*')->where('id_object', '1')->where('sentiment','-1')
                                ->whereMonth('create_at', $bum[$i_gojek])->whereYear('create_at',$tahun_gojek)
                                ->get ()->count();
                $total_gojek[$bulan] = Opinions::select('*')->where('id_object', '1')
                        ->whereMonth('create_at', $bum[$i_gojek])->whereYear('create_at',$tahun_gojek)
                        ->get ()->count();
                        $i_gojek++;

            }else{
                $temp_gojek[$bulan] = Opinions::select('*')->where('id_object', '1')->where('sentiment','-1')
                                ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_gojek)
                                ->get ()->count();
                $total_gojek[$bulan] = Opinions::select('*')->where('id_object','1')
                        ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_gojek)
                        ->get ()->count();
                
            }

            if($total_gojek[$bulan] == 0){
                $gojek[$bulan] = 0;
            }else{
                $gojek[$bulan] = round($temp_gojek[$bulan] / $total_gojek[$bulan],2);
            }    
        }
        
        $tahun_grab = 2018;
        $i_grab=1;
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_grab=2019;
                $bum[$i_grab] = str_pad($i_grab,2,'0',STR_PAD_LEFT);
                $temp_grab[$bulan] = Opinions::select('*')->where('id_object', '2')->where('sentiment','-1')
                                ->whereMonth('create_at', $bum[$i_grab])->whereYear('create_at',$tahun_grab)
                                ->get ()->count();
                $total_grab[$bulan] = Opinions::select('*')->where('id_object', '2')
                                ->whereMonth('create_at', $bum[$i_grab])->whereYear('create_at',$tahun_grab)
                                ->get ()->count();
                                $i_grab++;
            }else{
                $temp_grab[$bulan] = Opinions::select('*')->where('id_object', '2')->where('sentiment','-1')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_grab)
                            ->get ()->count();
                $total_grab[$bulan] = Opinions::select('*')->where('id_object', '2')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_grab)
                            ->get ()->count();
               
            }
            
            if($total_grab[$bulan] == 0){
                $grab[$bulan] = 0;
            }else{
                $grab[$bulan] = round($temp_grab[$bulan] / $total_grab[$bulan],2);
            }   

        }

        $chartArray ["chart"] = array (
                "type" => "spline" 
        );
        $chartArray ["title"] = array (
                "text" => "Persentase Sentimen Negatif" 
        );
        $chartArray ["credits"] = array (
                "enabled" => false 
        );
        $chartArray ["xAxis"] = array (
                "categories" => array () 
        );
        $chartArray ["tooltip"] = array (
                "valueSuffix" => " % Data adalah Sentimen Negatif" 
        );
        $categoryArray = array (
                'Oktober 2018',
                'November 2018',
                'Desember 2018',
                'Januari 2019',
                'Februari 2019',
                'Maret 2019', 
                'April 2019',
                'Mei 2019',
        );
        $dataArray = [ ];
        array_push ( $dataArray, $gojek, $grab );

        for($i = 0; $i < count ( $dataArray ); $i ++)
            $chartArray ["series"] [] = array (
                    "name" => $objek[$i],
                    "data" => $dataArray [$i] 
        );
        $chartArray ["xAxis"] = array (
                "categories" => $categoryArray 
        );
        $chartArray ["yAxis"] = array (
                "title" => array (
                        "text" => "Jumlah" 
                ) 
        );
        return view ('negchart' )->withChartarray( $chartArray );
    }
    public function JumlahData() {
        $objek[0] = "Gojek";
        $objek[1] = "Grab";
        $gojek = [];
        $grab = [];


        $tahun_gojek = 2018;
        $i_gojek=1;
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_gojek=2019;
                $bum[$i_gojek] = str_pad($i_gojek,2,'0',STR_PAD_LEFT);
                $gojek[$bulan] = Opinions::select('*')->where('id_object', '1')
                        ->whereMonth('create_at', $bum[$i_gojek])->whereYear('create_at',$tahun_gojek)
                        ->get ()->count();
                        $i_gojek++;

            }else{
                $gojek[$bulan] = Opinions::select('*')->where('id_object','1')
                        ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_gojek)
                        ->get ()->count();
                
            } 
        }

        $tahun_grab = 2018;
        $i_grab=1;
        for($bulan=0;$bulan<9;$bulan++){
            if($bulan+10>12){
                $tahun_grab=2019;
                $bum[$i_grab] = str_pad($i_grab,2,'0',STR_PAD_LEFT);
                $grab[$bulan] = Opinions::select('*')->where('id_object', '2')
                                ->whereMonth('create_at', $bum[$i_grab])->whereYear('create_at',$tahun_grab)
                                ->get ()->count();
                                $i_grab++;
            }else{
                $grab[$bulan] = Opinions::select('*')->where('id_object', '2')
                            ->whereMonth('create_at', $bulan+10)->whereYear('create_at',$tahun_grab)
                            ->get ()->count();
               
            }
        }

        $chartArray ["chart"] = array (
                "type" => "area",
        );
        $chartArray ["title"] = array (
                "text" => "Jumlah Data Yang Masuk Setiap Perusahaan",
        );
        $chartArray ["credits"] = array (
                "enabled" => false 
        );
        $chartArray ["xAxis"] = array (
                "categories" => array () 
        );
        $chartArray ["tooltip"] = array (
                "valueSuffix" => " Tweet" 
        );
        
        $categoryArray = array (
                'Oktober 2018',
                'November 2018',
                'Desember 2018',
                'Januari 2019',
                'Februari 2019',
                'Maret 2019', 
                'April 2019',
                'Mei 2019',       
        );

        $dataArray = [ ];
        array_push ( $dataArray, $gojek, $grab );

        for($i = 0; $i < count ( $dataArray ); $i ++)
            $chartArray ["series"] [] = array (
                    "name" => $objek[$i],
                    "data" => $dataArray [$i] 
        );
        $chartArray ["xAxis"] = array (
                "categories" => $categoryArray 
        );
        $chartArray ["yAxis"] = array (
                "title" => array (
                        "text" => "Jumlah" 
                ) 
        );
        return view ('jumlah_data' )->withChartarray( $chartArray );
    }

    public function RankingSentiment(Request $request){
        $bulan = 10;
        $tahun = 2018;
        $miu= 0.5;

        if($request->has('bulan')) {
            $bulan = $request->get('bulan');
        }
        if($request->has('tahun')) {
            $tahun = $request->get('tahun');
        }

        //  Start Getting Data about GOJEK  //

        $gojek[0]= Opinions::select('*')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $gojek[1] = Opinions::select('*')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $gojek[2] = Opinions::select('*')->where('id_object','1')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $gojek[3] = $gojek[0] + $gojek[1] + $gojek[2];

        $gojek_temp = ($gojek[0]/$gojek[1])-($gojek[2]/$gojek[3]*$miu);

        $gojek[4] = round($gojek_temp,2);

        //  END Getting Data about GOJEK  //


        //  Start Getting Data about GRAB  Category //

        $grab[0]= Opinions::select('*')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $grab[1] = Opinions::select('*')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $grab[2] = Opinions::select('*')->where('id_object','2')->where('sentiment', '0')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ()->count();
        $grab[3] = $grab[0] + $grab[1] + $grab[2];
        $grab[5] = ($grab[0]/$grab[1])-($grab[2]/$grab[3]*$miu);
        $grab[4] = round($grab[5],2);


        $tempArray = [];
        array_push($tempArray, $gojek[4],$grab[4]);

        $dataArray = []; 
        array_push($dataArray, $tempArray);

        $chartArray["chart"] = array (
                "type" => "column" 
        );
        $chartArray["credits"] = array (
                "enabled" => false 
        );
        $chartArray["xAxis"] = array (
                "categories" => array () 
        );
        $chartArray["tooltip"] = array (
                "valueSuffix" => " Data Berlabel positif Pada Perusahaan Ini" 
        );
        $companyArray = array (
                'Gojek',
                'Grab'
        );
        $chartArray["xAxis"] = array (
                "categories" => $companyArray 
        );
        $chartArray["yAxis"] = array (
                "title" => array (
                        "text" => "Jumlah" 
                ) 
        );
        $chartArray["title"] = array (
                "text" => "Ranking Perusahaan Terpositif" 
        );
        for($i = 0; $i < count ( $dataArray ); $i ++)
            $chartArray["series"] [] = array (
                    "data" => $dataArray [$i] 
        );
        return view ('rankingsent' )->withChartarray( $chartArray );
    }

}
