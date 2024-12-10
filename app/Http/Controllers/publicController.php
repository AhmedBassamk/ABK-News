<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use ipinfo\ipinfo\IPinfo as IpinfoIPinfo;

class publicController extends Controller
{
    public $news;
    public $category;
    public $user;
    public $site_bath;

    public function __construct(Category $category, news $news, User $user)
    {
        $this->news = $news;
        $this->category = $category;
        $this->user = $user;
        $this->site_bath = 'publicSite';
        $ipstackAccessKey = 'c04c006cbe60b9a81b0e0f91ba2482bf';
        $client = new Client();

        $ipResponse = $client->get("https://api.ipify.org?format=json");
        $ipData = json_decode($ipResponse->getBody());
        $serverIp = $ipData->ip;

        // $ipstackResponse = $client->get("http://api.ipstack.com/$serverIp?access_key=$ipstackAccessKey");
        // $ipstackData = json_decode($ipstackResponse->getBody());

        // $response = $client->get('https://api.openweathermap.org/data/2.5/weather', [
        //     'query' => [
        //         'q' => $ipstackData->city,
        //         'appid' => '2b598fc5c75e7c65a404b480c1224619'
        //     ]
        // ]);

        // $data = json_decode($response->getBody(), true);
        $categories = $this->category->whereNull('parent_id')->get();
        foreach ($categories as $category) {
            $sub_categories = $this->category->where('parent_id', $category->id)->with('getnews')->get();
            $category->subCategories = $sub_categories;
        }
        $popular_news = news::orderBy('views_count', 'desc')
        ->limit(4)
        ->get();
        // View::share('ipstackData', $ipstackData);
        // View::share('data', $data);
        View::share('categories', $categories);
        View::share('popular_news', $popular_news);
    }
    function index()
    {
        $news_active = $this->news->where('is_active', '1')->latest()->limit(4)->get();
        $all_news_active = $this->news->where('is_active', '1')->latest()->get();

        $all_articles = Article::latest()->get();

        return view('publicSite.index', compact('news_active', 'all_news_active',  'all_articles'));
    }
    function category($id) {
        $category_ = $this->category->where('id', $id)->first();

        $news = News::where('category_id', $id)->orWhereIn('category_id', function ($query) use ($id) {
            $query->select('id')
                ->from('categories')
                ->where('parent_id', $id);
        })->paginate(10);


        return view($this->site_bath .'.category' , compact('category_' , 'news'));
    }
    function details($id) {
        $news_data = news::where('id', $id)->first();
        if (!$news_data) {
        }
        $news_data->views_count = $news_data->views_count + 1;
        $news_data->save();
        return view($this->site_bath . '/details', compact('news_data'));
    }
    function articledetails($id) {
        $article_data = Article::where('id', $id)->first();
        if (!$article_data) {
        }
        $article_data->views_count = $article_data->views_count + 1;
        $article_data->save();

        return view($this->site_bath . '/details', compact('article_data'));
    }

    function about() {
             return view($this->site_bath . '/about');
    }
    function contact() {

             return view($this->site_bath . '/contact');
    }
    function article() {
        $article = Article::query()->paginate(5);
        return view($this->site_bath . '/article' , compact('article'));

    }
}
