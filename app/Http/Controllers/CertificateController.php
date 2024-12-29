<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Mark;

class CertificateController extends Controller
{
    public function generate($material_id)
    {
        $material = Material::findOrFail($material_id);
        $totalScore = Mark::where('material_id', $material_id)->sum('score');
       
        if ($totalScore === 0) {
            return redirect()->back()->with('error', 'No marks found for this material.');
        }

        return view('certificate', compact('material', 'totalScore'));
    }
}