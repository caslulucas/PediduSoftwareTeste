@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/produtos/new') }}">Novo Produto</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Lista de Produtos</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">status</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach( $produtos as $u)
                            <tr>
                            <th scope="row">{{ $u->id }}</th>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->category }}</td>
                            <td>{{ $u->status }}</td>
                            <td>{{$u->quantity }}</td>
                            <td>
                                <a href="produtos/{{ $u->id }}/edit" class='btn btn-info'>Editar</button>
                            </td>
                            <td>
                                <form action="produtos/delete/{{ $u->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class='btn btn-danger'>Deletar</button>
                                </form>
                            </td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
