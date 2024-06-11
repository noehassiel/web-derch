<?php

namespace App\Http\Controllers;

use Str;
use Auth;

use File;
use Mail;
use Image;

use Session;
use Carbon\Carbon;
use App\Models\Job;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Comment;

use App\Models\Project;
use App\Models\Campaing;

use App\Models\Category;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\LegalText;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');

        $banner = Banner::where('is_active', true)->orderBy('updated_at', 'asc')->get()->take(1);

        $campaings = Campaing::where('status', true)->get()->take(9);

        $comments = Comment::get()->take(4);

        return view('front.index')
            ->with('banner', $banner)
            ->with('campaings', $campaings)
            ->with('comments', $comments);
    }


    public function examen()
    {

        return view('examen');
    }




    public function jobs()
    {
        $jobs = Job::where('status', true)->orderBy('created_at', 'asc')->paginate(10);

        return view('front.jobs')
            ->with('jobs', $jobs);
    }

    public function job($slug)
    {
        $job = job::where('slug', $slug)->first();

        return view('front.job_detail')
            ->with('job', $job);
    }

    public function applyTo(Request $request, $id)
    {

        $banner = Banner::where('is_active', true)->orderBy('updated_at', 'asc')->get()->take(1);

        $campaings = Campaing::where('status', true)->get()->take(6);

        $comments = Comment::get()->take(4);

        $validator = Validator::make(request()->all(), [
            'g-recaptcha-response' => 'recaptcha',
        ]);

        // Verificamos si hay algún error
        if ($validator->fails()) {

            $errors = $validator->errors();

            return view('front.index')
                ->with('banner', $banner)
                ->with('campaings', $campaings)
                ->with('errors', $errors)
                ->with('comments', $comments);
        } else {

            $request->validate([
                'file' => 'required|file|max:2000|mimes:pdf',
            ]);

            $applicant = new Applicant;

            $applicant->job_id = $id;

            $applicant->names = $request->names;
            $applicant->lastnames = $request->lastnames;
            $applicant->phone = $request->phone;
            $applicant->email = $request->email;

            /* Crear Slug del Nombre */
            $nameslug = Str::slug($request->names);


            if ($request->hasFile('file')) {
                $archivo = $request->file('file');
                $filename = $nameslug . '-cv.'   . $archivo->getClientOriginalExtension();

                $location = public_path('docs/applicants/');
                $archivo->move($location, $filename);

                $applicant->file = $filename;
            }

            $applicant->save();

            $job = Job::find($id);

            //Correo
            $data = array(
                'name' => $applicant->names,
                'email' => $applicant->email,
                'lastname' => $applicant->lastnames,
                'phone' => $applicant->phone,
                'job' => $job->name,
            );

            $email = $applicant->email;
            $name = $applicant->name;

            $files = [
                public_path('docs/applicants/' . $applicant->file),
            ];


            try {
                Mail::send('mail.apply', $data, function ($message) use ($data, $email, $name) {
                    $message->to($email, $name)->subject('Hey! Gracias por tu postulación.');

                    $message->from('postulaciones.derch@gmail.com', 'Derch');
                });

                Mail::send('mail.new_user', $data, function ($message) use ($files, $data) {
                    $message->to('miriam.derch@gmail.com', 'Derch')->subject('Hey! Se han postulado para una vacante');

                    $message->from('postulaciones.derch@gmail.com', 'Derch');

                    foreach ($files as $file) {
                        $message->attach($file);
                    }
                });

                return view('front.index')
                    ->with('banner', $banner)
                    ->with('campaings', $campaings)
                    ->with('comments', $comments);
            } catch (Exception $e) {

                Session::flash('error', 'No se ha identificado servidor SMTP en la plataforma. Configuralo correctamente para enviar correos desde tu sistema.');
                return response()->json(['mensaje' => 'No se ha identificado servidor SMTP en la plataforma. Configuralo correctamente para enviar correos desde tu sistema.'], 200);


                return view('front.index')
                    ->with('banner', $banner)
                    ->with('campaings', $campaings)
                    ->with('comments', $comments);
            }
        }
    }

    public function projects()
    {
        $projects = Project::where('is_active', true)->orderBy('created_at', 'asc')->get();

        return view('front.projects')
            ->with('projects', $projects);
    }

    public function legalText()
    {

        return view('front.privacy');
    }

    public function posts()
    {
        $today = Carbon::now()->format('Y-m-d');

        $posts = Post::where('is_publish', 1)->whereDate('publish_date', '<=', $today)->get();

        $next_post = Post::where('is_publish', 1)->where('publish_date', '>', $today)->first();

        $n_days = 0;
        $n_hours = 0;
        $n_min = 0;
        $n_sec = 0;

        if (!empty($next_post)) {
            $n_days = Carbon::parse($next_post->publish_date)->diffInDays($today);
            $n_hours = Carbon::parse($next_post->publish_date)->diffInHours($today);
            $n_min = Carbon::parse($next_post->publish_date)->diffInMinutes($today);
            $n_sec = Carbon::parse($next_post->publish_date)->diffInSeconds($today);
        }

        return view('front.posts')
            ->with('posts', $posts)
            ->with('next_post', $next_post)
            ->with('n_days', $n_days)
            ->with('n_hours', $n_hours)
            ->with('n_min', $n_min)
            ->with('n_sec', $n_sec);
    }

    public function detailPost($slug)
    {
        $today = Carbon::now()->format('Y-m-d');
        $post = Post::where('slug', $slug)->first();

        $posts = Post::where('is_publish', true)->where('name', '!=', $post->name)->where('publish_date', '<=', $today)->orderBy('created_at', 'asc')->get()->take(6);

        return view('front.detail_post')
            ->with('post', $post)
            ->with('posts', $posts);
    }

    public function category($category_slug)
    {
        $today = Carbon::now()->format('Y-m-d');
        $category = Category::where('slug', $category_slug)->firstOrFail();

        $posts = Post::where('is_publish', 1)->whereDate('publish_date', '<=', $today)->whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->get();

        return view('front.posts')
            ->with('category', $category)
            ->with('posts', $posts);
    }

    public function companyContact(Request $request)
    {

        $banner = Banner::where('is_active', true)->orderBy('updated_at', 'asc')->get()->take(1);

        $campaings = Campaing::where('status', true)->get()->take(6);

        $comments = Comment::get()->take(4);

        $validator = Validator::make(request()->all(), [
            'g-recaptcha-response' => 'recaptcha',
        ]);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return view('front.index')
                ->with('banner', $banner)
                ->with('campaings', $campaings)
                ->with('errors', $errors)
                ->with('comments', $comments);
        } else {

            $company = new Company;

            $company->names = $request->names;
            $company->phone = $request->phone;
            $company->email = $request->email;
            $company->message = $request->message;

            $company->save();


            //Correo
            $data = array(
                'company_id' => $company->id,
            );


            try {

                Mail::send('mail.new_user', $data, function ($message) use ($data) {
                    $message->to('miriam.derch@gmail.com', 'Derch')->subject('Hey! Te ha contactado una nueva empresa');

                    $message->from('postulaciones.derch@gmail.com', 'Derch');
                });

                return view('front.index')
                    ->with('banner', $banner)
                    ->with('campaings', $campaings)
                    ->with('comments', $comments);
            } catch (Exception $e) {

                Session::flash('error', 'No se ha identificado servidor SMTP en la plataforma. Configuralo correctamente para enviar correos desde tu sistema.');
                return response()->json(['mensaje' => 'No se ha identificado servidor SMTP en la plataforma. Configuralo correctamente para enviar correos desde tu sistema.'], 200);


                return view('front.index')
                    ->with('banner', $banner)
                    ->with('campaings', $campaings)
                    ->with('comments', $comments);
            }
        }
    }

    public function personContact(Request $request)
    {

        $banner = Banner::where('is_active', true)->orderBy('updated_at', 'asc')->get()->take(1);

        $campaings = Campaing::where('status', true)->get()->take(6);

        $comments = Comment::get()->take(4);



        $validator = Validator::make(request()->all(), [
            'g-recaptcha-response' => 'recaptcha',
        ]);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return view('front.index')
                ->with('banner', $banner)
                ->with('campaings', $campaings)
                ->with('errors', $errors)
                ->with('comments', $comments);
        } else {

            $person = new Person;

            $request->validate([
                'file' => 'required|file|max:2000|mimes:pdf',
            ]);

            $person->names = $request->names;
            $person->lastnames = $request->lastnames;
            $person->phone = $request->phone;
            $person->email = $request->email;

            $person->message = $request->message;

            /* Crear Slug del Nombre */
            $nameslug = Str::slug($request->names);


            if ($request->hasFile('file')) {
                $archivo = $request->file('file');
                $filename = $nameslug . '-cv.'   . $archivo->getClientOriginalExtension();

                $location = public_path('docs/applicants/');
                $archivo->move($location, $filename);

                $person->file = $filename;
            }

            $person->save();


            //Correo
            $data = array(
                'company_id' => $person->id,
            );


            try {

                Mail::send('mail.new_user', $data, function ($message) use ($data) {
                    $message->to('miriam.derch@gmail.com', 'Derch')->subject('Hey! Se han postulado para buscar una vacante');

                    $message->from('postulaciones.derch@gmail.com', 'Derch');
                });

                return view('front.index')
                    ->with('banner', $banner)
                    ->with('campaings', $campaings)
                    ->with('comments', $comments);
            } catch (Exception $e) {

                Session::flash('error', 'No se ha identificado servidor SMTP en la plataforma. Configuralo correctamente para enviar correos desde tu sistema.');
                return response()->json(['mensaje' => 'No se ha identificado servidor SMTP en la plataforma. Configuralo correctamente para enviar correos desde tu sistema.'], 200);


                return view('front.index')
                    ->with('banner', $banner)
                    ->with('campaings', $campaings)
                    ->with('comments', $comments);
            }
        }
    }
}
