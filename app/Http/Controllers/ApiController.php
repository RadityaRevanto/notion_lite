<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class ApiController extends Controller
{

    public function getTutorials()
    {
        $tutorials = Tutorial::latest()->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Daftar data tutorial',
            'data'    => $tutorials
        ], 200);
    }

    public function getTutorialById($id)
    {
        $tutorial = Tutorial::with('details:id,tutorial_id,type,status,step_order,content,created_at,updated_at')->find($id);

        if (!$tutorial) {
            return response()->json([
                'success' => false,
                'message' => 'Data tutorial tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data tutorial',
            'data'    => $tutorial
        ], 200);
    }
}
