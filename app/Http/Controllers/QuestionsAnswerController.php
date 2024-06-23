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
        // Count total users
        $totalUsers = DB::table('questions_answers')->select('user_id')->distinct()->count();

        // Count type of scholarships question id 2
        
        $typeScholarship = [
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 2)
                            ->where('answers_id', 1)
                            ->count(),
                'label' => 'No Sch',
            ],
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 2)
                            ->where('answers_id', 2)
                            ->count(),
                'label' => 'Partial Sch',
            ],
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 2)
                            ->where('answers_id', 3)
                            ->count(),
                'label' => 'Full Sch',
            ],
        ];
        
        $gender = [
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 1)
                            ->where('answers_id', 1)
                            ->count(),
                'label' => 'Male',
            ],
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 1)
                            ->where('answers_id', 2)
                            ->count(),
                'label' => 'Female',
            ],
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 1)
                            ->where('answers_id', 3)
                            ->count(),
                'label' => 'Other',
            ],
        ];
        
        $hoursSleep = [
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 3)
                            ->where('answers_id', 1)
                            ->count(),
                'label' => '-4h',
            ],
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 3)
                            ->where('answers_id', 2)
                            ->count(),
                'label' => '4-6h',
            ],
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 3)
                            ->where('answers_id', 3)
                            ->count(),
                'label' => '7-8h',
            ],
            [
                'total' => DB::table('questions_answers')
                            ->where('questions_id', 3)
                            ->where('answers_id', 4)
                            ->count(),
                'label' => '+9h',
            ],
        ];
        
        return response()->json([
            'typeScholarship' => $typeScholarship,
            'gender' => $gender,
            'hoursSleep' => $hoursSleep,
        ]);
    }


}