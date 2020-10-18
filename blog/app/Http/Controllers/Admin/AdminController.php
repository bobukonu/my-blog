<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

    protected $limit = 5;

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('check-permissions');
  }
}
