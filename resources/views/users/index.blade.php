<x-layout>
    @include('users.create')
    @include('subjects.newsub')
    <a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#registerModal">Create User</a>
    <a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#registerSubModal">Create Subject</a>
    @yield('scripts')
</x-layout>
