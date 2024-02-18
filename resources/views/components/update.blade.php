<div class="max-w-lg mx-auto text-center">
    <h2 class="mb-8 text-2xl font-bold text-gray-700">File Analysis Upload</h2>
    <form id="upload-form" enctype="multipart/form-data" class="p-8 bg-white rounded-lg shadow">
        @csrf
        <label for="file-upload" class="px-4 py-2 font-medium text-gray-800 bg-gray-100 border border-gray-300 rounded-lg cursor-pointer hover:border-gray-400">Upload de Arquivo</label>
        <input id="file-upload" class="hidden" type="file" name="file" required>
        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Enviar</button>
    </form>
</div>

<!-- Pop-up Modal -->
<div id="analysis-result" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50" style="backdrop-filter: blur(5px);">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold">Resultado da Análise</h3>
            <button onclick="closePopup()" class="text-gray-400 transition duration-150 ease-in-out hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <p id="result-text" class="text-gray-600">Seu arquivo está sendo analisado...</p>
    </div>
</div>



<script>
    document.getElementById('upload-form').addEventListener('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var fileInput = document.getElementById('file-upload');
        if(fileInput.files.length > 0) {
            formData.append('file', fileInput.files[0]);

            fetch('/upload', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('result-text').textContent = data.message;
                document.getElementById('analysis-result').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('result-text').textContent = 'Houve um erro ao processar o arquivo.';
                document.getElementById('analysis-result').classList.remove('hidden');
            });
        }
    });

    function closePopup() {
        document.getElementById('analysis-result').classList.add('hidden');
    }

</script>

