@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/produtos') }}">Voltar </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if( Request::is('*/edit'))
                    <form action="{{ url('produtos/update') }}/ {{$produto->id}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label  class="form-label" required>Nome do produto</label>
                            <input type="text" name='name' class="form-control" value='{{ $produto->name }}'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" required>Categoria</label>
                            <select name="categoria" id="category" value='{{ $produto->category }}'>
                                    <option value='Higiene Pessoal'>Higiene Pessoal</option>
                                    <option value='Lava Roupas'>Lava Roupas</option>
                                    <option value='Cozinha'>Cozinha</option>
                                    <option value='Limpeza Geral'>Limpeza Geral</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" required>Quantidade</label>
                            <input type="number" name='quantity' class="form-control" value='{{ $produto->quantity }}'>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>

                        @else 
                    <form action="{{ url('produtos/add') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label  class="form-label" required>Nome do produto</label>
                            <input type="text" name='name' class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label" required>Categoria</label>
                            <select name="categoria" id="category">
                                    <option value='Higiene Pessoal'>Higiene Pessoal</option>
                                    <option value='Lava Roupas'>Lava Roupas</option>
                                    <option value='Cozinha'>Cozinha</option>
                                    <option value='Limpeza Geral'>Limpeza Geral</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" required>Quantidade</label>
                            <input type="number" name='quantity' class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
