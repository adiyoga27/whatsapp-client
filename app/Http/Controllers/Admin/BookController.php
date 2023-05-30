<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $book;
    protected $bookCategories;

    public function __construct()
    {
        $this->book = new Book();
        $this->bookCategories = new BookCategories();

        return abort(404);
    }

    public function index()
    {
        $databuku = $this->bookCategories->getBookData();

        $data = [
            'data_buku' =>  $databuku
        ];
        return view('admin.book.book', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'book_categories' => BookCategories::all(),
        ];

        return view('admin.book.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $request->validated();

        $newBook = $request->file('image');

        if ($request->file('image')) {
            $data['image'] = $newBook->store('book-img', ['disk' => 'public']);
        }

        if ($data['is_active'] == 2) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        Book::query()->create($data);

        return redirect(route('book.index'))->with('success', 'New Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->book->getBookDetail($id)[0];

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'data_buku' => $this->book->find($id),
            'book_categories' => $this->bookCategories->all()
        ];

        return view('admin.book.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'title' => 'required|string|max:100',
                'category_id' => 'required',
                'price' => 'required|integer',
                'is_active' => 'required|integer',
                'description' => 'required|string',
                'image' => 'image|mimes:jpg,png,jpeg|max:1024',
            ],
            [
                'is_active' => [
                    'required' => 'This field is required'
                ]
            ]
        );

        $oldImage = $request->input('old-book-img');
        $newImage = $request->file('image');

        if ($newImage) {
            $data['image'] = $newImage->store('book-img', ['disk' => 'public']);
            Storage::delete($oldImage);
        } else {
            $data['image'] = $oldImage;
        }

        $this->book
            ->where('id', $id)
            ->update([
                'title' => $data['title'],
                'category_id' => $data['category_id'],
                'price' => $data['price'],
                'is_active' => $data['is_active'],
                'description' => $data['description'],
                'image' => $data['image']
            ]);

        return redirect()->route('book.index')->with('success', 'Edit Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->book->where('id', $id)->delete();

        return redirect(route('book.index'))->with('success', 'Delete Data Successfully');
    }
}
