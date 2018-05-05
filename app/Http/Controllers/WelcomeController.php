<?php
/**
 * 首页控制器
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CarouselRepository;

class WelcomeController extends Controller{
    public function __construct(CarouselRepository $carouselRepository){
        $this->carouselRepository = $carouselRepository;
    }
  public function index()
  {
      $indexCarousel = $this->carouselRepository->homeCarousel(5);
      return view('welcome',[
          'carousels' => $indexCarousel
      ]);
  }
  public function detail()
  {
    return view('detail');
  }
}
