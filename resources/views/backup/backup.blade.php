<x-app-layout>
    <div class="container">
        <h5>Danh sách backup file</h5>
        
        <ul class="list-group list-group-flush">
            @for ($i = 0; $i < count($listfileBackUp); $i++)
                @for ($j = 0; $j < count($list_path); $j++)
                    <li class="list-group-item">
                        <i href="{{ $list_path[$j] }}"> <span>{{$i}}</span> - {{ $listfileBackUp[$i]}} </i> 
                    <a class="btn btn-success justify-content-end" href="/download/backups-file-{{$listfileBackUp[$i]}}" download="{{$listfileBackUp[$i]}}"  target="_blank"> Tải về</a>
                    </li>    
                @endfor
                
            @endfor
          </ul>
    </div>
</x-app-layout>