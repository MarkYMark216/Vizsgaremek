<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Room;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'password_confirmation' => ['required', 'same:password'],
            'room_number' => ['nullable', 'string', function ($attribute, $value, $fail) use ($request)
            {
                //Először ellenörizzük, hogy a megadott szobaszám létezik-e
                $room = Room::where('room_number', $value)->first();
                if (!$room)
                {
                    $fail('A megadott szobaszám nem létezik.');
                    return;
                }
                //2 Ha létezik akkor ellenőrizzük, hogy van e még benne szabad hely, ugye max 4 ferőhelyes az összes szoba
                $currentOccupancy = User::where('roomid', $room->roomid)->count();
                if ($currentOccupancy >= $room->capacity)
                {
                    $fail("A megadott szoba már tele van!");
                }
                //3 Ha ez is megvan és van benne hely, akkor ellenőrizzük, hogy a felhasználó neme megegyezik e a szoba "nemével"
                if ($request->gender !== $room->gender) {
                $fail("Ez a szoba csak '{$room->gender}' felhasználóknak van.");
                return;
                }
                //Ha ez is rendben van, akkor az ellenörzés sikeres és mehet tovább a regisztráció..
             }],
            'group_leaderid' => ['nullable', 'string', function ($attribute, $value, $fail) {
                // Ha nincs megadva semmi akkor hagyjuk, nem ellenőrzünk semmit
                if ($value === null) {
                    return;
                }
                // Levágjuk a felesleges szóközöket.
                $name = trim($value);
                if ($name === '') {
                    return;
                }

                // Megkeressük a felhasználót a megadott név alapján.
                $groupLeader = User::where('name', $name)->first();
                // Ha nincs ilyen nevű felhasználó, hibát adunk.
                if (!$groupLeader) {
                    $fail('Nincs ilyen nevű csoportvezető!');
                    return;
                }

                // Ellenőrizzük, hogy a user_role táblában van-e roleid = 2.
                $hasRole = \Illuminate\Support\Facades\DB::table('user_role')
                    ->where('userid', $groupLeader->id)
                    ->where('roleid', 2)
                    ->exists();

                // Ha nincs csoportvezető szerepe, hibát adunk.
                if (!$hasRole) {
                    $fail('Nincs ilyen nevű csoportvezető!');
                }
            }],
            'dorm_supervisorid' => ['nullable', 'integer', 'exists:users,id'], 
            'gender' => ['required', 'in:Férfi,Nő'], 
            ],
            [
                'password_confirmation.same' => 'A két jelszó nem egyezik meg!',
            ]
            );
            // Ellenőrizzük, hogy a felhasználó adott-e meg szobaszámot
            $room = $request->room_number
            // Ha van szobaszám, lekérdezzük a Room modellt, ahol a room_number megegyezik a megadott értékkel
            ? Room::where('room_number', $request->room_number)->first()
            : null;
            // Ha találtunk szobát, akkor lekérjük a roomid értékét, különben null értéket adunk 
            $roomId = $room ? $room->roomid : null;



            $groupLeaderId = null;
            if ($request->filled('group_leaderid')) {
                $groupLeader = User::where('name', trim($request->group_leaderid))->first();
                $groupLeaderId = $groupLeader ? $groupLeader->id : null;
            }

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roomid' => $roomId, 
            'group_leaderid' => $groupLeaderId,
            'dorm_supervisorid' => $request->dorm_supervisorid, 
            'gender' => $request->gender,
            'account_status' => 1, 
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
