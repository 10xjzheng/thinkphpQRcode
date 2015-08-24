<?php
/**
 * 打印数据，用于调试
 * @param var 打印对象
 */
function p($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";

}

/** 
 * author:10xjzheng
 * Excel导入
 * @param url 要生成的二维码的链接
 * @param flag 是否生成图片保存起来，1是，0否（只是动态生成）
 */
function createQRcode($url,$flag=0){  
    vendor("phpqrcode.phpqrcode");
    // 纠错级别：L、M、Q、H
    $level = 'L';
    // 点的大小：1到10,用于手机端4就可以了
    $size = 4;
    // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
    if($flag){
        $path = "Public/QRcode/";
        if(!file_exists($path)){ 
            mkdir($path, 0700); 
        }
        // 生成的文件名
        $fileName = $path.time().'.png';
        QRcode::png($url, $fileName, $level, $size); 
        return $fileName;
    }else{
        QRcode::png($url, $false, $level, $size); 
        exit;
    }
    
}
