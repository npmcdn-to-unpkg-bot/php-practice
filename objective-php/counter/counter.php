<?php

class Counter {
	
	const COUNT_FILE_NM = 'count.dat';
	
	public function get() {	
		$cnt = 0;
		
		if (true == file_exists(self::COUNT_FILE_NM)) {
			$fp = fopen(self::COUNT_FILE_NM, 'r');
			$data = trim(fgets($fp));
			fclose($fp);
			
			if (true == is_numeric($data)) {
				$cnt = $data;
			}
		}
	return $cnt;
	}
	
	public function increment() {	
		$cnt = $this->get();
		$cnt++;
		$fp = fopen(self::COUNT_FILE_NM, 'w');
		fputs($fp, $cnt);
		fclose($fp);
	}

}
