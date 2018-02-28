<?php
/**
 * Created by PhpStorm.
 * User: Lich
 * Date: 2018/1/20
 * Time: 13:56
 */
namespace App\Http\Controllers\Web;;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonController;
class IndexController extends BaseController{
    private $common;
//    private $core;

    public function __construct()
    {
        #初始化公共控制器
//        $this->config = new WriteConfigController();
        $this->common = new CommonController();
//        $this->core = new CoreController();
    }
    public function douyin(){
        return view('Web/douyin');
    }
    public function bed(){
        return view('Web/bed');
    }
    public function url(){
        return view('Web.url');
    }
    public function guide(){
        return view('Web.guide');
    }
    public function shorturl(Request $request){
//        3421048570
//        $source = '3271760578';
//    dd();
        $api = 'http://api.t.sina.com.cn/short_url/shorten.json'; // json
// $api = 'http://api.t.sina.com.cn/short_url/shorten.xml'; // xml

        $source = '3421048570';

        $url_long = "http://".$request->post('longurl');
        $request_url = sprintf($api.'?source=%s&url_long=%s',$source,$url_long);
        $str = $this->common->curl_get_dwz($request_url);
        $short = json_decode($str,true);
//        dd($short);
        if (!empty($short)) {
            $res = ['status' => 200, 'shorturl' => $short[0]['url_short']];
        } else {
            $res = ['status' => 400];
        }
        return json_encode($res);
//       print_r ($res);


    }


    public function douyins(){
        isset($_POST['url'])?$douyin_link = $_POST['url']:exit(json_encode(array('code'=>0,'msg'=>'未输入抖音链接')));
        $parse_url_arr = parse_url($douyin_link);
        if(isset($parse_url_arr['host']) and $parse_url_arr['host'] == 'www.douyin.com'){
            $result = getCurl($douyin_link);
            $video_id = GetSubStr($result,'?video_id=','\u0026line=0');
            $aweme_url = 'https://aweme.snssdk.com/aweme/v1/play/?video_id='.$video_id.'&line=0&ratio=720p&media_type=4&vr_type=0&iid=18170287739&device_id=39780991409&os_api=18&app_name=aweme&channel=App%20Store&idfa=118C3CF0-FB58-40F5-AE57-98565581D491&device_platform=iphone&build_number=16211&vid=0B8446C4-2638-4F5C-AEB7-123A4BAAB60B&openudid=cd04743a31ab486a4791eb7d0a51bccaa5e1f70e&device_type=iPhone8%2C2&app_version=1.6.2&version_code=1.6.2&os_version=11.1.1&screen_width=1242&aid=1128&ac=WIFI';
            $video_url = getLocalParse($aweme_url);
            $arr['code'] = 1;
            $arr['cover_url'] = GetSubStr($result,'<meta property="og:image" content="','" />');

            if(is_array($video_url)){
                $arr['video_url'] = $video_url[0];
            }else{
                $arr['video_url'] = $video_url;
            }

            $arr['msg'] = '获取成功';
            echo json_encode($arr);

        }else{
            exit(json_encode(array('code'=>0,'msg'=>'抖音链接输入错误')));
        }

        function getCurl($url,$post=0){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if($post){
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $ret = curl_exec($ch);
            curl_close($ch);
            return $ret;
        }

        function GetSubStr($str, $leftStr, $rightStr){
            $left = strpos($str, $leftStr);
            //echo '左边:'.$left;
            $right = strpos($str, $rightStr,$left);
            //echo '<br>右边:'.$right;
            if($left < 0 or $right < $left) return '';
            return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
        }
        function getLocalParse($url){
            $headers = get_headers($url,1);
            if ($headers && $headers['Location']){
                $longUrl = $headers['Location'];
            }
            return $longUrl;
        }
    }
    public function index(){
        $b = new \SmsDemo(
            "LTAI9KYCg233rT7y",
            "AoY1h4o7EafUwaAshu2t6Cttr4D8tySSS"
        );
        $response = $b->sendSms(
            "柠檬", // 短信签名
            "SMS_81390017", // 短信模板编号
            "13558812350", // 短信接收者
            Array(  // 短信模板中字段的值
                "code" => 5201314,
                "product" => "验证码"
            ),
            "123"
        );

//        return view('layouts.navigation');
    }
    #生成短网址
    public function getShortUrl(Request $request)
    {
        $key = '3421048570';
        $url = $request->post('longurl');
        $api = 'http://api.t.sina.com.cn/short_url/shorten.json';
        $request_url = sprintf($api.'?source=%s&url_long=%s', $key, $url);
        $str = $this->common->curl_get_dwz($request_url);
        $short = json_decode($str,true);
        if (!empty($short)) {
            $res = ['status' => 200, 'shorturl' => $short[0]['url_short']];
        } else {
            $res = ['status' => 400];
        }

        return json_encode($res);
    }
    //生成短信随机码
    public function randNumber($len = 4)
    {
        $chars = str_repeat('1234567890', 10);
        $chars = str_shuffle($chars);
        $str = substr($chars, 0, $len);
        return $str;
    }
}