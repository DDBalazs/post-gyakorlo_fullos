@extends('layout')
@section('content')
<main class="container py-4 px-5">
    <section>
        <h1>Autó hozzáadása</h1>
        <div class="row">
            <div class="col-md mb-5">
                <div class="border p-3">
                    <form action="/szinesz" method="post">
                        @csrf
                        <div class="py-2">
                            <label for="nev" class="form-label">Színész neve:</label>
                            <input type="text" name="nev" id="nev" class="form-control" value="{{old('szinesz')}}">
                            @error('nev')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="szuletes" class="form-label">Színész születési ideje:</label>
                            <input type="date" name="szuletes" id="szuletes" class="form-control" value="{{old('szuletes')}}">
                            @error('szuletes')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="nemzet" class="form-label">Nemzete:</label>
                            <input type="text" name="nemzet" id="nemzet" class="form-control" value="{{old('nemzet')}}">
                            @error('nemzet')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="py-2">
                            <input type="checkbox" name="oscar_dij" id="oscar_dij" class="form-checkbox" value="i" class="form-check-input" @if (old('oscar_dij') == "i") checked @endif >
                            <label for="oscar_dij">Oscar díjas?</label>
                        </div>
                        <button class="btn btn-primary" type="submit">Elküld</button>
                    </form>
                </div>
            </div>
            <div class="col-md">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Név</th>
                            <th>Születési idő</th>
                            <th>Nemzet</th>
                            <th>Oscar-dij</th>
                        </tr>
                        @foreach ($result as $row)
                            <tr>
                                <td>{{$row->nev}}</td>
                                <td>{{$row->szuletes}}</td>
                                <td>{{$row->nemzet}}</td>
                                <td>{{$row->oscar_dij == 'i' ? 'Oscar-díjas' : '--'}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
