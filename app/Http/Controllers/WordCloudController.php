<?php

namespace App\Http\Controllers;
use App\Opinions;
use Illuminate\Http\Request;

class WordCloudController extends Controller
{
    public function GojekWordCloud(Request $request){
        $bulan = 10;
        $tahun = 2018;

        if($request->has('bulan')) {
            $bulan = $request->get('bulan');
        }
        if($request->has('tahun')) {
            $tahun = $request->get('tahun');
        }
        // START GETTING DATA FROM  DRIVER GOJEK//
        $gojek[0]= Opinions::select('preprocess')->where('cat_result', 'driver')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ();
        $gojek[1] = Opinions::select('preprocess')->where('cat_result', 'driver')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ();
        //--------------------------------------//

        // START GETTING DATA FROM  PENUMPANG GOJEK//
        $gojek[2]= Opinions::select('preprocess')->where('cat_result', 'penumpang')->where('id_object','1')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ();
        $gojek[3] = Opinions::select('preprocess')->where('cat_result', 'penumpang')->where('id_object','1')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ();
        //--------------------------------------//

        /*INITIALIZATION ARRAY FOR ALL GOJEK's DRIVER CATEGORY
        Array index 0 = Driver Positif
        Array index 1= Driver Negatif
        Array index 2 = Penumpang Positif
        Array index 3 = Penumpang Negatif
        */

        $words_gojek = [];
        $word_count_gojek = [];
        $wordcloud_gojek = [];
        //----------------------------------------------//

        //START ASSIGNING ARRAY FOR GOJEK DRIVER POSITIVE //
        $words_gojek[0] = [];
        foreach($gojek[0] as $word) {
            $preprocess = str_replace("',',", '', $word->preprocess);
            $preprocess = str_replace("'.',", '', $preprocess);
            $preprocess = str_replace("'#',", '', $preprocess);
            $preprocess = str_replace('\'', '"', $preprocess);
            $words_gojek[0] = array_merge($words_gojek[0], json_decode($preprocess, true));
        }

        $word_count_gojek[0] = [];
        foreach ($words_gojek[0] as $word) {
            if($word != '.') {
                if(array_key_exists($word, $word_count_gojek[0])) {
                    $word_count_gojek[0][$word]++;
                } else {
                    $word_count_gojek[0][$word] = 1;
                }
            }
        }
        //END ASSIGNING ARRAY FOR GOJEK DRIVER POSITIVE //


        //START ASSIGNING ARRAY FOR GOJEK DRIVER NEGATIVE //
        $words_gojek[1] = [];
        foreach($gojek[1] as $word) {
            $preprocess = str_replace("',',", '', $word->preprocess);
            $preprocess = str_replace("'.',", '', $preprocess);
            $preprocess = str_replace("'#',", '', $preprocess);
            $preprocess = str_replace('\'', '"', $preprocess);
            $words_gojek[1] = array_merge($words_gojek[1], json_decode($preprocess, true));
        }

        $word_count_gojek[1] = [];
        foreach ($words_gojek[1] as $word) {
            if($word != '.') {
                if(array_key_exists($word, $word_count_gojek[1])) {
                    $word_count_gojek[1][$word]++;
                } else {
                    $word_count_gojek[1][$word] = 1;
                }
            }
        }

        //FILTER KATA DRIVER YANG SAMA DI POS DAN NEG
        foreach ($word_count_gojek[0] as $keyPos => $valuePos) {
            foreach ($word_count_gojek[1] as $keyNeg => $valueNeg) {
                if($keyPos == $keyNeg){
                    unset($word_count_gojek[0][$keyPos]);
                    unset($word_count_gojek[1][$keyNeg]);
                }
            }
        }

        arsort($word_count_gojek[0]);
        $word_count_gojek[0] = array_slice($word_count_gojek[0], 0, 25);
        
        $wordcloud_gojek[0] = [];
        foreach ($word_count_gojek[0] as $key => $value) {
            $wordcloud_gojek[0][] = [
                'name' => $key,
                'weight' => $value
            ];
        }

        arsort($word_count_gojek[1]);
        $word_count_gojek[1] = array_slice($word_count_gojek[1], 0, 25);
        
        $wordcloud_gojek[1] = [];
        foreach ($word_count_gojek[1] as $key => $value) {
            $wordcloud_gojek[1][] = [
                'name' => $key,
                'weight' => $value
            ];
        }
        //END ASSIGNING ARRAY FOR GOJEK DRIVER NEGATIVE //

        //START ASSIGNING ARRAY FOR GOJEK PENUMPANG POSITIVE //
        $words_gojek[2] = [];
        foreach($gojek[2] as $word) {
            $preprocess = str_replace("',',", '', $word->preprocess);
            $preprocess = str_replace("'.',", '', $preprocess);
            $preprocess = str_replace("'#',", '', $preprocess);
            $preprocess = str_replace('\'', '"', $preprocess);
            $words_gojek[2] = array_merge($words_gojek[2], json_decode($preprocess, true));
        }

        $word_count_gojek[2] = [];
        foreach ($words_gojek[2] as $word) {
            if($word != '.') {
                if(array_key_exists($word, $word_count_gojek[2])) {
                    $word_count_gojek[2][$word]++;
                } else {
                    $word_count_gojek[2][$word] = 1;
                }
            }
        }
        //END ASSIGNING ARRAY FOR GOJEK PENUMPANG POSITIVE //

        // START ASSIGNING ARRAY FOR GOJEK PENUMPANG NEGATIVE //
        $words_gojek[3] = [];
        foreach($gojek[3] as $word) {
            $preprocess = str_replace("',',", '', $word->preprocess);
            $preprocess = str_replace("'.',", '', $preprocess);
            $preprocess = str_replace("'#',", '', $preprocess);
            $preprocess = str_replace('\'', '"', $preprocess);
            $words_gojek[3] = array_merge($words_gojek[3], json_decode($preprocess, true));
        }

        $word_count_gojek[3] = [];
        foreach ($words_gojek[3] as $word) {
            if($word != '.') {
                if(array_key_exists($word, $word_count_gojek[3])) {
                    $word_count_gojek[3][$word]++;
                } else {
                    $word_count_gojek[3][$word] = 1;
                }
            }
        }

        //FILTER KATA DRIVER YANG SAMA DI POS DAN NEG
        foreach ($word_count_gojek[2] as $keyPos => $valuePos) {
            foreach ($word_count_gojek[3] as $keyNeg => $valueNeg) {
                if($keyPos == $keyNeg){
                    unset($word_count_gojek[2][$keyPos]);
                    unset($word_count_gojek[3][$keyNeg]);
                }
            }
        }

        arsort($word_count_gojek[2]);
        $word_count_gojek[2] = array_slice($word_count_gojek[2], 0, 25);
        
        $wordcloud_gojek[2] = [];
        foreach ($word_count_gojek[2] as $key => $value) {
            $wordcloud_gojek[2][] = [
                'name' => $key,
                'weight' => $value
            ];
        }

        arsort($word_count_gojek[3]);
        $word_count_gojek[3] = array_slice($word_count_gojek[3], 0, 25);
        
        $wordcloud_gojek[3] = [];
        foreach ($word_count_gojek[3] as $key => $value) {
            $wordcloud_gojek[3][] = [
                'name' => $key,
                'weight' => $value
            ];
        }
        //END ASSIGNING ARRAY FOR GOJEK PENUMPANG NEGATIVE //

        return view ('gojekwordcloud' )->withWordcloud($wordcloud_gojek);
    }
    public function GrabWordCloud(Request $request){
        $bulan = 10;
        $tahun = 2018;

        if($request->has('bulan')) {
            $bulan = $request->get('bulan');
        }
        if($request->has('tahun')) {
            $tahun = $request->get('tahun');
        }
        // START GETTING DATA FROM  DRIVER grab//
        $grab[0]= Opinions::select('preprocess')->where('cat_result', 'driver')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ();
        $grab[1] = Opinions::select('preprocess')->where('cat_result', 'driver')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ();
        //--------------------------------------//

        // START GETTING DATA FROM  PENUMPANG grab//
        $grab[2]= Opinions::select('preprocess')->where('cat_result', 'penumpang')->where('id_object','2')->where('sentiment', '1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ();
        $grab[3] = Opinions::select('preprocess')->where('cat_result', 'penumpang')->where('id_object','2')->where('sentiment', '-1')
                                ->whereMonth('create_at', $bulan)->whereYear('create_at',$tahun)
                                ->get ();
        //--------------------------------------//

        /*INITIALIZATION ARRAY FOR ALL grab's DRIVER CATEGORY
        Array index 0 = Driver Positif
        Array index 1= Driver Negatif
        Array index 2 = Penumpang Positif
        Array index 3 = Penumpang Negatif
        */

        $words_grab = [];
        $word_count_grab = [];
        $wordcloud_grab = [];
        //----------------------------------------------//

        //START ASSIGNING ARRAY FOR grab DRIVER POSITIVE //
        $words_grab[0] = [];
        foreach($grab[0] as $word) {
            $preprocess = str_replace("',',", '', $word->preprocess);
            $preprocess = str_replace("'.',", '', $preprocess);
            $preprocess = str_replace("'#',", '', $preprocess);
            $preprocess = str_replace('\'', '"', $preprocess);
            $words_grab[0] = array_merge($words_grab[0], json_decode($preprocess, true));
        }

        $word_count_grab[0] = [];
        foreach ($words_grab[0] as $word) {
            if($word != '.') {
                if(array_key_exists($word, $word_count_grab[0])) {
                    $word_count_grab[0][$word]++;
                } else {
                    $word_count_grab[0][$word] = 1;
                }
            }
        }
        //END ASSIGNING ARRAY FOR grab DRIVER POSITIVE //


        //START ASSIGNING ARRAY FOR grab DRIVER NEGATIVE //
        $words_grab[1] = [];
        foreach($grab[1] as $word) {
            $preprocess = str_replace("',',", '', $word->preprocess);
            $preprocess = str_replace("'.',", '', $preprocess);
            $preprocess = str_replace("'#',", '', $preprocess);
            $preprocess = str_replace('\'', '"', $preprocess);
            $words_grab[1] = array_merge($words_grab[1], json_decode($preprocess, true));
        }

        $word_count_grab[1] = [];
        foreach ($words_grab[1] as $word) {
            if($word != '.') {
                if(array_key_exists($word, $word_count_grab[1])) {
                    $word_count_grab[1][$word]++;
                } else {
                    $word_count_grab[1][$word] = 1;
                }
            }
        }

        //FILTER KATA DRIVER YANG SAMA DI POS DAN NEG
        foreach ($word_count_grab[0] as $keyPos => $valuePos) {
            foreach ($word_count_grab[1] as $keyNeg => $valueNeg) {
                if($keyPos == $keyNeg){
                    unset($word_count_grab[0][$keyPos]);
                    unset($word_count_grab[1][$keyNeg]);
                }
            }
        }

        arsort($word_count_grab[0]);
        $word_count_grab[0] = array_slice($word_count_grab[0], 0, 25);
        
        $wordcloud_grab[0] = [];
        foreach ($word_count_grab[0] as $key => $value) {
            $wordcloud_grab[0][] = [
                'name' => $key,
                'weight' => $value
            ];
        }

        arsort($word_count_grab[1]);
        $word_count_grab[1] = array_slice($word_count_grab[1], 0, 25);
        
        $wordcloud_grab[1] = [];
        foreach ($word_count_grab[1] as $key => $value) {
            $wordcloud_grab[1][] = [
                'name' => $key,
                'weight' => $value
            ];
        }
        //END ASSIGNING ARRAY FOR grab DRIVER NEGATIVE //

        //START ASSIGNING ARRAY FOR grab PENUMPANG POSITIVE //
        $words_grab[2] = [];
        foreach($grab[2] as $word) {
            $preprocess = str_replace("',',", '', $word->preprocess);
            $preprocess = str_replace("'.',", '', $preprocess);
            $preprocess = str_replace("'#',", '', $preprocess);
            $preprocess = str_replace('\'', '"', $preprocess);
            $words_grab[2] = array_merge($words_grab[2], json_decode($preprocess, true));
        }

        $word_count_grab[2] = [];
        foreach ($words_grab[2] as $word) {
            if($word != '.') {
                if(array_key_exists($word, $word_count_grab[2])) {
                    $word_count_grab[2][$word]++;
                } else {
                    $word_count_grab[2][$word] = 1;
                }
            }
        }
        //END ASSIGNING ARRAY FOR grab PENUMPANG POSITIVE //

        // START ASSIGNING ARRAY FOR grab PENUMPANG NEGATIVE //
        $words_grab[3] = [];
        foreach($grab[3] as $word) {
            $preprocess = str_replace("',',", '', $word->preprocess);
            $preprocess = str_replace("'.',", '', $preprocess);
            $preprocess = str_replace("'#',", '', $preprocess);
            $preprocess = str_replace('\'', '"', $preprocess);
            $words_grab[3] = array_merge($words_grab[3], json_decode($preprocess, true));
        }

        $word_count_grab[3] = [];
        foreach ($words_grab[3] as $word) {
            if($word != '.') {
                if(array_key_exists($word, $word_count_grab[3])) {
                    $word_count_grab[3][$word]++;
                } else {
                    $word_count_grab[3][$word] = 1;
                }
            }
        }

        //FILTER KATA DRIVER YANG SAMA DI POS DAN NEG
        foreach ($word_count_grab[2] as $keyPos => $valuePos) {
            foreach ($word_count_grab[3] as $keyNeg => $valueNeg) {
                if($keyPos == $keyNeg){
                    unset($word_count_grab[2][$keyPos]);
                    unset($word_count_grab[3][$keyNeg]);
                }
            }
        }

        arsort($word_count_grab[2]);
        $word_count_grab[2] = array_slice($word_count_grab[2], 0, 25);
        
        $wordcloud_grab[2] = [];
        foreach ($word_count_grab[2] as $key => $value) {
            $wordcloud_grab[2][] = [
                'name' => $key,
                'weight' => $value
            ];
        }

        arsort($word_count_grab[3]);
        $word_count_grab[3] = array_slice($word_count_grab[3], 0, 25);
        
        $wordcloud_grab[3] = [];
        foreach ($word_count_grab[3] as $key => $value) {
            $wordcloud_grab[3][] = [
                'name' => $key,
                'weight' => $value
            ];
        }
        //END ASSIGNING ARRAY FOR grab PENUMPANG NEGATIVE //

        return view ('grabwordcloud' )->withWordcloud($wordcloud_grab);
    }
}