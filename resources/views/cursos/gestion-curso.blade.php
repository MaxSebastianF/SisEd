<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage='gestion-curso'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Gestión de cursos"></x-navbars.navs.auth>
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

            <!-- Botón para crear un nuevo cursos -->
            <div class="mb-4">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createStudentModal">Nuevo Curso</button>
            </div>

            <!-- Tabla de cursos -->
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Lista de cursos</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Curso</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paralelo</th>
                                  
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $curso->curso }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $curso->paralelo }}</p>
                                        </td>
                                        
                                        <td class="align-middle text-center">
                                            <!-- Botones de acción -->
                                            <a href="{{ route('editar-curso', ['id' => $curso->id_curso]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal para crear un nuevo curso -->
            <div class="modal fade" id="createStudentModal" tabindex="-1" role="dialog" aria-labelledby="createStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createStudentModalLabel">Registrar curso</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('curso.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="curso" class="form-label">Curso</label>
                                    <input type="text" class="form-control" id="curso" name="curso" value="{{ old('curso') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="paralelo" class="form-label">paralelo</label>
                                    <input type="text" class="form-control" id="paralelo" name="paralelo" value="{{ old('paralelo') }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
    <x-plugins></x-plugins>


</x-layout>
