<html>

<link rel='stylesheet' href="{{url('style.css')}}"/>
<div class="tabela_podglad">

    <table>
        <thead>
        <tr>
            <th>Zdjęcie</th>
            <td> @if($kolekcja->zdjecie !='')
                    <img src={{ URL::to('/photos/upload/'.$kolekcja->zdjecie) }} width="100px" height="200px"/>
                @endif
                {{$kolekcja->zdjecie}}
            </td>
        </tr>
        <tr>
            <th>Nazwa</th>
            <td>{{$kolekcja->nazwa}}</td>
        </tr>
        <tr>
            <th>Rok</th>
            <td>{{$kolekcja->rok}}</td>
        </tr>
        <tr>
            <th>Cena</th>
            <td>{{$kolekcja->cena}}</td>
        </tr>
        <tr>
            <th>Pamięć</th>
            <td>{{$kolekcja->pamiec}}</td>
        </tr>
        <tr>
            <th>Kolor</th>
            <td>{{$kolekcja->kolor}}</td>
        </tr>
        <tr>
            <th>Przekątna</th>
            <td>{{$kolekcja->przekatna}}</td>
        </tr>
        </thead>

    </table>
</div>
<div class="przycisk">
    <a href="{{ URL::to('kolekcja')}}"><button>Przejdź do spisu</button></a>

</div>
</html>