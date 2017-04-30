<?php
//分页类
class Page{
	private $total;//总记录
	private $pagesize;//每页显示多少条
	private $limit;//limit
	private $page;//当前页码
	private $pagenum;//总页码
	private $url;//请求地址
	//构造方法初始化
	public function __construct($total,$pagesize){
		$this->total = $total? $total : 1;
		$this->pagesize = $pagesize;
		$this->pagenum = ceil($this->total/$this->pagesize);
		$this->page = $this->setPage();
		$this->limit = "LIMIT ".($this->page-1)*$pagesize.",$this->pagesize";
		$this->url = $this->setUrl();
	}
	//拦截器
	public function __get($key){
		return $this->$key;
	}
	//获取当前页码
	private function setPage(){
		if(!empty($_GET['page'])){
			if($_GET['page'] > 0){
				if($_GET['page'] > $this->pagenum){
					return $this->pagenum;
				}else{
					return $_GET['page'];
				}
			}else{
				return 1;
			}
		}else{
			return 1;
		}
	}
	//获取地址
	private function setUrl(){
		$url = $_SERVER['REQUEST_URI'];
		$par = parse_url($url);
		if(isset($par['query'])){
			parse_str($par['query'],$query);
			unset($query['page']);
			$url = $par['path'].'?'.http_build_query($query);
		}
		return $url;
	}
	//数字目录
	private function pageList(){
		for($i=1;$i<=$this->pagenum;$i++){
			if($this->page == $i){
				$pagelist .= '<li class="active"><span>'.$i.'</span></li>';
				continue;
			}
			$pagelist .= '<li><a href="'.$this->url.'&page='.$i.'">'.$i.'</a></li>';
		}
		return $pagelist;
	}
	//首页
	private function first(){
		if($this->page == 1){
			return '<ul class="pagination"><li class="disabled"><span class="disabled">«</span></li>';
		}
		return '<ul class="pagination"><li><a href="'.$this->url.'">«</a></li>';
	}
	//上一页
	private function prev(){
		if($this->page == 1){
			return '<li class="disabled"><span>上一页</span></li>';
		}
		return '<li><a href="'.$this->url.'&page='.($this->page-1).'">上一页</a></li>';
	}
	//下一页
	private function next(){
		if($this->page == $this->pagenum){
			return '<li class="disabled"><span>下一页</span></li>';
		}
		return '<li><a href="'.$this->url.'&page='.($this->page+1).'">下一页</a></li>';
	}
	//尾页
	private function last(){
		if($this->page == $this->pagenum){
			return '<li class="disabled"><span>»</span></li></ul>';
		}
		return '<li><a href="'.$this->url.'&page='.$this->pagenum.'">»</a></li></ul>';
	}
	//获取分页信息
	public function showPage(){
		$_page .= $this->first();
		$_page .= $this->prev();
		$_page .= $this->pagelist();
		$_page .= $this->next();
		$_page .= $this->last();
		return $_page;
	}
	
}