<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\BookRequest;
use App\Http\Requests\Web\ChapterAddRequest;
use App\Models\Web\Book;
use App\Models\Web\Chapter;
use App\Models\Web\Topic;
use App\Models\Web\Category;
use App\Models\Web\Topic_has_book;
use Auth;
use App\Handlers\ImageUploadHandler;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request, Book $book)
    {
        $books = $book->paginate(20);
        return view('web.topics.books.list', compact('books'));
    }

    public function create(Topic $topic)
    {
        $categories = Category::all();
        return view('web.topics.books.create', compact('topic', 'categories'));
    }

    /**
     * 保存新建的小册
     * @param BookRequest $request
     * @param ImageUploadHandler $uploader
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request, ImageUploadHandler $uploader, Book $book)
    {
        $book->fill($request->all());
        if ($request->cover) {
            $result = $uploader->save($request->cover, 'cover', '', 362);
            if ($result) {
                $book->cover = $result['path'];
            }
        }
        $book->user_id = Auth::id();
        $book->save();

        return redirect()->to($book->link())->with('success', '成功创建小册！');
    }

    public function show()
    {
        return view('topics.books.show');
    }

    public function edit(Book $book, Topic_has_book $topic_has_book)
    {
        return view('web.topics.books.edit', compact('book', 'topic_has_book'));
    }

    public function chapterAdd(ChapterAddRequest $chapterAddRequest, Chapter $chapter)
    {
        return view('web.topics.books.show');
    }

    public function chapterHasTopic()
    {
        return view('web.topics.books.show');
    }
}
