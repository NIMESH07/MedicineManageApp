 @php
    foreach($data as $z)
    {
        echo $z->name."\t";
        echo $z->price."</br>";
    }
    $value = session()->get('username');
    if($value=="demo")
    {
        echo "Valid Demo";
    }
    echo "<br><br><br><br><br><br>".$value;
@endphp
                    {{--
                    <br>
                    {{ $version }}  
                    
                    --}}

<br>


