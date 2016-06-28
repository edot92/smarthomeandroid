<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProsesController extends Controller
{
    //
    //
    
       public function kirimSuhuWeb(Request $req){
$nilaiSuhu=$req->input('suhu');
			$filename = "suhu.txt";
			$fp = fopen($filename, 'w');
			$status=fwrite($fp, $nilaiSuhu);
			fclose($fp);
			return "(".$status.")";
    }
    public function Ambilsuhu(){
			$filename = "suhu.txt";
			$handle = fopen($filename, "r");
			$contents = fread($handle, filesize($filename));
			fclose($handle);
			return $contents;
    }
    public function ambilStatusTombolWeb()
    {
    	$filename = "formatdata.txt";
			$handle = fopen($filename, "r");
			$contents = fread($handle, filesize($filename));
			fclose($handle);
			return "(".$contents.")";

    }
	public function prosesData(Request  $req){
 //$datak=Input::all();
		$tes=$req->input('data');
		$indeks_=-1;
		$datak=explode(",",$tes);
		if(count($datak)>0){
			if($datak[0]=="L1"){
				$indeks_=0;
			}
			else if($datak[0]=="L2"){
				$indeks_=1;
			}
			else if($datak[0]=="L3"){
				$indeks_=2;
			}
			else if($datak[0]=="L4"){
				$indeks_=3;
			}
			else if($datak[0]=="L5"){
				$indeks_=4;
			}
			else if($datak[0]=="L6"){
				$indeks_=5;
			}
			else if($datak[0]=="L7"){
				$indeks_=6;
			}

			

		}

		if($indeks_>-1){
			$filename = "formatdata.txt";
			$handle = fopen($filename, "r");
			$contents = fread($handle, filesize($filename));
			fclose($handle);

		//DATA AMBIL INDEKSNYA
			$datakexp=explode(",",$contents);
			$datakexp[$indeks_]=$datak[1];

		//jadi satu kalimat dengan koma lagi
			$contents="";
			//return $contents.$datakexp[$i];
			for($i=0;$i<7;$i++)
			{
				if($i==0){
					$contents=$contents.$datakexp[$i];
				}
				else
				{
					$contents=$contents.",".$datakexp[$i];
				}
			};
			$fp = fopen($filename, 'w');
			fwrite($fp, $contents);
			fclose($fp);
		}
		return $tes;
	}
}
