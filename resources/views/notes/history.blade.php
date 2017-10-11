@extends('layouts/base')
@section('content')

<div class = "container"> 

    <h1>History for {{ $historyRecords->first()->title }}</h1>
    <p class="text-right">Total Changes: {{$historyRecords->count()}}</p>
    <hr/>

    @foreach($historyRecords as $n)
    
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    {{$n->created_at}}

                </span>
                <h4 class="card-title">
                    {{$n->title}}  
                    @if($n->created_at == $historyRecords->max('created_at'))
                        <span class="badge badge-success">Latest Version</span>
                    @endif
                    
                </h4>
                
            </div>
            <div class="card-body">
      
                <p>{!! $n->body !!}</p>
               <hr/>
               <p>Reason: {{ $n->reason }}</p>
            </div>
            
        </div>
        <br/>

    @endforeach
    
</div>   
@endsection

