<?php
namespace Home\Action;

class IndexAction extends BaseAction {
	/**
	 * 跳到首页
	 */
    public function index(){
        $user = D('Home/Index');
        $data = $user->queryByList();
        $this->assign('data',$data);
        $this->display("/index");
    }
    /**
     * 生成二维码
    */
    public function createQRcode(){
        $fileName = createQRcode(I('url'),1);
        $this->assign('path',$fileName);
        $this->display("/qrcode");
    }
}