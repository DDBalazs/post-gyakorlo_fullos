@extends('layout')
@section('content')
<main class="container py-4 px-5">
    <section>
        <h1>Autó hozzáadása</h1>
        <div class="row">
            <div class="col-md mb-5">
                <div class="border p-3">
                    <form action="/auto" method="post">
                        @csrf
                        <div class="py-2">
                            <label for="rendszam" class="form-label">Autó rendszáma:</label>
                            <input type="text" name="rendszam" id="rendszam" class="form-control" value="{{old('rendszam')}}" placeholder="Pl.: AA AA-123">
                            @error('rendszam')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="marka" class="form-label">Autó márkája:</label>
                            <input type="text" name="marka" id="marka" class="form-control" value="{{old('marka')}}" placeholder="Pl.: Ford">
                            @error('marka')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="tipus" class="form-label">Autó típusa:</label>
                            <input type="text" name="tipus" id="tipus" class="form-control" value="{{old('tipus')}}" placeholder="Pl.: Focus">
                            @error('tipus')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="py-2">
                            <label for="evjarat" class="form-label">Autó évjárata: </label>
                                <select name="evjarat" id="evjarat" class="form-select">
                                    @for ($i=2024; $i>1959; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                        </div>
                        <div class="py-2">
                            <label for="szin" class="form-label">Autó színe:</label>
                            <input type="text" name="szin" id="szin" class="form-control" value="{{old('szin')}}" placeholder="Pl.: olajzöld">
                            @error('szin')
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
                            <th>Rendszám</th>
                            <th>Márka</th>
                            <th>Típus</th>
                            <th>Évjárat</th>
                            <th>Szín</th>
                        </tr>
                        @foreach ($result as $row)
                            <tr>
                                <td>{{$row->rendszam}}</td>
                                <td>{{$row->marka}}</td>
                                <td>{{$row->tipus}}</td>
                                <td>{{$row->evjarat}}</td>
                                <td>{{$row->szin}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
