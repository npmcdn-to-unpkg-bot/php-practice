<?php

require_once __DIR__ . '/bbsdata.php';

class Bbs {
	
	protected $data;
	
	public function __construct($dataPath) {
		$this->data = new BbsData($dataPath);
	}
	
	public function getThreadData() {
		$data = $this->data->getData();
		
		$parents = array();
		foreach($data as $row) {
			if (0 == $row[BbsData::COL_PARENT_NO]) {
				$paarents[] = $row;
			}
		}
		foreach($parents as $idx => $parent) {
			$childs = array();
			foreach($data as $row) {
				if ($parent[BbsData::NO] == $row[BbsData::COL_PARENT_NO]) {
					$childs[] = $row;
				}
			}
			$parents[$idx]['Childs'] = $childs;
		}
		$parents = array_reverse($parents);
		
		return $parents;
	}
	
	public function write($post) {
		$data[BbsData::COL_NO] = $this->dac->getNewNo();
		$data[BbsData::COL_PARENT_NO] = $post['parent_no'];
		$data[BbsData::COL_NAME] = $post['name'];
		$data[BbsData::COL_TITLE] = $post['title'];
		$data[BbsData::COL_MESSAGE] = $post['message'];
		
		$this->data->write($data);
	}
	
	public function delete($post) {
		$no = $post['no'];
		$this->data->delete($no);
	}
	
}
