<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Book;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $total_disk = disk_total_space('/');
        $total_disk_size = $total_disk / 1073741824;

        $free_disk = disk_free_space('/');
        $used_disk = $total_disk - $free_disk;

        $disk_used_size = $used_disk / 1073741824;
        $use_disk = round(100 - (($disk_used_size / $total_disk_size) * 100));

        $diskuse = round(100 - ($use_disk)) . '%';

        $data = [
            'user' => count(User::all()),
            'article' => count(Article::all()),
            'book' => count(Book::all()),
            'product' => count(Product::all()),
            'testimonial' => count(Testimonial::all()),
            'diskuse' => $diskuse,
            'total_disk_size' => $total_disk_size,
            'disk_used_size' => $disk_used_size
        ];
        return view('admin.dashboard.index', $data);
    }
}
