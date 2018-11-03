<?php

namespace App\Http\Controllers;

use App\Model\Degree;
use App\Model\Education_History;
use App\Model\Employment_History;
use App\Model\Group_Job_Category;
use App\Model\Info_candidate;
use App\Model\Job_Category;
use App\Model\Job_Level;
use App\Model\Key_Skills;
use App\Model\Languages;
use App\Model\Working_Preferences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $saved_jobs = DB::table('saved_jobs')->get();




        // Sharing is caring
        View::share(compact(
            'saved_jobs'
        ));
    }

    public function index()
    {
        $id_candidate = auth()->user()->id; //Get uid
        $info_candidate_profile = Info_candidate::where('id_users', $id_candidate)->get();

        $post_news_for_saved_jobs = DB::table('post_news')
            ->join('saved_jobs','post_news.id_posts','=','saved_jobs.id_post_news')
            ->join('recruiter','recruiter.id_account_recruiter','=','post_news.id_account_recruiter')
            ->where('id_candidate','=',$id_candidate)
            ->where('post_news.status_post','=',1)
            ->select('post_news.*','recruiter.*')
            ->paginate(5);

        $post_news_for_applied_jobs = DB::table('status_candidate_profile')
            ->join('post_news','post_news.id_posts','=','status_candidate_profile.id_post_news')
            ->join('recruiter','recruiter.id_account_recruiter','=','status_candidate_profile.id_account_recruiter')
            ->where('id_candidate','=',$id_candidate)
            ->select('status_candidate_profile.*','post_news.job_title','post_news.time_for_submission','recruiter.company_name')
            ->paginate(5);

        return view('dashboard.dashboard')->with(compact(
            'info_candidate_profile',
                'post_news_for_saved_jobs',
                   'post_news_for_applied_jobs'
        ));
    }

    public function user_profile(Request $request)
    {

        $id_candidate = auth()->user()->id; //Get uid

        $info_candidate_profile = Info_candidate::where('id_users', $id_candidate)->get();
        $key_skills = Key_Skills::all();

        //Get skills of user
        $key_skills_selected = Info_candidate::where('id_users', $id_candidate)->value('skills');
        $key_skills_selected = explode(",", $key_skills_selected);

        //Get job level for select
        $job_level = Job_Level::all();

        //Languages
        $languages = array("Arabic", "Bengali", "Bulgarian", "Burmese", "Cambodian", "Cebuano", "Chinese (Cantonese)", "Chinese (Mandarin)", "Czech", "Danish", "Dutch", "English", "Finnish", "French", "German", "Greek", "Hindi", "Hungarian", "Indonesian", "Italian", "Japanese", "Javanese", "Korean", "Laotian", "Malay", "Norwegian", "Polish", "Portuguese", "Romanian", "Russian", "Spanish", "Swedish", "Tagolog", "Taiwanese", "Thai", "Turkish", "Ukranian", "Vietnamese", "Other");

        //Proficiency
        $proficiency = array("Beginner", "Intermediate", "Advanced", "Native");

        //Benefits
        $benefits_data = array("Awards", "Bonus", "Canteen", "Healthcare Plan", "Kindergarten", "Laptop", "Library", "Mobile", "Paid Leave", "Team Activities", "Training", "Transportation", "Travel Opportunities", "Vouchers");

        // Languages Data of Candidate
        $languages_data = Languages::where('id_candidate', $id_candidate)->get();

        //Working Preferences
        $working_preferences = Working_Preferences::where('id_candidate', $id_candidate)->get();

        //Get Job Categories
        $job_category = Job_Category::all();

        //Get Preferred Working Location
        $key_working_selected = Working_Preferences::where('id_candidate', $id_candidate)->value('location_work');
        $key_working_selected = explode(",", $key_working_selected);

        //Get Employment History From Database
        $employment_history = Employment_History::where('id_candidate', $id_candidate)->get();

        //Get Education History From Database
        $education_history = Education_History::where('id_candidate', $id_candidate)->get();

        //Get Degree From Database
        $degree = Degree::all();


        return view('dashboard.my_profile')
            ->with(compact('info_candidate_profile',
                'key_skills',
                'key_skills_selected',
                'job_level',
                'languages',
                'proficiency',
                'languages_data',
                'working_preferences',
                'job_category',
                'benefits_data',
                'employment_history',
                'education_history',
                'degree'
            ));

    }

    //Use for check Image Exists
    public function check_Image_Exists($id_candidate, $fileNameToStore)
    {

        $flags = DB::table('info_candidate')
            ->where('id_users', '=', $id_candidate)
            ->where('avatar', '=', $fileNameToStore)
            ->first();
        if ($flags) {
            return 1;
        } else
            return 0;
    }

    public function user_avatar(Request $request)
    {

        $id_candidate = auth()->user()->id; //Get uid

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->validate($request, [
                'upload_avatar_file' => 'required|max:100|dimensions:max_width=1000,max_height=1000|mimes:jpeg,png,bmp,gif,svg' // ~100KB
            ]);

            if ($request->file('upload_avatar_file')->isValid()) {

                //Handle File Upload
                $fileUpload = $request->file('upload_avatar_file');
                //File Name with the extension
                $fileNameWithExt = $fileUpload->getClientOriginalName();
                //Get just filename
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = strtolower($fileUpload->getClientOriginalExtension());
                //FileName to store
                $fileNameToStore = $id_candidate . '_' . $fileName . '.' . $extension;
                //Upload file
                $request->file('upload_avatar_file')->storeAs('public/avatar', $fileNameToStore);

                if ($this->check_Image_Exists($id_candidate, $fileNameToStore) == 1) {
                    return back()->with('error', 'This photo is being selected as the avatar!!!');
                } else {

                    $fileNameAvatar = Info_candidate::where('id_users', $id_candidate)->value('avatar');
                    Storage::disk('avatar')->delete($fileNameAvatar); // Delete leftover
                    DB::table('info_candidate')
                        ->where('id_users', $id_candidate)
                        ->update([
                            'avatar' => $fileNameToStore,
                            'updated_at' => now()
                        ]);
                    return back()->with('success', 'Change your avatar successful');
                }


            } else {
                return back()->with('error', 'Please choose avatar you want add !!!');
            }


        }
    }

    public function user_info(Request $request)
    {
        $id_candidate = auth()->user()->id; //Get uid

        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $professional_title = $request->input('professional_title');
        $select_Current_Job_Level = $request->input('select_Current_Job_Level');
        $year_experience = $request->input('year_experience');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Update user info
            DB::table('info_candidate')
                ->where('id', $id_candidate)
                ->update([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'professional_title' => $professional_title,
                    'current_job_level' => $select_Current_Job_Level,
                    'experience_state' => $year_experience,
                    'updated_at' => now()
                ]);
        }

    }

    public function user_contact(Request $request)
    {

        $id_candidate = auth()->user()->id; //Get uid

        $address = $request->input('address');
        $cell_number = $request->input('cell_number');
        $doB = $request->input('doB');
        $nationality = $request->input('nationality');
        $gender = $request->input('gender');
        $marital_status = $request->input('marital_status');
        $country = $request->input('country');
        $province = $request->input('province');
        $district = $request->input('district');

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            //Update user info
            DB::table('info_candidate')
                ->where('id', $id_candidate)
                ->update([
                    'address' => $address,
                    'phone_number' => $cell_number,
                    'doB' => $doB,
                    'nationality' => $nationality,
                    'gender' => $gender,
                    'marital_status' => $marital_status,
                    'country' => $country,
                    'city' => $province, // provinces - city is the same
                    'district' => $district,
                    'updated_at' => now()
                ]);
        }
    }

    public function user_summary(Request $request)
    {
        $id_candidate = auth()->user()->id; //Get uid

        $general_info = $request->input('general_info');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Update user summary
            DB::table('info_candidate')
                ->where('id', $id_candidate)
                ->update([
                    'general_info' => $general_info,
                    'updated_at' => now()
                ]);
        }
        $info_candidate_profile = Info_candidate::where('id_users', $id_candidate)->get();
        return response()->json([
            'success' => true,
            'info' => $info_candidate_profile
        ]);
    }

    public function user_skills(Request $request)
    {
        $id_candidate = auth()->user()->id; //Get uid

        //Get skills of user
        $key_skills_selected = Info_candidate::where('id_users', $id_candidate)->value('skills');
        $key_skills_selected = explode(",", $key_skills_selected);

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

            //Update key skills
            DB::table('info_candidate')
                ->where('id', $id_candidate)
                ->update([
                    'skills' => $request->input('keyskills'),
                    'updated_at' => now()
                ]);

        }

        return response()->json(['success' => true, 'key_skills_selected' => $key_skills_selected]);
    }

    public function user_languages(Request $request)
    {
        $id_candidate = auth()->user()->id; //Get uid
        $languagesId = $request->input('languagesId');
        $languagesName = $request->input('languagesName');
        $languagesProfi = $request->input('languagesProfi');

        if ($_SERVER['REQUEST_METHOD'] == 'PUT' && $languagesId != -1) {
            //Update user languages
            DB::table('languages')
                ->where('id', $languagesId)
                ->update([
                    'name_language' => $languagesName,
                    'proficiency' => $languagesProfi
                ]);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $languagesId == -1) {
//            //Create user languages
            DB::table('languages')
                ->insert([
                    'id_candidate' => $id_candidate,
                    'name_language' => $languagesName,
                    'proficiency' => $languagesProfi
                ]);
            return back()->with('success','Created Languages Successful');
        }

        $languages_data = Languages::where('id_candidate', $id_candidate)->get();

        return response()->json([
            'languages' => $languages_data
        ]);
    }

    public function user_delete_languages($id)
    {
        $languages_data = Languages::find($id);
        $languages_data->delete();


    }

    public function user_delete_employment_history($id)
    {
        DB::table('employment_history')
            ->where('id', '=', $id)
            ->delete();
        return back()->with('success', 'Deleted employment successful !!!');
    }

    public function user_employment_history(Request $request)
    {
        $id_candidate = auth()->user()->id; //Get uid
        $employment_history_id = $request->input('id');
        $position = $request->input('position');
        $company = $request->input('company');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $description = $request->input('description');

        if ($_SERVER['REQUEST_METHOD'] == 'PUT' && $employment_history_id != -1) {
//            Update employment history
            DB::table('employment_history')
                ->where('id', $employment_history_id)
                ->update([
                    'position' => $position,
                    'company' => $company,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'description' => $description
                ]);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $employment_history_id == -1) {
//            Create employment history
            DB::table('employment_history')
                ->insert([
                    'id_candidate' => $id_candidate,
                    'position' => $position,
                    'company' => $company,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'description' => $description
                ]);
        }
    }

    public function user_delete_education_history($id)
    {
        DB::table('education_history')
            ->where('id', '=', $id)
            ->delete();
        return back()->with('success', 'Deleted Education successful !!!');
    }

    public function user_education_history(Request $request)
    {
        $id_candidate = auth()->user()->id; //Get uid
        $education_history_id = $request->input('id');
        $major = $request->input('major');
        $school = $request->input('school');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $degree = $request->input('degree');
        $achievements = $request->input('achievements');

        if ($_SERVER['REQUEST_METHOD'] == 'PUT' && $education_history_id != -1) {
//            Update employment history
            DB::table('education_history')
                ->where('id', $education_history_id)
                ->update([
                    'id' => $education_history_id,
                    'major' => $major,
                    'school' => $school,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'degree' => $degree,
                    'achievements' => $achievements
                ]);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $education_history_id == -1) {
//            Create employment history
            DB::table('education_history')
                ->insert([
                    'id_candidate' => $id_candidate,
                    'major' => $major,
                    'school' => $school,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'degree' => $degree,
                    'achievements' => $achievements
                ]);
        }
    }

    public function user_working_preferences()
    {

        $id_candidate = auth()->user()->id; //Get uid

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            //Update user working preferences
            DB::table('working_preferences')
                ->where('id', $id_candidate)
                ->update([
                    'location_work' => Input::get('working_location'),
                    'expected_job_category' => Input::get('expected_job_category'),
                    'expected_job_level' => Input::get('expected_job_level'),
                    'expected_salary' => Input::get('expected_salary'),
                    'expected_benefits' => Input::get('benefit_selected')
                ]);
        }
    }

    public function user_unsave_job(Request $request){

        $id_candidate = auth()->user()->id; //Get uid

        if($_POST['unsave_submit'] == 'Unsave'){

            $id_posts = $request->input('id_posts');

            DB::table('saved_jobs')
                        ->where('id_candidate','=',  $id_candidate)
                        ->where('id_post_news','=', $id_posts)
                        ->delete();
            return back()->with('success','Unsave job successful');
        } else {
            return "Not found user unsave job";
        }
    }

    public function get_data(Request $request)
    {

        $info_candidate_profile = Info_candidate::where('id_users', 1)->get();
        return response()->json(['success' => true, 'info' => $info_candidate_profile]);
    }

    public function get_countries_json(Request $request)
    {
        $filename = "countries";
        $path = public_path() . "\\json\\${filename}.json";

        return response()->json(file_get_contents($path));
    }

    public function get_vietnam_provinces_cities_json(Request $request)
    {
        $filename = "vietnam_provinces_cities";
        $path = public_path() . "\\json\\${filename}.json";
        $json = json_decode(file_get_contents($path), true);


        return response()->json($json);
    }

}
