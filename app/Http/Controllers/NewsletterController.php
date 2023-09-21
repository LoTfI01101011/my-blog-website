<?php

namespace App\Http\Controllers;


use App\Services\Newsletters;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
  public function __invoke(Newsletters $newsletter)
  {

    ddd($newsletter);

    request()->validate([
      'email' => ['required', 'email']
    ]);
    try {
      $newsletter->Subscribe(request('email'));
    } catch (\Exception $e) {
      throw ValidationException::withMessages([
        'email' => 'this email could not be added to our newsletters list !!'
      ]);
    }


    return redirect('/')->with('success', 'you are now signed up for our news letters');
  }
}
