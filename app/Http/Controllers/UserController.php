<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailRecruiterJob;
use App\Jobs\SendMailUserJob;
use App\Mail\SendEmailMailable;
use App\Mail\SendEmailRecruiterMailable;
use App\Model\Group_Job_Category;
use App\Model\Info_candidate;
use App\Model\Job_Category;
use App\Model\Location;
use App\Model\Recruiter;
use App\Model\Status_candidate_profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use DB; // if u want to use Query SQL
use Illuminate\Support\Facades\DB;
use App\Model\Post_News;
use App\Model\Account_Recruiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

trait myInternet
{

    public function is_connected()
    {
        $connected = @fsockopen("www.example.com", 80);
        //website, port  (try 80 or 443)
        if ($connected) {
            $is_conn = true; //action when connected
            fclose($connected);
        } else {
            $is_conn = false; //action in connection failure
        }
        return $is_conn;
    }
}

class UserController extends Controller
{

    public function __construct()
    {
        $top_rate = DB::select('SELECT post_news.*, recruiter.* , level_salary.name_level_salary, type_work.name_type_work
                               FROM post_news
                               JOIN status_candidate_profile, recruiter, level_salary, type_work
                               WHERE post_news.id_posts = status_candidate_profile.id_post_news
                               AND post_news.status_post = 1
                               AND post_news.id_account_recruiter = recruiter.id_account_recruiter
                               AND post_news.id_level_salary = level_salary.id
                               AND post_news.id_type_work = type_work.id
                               GROUP BY status_candidate_profile.id_post_news
                               ORDER BY COUNT(*) desc LIMIT 3');

        $location_job = DB::select('SELECT location_work ,COUNT(*) as count
                                   FROM post_news
                                   WHERE post_news.status_post = 1
                                   GROUP BY location_work
                                   ORDER BY count DESC;');



        $category_job = DB::select('SELECT group_job_category.name_group_category, job_category.name_job_category,  COUNT(*) as count
                                   FROM group_job_category
                                   JOIN job_category
                                   WHERE group_job_category.id = job_category.id_group_category
                                   GROUP BY group_job_category.name_group_category
                                   ORDER BY group_job_category.name_group_category desc');

        $saved_jobs = DB::table('saved_jobs')->get();

        //Get Location
        $location = Location::all();

        //Job Category
        $all_job_category = Job_Category::all();

        // Sharing is caring
        View::share(compact('location_job',
            'top_rate',
            'category_job',
            'saved_jobs',
            'location',
            'all_job_category'
        ));
    }

    public function index()
    {


        //Get Job Group Categories
        $group_job_category = Group_Job_Category::all();




        if (!Auth::guest()) {
            $id_candidate = auth()->user()->id;
            $checkCreateNewInfo = Info_candidate::where('id_users', '=', $id_candidate)->exists();
            if ($checkCreateNewInfo == 1) {

                // user info found . Do something.

            } else {
                // user info not found
                // Create info candidate
                DB::table('info_candidate')
                    ->insert([
                        'id_users' => $id_candidate
                    ]);
            }
        }


        $post_news_by_date = DB::table('post_news', 'type_work', 'recruiter', 'level_salary', 'languages_profile', 'qualification', 'level')
            ->join('recruiter', 'post_news.id_account_recruiter', '=', 'recruiter.id_account_recruiter')
            ->join('type_work', 'type_work.id', '=', 'post_news.id_type_work')
            ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
            ->join('languages_profile', 'languages_profile.id', '=', 'post_news.id_languages_profile')
            ->join('qualification', 'qualification.id', '=', 'post_news.id_qualification')
            ->join('level', 'level.id', '=', 'post_news.id_level')
            ->select('post_news.*', 'recruiter.*', 'type_work.name_type_work',
                'level_salary.name_level_salary', 'languages_profile.name_languages_profile', 'qualification.name_qualification',
                'level.name_level')
            ->where('status_post','=',1)
            ->orderBy('id_service_pack','ASC')
            ->orderBy('date_posted', 'DESC')
            ->paginate(10);

        $post_news_by_full_time = DB::table('post_news', 'type_work', 'recruiter', 'level_salary', 'languages_profile', 'qualification', 'level')
            ->join('recruiter', 'post_news.id_account_recruiter', '=', 'recruiter.id_account_recruiter')
            ->join('type_work', 'type_work.id', '=', 'post_news.id_type_work')
            ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
            ->join('languages_profile', 'languages_profile.id', '=', 'post_news.id_languages_profile')
            ->join('qualification', 'qualification.id', '=', 'post_news.id_qualification')
            ->join('level', 'level.id', '=', 'post_news.id_level')
            ->select('post_news.*', 'recruiter.*', 'type_work.name_type_work',
                'level_salary.name_level_salary', 'languages_profile.name_languages_profile', 'qualification.name_qualification',
                'level.name_level')
            ->where('status_post','=',1)
            ->whereIn('id_type_work', [1, 2])
            ->orderBy('id_service_pack','ASC')
            ->paginate(10);

        $post_news_by_part_time = DB::table('post_news', 'type_work', 'recruiter', 'level_salary', 'languages_profile', 'qualification', 'level')
            ->join('recruiter', 'post_news.id_account_recruiter', '=', 'recruiter.id_account_recruiter')
            ->join('type_work', 'type_work.id', '=', 'post_news.id_type_work')
            ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
            ->join('languages_profile', 'languages_profile.id', '=', 'post_news.id_languages_profile')
            ->join('qualification', 'qualification.id', '=', 'post_news.id_qualification')
            ->join('level', 'level.id', '=', 'post_news.id_level')
            ->select('post_news.*', 'recruiter.*', 'type_work.name_type_work',
                'level_salary.name_level_salary', 'languages_profile.name_languages_profile', 'qualification.name_qualification',
                'level.name_level')
            ->where('status_post','=',1)
            ->whereIn('id_type_work', [3, 4])
            ->orderBy('id_service_pack','ASC')
            ->paginate(10);

        $post_news_by_internship = DB::table('post_news', 'type_work', 'recruiter', 'level_salary', 'languages_profile', 'qualification', 'level')
            ->join('recruiter', 'post_news.id_account_recruiter', '=', 'recruiter.id_account_recruiter')
            ->join('type_work', 'type_work.id', '=', 'post_news.id_type_work')
            ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
            ->join('languages_profile', 'languages_profile.id', '=', 'post_news.id_languages_profile')
            ->join('qualification', 'qualification.id', '=', 'post_news.id_qualification')
            ->join('level', 'level.id', '=', 'post_news.id_level')
            ->select('post_news.*', 'recruiter.*', 'type_work.name_type_work',
                'level_salary.name_level_salary', 'languages_profile.name_languages_profile', 'qualification.name_qualification',
                'level.name_level')
            ->where('status_post','=',1)
            ->whereIn('id_type_work', [5])
            ->orderBy('id_service_pack','ASC')
            ->paginate(10);

        return view('user.index')
            ->with(compact('post_news_by_date',
                'key_skills_selected',
                'job_level',
                'group_job_category',
                'post_news_by_full_time',
                'post_news_by_part_time',
                'post_news_by_internship'

            ));

    }

    public function about()
    {

//        $post_news = Account_Recruiter::find(1)->post_news;
//
//        foreach ($post_news as $p )
//        {
//            return $p. '123';
//        }

        $url = Storage::url('cv/nguyen_thanh_tam_1534951924.pdf');
        return 'Result: ' . $url;
//        return view('user.about');
    }

    public function blog()
    {
        return view('user.blog');
    }

    public function category()
    {
        return view('user.category');

    }

    public function search_category_quick(Request $request, $category_name)
    {

        $category_search_quick = DB::table('post_news')->whereRaw("MATCH(name_job_category) AGAINST('" . $category_name . "')")
            ->join('type_work', 'post_news.id_type_work', '=', 'type_work.id')
            ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
            ->join('recruiter', 'recruiter.id_account_recruiter', '=', 'post_news.id_account_recruiter')
            ->where('status_post','=',1)
            ->orderBy('id_service_pack','ASC')
            ->paginate(10);

        return view('user.category')
            ->with(compact('category_search_quick'
            ));
//        return ''.$category_search_quick;
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $select_area_search = $request->get('select_area_search');
        $select_category_search = $request->get('select_category_search');

        if ($select_area_search == '-1') {
            $all = $search . $select_category_search;
            $category_search_custom = DB::table('post_news')
                ->whereRaw("MATCH(name_job_category) AGAINST('" . $all . "')")
                ->orWhereRaw("MATCH(skills) AGAINST('" . $all . "')")
                ->orwhereRaw("MATCH(job_title) AGAINST('" . $all . "')")
                ->join('type_work', 'post_news.id_type_work', '=', 'type_work.id')
                ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
                ->join('recruiter', 'recruiter.id_account_recruiter', '=', 'post_news.id_account_recruiter')
                ->orderBy('id_service_pack','ASC')
                ->paginate(10);

        } else if ($select_category_search == '-1') {
            $all = $search . $select_area_search;
            $category_search_custom = DB::table('post_news')
                ->whereRaw("MATCH(location_work) AGAINST('" . $all . "')")
                ->orwhereRaw("MATCH(job_title) AGAINST('" . $all . "')")
                ->orWhereRaw("MATCH(skills) AGAINST('" . $all . "')")
                ->join('type_work', 'post_news.id_type_work', '=', 'type_work.id')
                ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
                ->join('recruiter', 'recruiter.id_account_recruiter', '=', 'post_news.id_account_recruiter')
                ->orderBy('id_service_pack','ASC')
                ->paginate(10);

        } else if ($search == '') {
            $all = $search . $select_area_search;
            $category_search_custom = DB::table('post_news')
                ->whereRaw("MATCH(name_job_category) AGAINST('" . $all . "')")
                ->orWhereRaw("MATCH(location_work) AGAINST('" . $all . "')")
                ->join('type_work', 'post_news.id_type_work', '=', 'type_work.id')
                ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
                ->join('recruiter', 'recruiter.id_account_recruiter', '=', 'post_news.id_account_recruiter')
                ->orderBy('id_service_pack','ASC')
                ->paginate(10);
        } else {
            $all = $search . $select_category_search . $select_area_search;
            $category_search_custom = DB::table('post_news')
                ->whereRaw("MATCH(skills) AGAINST('" . $all . "')")
                ->orwhereRaw("MATCH(job_title) AGAINST('" . $all . "')")
                ->orWhereRaw("MATCH(location_work) AGAINST('" . $all . "')")
                ->orWhereRaw("MATCH(name_job_category) AGAINST('" . $all . "')")
                ->join('type_work', 'post_news.id_type_work', '=', 'type_work.id')
                ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
                ->join('recruiter', 'recruiter.id_account_recruiter', '=', 'post_news.id_account_recruiter')
                ->orderBy('id_service_pack','ASC')
                ->paginate(10);
        }




        return view('user.search')
            ->with(compact('category_search_custom'
            ));
    }

    public function details($id)
    {

        $post_news = DB::table('post_news', 'type_work', 'recruiter', 'level_salary', 'languages_profile', 'qualification', 'level')
            ->join('recruiter', 'post_news.id_account_recruiter', '=', 'recruiter.id_account_recruiter')
            ->join('type_work', 'type_work.id', '=', 'post_news.id_type_work')
            ->join('level_salary', 'level_salary.id', '=', 'post_news.id_level_salary')
            ->join('languages_profile', 'languages_profile.id', '=', 'post_news.id_languages_profile')
            ->join('qualification', 'qualification.id', '=', 'post_news.id_qualification')
            ->join('level', 'level.id', '=', 'post_news.id_level')
            ->select('post_news.*', 'recruiter.*', 'type_work.name_type_work',
                'level_salary.name_level_salary', 'languages_profile.name_languages_profile', 'qualification.name_qualification',
                'level.name_level')
            ->where('post_news.id_posts', '=', $id)
            ->get();

        $info_candidate = null;
        if (!Auth::guest()) {
            $info_candidate = DB::table('info_candidate', 'users')
                ->join('users', 'info_candidate.id_users', '=', 'users.id')
                ->select('info_candidate.*', 'users.*')
                ->where('users.id', '=', auth()->user()->id)
                ->get();
        }


        return view('user.details')
            ->with('post_news', $post_news)
            ->with('info_candidate', $info_candidate);
    }

    /*
       * Send email to recruiter , save to the database
       * Check connect Internet
    */
    use myInternet;

    public function applyJob(Request $request)
    {

        $id_candidate = null;
        static $fileNameToStore;
        if (!Auth::guest() && ($this->is_connected() == 1)) {

            //Get data from apply form
            $id_account_recruiter = $request->input('id_account_recruiter');
            $id_candidate = auth()->user()->id;
            $id_post = $request->input('id_post');
            $status_profile = "Waiting";

            //Get info for send mail
            $recruiter = Recruiter::find($id_account_recruiter);
            $companyRecruiter = $recruiter->company_name;

            $acc_recruiter = Account_Recruiter::find($id_account_recruiter);
            $email_recruiter = $acc_recruiter->email;

            $post_news = Post_News::find($id_post);
            $jobTitle = $post_news->job_title;

            $info_candidate = Info_candidate::find($id_candidate);
            $full_name = $info_candidate->last_name . " " . $info_candidate->first_name;
            $file_name_cv = $info_candidate->cv;

            if ($_POST['optradio'] == "fileUpload") {

                $this->validate($request, [
                    'fileToUpload' => 'required|max:1999|mimes:doc,pdf,docx,zip'
                ]);

                if ($this->check_ApplyJob_Exists($id_candidate, $id_post) != 1) {

                    $cv_exists = Storage::disk('cv')->exists($file_name_cv);

                    if ($request->file('fileToUpload')->isValid()) {

                        if($cv_exists == 1){
                            Storage::disk('cv')->delete($file_name_cv); // Delete leftover
                        }
                        //Handle File Upload
                        $fileUpload = $request->file('fileToUpload');
                        //File Name with the extension
                        $fileNameWithExt = $fileUpload->getClientOriginalName();
                        //Get just filename
                        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $fileUpload->getClientOriginalExtension();
                        //FileName to store
                        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                        //Upload file
                        $request->file('fileToUpload')->storeAs('public/cv', $fileNameToStore);

                    }

                    //Create Status_candidate_profile
                    $status_candidate_profile = new Status_candidate_profile;
                    $status_candidate_profile->id_account_recruiter = $id_account_recruiter;
                    $status_candidate_profile->id_candidate = $id_candidate;
                    $status_candidate_profile->id_post_news = $id_post;
                    $status_candidate_profile->status_profile = $status_profile;
                    $status_candidate_profile->save();

                    //Update Info_candidate
                    DB::table('info_candidate')
                        ->where('id', $id_candidate)
                        ->update([
                            'cv' => $fileNameToStore,
                            'datetime_upload_cv' => now()
                        ]);

//                    Mail::to(auth()->user()->email)
//                        ->queue(new SendEmailMailable());
//
//                    Mail::to($email_recruiter)
//                        ->queue(new SendEmailRecruiterMailable());

                    SendMailUserJob::dispatch()
                        ->delay(now()->addSeconds(20));
                    SendMailRecruiterJob::dispatch()
                        ->delay(now()->addSeconds(20));

                    return back()->with('success', 'Apply job with file upload ! ');
                } else {
                    return back()->with('error', 'You have already applied for this company. Please check the information !');
                }
            } else if ($_POST['optradio'] == "existsCV") {

                if ($this->check_ApplyJob_Exists($id_candidate, $id_post) != 1) {

                    //Create Status_candidate_profile
                    $status_candidate_profile = new Status_candidate_profile;
                    $status_candidate_profile->id_account_recruiter = $id_account_recruiter;
                    $status_candidate_profile->id_candidate = $id_candidate;
                    $status_candidate_profile->id_post_news = $id_post;
                    $status_candidate_profile->status_profile = $status_profile;
                    $status_candidate_profile->save();

//                    Mail::to(auth()->user()->email)
//                        ->queue(new SendEmailMailable());
//
//                    Mail::to($email_recruiter)
//                        ->queue(new SendEmailRecruiterMailable());

                    SendMailUserJob::dispatch()
                        ->delay(now()->addSeconds(20));
                    SendMailRecruiterJob::dispatch()
                        ->delay(now()->addSeconds(20));

                    return back()->with('success', 'Apply job with cv exists ! ');
                } else {
                    return back()->with('error', 'You have already applied for this company. Please check the information !');
                }

            }
        } else {
            return back()->with('error', 'Please check your connection to internet');
        }

        return back();
    }

    //Use for check status apply job of candidate
    public function check_ApplyJob_Exists($id_candidate, $id_post_news)
    {

        $flags = DB::table('status_candidate_profile')
            ->where('id_candidate', '=', $id_candidate)
            ->where('id_post_news', '=', $id_post_news)
            ->first();
        if ($flags) {
            return 1;
        } else
            return 0;
    }

    public function replace_resume_cv(Request $request){

        $this->validate($request, [
            'file_replace_resume_cv' => 'required|max:1999'
        ]);

        $id_candidate = auth()->user()->id;
        $info_candidate = Info_candidate::find($id_candidate);

        if($request->hasFile('file_replace_resume_cv')){
            if ($request->file('file_replace_resume_cv')->isValid()) {


                $file_name_cv = $info_candidate->cv;
                $cv_exists = Storage::disk('cv')->exists($file_name_cv);

                if($cv_exists == 1){
                    Storage::disk('cv')->delete($file_name_cv); // Delete leftover
                }
                //Handle File Upload
                $fileUpload = $request->file('file_replace_resume_cv');
                //File Name with the extension
                $fileNameWithExt = $fileUpload->getClientOriginalName();
                //Get just filename
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $fileUpload->getClientOriginalExtension();
                //FileName to store
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                //Upload file
                $request->file('file_replace_resume_cv')->storeAs('public/cv', $fileNameToStore);

                //Update Info_candidate
                DB::table('info_candidate')
                    ->where('id', $id_candidate)
                    ->update([
                        'cv' => $fileNameToStore,
                        'datetime_upload_cv' => now()
                    ]);
                return back()->with('success','Replace resume successful !!!');
            } else {
                return back()->with('error','Please check again type file input !!!');
            }
        } else {
            return back()->with('error','File Not Found !!!');
        }

    }

    public function saved_jobs(Request $request)
    {

        $id_candidate = $request->get('id_candidate');
        $id_post_news = $request->get('id_post_news');

        $check_saved_jobs_exists = DB::table('saved_jobs')
            ->where('id_candidate','=',$id_candidate)
            ->where('id_post_news','=',$id_post_news)
            ->exists();

        if($check_saved_jobs_exists === false){
            DB::table('saved_jobs')
                ->insert([
                    'id_candidate' => $id_candidate,
                    'id_post_news' => $id_post_news
                ]);
        }
    }

    public function check_job_saved()
    {

//        $id_candidate = auth()->user()->id;
//        $flags = DB::table('saved_jobs')
//            ->where('id_candidate', '=', $id_candidate)
//            ->where('id_post_news', '=', $id_post_news)
//            ->first();
//        if ($flags) {
//            return 1;
//        } else
//            return 0;
    }

}
