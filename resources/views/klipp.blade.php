@extends('layout')
@section('content')
<main class="container py-4 px-5">
    <section>
        <h1>Klipp hozzáadása</h1>
        <div class="row">
            <div class="col-md mb-5">
                <div class="border p-3">
                    <form action="/klippek" method="post">
                        @csrf
                        <div class="py-2">
                            <label for="eloado" class="form-label">Előadó neve:</label>
                            <input type="text" name="eloado" id="eloado" class="form-control" value="{{old('eloado')}}">
                            @error('eloado')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="cim" class="form-label">Szám címe:</label>
                            <input type="text" name="cim" id="cim" class="form-control" value="{{old('cim')}}">
                            @error('cim')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="py-2">
                            <p>Szám hossza:</p>
                            <div class="row">
                                <div class="col-md pb-3">
                                    <select name="min" id="min" class="form-select">
                                        @for ($i=1; $i<16; $i++)
                                        <option value="{{$i}}" @if(old('min') == $i) selected @endif>{{$i}} perc</option>    
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md">
                                    <select name="sec" id="sec" class="form-select">
                                        @for ($i=0; $i<60; $i++)
                                            <option value="{{$i}}" @if(old('sec') == $i) selected @endif>{{$i}} másodperc</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="py-2">
                            <label for="youtube" class="form-label">YouTube link:</label>
                            <input type="text" name="youtube" id="youtube" class="form-control" value="{{old('youtube')}}">
                            @error('youtube')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Elküld</button>
                    </form>
                </div>
            </div>
            <div class="col-md">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Klipp</th>
                            <th>Hossz</th>
                            <th>YouTube link</th>
                        </tr>
                        @foreach ($result as $row)
                            <tr>
                                <td>{{$row->eloado}} - {{$row->cim}}</td>
                                <td>{{substr($row->hossz,3,5)}}</td>
                                <td><a href="{{$row->youtube}}" target="_blank">{{$row->youtube}}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection