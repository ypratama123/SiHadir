<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-600 leading-tight">
            {{ __('Profile') }}
        </h2>
        <a href="{{ route('dashboard') }}" class="inline-block mt-2 px-4 py-2 bg-orange-500 text-white rounded shadow hover:bg-yellow-500 transition">&larr; Kembali ke Dashboard</a>
    </x-slot>
    <div class="py-12 min-h-screen" style="background: linear-gradient(135deg, #ff9800 0%, #ffe082 100%); font-family: 'Poppins', 'Figtree', Arial, sans-serif;">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 sm:p-8 bg-white/90 shadow-2xl sm:rounded-2xl">
                <div class="max-w-xl mx-auto profile-form-font">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-6 sm:p-8 bg-white/90 shadow-2xl sm:rounded-2xl">
                <div class="max-w-xl mx-auto profile-form-font">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="p-6 sm:p-8 bg-white/90 shadow-2xl sm:rounded-2xl">
                <div class="max-w-xl mx-auto profile-form-font">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
            .profile-form-font, .profile-form-font input, .profile-form-font label, .profile-form-font select, .profile-form-font textarea, .profile-form-font p, .profile-form-font h2, .profile-form-font span {
                font-family: 'Poppins', 'Figtree', Arial, sans-serif !important;
                color: #222 !important;
            }
            .profile-form-font label {
                font-weight: 600;
                color: #ff9800 !important;
            }
            .profile-form-font input, .profile-form-font select, .profile-form-font textarea {
                color: #222 !important;
                background: #fffde7 !important;
                border: 1px solid #ffb300 !important;
                border-radius: 0.5rem;
                padding: 0.75rem 1rem;
                margin-bottom: 0.5rem;
            }
            .profile-form-font input:focus, .profile-form-font select:focus, .profile-form-font textarea:focus {
                border-color: #ff9800 !important;
                box-shadow: 0 0 0 2px #ffe08299;
            }
            .profile-form-font p, .profile-form-font h2, .profile-form-font span {
                color: #222 !important;
            }
        </style>
    </div>
</x-app-layout>
