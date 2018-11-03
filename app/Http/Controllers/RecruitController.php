<?php

namespace App\Http\Controllers;

use App\Model\Job_Category;
use App\Model\Key_Skills;
use App\Model\Location;
use App\Model\Post_News;
use App\Model\Recruiter;
use App\Model\Status_candidate_profile;
use App\Model\Info_candidate;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RecruitController extends Controller
{
    public function __construct(Request $request)
    {


    }


    public function sign_out(Request $request)
    {

        $request->session()->forget('recruitID');
        return redirect('admin/register');
    }

    public function register(Request $request)
    {


        if ($request->isMethod('POST')) {
            $email = $request->input('emailReg');
            $password = $request->input('passwordReg');
            $password_confirmation = $request->input('password_confirmation');
            $company_name = $request->input('company_name');
            $contact_person_name = $request->input('contact_person_name');
            $contact_phone_number = $request->input('contact_phone_number');
            $company_address = $request->input('company_address');
            $company_city = $request->input('company_city');
            $agree = $request->input('agree');

            $this->validate($request, [
                'agree' => 'required',
                'emailReg' => 'required',
                'passwordReg' => 'required',
                'password_confirmation' => 'required',
                'company_name' => 'required',
                'contact_person_name' => 'required',
                'contact_phone_number' => 'required',
                'company_address' => 'required',
                'company_city' => 'required',

            ]);

            $check_email_exist = DB::table('account_recruiter')->where('email', '=', $email)->exists();

            if ($password != $password_confirmation) {
                return back()->withInput()->with('error', 'Your password and confirmation not match');
            } else if ($check_email_exist == true && $password == $password_confirmation) {
                return back()->withInput()->with('error', 'This email already exists. Please choose another email ');
            } else {

                DB::table('account_recruiter')->insert([
                    'email' => $email,
                    'password' => Hash::make($password),
                    'created_at' => now()

                ]);

                $account_recruiter = DB::table('account_recruiter')
                    ->where('email', '=', $email)
                    ->select('id')
                    ->first();

                DB::table('recruiter')->insert([
                    'id_account_recruiter' => $account_recruiter->id,
                    'contact_name' => $contact_person_name,
                    'contact_phone_number' => $contact_phone_number,
                    'company_name' => $company_name,
                    'company_address' => $company_address,
                    'created_at' => now()

                ]);

                $check_email_exist = DB::table('recruiter')->where('id_account_recruiter', '=', $account_recruiter->id)->exists();
                if ($check_email_exist == true) {
                    return back()->withInput()->with('success', 'Your account have created successful.');
                } else {
                    return back()->withInput()->with('error', 'Your account have created failure.');
                }

            }
        }

        return view('recruit.register');
    }

    public function login(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');
//        $hashPassValue = Hash::make($password);
//        Hash::check($hashPassValue, $recruit->password)


        $validate_email_recruit = DB::table('account_recruiter')
            ->where('email', '=', $email)
            ->select('email', 'password', 'id')
            ->first();

        $recruitId = $validate_email_recruit->id;

        if ($validate_email_recruit != null) {
            if ($email === $validate_email_recruit->email && Hash::check($password, $validate_email_recruit->password)) {
                // Set Session for ID Recruiter
                $request->session()->forget('recruitID');
                $request->session()->put('recruitID', $recruitId);
                echo 'Login';
            } else echo 'Not Match';
        }
    }

    public function check_Image_Exists($_accountRecruiter, $_fileNameToStore)
    {

        $flags = DB::table('recruiter')
            ->where('id_account_recruiter', '=', $_accountRecruiter)
            ->where('company_avatar', '=', $_fileNameToStore)
            ->first();
        if ($flags) {
            return 1;
        } else
            return 0;
    }

    public function account_info(Request $request)
    {

        $recruitId = $request->session()->get('recruitID');

        if ($request->isMethod('PUT')) {

            $this->validate($request, [
                'companyName' => 'required|max:255',
                'contactName' => 'required',
            ]);

            $companyName = $request->input('companyName');
            $companySize = $request->input('companySize');
            $companyAddress = $request->input('companyAddress');
            $contactName = $request->input('contactName');
            $contactPhoneNumber = $request->input('contactPhoneNumber');
            $website = $request->input('website');

            DB::table('recruiter')
                ->update([
                    'company_name' => $companyName,
                    'company_size' => $companySize,
                    'company_address' => $companyAddress,
                    'contact_name' => $contactName,
                    'contact_phone_number' => $contactPhoneNumber,
                    'website' => $website
                ]);

            return view('recruit.account_info');
        }
        if ($request->isMethod('POST')) {

            $this->validate($request, [
                'logoCompany' => 'required | mimes:jpeg,jpg,png | max:1000'
            ]);

            if ($request->file('logoCompany')->isValid()) {

                //Handle File Upload
                $fileUpload = $request->file('logoCompany');
                //File Name with the extension
                $fileNameWithExt = $fileUpload->getClientOriginalName();
                //Get just filename
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = strtolower($fileUpload->getClientOriginalExtension());
                //FileName to store
                $fileNameToStore = $recruitId . '_' . $fileName . '.' . $extension;
                //Upload file
                $request->file('logoCompany')->storeAs('public/logo_company', $fileNameToStore);

                if ($this->check_Image_Exists($recruitId, $fileNameToStore) == 1) {
                    return back()->withErrors('error', 'This photo is being selected as the avatar!!!');
                } else {

                    $fileNameAvatar = Recruiter::where('id_account_recruiter', $recruitId)->value('company_avatar');
                    Storage::disk('logo_company')->delete($fileNameAvatar); // Delete leftover
                    DB::table('recruiter')
                        ->where('id_account_recruiter', $recruitId)
                        ->update([
                            'company_avatar' => $fileNameToStore,
                            'updated_at' => now()
                        ]);
                    return back();
                }
            }
        }

        return view('recruit.account_info');
    }


    public function dashbroad()
    {
        return view('recruit.dashbroad');
    }

    public function post_news()
    {

        $level_job = DB::select('SELECT * FROM level');

        $languages_profile = DB::select('SELECT * FROM languages_profile');

        // $benefits = DB::select('SELECT * FROM benefits');

        $fina = DB::select('SELECT name_job_category
                                   FROM job_category
                                   WHERE id_group_category = 1
                                   ORDER BY name_job_category DESC;');

        $tech = DB::select('SELECT name_job_category
                                   FROM job_category
                                   WHERE id_group_category = 2
                                   ORDER BY name_job_category DESC;');

        $front = DB::select('SELECT name_job_category
                                   FROM job_category
                                   WHERE id_group_category = 3
                                   ORDER BY name_job_category DESC;');

        $south = DB::select('SELECT name
                           FROM location
                           WHERE region = "South"
                           ORDER BY name DESC;');

        $north = DB::select('SELECT name
                           FROM location
                           WHERE region = "North"
                           ORDER BY name DESC;');

        $middle = DB::select('SELECT name
                           FROM location
                           WHERE region = "Middle"
                           ORDER BY name DESC;');

        $other = DB::select('SELECT name
                           FROM location
                           WHERE region = "Other"
                           ORDER BY name DESC;');

        $salary = DB::select('SELECT * FROM level_salary');

        $qualification = DB::select('SELECT * FROM qualification');

        $type_work = DB::select('SELECT * FROM type_work ');

        $job_skills = Key_Skills::all('name_key_skills');

        $job_category = Job_Category::all('name_job_category');

        $job_location = Location::all('name');

        return view('recruit.post_news')
            ->with('level_job', $level_job)->with('languages_profile', $languages_profile)
            ->with('fina', $fina)->with('tech', $tech)->with('front', $front)
            ->with('south', $south)->with('north', $north)->with('middle', $middle)->with('other', $other)
            ->with('qualification', $qualification)->with('type_work', $type_work)
            ->with('salary', $salary)
            ->with('job_skills', $job_skills)
            ->with('job_category', $job_category)
            ->with('job_location', $job_location);
        // return $south;
    }


    public function recruit_post_news(Request $request)
    {
        $recruitId = $request->session()->get('recruitID');

        $total_job = DB::select(DB::raw(' SELECT post_news.*, level_salary.name_level_salary, level.name_level, qualification.name_qualification, type_work.name_type_work, languages_profile.name_languages_profile, count(status_candidate_profile.id_post_news) as applied
                                    FROM post_news 
                                    LEFT OUTER JOIN status_candidate_profile
                                    ON post_news.id_posts = status_candidate_profile.id_post_news

                                    JOIN level_salary
                                    ON post_news.id_level_salary = level_salary.id
                                    JOIN level
                                    ON post_news.id_level = level.id
                                    JOIN qualification
                                    ON post_news.id_qualification = qualification.id
                                    JOIN type_work
                                    ON post_news.id_type_work = type_work.id
                                    JOIN languages_profile
                                    ON post_news.id_languages_profile = languages_profile.id

                                    WHERE post_news.id_account_recruiter = ' . $recruitId . '
                                    -- post_news.status_post : news delete or not (2 = deleted)
                                    AND post_news.status_post = 1 
                                    GROUP BY post_news.job_title ASC')); //$query is raw SQL query say SELECT * FROM a LEFT JOIN b on a.id = b.a_id GROUP BY a.id


        $candidates = DB::select('  SELECT status_candidate_profile.*, users.*,info_candidate.*,status_candidate_profile.id as id_status_candidate_profile
                                    FROM status_candidate_profile 
                                    JOIN users
                                    ON users.id = status_candidate_profile.id_candidate 
                                    JOIN info_candidate
                                    ON info_candidate.id = status_candidate_profile.id_candidate                               
                                    WHERE status_candidate_profile.id_account_recruiter = ' . $recruitId . '');


        return view('recruit.dashbroad')->with('total_job', $total_job)
            ->with('candidates', $candidates);
        // return $total_job;
    }

    public function edit_post($id)
    {
        $level_job = DB::select('SELECT * FROM level');

        $languages_profile = DB::select('SELECT * FROM languages_profile');

        // $benefits = DB::select('SELECT * FROM benefits');

        $fina = DB::select('SELECT name_job_category
                                   FROM job_category
                                   WHERE id_group_category = 1
                                   ORDER BY name_job_category DESC;');

        $tech = DB::select('SELECT name_job_category
                                   FROM job_category
                                   WHERE id_group_category = 2
                                   ORDER BY name_job_category DESC;');

        $front = DB::select('SELECT name_job_category
                                   FROM job_category
                                   WHERE id_group_category = 3
                                   ORDER BY name_job_category DESC;');

        $south = DB::select('SELECT name
                           FROM location
                           WHERE region = "South"
                           ORDER BY name DESC;');

        $north = DB::select('SELECT name
                           FROM location
                           WHERE region = "North"
                           ORDER BY name DESC;');

        $middle = DB::select('SELECT name
                           FROM location
                           WHERE region = "Middle"
                           ORDER BY name DESC;');

        $other = DB::select('SELECT name
                           FROM location
                           WHERE region = "Other"
                           ORDER BY name DESC;');

        $salary = DB::select('SELECT * FROM level_salary');

        $qualification = DB::select('SELECT * FROM qualification');

        $type_work = DB::select('SELECT * FROM type_work ');

        $edit = DB::table('post_news')
            ->where('id_posts', '=', $id)
            ->get();

        $job_category = Job_Category::all('name_job_category');
        $job_location = Location::all('name');
        $job_skills = Key_Skills::all('name_key_skills');


        return view('recruit.edit_post')->with('edit', $edit)
            ->with('level_job', $level_job)->with('languages_profile', $languages_profile)
            ->with('fina', $fina)->with('tech', $tech)->with('front', $front)
            ->with('south', $south)->with('north', $north)->with('middle', $middle)->with('other', $other)
            ->with('qualification', $qualification)->with('type_work', $type_work)
            ->with('salary', $salary)
            ->with('job_category', $job_category)
            ->with('job_location', $job_location)
            ->with('job_skills', $job_skills);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $recruitId = $request->session()->get('recruitID');

        $job_title = $request->job_title;
        $number_recruits = $request->number_recruits;
        $id_level = $request->id_level;
        $id_type_work = $request->id_type_work;
        $id_level_salary = $request->id_level_salary;
        $name_job_category = $request->name_job_category;
        $location_work = $request->location_work;
        $description_work = $request->description_work;
        $require_work = $request->require_work;
        $skills = $request->skills;
        $year_experience = $request->year_experience;
        $gender = $request->gender;
        $id_languages_profile = $request->id_languages_profile;
        $id_qualification = $request->id_qualification;
        $id_service_pack = $request->id_service_pack;
        $time_for_submission = $request->time_for_submission;
        $benefit = $request->benefit;


        $post_news = new Post_News;
        $post_news->id_account_recruiter = $recruitId;
        $post_news->job_title = $job_title;
        $post_news->number_recruits = $number_recruits;
        $post_news->id_level = $id_level;
        $post_news->id_type_work = $id_type_work;
        $post_news->id_level_salary = $id_level_salary;
        $post_news->name_job_category = $name_job_category;
        $post_news->location_work = $location_work;
        $post_news->description_work = $description_work;
        $post_news->require_work = $require_work;
        $post_news->skills = $skills;
        $post_news->year_experience = $year_experience;
        $post_news->gender = $gender;
        $post_news->id_languages_profile = $id_languages_profile;
        $post_news->id_qualification = $id_qualification;
        $post_news->id_service_pack = $id_service_pack;
        $post_news->date_posted = now();
        $post_news->time_for_submission = $time_for_submission;
        $post_news->benefit = $benefit;
        $post_news->status_post = 1;
        $post_news->save();


        //return $name_job_category;
//        return redirect('/admin/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job_title = $request->job_title;
        $number_recruits = $request->number_recruits;
        $id_level = $request->id_level;
        $id_type_work = $request->id_type_work;
        $id_level_salary = $request->id_level_salary;
        $name_job_category = $request->name_job_category;
        $location_work = $request->location_work;
        $description_work = $request->description_work;
        $require_work = $request->require_work;
        $skills = $request->skills;
        $year_experience = $request->year_experience;
        $gender = $request->gender;
        $benefit = $request->benefit;
        $id_languages_profile = $request->id_languages_profile;
        $id_qualification = $request->id_qualification;
        $time_for_submission = $request->time_for_submission;

        DB::table('post_news')
            ->where('id_posts', $id)
            ->update(
                [
                    'job_title' => $job_title,
                    'number_recruits' => $number_recruits,
                    'id_level' => $id_level,
                    'id_type_work' => $id_type_work,
                    'id_level_salary' => $id_level_salary,
                    'name_job_category' => $name_job_category,
                    'location_work' => $location_work,
                    'description_work' => $description_work,
                    'require_work' => $require_work,
                    'skills' => $skills,
                    'year_experience' => $year_experience,
                    'gender' => $gender,
                    'benefit' => $benefit,
                    'id_languages_profile' => $id_languages_profile,
                    'id_qualification' => $id_qualification,
                    'time_for_submission' => $time_for_submission,
                    'status_post' => 1,
                    'updated_at' => now(),
                ]
            );

//        return redirect('/admin/dashbroad');
//         return $name_job_category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete_post($id)
    {
        DB::table('post_news')
            ->where('id_posts', $id)
            ->update(
                [
                    'status_post' => 2,
                ]
            );

        return redirect('/admin/dashbroad');
    }

    public function show_profile($id)
    {
        $profile_user = DB::table('status_candidate_profile')
            ->join('users', 'users.id', '=', 'status_candidate_profile.id_candidate')
            ->join('info_candidate', 'info_candidate.id_users', '=', 'status_candidate_profile.id_candidate')
            ->where('status_candidate_profile.id', '=', $id)
            ->get();

        DB::table('status_candidate_profile')
            ->where('id', $id)
            ->update(
                [
                    'status_profile' => 'seen',
                ]
            );

        return view('recruit.show_profile')->with('profile_user', $profile_user);
        // return $profile_user;
    }

    public function search_post(Request $request)
    {
        $recruitId = $request->session()->get('recruitID');
        $search = $request->search;
        $result = Post_News::leftJoin('status_candidate_profile', 'status_candidate_profile.id_post_news', 'post_news.id_posts')
            ->where('post_news.job_title', 'like', '%' . $search . '%')
            ->where('post_news.id_account_recruiter', '=', $recruitId)
            ->where('post_news.status_post', '=', 1)
            ->orderBy('post_news.created_at', 'desc')
            ->select('post_news.id_posts', 'post_news.job_title', 'post_news.created_at')
            ->groupBy('post_news.job_title')
            ->get();

        return response(['code' => 0, 'status' => 'success', 'result' => $result], 200)->header('Content-Type', 'text/plain');
    }

}
