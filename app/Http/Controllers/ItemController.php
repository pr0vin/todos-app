<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function index()
    {

        return "Hello World";
    }
    public function view()
    {

        $name = "Pravin";
        $address = "Dhangadhi,kailali";
        return view('items.index', compact('name', 'address'));
    }

    public function show($item)
    {
        return "Item= " . $item;
    }
}
