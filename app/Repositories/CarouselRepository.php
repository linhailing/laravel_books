<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/20
 * Time: 14:45
 * 获取轮播图库
 */
namespace App\Repositories;
use App\Models\Carousel;
class CarouselRepository{

    public $status = 1; //状态 0 不显示 1 显示
    public $position_type = 1; //位置类型,1.首页,2.其他

    /**
     * @param int $limit 获取多少张图片
     * @return array 数组
     */
    public function homeCarousel($limit = 5){
        $data = Carousel::where([
            'status'=> $this->status,
            'position_type'=> $this->position_type])->limit($limit)->orderby('ordersort', 'desc')->get();
        $path = config('app.url')."/uploads/";
        //补全图片地址
        if ($data){
            foreach ($data as $k =>$item){
                $data[$k]['image_url'] = $path.$item['image'];
                unset($item['image']);
            }
        }
        return $data;
    }
}
