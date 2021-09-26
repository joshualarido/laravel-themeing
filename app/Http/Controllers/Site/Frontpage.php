<?php
namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Post;

/**
 * Class Frontpage
 * @package App\Http\Controllers
 */
class Frontpage extends Controller
{
    /**
     * Frontpage::index
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        $categories = Category::all();

        return view('home', [
            'portfolios' => $portfolios,
            'categories' => $categories,
        ]);
    }
}
