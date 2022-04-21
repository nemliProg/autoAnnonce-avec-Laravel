<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('user:id,nom,prenom,tel')->orderBy('id', 'DESC')->get();
        return $offers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $desc = $request->input('description');
        $b_title = $request->input('book_title');
        $b_cat = $request->input('book_category');
        $idUser = $request->input('idUser');


        $ph = $_FILES["photo"];
        
        $imag_name = $ph['name'];
        $imag_size = $ph['size'];
        $tmp_name = $ph['tmp_name'];


        if ($imag_size > 1250000) {
            return [
                'message' => 'image is too large',
            ];
        } else {
            $img_ex = pathinfo($imag_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = "imgs/$new_img_name";
                move_uploaded_file($tmp_name, $img_upload_path);
                $ph['image'] = "http://tonbook.io" . "/imgs/$new_img_name";
            } else {
                return [
                    'message' => "you can't upload files of this type",
                ];
            }
        }


        $offer = Offer::create([
            'book_title'=> $b_title,
            'book_category'=> $b_cat,
            'description' => $desc,
            'photo' => $ph['image'],
            'idUser' => $idUser,
        ]);

        return Offer::with('user:id,nom,prenom,tel')->find($offer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Offer::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $b_title = $request->input('book_title');
        $b_cat = $request->input('book_category');
        $desc = $request->input('description');
        $idUser = $request->input('idUser');


        $ph = $_FILES["photo"];
        
        $imag_name = $ph['name'];
        $imag_size = $ph['size'];
        $tmp_name = $ph['tmp_name'];


        if ($imag_size > 1250000) {
            return [
                'message' => 'image is too large',
            ];
        } else {
            $img_ex = pathinfo($imag_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = "imgs/$new_img_name";
                move_uploaded_file($tmp_name, $img_upload_path);
                $ph['image'] = "http://tonbook.io" . "/imgs/$new_img_name";
            } else {
                return [
                    'message' => "you can't upload files of this type",
                ];
            }

        }


        $offer = Offer::find($id);
        $offer->update([
            'book_title'=> $b_title,
            'book_category'=> $b_cat,
            'description' => $desc,
            'photo' => $ph['image'],
            'idUser' => $idUser,
        ]);
        return $offer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Offer::destroy($id);
    }

    public function search($name)
    {
        return Offer::where('description','like', '%'.$name.'%')->get();
    }
}
