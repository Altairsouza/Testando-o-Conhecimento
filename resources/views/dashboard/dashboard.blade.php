@extends('layouts.main')

@section('content')

<div class="container-fluid">
                   <div class="row">
                     @if(session('msg'))
                         <p class="msg">{{session('msg')}}</p>
                     @endif
                   </div>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">data de nascimento</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <th scropt="row">{{ $loop->index + 1 }}</th>
                    <th>{{ $event->nome }}</th>
                    <th>{{$event->data}}</th>
                    
                       <th> 
                        <a href="/contatos/{{$event->id}}"class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Visualizar</a>
                           <a href="/dashboard/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                        <form action="/dashboard/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
</th>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem compras, <a href="/faleConosco">fazer comprar</a></p>
    @endif
</div>



@endsection