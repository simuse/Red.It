<?php namespace App\Http\Controllers;

use Config;
use Lang;
use Request;
use Route;
use Session;
use App\Reddit;
use App\User;
use App\Classes\Helpers;

class HomeController extends Controller {

	public function __construct()
	{

		parent::__construct();

		// get route parameters
		$this->params = Route::current()->parameters();
		$this->previousPage = Session::has('previousPage') ? Session::get('previousPage') : null;

	}

	/**
	 * Show subreddit/index page
	 *
	 * @return View
	 */
	public function getIndex()
	{

		// assign parameters
		$this->limit 		= null;
		$this->subreddit 	= isset($this->params['subreddit']) ? $this->params['subreddit'] : null;
		$this->sort 		= isset($this->params['sort']) ? $this->params['sort'] : null;
		$this->time 		= isset($this->params['time']) ? $this->params['time'] : null;
		$this->page 		= Request::has('p') ? Request::get('p') : 1;
		$this->after 		= Session::has('after') ? Session::get('after') : null;
		$this->before 		= Session::has('before') ? Session::get('before') : null;

		// url for the next page
		$this->url = $this->subreddit ? '/r/' . $this->subreddit : '';

		// share with view
		view()->share('subreddit', $this->subreddit);
		view()->share('page', $this->page);
		view()->share('sort', $this->sort);
		view()->share('sortSince', $this->time);
		view()->share('url', $this->url);

		// get posts
		$reddit = new Reddit();
		$posts = $reddit->getPosts(
			$this->subreddit,
			$this->page,
			$this->sort,
			$this->time,
			$this->limit
		);

	    // store some data in session
	    Session::put('after', $posts['after']);
	    Session::put('before', $posts['before']);
	    Session::put('previousPage', $this->page);

		// make view
		$data = array(
			'posts' => $posts['posts'],
		);

		return view('index')->with('data', $data);

	}

	/**
	 * Redirect to subreddit from the header form
	 *
	 * @return View
	 */
	public function formToSubreddit()
	{

		$subreddit = Request::get('subreddit');

		if (!empty($subreddit)) {
			return redirect('r/' . $subreddit);
		}

		return $this->getIndex();

	}

	/**
	 * Show single post page
	 *
	 * @param  string $id
	 * @return View
	 */
	public function getSingle($id = null, $sort = null)
	{

		// get post
		$reddit = new Reddit();
		$post = $reddit->getPost($id, $sort);

		// get current url without the filters param
		view()->share('url', '/p/' . $id);

		view()->share('subreddit', $post['post']['subreddit']);

		// view
		$data = [
			'comments'  => $post['comments'],
			'post' 		=> $post['post'],
			'sort'		=> $sort,
		];

		return view('single')->with('data', $data);

	}

}


















