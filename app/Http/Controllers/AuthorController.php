<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create1(Request $request) {
        $file = "anggota1.json";
        $total = "total.txt";
        if(!file_exists($file)){
            $jsonfile = json_encode($request->json()->all(), JSON_PRETTY_PRINT);
            $totalfile = json_encode(1, JSON_PRETTY_PRINT);
            file_put_contents($file, $jsonfile);
            file_put_contents($total, $totalfile);
        } else {
            /*$anggota = file_get_contents($file);
            $data = json_decode($anggota, true);
            array_push($data, $request->json()->all());
            $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('anggota1.json', $jsonfile);*/
            $totalfile = file_get_contents($total);
            $totalfile = json_decode($totalfile, true);
            $totalfile += 1;
            $file = "anggota" . $totalfile . ".json";
            $jsonfile = json_encode($request->json()->all(), JSON_PRETTY_PRINT);
            $totalfile = json_encode($totalfile, JSON_PRETTY_PRINT);
            file_put_contents($file, $jsonfile);
            file_put_contents($total, $totalfile);        
        }
        return $jsonfile;
    }

    public function get1($id) {
        $total = "total.txt";
        $totalfile = file_get_contents($total);
        $totalfile = json_decode($totalfile, true);
        $data = null; $str = ""; $str1 = ""; $crap = "";
        for($i=1;$i<=$totalfile;$i++) {
            $file = "anggota". $i . ".json";
            if(file_exists($file)){
            $anggota = file_get_contents($file);
            $data = json_decode($anggota,true);
            foreach ($data as $d) {
                $str1 = json_encode($d['id']);
                for ($j=1;$j<strlen($str1)-1;$j++)
                    $crap .= $str1[$j];
                if ($crap == $id) 
                    return $data;
                $crap = "";
            }
            //$crap = "";
            } else $totalfile++;
        //$str .= json_encode($data['data'], JSON_PRETTY_PRINT);

        //return $str;
        //return response()->json(Author::all());
        }
        return "failed";
    }

    public function getAll() {
        $total = "total.txt";
        $totalfile = file_get_contents($total);
        $totalfile = json_decode($totalfile, true);
        $data = null; $str = ""; $str1 = ""; $crap = "";
        for($i=1;$i<=$totalfile;$i++) {
            $file = "anggota". $i . ".json";
            if(file_exists($file)){
            $anggota = file_get_contents($file);
            $data = json_decode($anggota,true);
            $str .= json_encode($data['data'], JSON_PRETTY_PRINT);
        } else $totalfile++;

        //return $str;
        //return response()->json(Author::all());
        }
        return $str;
    }

    public function delete1($id) {
        $total = "total.txt";
        $totalfile = file_get_contents($total);
        $totalfile = json_decode($totalfile, true);
        $data = null; $str = ""; $str1 = ""; $crap = "";
        for($i=1;$i<=$totalfile;$i++) {
            $file = "anggota". $i . ".json";
            if(file_exists($file)) {
                $anggota = file_get_contents($file);
                $data = json_decode($anggota,true);
                foreach ($data as $d) {
                    $str1 = json_encode($d['id']);
                    for ($j=1;$j<strlen($str1)-1;$j++)
                        $crap .= $str1[$j];
                    if ($crap == $id) {
                        if (unlink($file)) {
                            $totalfile -= 1;
                            file_put_contents($total, $totalfile);
                            return "delete successfull";
                        }
                    }
                    $crap = "";
            //$crap = "";
                }
            } else $totalfile++;
        }
    }

    public function update1($id, Request $request) {
        $total = "total.txt";
        $totalfile = file_get_contents($total);
        $totalfile = json_decode($totalfile, true);
        $data = null; $str = ""; $str1 = ""; $crap = "";
        for($i=1;$i<=$totalfile;$i++) {
            $file = "anggota". $i . ".json";
            if(file_exists($file)) {
            $anggota = file_get_contents($file);
            $data = json_decode($anggota,true);
            foreach ($data as $d) {
                $str1 = json_encode($d['id']);
                for ($j=1;$j<strlen($str1)-1;$j++)
                    $crap .= $str1[$j];
                if ($crap == $id) {
                    $jsonfile = json_encode($request->json()->all(), JSON_PRETTY_PRINT);
                    file_put_contents($file, $jsonfile);
                    return $jsonfile;
                }
                $crap = "";
            //$crap = "";
            }
        } else $totalfile++;
    }
    return "id not found";
}
}