<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Course;
use App\Models\MajorsCourse;
use App\Models\Major;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::all();
        return view('courses.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Create a new course
        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'acronyms' => $request->acronyms,
            'image' => "defaultImage.jpg",
        ]);

        // Retrieve the ID of the newly created course
        $course_id = $course->id;

        if ($request->hasFile('image')) {
            //Store the image with the course ID in the file name
            $image = $request->file('image');
            $filename = 'course_' . $course_id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);

            // Update the course with the image name
            $course->update(['image' => $filename]);
        }

        //Attach the course to the selected major(s) yb looping through the majors array
        foreach ($request->majors as $major) {
            MajorsCourse::create([
                'majors_id' => $major,
                'courses_id' => $course_id,
            ]);
        }
        return redirect()->route('courses.index')->with('success', 'Course registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Look for the course
        $course = Course::find($id);

        if ($course) {
            //Get all the majors
            $majors = Major::all();

            //Get the majors associated with the course
            $selectedMajors = MajorsCourse::where('courses_id', $id)->get();

            return view('courses.show', compact('course', 'majors', 'selectedMajors'));
        } else {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Look for the course
        $course = Course::find($id);

        if ($course) {
            //Get all the majors
            $majors = Major::all();

            //Get the majors associated with the course (majors_id and courses_id
            $selectedMajors = MajorsCourse::select('majors_id')->where('courses_id', $id)->get();

            return view('courses.edit', compact('course', 'majors', 'selectedMajors'));
        } else {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Look for the course
        $course = Course::find($id);

        if ($course) {
            // Check if image was uploaded
            if ($request->image != null) {
                // Check if the old image exists and delete it
                $image_to_remove = 'images/' . $course->image;
                if (File::exists($image_to_remove)) {
                    File::delete($image_to_remove);
                }

                // Store the new image with the activity ID in the file name
                $image = $request->file('image');
                $filename = 'activity_' . $id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
            } else {
                $filename = $request->old_image;
            }

            //Obtain all the majors
            $majors = Major::all();

            //Compare the selected majors with the majors associated with the course, and add or remove the new/removed majors
            foreach ($majors as $major) {
                if (in_array($major->id, $request->majors)) {
                    if (!MajorsCourse::where('majors_id', $major->id)->where('courses_id', $id)->exists()) {
                        MajorsCourse::create([
                            'majors_id' => $major->id,
                            'courses_id' => $id,
                        ]);
                    }
                } else {
                    MajorsCourse::where('majors_id', $major->id)->where('courses_id', $id)->delete();
                }
            }

            //Update the course
            $course->update([
                'name' => $request->name,
                'description' => $request->description,
                'acronyms' => $request->acronyms,
                'image' => $filename,
            ]);

            return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
        } else {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Look for the course
        $course = Course::find($id);

        if ($course) {
            //Delete the course from the pivot table
            MajorsCourse::where('courses_id', $id)->delete();

            //Delete the image
            $image_to_remove = 'images/' . $course->image;
            if (File::exists($image_to_remove)) {
                File::delete($image_to_remove);
            }

            //Delete the course
            $course->delete();

            return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
        } else {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
    }
}
