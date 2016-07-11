<?php

class BbsData {
	
	const COL_NO = 0;
	const COL_PARENT_NO = 1;
	const COL_NAME = 2;
	const COL_TITLE = 3;
	const COL_MESSAGE = 4;
	
	protected $_dataPath;
	
	public function __construct($dataPath) {
		if (false == file_exists($dataPath)) {
			if (false == @touch($dataPath)) {
				throw new Exception('データファイル作成に失敗しました。');
			}
		}
		$this->_dataPath = $dataPath;
	}

	public function getData() {
		$fp = fopen($this->_dataPath, 'r');
		$data = array();
		while ($row = fgetcsv($fp)) {
			$data[] = $row;
		}
		fclose($fp);
		
		$data = array_reverse($data);
		return $data;
	}
	
	public function getNewNo() {
		$data = $this->getData();
		$no = 1;
		if (0 < count($data)) {
			$no = $data[0][self::COL_NO];
			$no++;
		}
		return $no;
	}
	
	public function append($data) {
		$this->sanitize($data);
		$line = implode(',', $data) . "\r\n";
		
		$fp = fopen($this->_dataPath, 'a');
		fputs($fp, $line);
		fclose($fp);
	}
	
	protected function sanitize(&$data) {
		foreach($data as $index => $val) {
			$tmpData = $val;
			$tmpData = trim($tmpData);
			$tmpData = str_replace(',', '', $tmpData);
			if (self::COL_MESSAGE == $index) {
				$tmpData = nl2br($tmpData);
			}
			$tmpData = str_replace('\r', '', $tmpData);
			$tmpData = str_replace('\n', '', $tmpData);
			$data[$index] = $tmpData;
		}
	}
	
	public function delete($no) {
		$data = $this->getData();
		
		$writeData = array();
		if (0 < count($data)) {
			foreach($data as $row) {
				if ($row[self::COLNO] != $no && $row[self::COL_PARENT_NO] != $no) {
					$writeData[] = implode(',', $row);
				}
			}
		}
		$writeText = '';
		if (0 < count($writeData)) {
			$writeText = implode('\r\n', $writeData) . '\r\n';
		}
		$fp = fopen($this->_dataPath, 'w');
		fputs($fp, $writeText);
		fclose($fp);		
	}
}

