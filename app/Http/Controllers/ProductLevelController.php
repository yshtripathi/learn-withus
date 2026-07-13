<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductLevel;

class ProductLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ProductLevel::with('course');

        if ($request->filled('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        $levels = $query->orderBy('course_id')->ordered()->paginate(20)->withQueryString();
        $courses = Product::orderBy('title')->get();

        return view('backend.product-level.index', compact('levels', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Product::orderBy('title')->get();
        return view('backend.product-level.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules());

        $level = ProductLevel::create($validatedData);

        $message = $level
            ? 'Product level successfully added'
            : 'Please try again!!';

        return redirect()->route('product-level.index')->with(
            $level ? 'success' : 'error',
            $message
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = ProductLevel::findOrFail($id);
        $courses = Product::orderBy('title')->get();

        return view('backend.product-level.edit', compact('level', 'courses'));
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
        $level = ProductLevel::findOrFail($id);

        $validatedData = $request->validate($this->rules());

        $status = $level->update($validatedData);

        $message = $status
            ? 'Product level successfully updated'
            : 'Please try again!!';

        return redirect()->route('product-level.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = ProductLevel::findOrFail($id);
        $status = $level->delete();

        $message = $status
            ? 'Product level successfully deleted'
            : 'Error while deleting product level';

        return redirect()->route('product-level.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    private function rules()
    {
        return [
            'course_id'      => 'required|exists:products,id',
            'skill_level'    => 'required|in:' . implode(',', ProductLevel::SKILL_LEVELS),
            'skill_level_jp' => 'nullable|string|max:100',
            'purpose'        => 'nullable|string',
            'purpose_jp'     => 'nullable|string',
            'learn_info'     => 'nullable|string',
            'learn_info_jp'  => 'nullable|string',
            'outcome'        => 'nullable|string',
            'outcome_jp'     => 'nullable|string',
            'price'          => 'nullable|numeric|min:0',
            'price_jp'       => 'nullable|numeric|min:0',
            'price_hk'       => 'nullable|numeric|min:0',
        ];
    }
}
