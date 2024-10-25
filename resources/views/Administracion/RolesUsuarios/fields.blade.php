
        <div class="form-group col-sm-6">
            <label for="name">Nombre</label>
            <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name') }}" required autocomplete="name" autofocusplaceholder="Nombre" placeholder="Nombre">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-sm-6">
            <Label for="email">Correo electronico</Label>
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group col-sm-6">
            <label for="password">Contrasena</label>
            <input type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-sm-6">
        <label for="password-confirm">Contrasena</label>
            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" id="password" placeholder="Password">
        </div>
