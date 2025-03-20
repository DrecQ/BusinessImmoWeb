<?php

namespace App\Http\Controllers;

use App\Events\ContactRequestEvent;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Jobs\DemoJob;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use App\Models\User;
use App\Notifications\ContactRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class PropertyController extends Controller
{
    //

    public function index(SearchPropertiesRequest $request)
    {

        $query = Property::query()->with('options')->orderBy('created_at', 'desc');

        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        
        
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }

          
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }

        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request-> validated()
        ]);
    }

    public function show(string $slug, Property $property)
    {

        //Utilisation des jobs 
        DemoJob::dispatch($property)->delay(now()->addSeconds(10));


        // //Affichage des notifications 
        //   /** @var User $user */
        //   $user = User::first();


         //Récupération d'une property 
        $expectedSlug = $property->getSlug();

        if($slug !== $expectedSlug)
        {
            return to_route('property.show', ['slug' => $slug, 'property' => $property]);
        }

        return view('property.show', ['property' => $property]);
    }


    public function contact(Property $property, PropertyContactRequest $request)
    {
        // event(new ContactRequestEvent($property, $request->validated())); //Gestion des evenements
        // Mail::send(new PropertyContactMail($property, $request->validated())); //Envoi de mail

        // //Gestion des notifications
        /** @var User $user */
        $user = User::first();

        //Utilisation 

        Notification::route('mail', 'admin@gmail.com')->notify(new ContactRequestNotification($property, $request->validated()));

        return back()->with('success', 'Votre demande de contact a bien été envoyé.');
    }
}
