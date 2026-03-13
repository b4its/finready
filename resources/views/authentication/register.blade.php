<!doctype html>
<html class="h-full">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar — FinReady</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { darkMode: "class" };</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
      .role-tab { transition: all .18s; }
      .role-tab.active { background: #16a34a; color: #fff; box-shadow: 0 2px 8px rgba(22,163,74,.3); }
      .role-tab:not(.active) { color: #6b7280; background: transparent; }
      .role-tab:not(.active):hover { background: #f3f4f6; color: #111827; }
      
      /* Kustomisasi Toastr agar sesuai tema */
      #toast-container > .toast-error { background-color: #ef4444 !important; }
      #toast-container > .toast-success { background-color: #22c55e !important; }
    </style>
  </head>

  <body class="h-full bg-gray-100 dark:bg-gray-900 transition-colors">

    <div class="absolute top-5 right-5 z-10">
      <button onclick="toggleDark()" class="px-4 py-2 text-sm rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white hover:opacity-80 transition">
        🌙 Mode
      </button>
    </div>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">
        <div class="flex justify-center mb-4">
          <div class="bg-green-500 text-white w-12 h-12 rounded-xl flex items-center justify-center text-xl font-bold">F</div>
        </div>
        <h2 id="loginTitle" class="text-2xl font-bold text-gray-900 dark:text-white">Daftar Akun UMKM</h2>
      </div>

      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="flex gap-1.5 p-1.5 bg-gray-200 dark:bg-gray-700 rounded-xl mb-8">
          <button type="button" id="tabUMKM" onclick="switchRole('umkm')" class="role-tab active flex-1 flex items-center justify-center gap-2 py-2.5 rounded-lg text-sm font-semibold">
            UMKM
          </button>
          <button type="button" id="tabInvestor" onclick="switchRole('investor')" class="role-tab flex-1 flex items-center justify-center gap-2 py-2.5 rounded-lg text-sm font-semibold">
            Investor
          </button>
        </div>

        <form action="{{ route('authenticate.register.post') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" id="roleInput" name="role" value="umkm">

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Name</label>
            <input type="text" name="username" required placeholder="Masukkan username" value="{{ old('username') }}"
              class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 outline-none transition" />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email</label>
            <input type="email" name="email" required placeholder="nama@email.com" value="{{ old('email') }}"
              class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 outline-none transition" />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password</label>
            <div class="relative">
              <input type="password" name="password" id="password" required placeholder="Minimal 8 karakter"
                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2 pr-10 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 outline-none transition" />
              <button type="button" onclick="togglePassword('password', 'eyeIcon1')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition">
                <i id="eyeIcon1" class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Konfirmasi Password</label>
            <div class="relative">
              <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Ulangi password"
                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2 pr-10 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 outline-none transition" />
              <button type="button" onclick="togglePassword('password_confirmation', 'eyeIcon2')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition">
                <i id="eyeIcon2" class="fas fa-eye"></i>
              </button>
            </div>
          </div>
          
          <button type="submit" id="submitBtn"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 rounded-lg transition mt-4">
            <span id="btnText">Daftar sebagai UMKM</span>
          </button>
        </form>
      </div>
    </div>

    <script>
      // Konfigurasi Toastr
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000",
      };

      // Tampilkan error dari Laravel via Toastr
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          toastr.error("{{ $error }}");
        @endforeach
      @endif

      // Tampilkan sukses (jika ada session success)
      @if (session('success'))
        toastr.success("{{ session('success') }}");
      @endif

      let currentRole = 'umkm';

      function switchRole(role) {
        currentRole = role;
        const isUMKM = role === 'umkm';
        document.getElementById('tabUMKM').classList.toggle('active', isUMKM);
        document.getElementById('tabInvestor').classList.toggle('active', !isUMKM);
        document.getElementById('roleInput').value = role;
        document.getElementById('loginTitle').textContent = isUMKM ? 'Daftar Akun UMKM' : 'Daftar Akun Investor';
        document.getElementById('btnText').textContent = isUMKM ? 'Daftar sebagai UMKM' : 'Daftar sebagai Investor';
      }

      function toggleDark() {
        document.documentElement.classList.toggle('dark');
      }

      function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === "password") {
          input.type = "text";
          icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
          input.type = "password";
          icon.classList.replace("fa-eye-slash", "fa-eye");
        }
      }
    </script>
  </body>
</html>