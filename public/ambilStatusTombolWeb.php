<?php
//tes sundul gan 082210160003
			$filename = "formatdata.txt";
			$handle = fopen($filename, "r");
			$contents = fread($handle, filesize($filename));
			fclose($handle);
			if($contents!=""){
			return $contents;
		}

?>