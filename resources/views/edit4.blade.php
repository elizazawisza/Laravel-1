<!DOCTYPE html>
<html>
<link rel='stylesheet' href="{{url('style.css')}}"/>
<head>
    <meta charset="UTF-8"/>
    <title>Edytowanie</title>

</head>
<body>
<form id="edytowanie" method="post" class="spis-form" action="{{ route('kolekcja.update', $id)}}" enctype="multipart/form-data" >
    {{ method_field('PATCH') }}
    <div class="spis">
        <label for="nazwa">Nazwa </label>
        <select id="nazwa" name="nazwa">
            <option value="iPhone" @if($kolekcja->nazwa=="iPhone") selected @endif>iPhone</option>
            <option value="iPhone3G" @if($kolekcja->nazwa=="iPhone3G") selected @endif>iPhone 3G</option>
            <option value="iPhone3GS" @if($kolekcja->nazwa=="iPhone3GS") selected @endif>iPhone 3GS</option>
            <option value="iPhone4" @if($kolekcja->nazwa=="iPhone4") selected @endif>iPhone 4</option>
            <option value="iPhone4S" @if($kolekcja->nazwa=="iPhone4S") selected @endif>iPhone 4S</option>
            <option value="iPhone5" @if($kolekcja->nazwa=="iPhone5") selected @endif>iPhone 5</option>
            <option value="iPhone5C" @if($kolekcja->nazwa=="iPhone5C") selected @endif>iPhone 5C</option>
            <option value="iPhone5S" @if($kolekcja->nazwa=="iPhone5S") selected @endif>iPhone 5S</option>
            <option value="iPhone6" @if($kolekcja->nazwa=="iPhone6") selected @endif>iPhone 6</option>
            <option value="iPhone6+" @if($kolekcja->nazwa=="iPhone6+") selected @endif>iPhone 6+</option>
            <option value="iPhone6S" @if($kolekcja->nazwa=="iPhone6S") selected @endif>iPhone 6S</option>
            <option value="iPhone6S+" @if($kolekcja->nazwa=="iPhone6S+") selected @endif>iPhone 6S+</option>
            <option value="iPhoneSE" @if($kolekcja->nazwa=="iPhoneSE") selected @endif>iPhone SE</option>
            <option value="iPhone7" @if($kolekcja->nazwa=="iPhone7") selected @endif>iPhone 7</option>
            <option value="iPhone7+" @if($kolekcja->nazwa=="iPhone7+") selected @endif>iPhone 7+</option>
            <option value="iPhone8" @if($kolekcja->nazwa=="iPhone8") selected @endif>iPhone 8</option>
            <option value="iPhone8+" @if($kolekcja->nazwa=="iPhone8+") selected @endif>iPhone 8+</option>
            <option value="iPhoneX" @if($kolekcja->nazwa=="iPhoneX") selected @endif>iPhone X</option>
            <option value="iPhoneXS" @if($kolekcja->nazwa=="iPhoneXS") selected @endif>iPhone XS</option>
            <option value="iPhoneXSMax" @if($kolekcja->nazwa=="iPhoneXSMax") selected @endif>iPhone XSMax</option>
            <option value="iPhoneXR" @if($kolekcja->nazwa=="iPhoneXR") selected @endif>iPhone XR</option>
        </select>
    </div>
    <div class="spis">
        <label for="rok">Rok</label>
        <select id="rok" name="rok">
            <option value="2007" @if($kolekcja->rok=="2007") selected @endif>2007</option>
            <option value="2008" @if($kolekcja->rok=="2008") selected @endif>2008</option>
            <option value="2009" @if($kolekcja->rok=="2009") selected @endif>2009</option>
            <option value="2010" @if($kolekcja->rok=="2010") selected @endif>2010</option>
            <option value="2011" @if($kolekcja->rok=="2011") selected @endif>2011</option>
            <option value="2012" @if($kolekcja->rok=="2012") selected @endif>2012</option>
            <option value="2013" @if($kolekcja->rok=="2013") selected @endif>2013</option>
            <option value="2014" @if($kolekcja->rok=="2014") selected @endif>2014</option>
            <option value="2015" @if($kolekcja->rok=="2015") selected @endif>2015</option>
            <option value="2016" @if($kolekcja->rok=="2016") selected @endif>2016</option>
            <option value="2017" @if($kolekcja->rok=="2017") selected @endif>2017</option>
            <option value="2018" @if($kolekcja->rok=="2018") selected @endif>2018</option>
        </select>
    </div>

    <div class="spis">
        <label for="cena">Cena</label>
        <input id="cena" name="cena" type="number" value="{{$kolekcja->cena}}" ><br>
    </div>

    <div class="spis">
        <label for="pamiec">Pamięć</label>
        <select id="pamiec" name="pamiec">
            <option value="4" @if($kolekcja->pamiec=="4") selected @endif>4 GB</option>
            <option value="8" @if($kolekcja->pamiec=="8") selected @endif>8 GB</option>
            <option value="16" @if($kolekcja->pamiec=="16") selected @endif>16 GB</option>
            <option value="32" @if($kolekcja->pamiec=="32") selected @endif>32 GB</option>
            <option value="64" @if($kolekcja->pamiec=="64") selected @endif>64 GB</option>
            <option value="128" @if($kolekcja->pamiec=="128") selected @endif>128 GB</option>
            <option value="256" @if($kolekcja->pamiec=="256") selected @endif>256 GB</option>
            <option value="512" @if($kolekcja->pamiec=="512") selected @endif>512 GB</option>
        </select>
    </div>

    <div class="spis">
        <label for="kolor">Kolor</label>
        <input id="kolor" name="kolor" type="text" value="{{$kolekcja->kolor}}" ><br>
    </div>
    <div class="spis">
        <label for="przekatna">Przekątna</label>
        <input id="przekatna" name="przekatna" type="text" value="{{$kolekcja->przekatna}}"><br>
    </div>
    <div class="spis">
        <label for="zdjecie">Zdjęcie</label>
        <input  id='zdjecie' type="file" name="zdjecie" value=''>


    </div>
    <div class="przyciski">
        <button id="zaktualizuj" type="submit" name="action" value="zakualizuj">Zaktualizuj</button>
    </div>
</form>
</body>
</html>
