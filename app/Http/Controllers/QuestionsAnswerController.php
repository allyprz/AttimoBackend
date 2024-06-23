<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsAnswerController extends Controller
{
    public function index()
    {
        // ...
    }

    public function create()
    {
        // ...
    }

    public function store(Request $request)
    {
        // ...
    }

    public function show(string $id)
    {
        // ...
    }

    public function edit(string $id)
    {
        // ...
    }

    public function update(Request $request, string $id)
    {
        // ...
    }

    public function destroy(string $id)
    {
        // ...
    }

    public function getStatistics()
    {
        // Obtén los datos estadísticos
        $totalUsers = DB::table('users')->count();
        $playSports = DB::table('questions_answers')->where('questions_id', 4)->where('answers_id', 1)->count();
        $haveAccommodations = DB::table('questions_answers')->where('questions_id', 3)->count();
        $haveScholarship = DB::table('questions_answers')->where('questions_id', 2)->where('answers_id', '!=', 1)->count();

        // Retorna una respuesta JSON con los datos estadísticos
        return response()->json([
            'totalUsers' => $totalUsers,
            'playSports' => $playSports,
            'haveAccommodations' => $haveAccommodations,
            'haveScholarship' => $haveScholarship,
        ]);
    }


}