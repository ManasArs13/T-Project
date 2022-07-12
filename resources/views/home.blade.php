@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
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
