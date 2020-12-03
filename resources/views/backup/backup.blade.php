<x-app-layout>
    <div class="container">
        <h5>Danh sách backup file</h5>
        
        <ul class="list-group list-group-flush">
            {{-- @for ($i = 0; $i < count($listfileBackUp); $i++) --}}
                @for ($j = 0; $j < count($list_path); $j++)
                    <li class="list-group-item">
                        <i href="{{ $list_path[$j] }}"> <span>{{$j}}</span> - {{ substr($list_path[$j],51,80)}} </i> 
                    <a class="btn btn-success justify-content-end" href="/download/backups-file-{{ substr($list_path[$j],51,80) }}" download="{{$list_path[$j]}}"  target="_blank"> Tải về</a>
                    </li>    
                @endfor
                
            {{-- @endfor --}}
          </ul>
    </div>
</x-app-layout>