@extends("template.app")

@section("nome_tela","Disciplina")


@section("cadastro")
<script src="{{ asset('js/custom.js') }}"> </script>
<h1 class="titulo text-uppercase font-weight-bold text-white ">Cadastro de disciplina</h1>
                <br/>
                <br/>
                <div class="card text-white bg-dark mb-3 mx-auto sombra" style="max-width: 30rem;">
                    <div class="card-header text-uppercase font-weight-bold text-center text-s">
                        <h5>
                          Cadastro
                        </h5>
                    </div>
                    <div>
                        <div>
                            <form action="/disciplina" method="POST" class="form-group row">
                                <div class="col-12 form-group d-flex justify-content-center ">
                                    <div class="row">
                                        <label class="text-left text-uppercase text-white col-">Nome</label>
                                        <input type="text" name="nome" value="{{ $disciplina->nome }}"  required />
                                    </div>
                                </div>
                                <div class="col-12 form-group d-flex justify-content-center">
                                    <div class="row">
                                        <label class="text-center text-uppercase font-weight-bold text-white col-12">Quantidade máxima de faltas</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <input type="text" name="maximo_faltas" value="{{ $disciplina->maximo_faltas }}" required />
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="{{$disciplina->id}}"> 

                                <div class="col-12 form-group d-flex justify-content-center">
                                @csrf
                                    <button type="submit" class="font-weight-bold btn btn-success">Salvar</button>
                                    <a href="/disciplina" class="font-weight-bold btn btn-warning">Novo</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

@endsection


@section("listagem")

<br/>
                <h1 class="titulo text-uppercase font-weight-bold text-white ">disciplinas</h1>
                <br/>
                <div class="row d-flex justify-content-around">
                    @foreach ($disciplinas as $disciplina)

                    <div class="card mb-4 col-6" style="max-width: 23rem;">
                        <div class="card-header text-center text-uppercase font-weight-bold topo"><h5>{{ $disciplina->nome }}</h5></div>
                            <div>
                                <div>
                                    <input type="hidden" id="totalFaltas{{$disciplina->id}}" value="{{ $disciplina->total_faltas }}"/>
                                    <input type="hidden" id="maxFaltas{{$disciplina->id}}" value="{{ $disciplina->maximo_faltas }}"/>
                                    <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated progressoFaltaBar" data-id="{{ $disciplina->id }}" id="progressoFalta{{$disciplina->id}}" role="progressbar" style="width: 0%" aria-valuenow="{{ $disciplina->total_faltas }}" aria-valuemin="0" aria-valuemax="{{ $disciplina->maximo_faltas }}"></div>
                                </div>
                                <br/>
                            <h5 class="text-center">Faltas: {{ $disciplina->total_faltas }}</h5>
                            <h5 class="text-center">Máximo de faltas: {{ $disciplina->maximo_faltas }}</h5>
                            <div class="row d-flex justify-content-around">                        
                                <div>                                
                                    @if ($disciplina->total_faltas < $disciplina->maximo_faltas)
                                        <form action="/disciplina/{{$disciplina->id}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="put"/>
                                            <button type="submit" class="btn btn-warning font-weight-bold"onclick="return confirm('Deseja realmente faltar?');" >Faltar</button>
                                        </form>
                                    @else
                                        <h6 class="alerta">Vá para Aula!</h6>
                                    @endif
                                </div>
                                <div>
                                    <a href="/disciplina/{{$disciplina->id}}/edit" class="btn btn-dark font-weight-bold"> Editar</a>
                                </div>
                                <div>
                                    <form action="/disciplina/{{$disciplina->id}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-danger font-weight-bold"  onclick="return confirm('Deseja realmente exlcuir?');">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

@endsection