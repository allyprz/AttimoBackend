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
        $totalUsers = DB::table('users')->where('users_types_id', 1)->count();
        $playSports = DB::table('questions_answers')->where('questions_id', 4)->where('answers_id', 1)->count();
        $haveAccommodations = DB::table('questions_answers')->where('questions_id', 3)->count();
        $haveScholarship = DB::table('questions_answers')->where('questions_id', 2)->where('answers_id', '!=', 1)->count();

        return response()->json([
            'totalUsers' => $totalUsers,
            'playSports' => $playSports,
            'haveAccommodations' => $haveAccommodations,
            'haveScholarship' => $haveScholarship,
        ]);
    }

    public function getGraphData()
{
    $totalUsers = DB::table('questions_answers')->select('user_id')->distinct()->count();

    $typeScholarship = [
        [
            'id' => 0,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 2)
                        ->where('answers_id', 1)
                        ->count(),
        ],
        [
            'id' => 1,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 2)
                        ->where('answers_id', 2)
                        ->count(),
        ],
        [
            'id' => 2,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 2)
                        ->where('answers_id', 3)
                        ->count(),
        ],
    ];

    $gender = [
        [
            'id' => 0,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 1)
                        ->where('answers_id', 1)
                        ->count(),
        ],
        [
            'id' => 1,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 1)
                        ->where('answers_id', 2)
                        ->count(),
        ],
        [
            'id' => 2,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 1)
                        ->where('answers_id', 3)
                        ->count(),
        ],
    ];

    $hoursSleep = [
        [
            'id' => 0,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 3)
                        ->where('answers_id', 1)
                        ->count(),
        ],
        [
            'id' => 1,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 3)
                        ->where('answers_id', 2)
                        ->count(),
        ],
        [
            'id' => 2,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 3)
                        ->where('answers_id', 3)
                        ->count(),
        ],
        [
            'id' => 3,
            'value' => DB::table('questions_answers')
                        ->where('questions_id', 3)
                        ->where('answers_id', 4)
                        ->count(),
        ],
    ];

    return response()->json([
        'totalUsers' => $totalUsers,
        'typeScholarship' => $typeScholarship,
        'gender' => $gender,
        'hoursSleep' => $hoursSleep,
    ]);
}






}