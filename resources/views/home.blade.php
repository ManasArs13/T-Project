@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <ul class="nav justify-content-between mb-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      По дате
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('show', ['filter' => 'new']) }}">Сначала новые</a></li>
                      <li><a class="dropdown-item" href="{{ route('show', ['filter' => 'old']) }}">Сначала старые</a></li>
                      
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      По статусу
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('show', ['filter' => 'active']) }}">Сначало активные</a></li>
                      <li><a class="dropdown-item" href="{{ route('show', ['filter' => 'resolved']) }}">Сначало решённые</a></li>
                      
                    </ul>
                  </li>
              </ul>
        </div>
        </div>        
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if(session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif

            
            @if(count($orders) === 0)
            <div class="alert alert-warning mb-3">
              Заявок нет
            </div>
            @endif


            



                @foreach ($orders as $order)
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row g-0">
                            <div class="col-sm-6 col-md-8 mb-1">{{$order->name}} : ({{$order->email}})
                                @if ($order->comment == null)
                                <span class="badge bg-warning text-dark">Ожидает подтверждения</span>
                                @else
                                <span class="badge bg-success">Рассмотренно</span>
                                @endif
                            </div>
                            <div class="col-6 col-md-4 mb-1">{{$order->updated_at}}</div>
                    </div>
                    </div>
                    <div class="card-body ">
                      <h5 class="card-title">Сообщение</h5>
                      <p class="card-text border-bottom">{{$order->message}}</p>
                      <div class="card-body ">
                      <h5 class="card-title">Комментарий</h5>
                      @if ($order->comment == null)
                      <form action="{{ route('update', ['id' => $order->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="comment" class="form-control mb-3">
                        <button type="submit" class="btn btn-primary">Ответить</button>
                    </form>
                      @else
                      <p class="card-text">{{$order->comment}}</p>
                      @endif
                      
                     
                      
                    </div>
                </div>
                  </div>
                @endforeach




               
           <div>
            {{$orders->Links()}}
           </div>


            <div>
                
            </div>
        </div>
    </div>
</div>
@endsection
