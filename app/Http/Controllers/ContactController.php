<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactView;
use App\Models\ContactAnalyticsViewModel;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->query('sort_by', 'first_name'); // Default sorting by name
        $sortOrder = $request->query('order', 'asc'); // Default order ascending


        $contacts = Contact::orderBy($sortBy, $sortOrder)->get();

        return view('contacts.index', compact('contacts', 'sortBy', 'sortOrder'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email|unique:contacts',
            'photo' => 'nullable|image|max:500',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('contacts', 'public');
        } else {
            $photoPath = null;
        }

        Contact::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'landline_number' => $request->landline_number,
            'notes' => $request->notes,
            'photo' => $photoPath,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully.');
    }




    public function show($id)
    {
        // Fetch the contact by ID
        $contact = Contact::findOrFail($id);

   
        $contact->increment('view_count');

        // Get the total views count 
        $totalViews = $contact->view_count;

  
        $today = Carbon::today(); // Get today's date
        $view = ContactView::firstOrCreate(
            ['contact_id' => $contact->id, 'view_date' => $today], 
            ['views' => 0] 
        );
        $view->increment('views'); // Increment today's view count

      
        $todayViews = ContactView::where('contact_id', $contact->id)
            ->where('view_date', $today)
            ->value('views') ?? 0; 

        // Fetch last 7 days' views for the graph
        $viewsData = ContactView::where('contact_id', $contact->id)
            ->where('view_date', '>=', Carbon::now()->subDays(6)) // Get data for the last 7 days
            ->orderBy('view_date')
            ->get(['view_date', 'views']); // Fetch view date and views

        // Convert the 'view_date' 
        $chartLabels = $viewsData->pluck('view_date')->map(fn($date) => Carbon::parse($date)->format('d M'));

        // Get the views count for each date
        $chartData = $viewsData->pluck('views');

        // Pass the contact and chart data to the view
        return view('contacts.show', compact('contact', 'totalViews', 'todayViews', 'chartLabels', 'chartData'));
    }



    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email|unique:contacts,email,' . $contact->id,
            'photo' => 'nullable|image|max:500',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('contacts', 'public');
        } else {
            $photoPath = $contact->photo;
        }

        $contact->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'landline_number' => $request->landline_number,
            'notes' => $request->notes,
            'photo' => $photoPath,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        
        $contacts = Contact::where('first_name', 'like', "%{$query}%")
            ->orWhere('last_name', 'like', "%{$query}%")
            ->orWhere('mobile_number', 'like', "%{$query}%")
            ->get();

       
        return response()->json($contacts);
    }


      public function showContactAnalytics()
    {
       
        $viewModel = new ContactAnalyticsViewModel();

      
        return view('analytics.analytics', ['viewModel' => $viewModel]);
    }


}

