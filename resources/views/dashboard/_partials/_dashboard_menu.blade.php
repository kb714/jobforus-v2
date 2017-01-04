<div class="col-md-4">
    <div class="list-group">
        <a href="{{route('letters.index')}}" class="list-group-item">
            <span class="badge">{{Auth::user()->coverLetters->count()}}</span>
            <h4 class="list-group-item-heading">Mis cartas de presentación</h4>
            <p class="list-group-item-text">Vea, cree y edite sus cartas de presentación</p>
        </a>
        <a href="{{route('personal-information.index')}}" class="list-group-item">
            <h4 class="list-group-item-heading">Información Personal</h4>
            <p class="list-group-item-text">Modifique su información de usuario</p>
        </a>
        <a href="{{route('additional-information.index')}}" class="list-group-item">
            <h4 class="list-group-item-heading">Información adicional</h4>
            <p class="list-group-item-text">Nivel de estudio, experiencia, entre otras opciones</p>
        </a>
        <a href="{{route('security.index')}}" class="list-group-item">
            <h4 class="list-group-item-heading">Seguridad</h4>
            <p class="list-group-item-text">Cambios de contraseña, correo y seguridad general</p>
        </a>
    </div>
</div>