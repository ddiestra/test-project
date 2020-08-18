<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinkController extends Controller {


  public function index() {
    return Link::paginate(10);
  }

  public function store(Request $request) {

    $error = false;
    $url = $request->get('path');
    $url = strpos($url, 'http') !== 0 ? "http://$url" : $url;


    if(filter_var($url, FILTER_VALIDATE_URL)) {
      $data = [
        'path' => strtolower($url),
        'redirects' => 0
      ];

      $link = Link::create($data);
    } else {
      $error = 'Link invalid';
    }

    return ['link' => $link, 'error' => $error];
  }

  public function show($id) {

    if (is_numeric($id)) {
      $link = Link::find($id);
    } else {
      $link = Link::whereCode($id)->first();
    }

    return ['link' => $link];

  }

  public function update($id) {

    if (is_numeric($id)) {
      $link = Link::find($id);
    } else {
      $link = Link::whereCode($id)->first();
    } 

    $link->redirects++;
    $link->save();

    return ['success' => true];
  }
}








