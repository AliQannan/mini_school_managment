<?php
namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::where('user_id', auth()->id())->get();
        return view("Course")->with('materials', $materials);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png',
        'quiz_id' => 'nullable|exists:quizzes,id',
        'score' => 'nullable|integer'
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $filePath = null;
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('materials');
    }

    $material = Material::create([
        'title' => $request->title,
        'description' => $request->description,
        'file_path' => $filePath,
        'user_id' => auth()->id(),
        'quiz_id' => $request->quiz_id,
        'score' => $request->score
    ]);

    return response()->json(['message' => 'Material created successfully', 'material' => $material], 201);
}

    public function edit(Request $request, $id){
        $material = Material::find($id) ;
        
        
        return view('editMaterials')->with('material', $material) ;

    
    }





    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);
    
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png',
            'quiz_id' => 'nullable|exists:quizzes,id',
            'score' => 'nullable|integer'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        if ($request->hasFile('file')) {
            if ($material->file_path) {
                Storage::delete($material->file_path);
            }
            $filePath = $request->file('file')->store('materials');
        } else {
            $filePath = $material->file_path;
        }
    
        $material->update([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'quiz_id' => $request->quiz_id,
            'score' => $request->score
        ]);
    
        return redirect()->route('materials.index')->with('message', 'Material updated successfully.');
    }
    
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
    
        if ($material->file_path) {
            Storage::delete($material->file_path);
        }
    
        $material->delete();
    
        return redirect()->route('materials.index')->with('message', 'Material deleted successfully.');
    }
}
