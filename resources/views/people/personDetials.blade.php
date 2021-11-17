<table class="table table-table">


    <tr>
        <th>Family Group</th>
        <td><a href="{{ route('people.index') }}?familyGroup={{ $person->familyGroup }}">{{ $person->familyGroup }}</a></td>
    </tr>

    <tr>
        <th>Full Name</th>
        <td> <a href="{{ route('people.show', ['person' => $person->id]) }}"> {{ $person->fullname }}</a></td>
    </tr>

    <tr>
        <th>Age (Date of Birth)</th>

        <td>
        @php 



$now  = Carbon::now();
$agem = $now->floatDiffInMonths($person->dateofbirth); // $interval->y * 12;
$type = 'Adult';

if($agem <= 3)
$type = 'Newborn';
elseif($agem > 3 && $agem <= 12)
$type = 'Infant';
elseif($agem > 12 && $agem <= (12*5))
$type = 'Toddler';
elseif($agem > (12*5) && $agem <= (12*13))
$type = 'Kids';
if($agem > 12)
$ageLabel = round($agem / 12) . ' Years';
else 
    $ageLabel = round($agem) . ' Months';


        @endphp

        {{ ($ageLabel) }} -  {{$type }} / ({!! $person->dateofbirth !!}) | 
        {!! ($person->gender == 'male' ? '<i class="fas fa-male"></i> Male' : '<i class="fas fa-female"></i> Female') !!} 
        
        </td>
    </tr>

    <tr>
        <th>Passport Number</th>
        <td> {{ $person->passportNumber }}</td>
    </tr>


    <tr>
        <th>Tazkira Number</th>
        <td> {{ $person->tazkiraNumber }}</td>
    </tr>


    <tr>
        <th>Arrival Date</th>
        <td> {{ $person->arrivalDate }} ({{ \Carbon::parse($person->arrivalDate)->diffForHumans(); }})</td>
    </tr>


    <tr>
        <th>Email</th>
        <td> {{ $person->email }}</td>
    </tr>

    <tr>
        <th>Phone</th>
        <td> {{ $person->phone }}</td>
    </tr>


 </table>
