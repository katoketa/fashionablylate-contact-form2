<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        $category = Category::find($contact['category_id']);
        return view('confirm', compact('contact', 'category'));
    }

    public function thanks(ContactRequest $request)
    {
        if ($request->pressed_button == "back") {
            return redirect('/')->withInput();
        }

        $contact = $request->all();
        $tel = $contact['tel1'] . $contact['tel2'] . $contact['tel3'];
        unset($contact['tel1'], $contact['tel2'], $contact['tel3']);
        $contact += array('tel' => $tel);
        Contact::create($contact);
        return view('thanks');
    }

    public function admin()
    {
        $contacts = Contact::with('category')->paginate(8);
        $categories = Category::all();
        return view('livewire.admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategoryIdSearch($request->category_id)->CreatedAtSearch($request->created_at)->paginate(8);
        $categories = Category::all();
        return view('livewire.admin', compact('contacts', 'categories'));
    }

    public function reset()
    {
        return redirect('/admin');
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}
