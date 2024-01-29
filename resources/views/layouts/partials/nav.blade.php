<nav class="bg-green-800 py-6 relative ">
    <div class="container mx-auto flex px-8 xl:px-0">
        <div class="flex flex-grow">
            <img src="{{ asset('assets/imagenes/logo.png') }}" alt="logo animal">
        </div>
        <div class="flew lg:hidden">
            <img src="{{ asset('assets/imagenes/iconoMenu.png') }}" alt="menu" onClick="openMenu();">
        </div>
        <div id="menu"
            class="hidden flex-grow  w-full justify-between items-center absolute top-40 left-0 bg-green-800 py-14 px-8 lg:flex lg:relative lg:top-0  lg:py-0 lg:px-0 sm:px-14">
            <div class="flex flex-col mb-8 lg:flex-row lg:mb-0 mx-auto">
                <a href="{{ route('inicio') }}" class="text-white mb-1 lg:ml-16 lg:mr-16 lg:mb-8">Inicio</a>
                <a href="{{ route('animales.index') }}" class="text-white mb-1 lg:mr-16 lg:mb-8">Listado de Animales</a>
                <a href="{{ route('animales.create') }}" class="text-white">Nuevo Animal</a>
            </div>
            <div class="flex flex-col text-center lg:flex-row">
                @guest
                    <a href="{{ route('login') }}"
                        class=" hover:bg-green-700 border-2 border-white
                    text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-3">Iniciar
                        sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-green-500 hover:bg-green-700
                        text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Registrarse</a>
                    @endif
                @else
                    <span>{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold
                            py-2 px-4 rounded focus:outline-none ml-3 focus:shadow-outline"
                            onclick="event.preventDefault(); this.closest('form').submit();">Cerrar sesión</a>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
<script>
    function openMenu() {
        let menu = document.getElementById('menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    }
</script>
