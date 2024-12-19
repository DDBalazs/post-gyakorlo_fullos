@extends('layout')
@section('content')
<main class="container py-4 px-5">
    <section>
        <h1>Házhozszállítás</h1>
        <div class="row">
            <div class="col-md mb-5">
                <div class="border p-3">
                    <form action="/szallitas" method="post">
                        @csrf
                        <div class="py-2">
                            <label for="nev" class="form-label">Név: <span class="text-danger">*</span></label>
                            <input type="text" name="nev" class="form-control @error('nev') is-invalid @enderror" id="nev" value="{{old('nev')}}">
                        </div>
                        <div class="row py-2">
                            <div class="col-md-4">
                                <label for="irsz" class="form-label">Irányítószám: <span class="text-danger">*</span></label>
                                <input type="text" name="irsz" id="irsz" class="form-control @error('irsz') is-invalid    @enderror" value="{{old('irsz')}}">
                            </div>
                            <div class="col-md-8">
                                <label for="varos" class="form-label">Város: <span class="text-danger">*</span></label>
                                <input type="text" name="varos" id="varos" class="form-control @error('varos') is-invalid    @enderror" value="{{old('varos')}}">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-8">
                                <label for="utca" class="form-label">Utca: <span class="text-danger">*</span></label>
                                <input type="text" name="utca" id="utca" class="form-control @error('utca') is-invalid    @enderror" value="{{old('utca')}}">
                            </div>
                            <div class="col-md-4">
                                <label for="hazszam" class="form-label">Házszám: <span class="text-danger">*</span></label>
                                <input type="text" name="hazszam" id="hazszam" class="form-control @error('hazszam') is-invalid    @enderror" value="{{old('hazszam')}}">
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md">
                                <label for="emelet" class="form-label">Emelet: </label>
                                <select name="emelet" id="emelet" class="form-select">
                                    <option value="">---</option>
                                    <option value="fsz">földszint</option>
                                    @for ($i=1; $i<31; $i++)
                                    <option value="{{$i}}">{{$i}}. emelet</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="ajto" class="form-label">Ajtó: </label>
                                <input type="text" name="ajto" id="ajto" class="form-control @error('ajto') is-invalid     @enderror" value="{{old('ajto')}}">
                            </div>
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
                            <th>Cím</th>
                            <th>Telefonszám</th>
                            <th>Érintés mentes</th>
                        </tr>
                        @foreach ($result as $row)
                            <tr>
                                <td>{{$row->nev}}</td>
                                <td>
                                    {{$row->irsz}} {{$row->varos}}, {{$row->utca}} {{$row->hazszam}}
                                    @if($row->emelet <> "")
                                        -@if($row->emelet == 'fsz')
                                             {{$row->emelet}}
                                         @else
                                             {{$row->emelet}}. em.
                                         @endif
                                         {{$row->ajto}}
                                    @endif
                                </td>
                                <td>{{$row->tel}}</td>
                                <td>
                                    @if($row->erintesmentes == 'i') igen @else nem @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
