    @extends('layout')
    @section('content')
    <main class="container py-4 px-5">
        <section>
            <h1>Tanuló hozzáadása</h1>
            <div class="row">
                <div class="col-md mb-5">
                    <div class="border p-3">
                        <form action="/" method="post">
                            @csrf
                            <div class="py-2">
                                <label for="nev" class="form-label">Tanuló neve:</label>
                                <input type="text" name="nev" id="nev" class="form-control" value="{{ old('nev') }}">
                                @error('nev')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="py-2">
                                <label for="kor" class="form-label">Tanuló kora:</label>
                                <select name="kor" id="kor" class="form-select">
                                    @for ($i=14; $i<24; $i++)
                                    <option value="{{$i}}" @if(old('kor') == $i) selected @endif>{{$i}} év</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="py-2">
                                <label for="lakhely" class="form-label">Tanuló lakhelye:</label>
                                <input type="text" name="lakhely" id="lakhely" class="form-control" value="{{ old('lakhely') }}">
                                @error('lakhely')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="py-2">
                                <p>Tanuló neme:</p>
                                <input type="radio" name="nem" id="nemn" class="form-check-input" value="n" @if(old('nem') == 'n') checked @endif>
                                <label for="nemn" class="form-check-label">Nő</label>
                                <input type="radio" name="nem" id="nemf" class="form-check-input" value="f" @if(old('nem') == 'f') checked @endif>
                                <label for="nemf" class="form-check-label">Férfi</label>
                                @error('nem')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="py-2">
                                <label for="agazat" class="form-label">Tanuló ágazata:</label>
                                <select name="agazat" id="agazat" class="form-select">
                                    @for ($i=0; $i<count($agazat); $i++)
                                    <option value="{{ $agazat[$i] }}" @if(old('agazat') == $agazat[$i]) selected @endif>{{$agazat[$i]}}</option>    
                                    @endfor
                                </select>
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
                                <th>Kor</th>
                                <th>Lakhely</th>
                                <th>Nem</th>
                                <th>Ágazat</th>
                            </tr>
                            @foreach ($result as $row)
                                <tr>
                                    <td>{{$row->nev}}</td>
                                    <td>{{$row->kor}} év</td>
                                    <td>{{$row->lakhely}}</td>
                                    @if ($row->nem == 'n')
                                        <td>Nő</td>
                                    @else
                                        <td>Férfi</td>
                                    @endif
                                    <td>{{$row->agazat}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection