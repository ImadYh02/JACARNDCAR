<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Categories;
use App\Models\Cars;
use App\Models\Orders;
use App\Models\User;
use App\Models\Location;
use App\Models\UserData;
use App\Models\Coupons;

use Hash;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function available_cars(Request $request, $checking_date) {
        $cars = DB::select("SELECT * FROM cars WHERE id_car NOT IN (SELECT id_car FROM orders WHERE '$checking_date' BETWEEN date_debut AND date_fin)");
        return response()->json(['data' => $cars]);
    }

    public function getStatic() {
        $totalCars = Cars::all()->count();
        $totalCategories = Categories::all()->count();
        $totalOrders = Orders::all()->count();
        $totalUsers = User::all()->count();

        $getUsers = User::orderBy('created_at', 'DESC')->get();

        // $availCars = Cars::where('is_available', '=', 1)->get();
        return view('admin.index', compact('totalCars', 'totalCategories', 'totalOrders', 'totalUsers', 'getUsers'));
    }

    public function getCustomers() {
        // $getUsers = User::where('user_role', "User")->get();

        // $getUsers = UserData::select('*')->distinct()->get(['cin']);
        $getUsers = UserData::all()->unique('cin');
        return view('admin.customers', compact('getUsers'));
    }

    public function getCars() {
        $getCars = Cars::select('*', 'name_category')->join('categories', 'categories.id_category', '=', 'cars.id_category')->get();
        $checking_date = Carbon::now();
        $despoCars = DB::select("SELECT * FROM cars WHERE id_car IN (SELECT id_car FROM orders WHERE '$checking_date' BETWEEN date_debut AND date_fin)");
        return view('admin.cars', compact('getCars', 'despoCars'));
    }

    public function getOrders() {
        $getOrders = Orders::select('*', 'name_car')
                            ->join('cars', 'cars.id_car', '=', 'orders.id_car')
                            ->orderBy('car_order_id', 'ASC')
                            ->get()->unique('trans_number');
        return view('admin.orders', compact('getOrders'));
    }

    public function getCoupons() {
        $getCoupons = Coupons::all();
        return view('admin.coupons', compact('getCoupons'));
    }

    public function getCategories() {
        $getCategories = Categories::all();
        return view('admin.categories', compact('getCategories'));
    }

    public function getLocations() {
        $getLocations = Location::all();
        return view('admin.locations', compact('getLocations'));
    }

    public function getCarsOpp() {
        $getCars = Cars::all();
        return view('admin.cars_opp', compact('getCars'));
    }

    public function addNewUser() {
        return view('admin.adduser');
    }

    public function addNewAdmin() {
        return view('admin.add_admin');
    }

    public function addNewCar() {
        $catCars = Categories::all();
        return view('admin.addcars', compact('catCars'));
    }

    public function addNewCategory() {
        return view('admin.addcategory');
    }

    public function addNewLocation() {
        return view('admin.addlocation');
    }

    public function addNewOrder() {
        $getUsers = UserData::select('cin')->distinct()->get();
        $getCars = Cars::all();
        $getLocations = Location::all();
        $transaction_number = str_random(8);
        return view('admin.addorders', compact('getUsers', 'getCars', 'getLocations', 'transaction_number'));
    }

    public function addNewCoupon() {
        return view('admin.addcoupons');
    }

    public function storeUser(Request $request) {
        // if ($request->has('profile_photo_path')) {
        //     $file = $request->profile_photo_path;
        //     $image_name = time() . '_' .$file->getClientOriginalName();
        //     $file->move(public_path('uploads'), $image_name);
        // }
        $validator = Validator::make($request->all(), [
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'email' => 'required | email',
            'phone_number' => 'required | integer | digits:10',
            'cin' => 'required | max:10'
        ]);

        if ($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all);
        }

        UserData::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'cin' => $request->cin,
            // 'user_role' => $request->user_role,
            // 'email' => $request->email,
            // 'password' => $request->password,
            // 'profile_photo_path' => $image_name
        ]);
        return redirect()->route('admin.customers')->with('success', 'User Has Been Created Successfully !');
    }

    public function storeAdmin(Request $request) {
        // if ($request->has('profile_photo_path')) {
        //     $file = $request->profile_photo_path;
        //     $image_name = time() . '_' .$file->getClientOriginalName();
        //     $file->move(public_path('uploads'), $image_name);
        // }
        $validator = Validator::make($request->all(), [
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'email' => 'required | email',
            'password' => 'required | max:8',
            'phone_number' => 'required | integer | digits:10',
            'cin' => 'required | max:10'
        ]);

        if ($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all);
        }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone_number,
            'cin_user' => $request->cin,
            'user_role' => 'Admin',
            // 'user_role' => $request->user_role,
            // 'email' => $request->email,
            // 'password' => $request->password,
            // 'profile_photo_path' => $image_name
        ]);
        return redirect()->route('admin.customers')->with('success', 'Admin Has Been Created Successfully !');
    }

    public function storeCar(Request $request) {
        if ($request->has('img_car')) {
            $file = $request->img_car;
            $image_name = time() . '_' .$file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
        }

        $validator = Validator::make($request->all(), [
            'matricule_car' => 'required | max:50',
            'name_car' => 'required | max:50',
            'id_category' => 'required | max:50',
            'price_car' => 'required | integer',
            'type_car' => 'required | max:50',
            'model_car' => 'required | integer',
            'car_insurance' => 'required | date',
            'exp_car_insurance' => 'required | date',
            'technical_visit' => 'required | date',
            'exp_technical_visit' => 'required | date',
            // 'img_car' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        if ($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all);
        }

        Cars::create([
            'matricule_car' => $request->matricule_car,
            'name_car' => $request->name_car,
            // 'desc_car' => $request->desc_car,
            'id_category' => $request->id_category,
            'price_car' => $request->price_car,
            // 'color_car' => $request->color_car,
            'model_car' => $request->model_car,
            'type_car' => $request->type_car,
            'img_car' => $image_name,
            'car_insurance' => $request->car_insurance,
            'exp_car_insurance' => $request->exp_car_insurance,
            'technical_visit' => $request->technical_visit,
            'exp_technical_visit' => $request->exp_technical_visit,
        ]);
        return redirect()->route('admin.cars')->with('success', 'Cars Has Been Created Successfully !');
    }

    public function storeOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'id_car' => 'required',
            // 'cin_user' => 'required',
            'date_debut' => 'required | date',
            'date_fin' => 'required | date',
            'prix_total' => 'required'
        ]);
        if ($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all);
        }

        Orders::create([
            'trans_number' => $request->trans_number,
            'id_car' => $request->id_car,
            'cin_user' => $request->cin_user,
            'pu_location' => $request->pu_location,
            'r_location' => $request->r_location,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'methode_py' => 'paid',
            'prix_total' => $request->prix_total
        ]);
        return redirect()->route('admin.orders')->with('success', 'Order Has Been Created Successfully !');
    }

    public function storeCoupon(Request $request) {
        Coupons::create([
            'coupon' => $request->coupon,
            'off' => $request->off,
            'exp_date' => $request->exp_date
        ]);
        return redirect()->route('admin.coupons')->with('success', 'Cars Has Been Created Successfully !');
    }

    public function storeCategory(Request $request) {
        if ($request->has('image_category')) {
            $file = $request->image_category;
            $image_name = time() . '_' .$file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
        }
        Categories::create([
            'name_category' => $request->name_category,
            'image_category' => $image_name
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category Has Been Created Successfully !');
    }

    public function storeLocation(Request $request) {
        Location::create([
            'name_location' => $request->name_location,
        ]);
        return redirect()->route('admin.locations')->with('success', 'Location Has Been Created Successfully !');
    }

    public function editUser(User $user) {
        return view('admin.edituser', compact('user'));
    }

    public function editOrder(Request $request, $id) {
        $getAllOrders = User::select('cin_user')->orderBy('cin_user', 'ASC')->get();
        $getAllMethode = Orders::select('methode_py')->distinct()->get();
        $getCars = Cars::all();
        $getOrders = Orders::where('car_order_id', $id)->first();
        $getLocations = Location::all();
        return view('admin.editOrder', compact('getAllOrders', 'getCars', 'getOrders', 'getAllMethode', 'getLocations'));

        // $car = Cars::where('id_car', $id)->first();
        // $catCars = Categories::all();
    }

    public function editCar($id) {
        $car = Cars::where('id_car', $id)->first();
        $catCars = Categories::all();
        return view('admin.editcar', compact('car', 'catCars'));
    }

    public function editCoupon(Request $request, $id) {
        $getCoupons = Coupons::where('id_cpn', $id)->first();
        return view('admin.editcoupon', compact('getCoupons'));
    }

    public function editCategory(Request $request, $id) {
        $getCategories = Categories::where('id_category', $id)->first();
        return view('admin.editcategory', compact('getCategories'));
    }

    public function editLocation(Request $request, $id) {
        $getLocations = Location::where('id_location', $id)->first();
        return view('admin.editlocation', compact('getLocations'));
    }

    public function updateUser(Request $request, $id) {
        $user = User::where('id', $id)->first();
        if ($request->has('profile_photo_path')) {
            $file = $request->profile_photo_path;
            $image_name = time() . '_' .$file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            // unlink(public_path('uploads\\'). $user->profile_photo_path);
            $user->profile_photo_path = $image_name;
        }
        $user->update([
            'user_name' => $request->user_name,
            'phone' => $request->phone,
            'user_role' => $request->user_role,
            'email' => $request->email,
            'password' => $request->password,
            'profile_photo_path' => $user->profile_photo_path
        ]);
        return redirect()->route('admin.customers')->with('success', 'User Has Been Updated Successfully !');
    }

    public function updateCar(Request $request, $id) {
        $car = Cars::where('id_car', $id)->first();
        if ($request->has('img_car')) {
            $file = $request->img_car;
            $image_name = time() . '_' .$file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            $car->img_car = $image_name;
        }

        $car->update([
            'name_car' => $request->name_car,
            'desc_car' => $request->desc_car,
            'id_category' => $request->id_category,
            'price_car' => $request->price_car,
            'color_car' => $request->color_car,
            'model_car' => $request->model_car,
            'type_car' => $request->type_car,
            'img_car' => $car->img_car,
            'car_insurance' => $request->car_insurance,
            'exp_car_insurance' => $request->exp_car_insurance,
            'technical_visit' => $request->technical_visit,
            'exp_technical_visit' => $request->exp_technical_visit,
        ]);
        return redirect()->route('admin.cars')->with('success', 'Cars Has Been Uptaded Successfully !');
    }

    public function updateOrder(Request $request, $id) {
        $order = Orders::where('car_order_id', $id)->first();

        $order->update([
            'id_car' => $request->id_car,
            'cin_user' => $request->cin_user,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'prix_total' => $request->prix_total,
            'methode_py' => $request->methode_py
        ]);
        return redirect()->route('admin.orders')->with('success', 'Order Has Been Uptaded Successfully !');
    }

    public function updateCoupon(Request $request, $id) {
        $coupon = Coupons::where('id_cpn', $id)->first();
        $coupon->update([
            'coupon' => $request->coupon,
            'off' => $request->off,
            'exp_date' => $request->exp_date
        ]);
        return redirect()->route('admin.coupons')->with('success', 'Cars Has Been Uptaded Successfully !');

    }

    public function updateCategory(Request $request, $id) {
        $category = Categories::where('id_category', $id)->first();
        if ($request->has('image_category')) {
            $file = $request->image_category;
            $image_name = time() . '_' .$file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            $category->image_category = $image_name;
            // unlink(public_path('uploads\\').$image_name);
        }
        $category->update([
            'name_category' => $request->name_category,
            'image_category' => $category->image_category
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category Has Been Uptaded Successfully !');
    }

    public function updateLocation(Request $request, $id) {
        $location = Location::where('id_location', $id)->first();
        $location->update([
            'name_location' => $request->name_location,
        ]);
        return redirect()->route('admin.locations')->with('success', 'Location Has Been Uptaded Successfully !');
    }

    public function removeUser($id) {
        $user = UserData::where('id_duser', $id)->first();
        $user->delete();
        return redirect()->route('admin.customers')->with('success','User has been deleted successfully');
    }

    public function removeCar($id) {
        $car = Cars::where('id_car', $id)->first();
        $car->delete();
        return redirect()->route('admin.cars')->with('success','Car has been deleted successfully');
    }

    public function removeOrder($id) {
        $order = Orders::where('car_order_id', $id)->first();
        $order->delete();
        return redirect()->route('admin.orders')->with('success','Order has been deleted successfully');
    }

    public function removeCoupon($id) {
        $coupon = Coupons::where('id_cpn', $id)->first();
        $coupon->delete();
        return redirect()->route('admin.coupons')->with('success','Coupon has been deleted successfully');
    }

    public function removeCategory($id) {
        $category = Categories::where('id_category', $id)->first();
        $category->delete();
        return redirect()->route('admin.categories')->with('success','Category has been deleted successfully');
    }

    public function removeLocation($id) {
        $location = Location::where('id_location', $id)->first();
        $location->delete();
        return redirect()->route('admin.locations')->with('success','Location has been deleted successfully');
    }

    public function GetSubCatAgainstMainCatEdit($id) {
        echo json_encode(Cars::select("price_car")->where('id_car', $id)->get());
    }

    public function GetSubCatAgainstMainCatUpdate($id) {
        echo json_encode(Cars::select("price_car")->where('id_car', $id)->get());
    }
}
