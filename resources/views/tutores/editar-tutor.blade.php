<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage='gestion-tutores'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Editar tutor"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <!-- Mensajes de éxito y errores -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left me-2"></i>
                        Volver
                    </a>

                    <!-- Form to edit tutor -->
                    <form method="POST" action="{{ route('actualizar-tutor', ['id' => $tutor->id_tutor]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Display current tutor details -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                value="{{ $tutor->nombre }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="apellido" class="form-control" id="apellido" name="apellido"
                                value="{{ $tutor->apellido }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $tutor->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="telefono" class="form-control" id="telefono" name="telefono"
                                value="{{ $tutor->telefono }}" required>
                        </div>


                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>




                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#confirmDeleteModal">
                        Eliminar Tutor
                    </button>


                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este tutor? Esta acción no se puede deshacer.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <!-- Botón para enviar el formulario -->
                                    <form id="deleteForm" action="{{ route('eliminar-tutor', $tutor->id_tutor) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>




        </div>

    </main>
    <x-plugins></x-plugins>


</x-layout>
