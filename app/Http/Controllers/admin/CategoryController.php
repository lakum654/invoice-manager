<?php

namespace App\Http\Controllers\admin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Keyword;
use DataTables;

class CategoryController extends Controller
{
    public $route = 'admin/category';
    public $view  = 'admin/category.';
    public $moduleName = 'category';

    public function index()
    {
        $moduleName = $this->moduleName;
        return view($this->view . 'index', compact('moduleName'));
    }

    public function getData()
    {
        $data = Category::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editUrl = route('category.edit', encrypt($row->id));
                $deleteUrl = route('category.delete', encrypt($row->id));
                $statusUrl = route('category.changeStatus', encrypt($row->id));
                $btn = '';
                $btn .= '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm" style="margin-left:5px;"><i class="fa fa-pencil"> </i> Edit</a>';
                // if ($row->is_active == 1) {
                //     $btn .= '<a href="' . $statusUrl . '" class="edit btn btn-success btn-sm" style="margin-left:5px;"><i class="fa fa-check"> </i> Inactive</a>';
                // } else {
                //     $btn .= '<a href="' . $statusUrl . '" class="edit btn btn-danger btn-sm" style="margin-left:5px;"><i class="fa fa-check" > </i> Active</a>';
                // }
                $btn .= '<a href="' . $deleteUrl . '" class="edit btn btn-danger btn-sm" style="margin-left:5px;"> <i class="fa fa-trash" /> </i> Delete</a>';
                return $btn;
            })

            ->editColumn('is_active', function ($row) {
                return $row->is_active == 1 ? 'Active' : 'InActive';
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $moduleName = $this->moduleName;
        return view($this->view . 'form', compact('moduleName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:1,0'
        ]);



        Category::create([
            'name' => $request->name,
            'is_active' => $request->status
        ]);

        Helper::successMsg('insert', $this->moduleName);
        return redirect($this->route);
    }

    public function edit($id)
    {
        $moduleName = $this->moduleName;
        $category = Category::find(decrypt($id));
        return view($this->view . '_form', compact('category', 'moduleName'));
    }

    public function update(Request $request, $id)
    {
        Category::find($id)->update(['name' => $request->name, 'is_active' => $request->status]);
        Helper::successMsg('update', $this->moduleName);
        return redirect($this->route);
    }

    public function changeStatus($id)
    {
        $status = Category::find(decrypt($id))->is_active;

        if ($status == 1) {
            Category::find(decrypt($id))->update(['is_active' => 0]);
        } else {
            Category::find(decrypt($id))->update(['is_active' => 1]);
        }

        Helper::successMsg('custom', 'Status Change Successfully.');
        return redirect($this->route);
    }

    public function delete($id)
    {
        Category::find(decrypt($id))->delete();


        Helper::successMsg('delete', $this->moduleName);
        return redirect($this->route);
    }
}
