<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function jsonProvider() {
        return '{
          "data": {
            "attributes": {
              "object_domain": "contact",
              "object_id": "1",
              "due": "2019-01-25T07:50:14+00:00",
              "urgency": 1,
              "description": "Need to verify this guy house.",
              "items": [
              "Visit his house",
              "Capture a photo",
              "Meet him on the house"
              ],
              "task_id": "123"
          }
      }
  }';
}

/**
     * @dataProvider jsonProvider
     */

public function testCreate1(Request $request) {
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
        $this->assertEquals($jsonfile);
    }


    public function jsonId() {
        return "1558";
    }

/**
     * @dataProvider jsonId
     */

    public function testGet1($id) {
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
        $this->assertEquals($str1);
    }

/**
     * @dataProvider jsonId
     */

    public function testDelete1($id) {
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
        $this->assertEquals($id);
    }

     public function jsonUpdate() {
       return '1445, "data": {
            "attributes": {
              "object_domain": "contact",
              "object_id": "1",
              "due": "2019-01-25T07:50:14+00:00",
              "urgency": 1,
              "description": "Need to verify this guy house.",
              "items": [
              "Visit his house",
              "Capture a photo",
              "Meet him on the house"
              ],
              "task_id": "123"
          }
      }
  }';
   }

/**
     * @dataProvider jsonUpdate
     */

    public function testUpdate1($id, $request) {
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

    /*public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }*/
}
