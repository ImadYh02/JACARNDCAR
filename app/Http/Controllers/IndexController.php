<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use PDF;
use Mail;
use App\Models\Categories;
use App\Models\Cars;
use App\Models\Location;
use App\Mail\ContactMail;
use App\Mail\NotifyAdmin;
use App\Models\Orders;
use App\Models\UserData;
use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function getData() {
        $cars = Cars::all();
        $locations = Location::all();
        return view('first', compact('cars', 'locations'));
    }

    public function showAllCars() {
        $cars = Cars::all();
        $totalCars = Cars::select('id_category')->count();
        $locations = Location::all();
        return view('cars', compact('cars', 'totalCars', 'locations'));
    }

    public function showCars() {
        $cars = Cars::all();
        $categories = Categories::all();
        $totalCars = Cars::select('id_category')->count();
        return view('categories', compact('cars', 'totalCars', 'categories'));
    }

    public function show($id) {
        $cars = Cars::where('id_category', $id)->get();
        $categories = Categories::all();
        $totalCars = Cars::where('id_category', $id)->count();
        return view('categories', compact('cars', 'totalCars', 'categories'));
    }

    public function cars() {
        $totalCars = Cars::all()->count();
        $availCars = Cars::where('is_available');
        return view('cars', 'availCars');
    }

    public function showCarDetails($id) {
        $cars = Cars::where('id_car', $id)->get();
        $rel_cars = Cars::where('id_category', 2)->where('id_car', '!=', $id)->distinct()->get();
        // $last_id = Orders::latest('car_order_id')->first();
        $last_id = Orders::select('car_order_id')->orderBy('created_at', 'desc')->first();
        $transaction_number = str_random(8);
        return view('carDetails', compact('cars', 'rel_cars', 'transaction_number'));
    }

    public function showAllCat(Request $request) {
        // $cars = Cars::all();
        // $cars = Cars::select('*')
        //         ->join('orders', 'orders.id_car', '=', 'cars.id_car')
        //         ->whereNotBetween('date_debut', [$request['first_day'], $request['last_day']])
        //         ->whereNotBetween('date_fin', [$request['first_day'], $request['last_day']])
        //         ->distinct()->get();

        $checking_date = $request['first_day'];
        // $cars = DB::select("SELECT * FROM cars WHERE exp_car_insurance > '$checking_date' AND exp_technical_visit > '$checking_date' AND id_car NOT IN (SELECT id_car FROM orders WHERE '$checking_date' BETWEEN date_debut AND date_fin)");
        $cars = Cars::all();
        // $cars = DB::select("SELECT * FROM cars WHERE id_car NOT IN (SELECT id_car FROM orders WHERE '$checking_date' BETWEEN date_debut AND date_fin)");

        // $categories = Categories::all();
        // $totalCars = Cars::count();
        return view('categories', ['cars' => $cars]);
        // return view('categories') -> with('cars');
    }

    public function checkOut($id) {
        $firstDate = session()->get('firstDat');
        $cars = Cars::where('id_car', $id)->get();
        return view('check_out', compact('cars', 'firstDate'));
    }

    public function pay_by_cc(Request $request) {
        // $firstDate = session()->get('firstDat');
        // $lastDat = session()->get('lastDat');

        $validator = Validator::make($request->all(), [
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'email' => 'required | email',
            'phone_number' => 'required | numeric | digits:10',
            'cin_user' => 'required | max:10'
            // 'first_name' => 'required | max:50 | unique',
        ]);

        if ($validator -> fails()) {
            // return $validator -> errors();
            // return $validator -> errors()->first;
            return redirect()->back()->withErrors($validator)->withInputs($request->all);
        }

        $userExist = UserData::where('cin', $request->cin_user)->get();

        if ($userExist == null) {
            UserData::create ([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'cin' => $request->cin_user
            ]);
        }

        $order = Orders::create([
            'id_car' => $request->id_car,
            'trans_number' => $request->trans_number,
            'cin_user' => $request->cin_user,
            'pu_location' => $request->pu_location,
            'r_location' => $request->r_location,
            'date_debut' => $request->first_date,
            'date_fin' => $request->last_date,
            'prix_total' => $request->prix_total,
            'methode_py' => $request->py_md
        ]);

        // Notification::send($user, new NotifyAdmin($user));
        Mail::to('imadyh02@gmail.com')->send(new NotifyAdmin($userExist, $order));

        $pdf = PDF::loadView('pdf_booking', compact('request'));
        view()->share('request', $request);
        return $pdf->download($request->first_name . '_' . $request->last_name .'_' . $request->trans_number);

        // return redirect()->route('home.index')->with('success', 'Cars Has Been Created Successfully !');
    }

    public function lang_change(Request $request) {
        App::setLocale($request->lang);
        session()->put('lang_code',$request->lang);
        return redirect()->back();
    }

    public function mailContactUs(Request $request) {
        $details = [
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Mail::to('imadyh02@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent', 'Your Message Has Been Sent Successfully!');
    }
}
