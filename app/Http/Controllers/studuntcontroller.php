<?php

namespace App\Http\Controllers;

use App\Models\Studunt;
use Illuminate\Http\Request;

class studuntcontroller extends Controller
{
    public function studuntRegisterview()
    {
        return view('studuntregister');
    }

    public function studuntRegister(request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required|in:male,female,other',
            'profile_picture' => 'required', // Adjust max file size and allowed mime types as needed
        ]);


        // Store the student data in the database
        $student = new Studunt();
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->password = bcrypt($validatedData['password']);
        $student->gender = $validatedData['gender'];

        // Handle the profile_picture file upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('profile_pictures'), $filename); // Move the file to the "profile_pictures" directory in the public folder
            $student->profile_picture = 'profile_pictures/' . $filename;
        }

        $student->save();
    return redirect()->route('studuntData');
        // Redirect or return a response
        // For example, redirect back to the registration form with a success message
        // dd('sucess');

    }

    public function studuntData()
    {
        $students = Studunt::all();
        return view('student_data', compact('students'));
    }

    public function editData($id)
{
    $student = Studunt::find($id);
    return view('edit_student', compact('student'));
}

public function updateData(request $request)
{
    $student = Studunt::find($request->input('id'));

    $student->name = $request->input('name');
    $student->email = $request->input('email');
    $student->gender = $request->input('gender');
    $student->save();

    return redirect()->route('studuntData');

}

public function deleteData($id)
{
    $student = Studunt::find($id);
    $student->delete();
    return redirect()->route('studuntData');

}

}
