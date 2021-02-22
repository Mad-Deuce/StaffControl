





    <table border="1" width="100%">
        <tr>
            <th>№ з/п</th>
            <th>Прізвище,<BR>ініціали</th>
            <th>Посада</th>
            @for ($i = 1; $i <= 31; $i++)
                <th>{{ $i }}</th>
            @endfor
            <th>Години</th>
            <th>Підпис</th>
        </tr>

         @foreach($schedulesArray as $schedulesArrayItem)
             <tr>
                 <td align="center">{{$loop->iteration}}</td>


                 <td>{{$schedulesArrayItem['name']}}</td>
                 <td align="center">{{$schedulesArrayItem['position']}}</td>



                 @foreach ($schedulesArrayItem['modes'] as $mode)
                     <td align="center">
                        {{$mode}}
                     </td>
                 @endforeach

                 <td>{{$schedulesArrayItem['sum']}}</td>
                 <td></td>
                 <td></td>
             </tr>
         @endforeach
    </table><BR>

